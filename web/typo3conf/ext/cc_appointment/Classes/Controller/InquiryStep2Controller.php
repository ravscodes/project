<?php
namespace Crossconcept\CcAppointment\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2018 Daniel Theuerkorn <daniel.theuerkorn@crossconcept.de>, crossconcept GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use DateTime;
use Crossconcept\CcAppointment\Domain\Model\Timeslot;
use Crossconcept\CcAppointment\Domain\Model\Appointment;
use Crossconcept\CcAppointment\Domain\Model\InquiryStep1;
use Crossconcept\CcAppointment\Domain\Model\InquiryStep2;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * InquiryStep2Controller
 */
class InquiryStep2Controller extends ActionController
{
    /**
     * Session-Key for InquiryStep2
     */
    const sessionKey = 'inquiryFormStep2data';

    /**
     * appointmentRepository
     *
     * @var \Crossconcept\CcAppointment\Domain\Repository\AppointmentRepository
     * @inject
     */
    protected $appointmentRepository = null;

    /**
     * timeslotRepository
     *
     * @var \Crossconcept\CcAppointment\Domain\Repository\TimeslotRepository
     * @inject
     */
    protected $timeslotRepository = null;

    /**
     * inquiryStep1Controller
     *
     * @var \Crossconcept\CcAppointment\Controller\InquiryStep1Controller
     * @inject
     */
    protected $inquiryStep1Controller = null;

    /**
     * Frontend Controller
     */
    protected $frontendController;

    /**
     * Class Constructor
     */
    public function __construct()
    {
        $this->frontendController = $GLOBALS['TSFE'];
    }

    /**
     * Return the data serialized in user session
     *
     * @return mixed $sessionData Data of current session
     */
    public function getSessionData()
    {
        $sessionData = null;

        // Check if data of inquiryStep1 is available in session and assign it to view
        if ($this->frontendController->fe_user->getKey('ses', self::sessionKey)) {

            // Get data from session
            $inquiryStep2data = unserialize($this->frontendController->fe_user->getKey('ses', self::sessionKey));

            if ($inquiryStep2data instanceof InquiryStep2) {

                $sessionData = $inquiryStep2data;
            }
        }

        return $sessionData;
    }

    /**
     * Get the openingtimes for the given appointment and date.
     *
     * @param Appointment $appointment Chosen appointment
     * @param DateTime $date Picked in calendar, otherwise current date
     * @return array $openingtimes Opening times for this date
     */
    public function getOpeningtimesByDate(Appointment $appointment, DateTime $date)
    {
        $openingtimes = [];

        // Get the day of the week by the given date
        // to call the corresponding getter. (ISO-8601)
        $dow = date('N', $date->getTimestamp());

        switch ($dow) {
            // Monday
            case 1: $openingtimes = $appointment->getOpeningtimesMonday()->toArray(); break;
            // Tuesday
            case 2: $openingtimes = $appointment->getOpeningtimesTuesday()->toArray(); break;
            // Wednesday
            case 3: $openingtimes = $appointment->getOpeningtimesWednesday()->toArray(); break;
            // Thursday
            case 4: $openingtimes = $appointment->getOpeningtimesThursday()->toArray(); break;
            // Friday
            case 5: $openingtimes = $appointment->getOpeningtimesFriday()->toArray(); break;
            // Saturday
            case 6: $openingtimes = $appointment->getOpeningtimesSaturday()->toArray(); break;
            // Sunday
            case 7: $openingtimes = $appointment->getOpeningtimesSunday()->toArray(); break;
        }

        return $openingtimes;
    }

    /**
     * Get all timeslots for a given date and appointment.
     *
     * @param Appointment $appointment Chosen appointment
     * @param DateTime $date Picked in calendar, otherwise current date
     * @return array $timeslotsByDate All slots for this date
     */
    public function getTimeslotsByDate(Appointment $appointment, DateTime $date)
    {
        $timeslotsByDate = [];
        $openingtimes    = $this->getOpeningtimesByDate($appointment, $date);
        $slotLength      = (int) $appointment->getInterval() * 60; // Minutes to seconds

        foreach ($openingtimes as $openingtime) {

            $start  = $openingtime->getTimeFrom();
            $end    = $openingtime->getTimeTo();

            while ($start + $slotLength <= $end) {

                // Create new available timeslot
                $timeslot = new Timeslot();
                $timeslot->setAppointment($appointment);
                $timeslot->setDate($date);
                $timeslot->setTimeFrom($start);
                $timeslot->setTimeTo($start + $slotLength);

                $timeslotsByDate[] = $timeslot;
                $start = $start + $slotLength;
            }
        }

        return $timeslotsByDate;
    }

    /**
     * Get all timeslots that have already been requested for the given date.
     *
     * @param Appointment $appointment Chosen appointment
     * @param DateTime $date Picked in calendar, otherwise current date
     * @return array $timeslotsUnavailable
     */
    public function getTimeslotsUnavailable(Appointment $appointment, DateTime $date)
    {
        $timeslotsUnavailable = $this->timeslotRepository->findByAppointmentDate($appointment, $date);
        return $timeslotsUnavailable->toArray();
    }

    /**
     * Get all available timeslots. A timeslots is valid as long as it fits in
     * the length of a given opening time.
     *
     * @param Appointment $appointment Chosen appointment
     * @param DateTime $date Picked in calendar, otherwise current date
     *
     * @return array $timeslotsAvailable Timeslots available for request
     */
    public function getTimeslotsAvailable(Appointment $appointment, DateTime $date)
    {
        $timeslotsAvailable = [];

        $timeslotsByDate        = $this->getTimeslotsByDate($appointment, $date);
        $timeslotsUnavailable   = $this->getTimeslotsUnavailable($appointment, $date);

        if (!empty($timeslotsUnavailable)) {

            // @Todo Filter
        } else {

            $timeslotsAvailable = $timeslotsByDate;
        }

        return $timeslotsAvailable;
    }

    /**
     * Get all unavailable days of week (days without timeslots available).
     *
     * @param Appointment $appointment Chosen appointment
     * @param DateTime $date Picked in calendar, otherwise current date
     * @return array $dowDisabled days of week to disable
     */
    public function getCalendarDisabled(Appointment $appointment, DateTime $date)
    {
        $dowDisabled = [];

        // Iterate through whole week
        for ($i = 0; $i < 7; $i++) {

            $tempDate           = clone $date;
            $dateToCheck        = $tempDate->modify('+' . $i . ' days');
            $timeslotsForDate = $this->getTimeslotsByDate($appointment, $dateToCheck);

            if (empty($timeslotsForDate)) {

                $dowDisabled[] = $dateToCheck->format('w');
            }
        }

        return implode(",", $dowDisabled);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {
        // Check if data of inquiryStep1 is available in session and assign it to view
        $inquiryStep1data = $this->inquiryStep1Controller->getSessionData();
        $this->view->assign('newInquiryStep1', $inquiryStep1data);

        // Check if data of inquiryStep2 is available in session and assign it to view
        $inquiryStep2data = $this->getSessionData();
        $this->view->assign('newInquiryStep2', $inquiryStep2data);

        $today          = new DateTime();
        $date           = (!empty($inquiryStep2data) ? $inquiryStep2data->getTimeslot()->getDate() : $today);
        $appointment    = $inquiryStep1data->getAppointment();

        // Assign available timeslots
        $timeslots = $this->getTimeslotsAvailable($appointment, $date);
        $this->view->assign('timeslots', $timeslots);

        // Assign calendar settings
        $calendar = [
            'disabled'  => $this->getCalendarDisabled($appointment, $date),
            'default'   => $date->format('Y-m-d'),
            'min'       => $today->format('Y-m-d'),
            'max'       => $today->modify('+' . $appointment->getLeadTime() . ' days')->format('Y-m-d')
        ];
        $this->view->assign('calendar', $calendar);
    }

    /**
     * Method that is executed when the date changes in the calendar.
     *
     * @return String $json Returns timeslots as a JSON
     */
    public function ajaxCallAction()
    {
        $timeslotsArray = [];

        // Get required arguments
        $ajaxArguments  = GeneralUtility::_GP('arguments');
        $appointmentUid = intval($ajaxArguments['appointmentUid']);
        $appointment    = $this->appointmentRepository->findByUid($appointmentUid);
        $date           = DateTime::createFromFormat('d.m.Y', $ajaxArguments['date']);

        if (!empty($appointment) && !empty($date)) {

            $timeslots = $this->getTimeslotsAvailable($appointment, $date);

            foreach ($timeslots as $timeslot) {

                $timeFrom   = $timeslot->getTimeFrom();
                $timeTo     = $timeslot->getTimeTo();

                $timeslotsArray[] = [
                    'appointment' => $appointmentUid,
                    'date'        => $timeslot->getDate()->format('d.m.Y'),
                    'from'        => $timeFrom,
                    'to'          => $timeTo,
                    'label'       => LocalizationUtility::translate(
                        'form.label.timeFormat',
                        'cc_appointment',
                        [
                            0 => date('H:i', $timeFrom),
                            1 => date('H:i', $timeTo)
                        ])
                ];
            }
        }

        return json_encode($timeslotsArray);
    }

    /**
     * initializeCreateAction
     */
    protected function initializeCreateAction(){

        if ($this->arguments->hasArgument('newInquiryStep2')) {
            $newInquiryStep2 = $this->arguments->getArgument('newInquiryStep2');
            $newInquiryStep2->getPropertyMappingConfiguration()->allowProperties('timeslot');
            $newInquiryStep2->getPropertyMappingConfiguration()->forProperty('timeslot')->allowProperties('appointment', 'date', 'timeFrom', 'timeTo');
            $newInquiryStep2->getPropertyMappingConfiguration()->allowCreationForSubProperty('timeslot');
            $newInquiryStep2->getPropertyMappingConfiguration()->allowModificationForSubProperty('timeslot');
            // Converting the date string to a \DateTime object
            $newInquiryStep2->getPropertyMappingConfiguration()->forProperty('timeslot.date')->setTypeConverterOption(
                        'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                        \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,
                        'd.m.Y');
        }
    }

    /**
     * Saves data of step 2 to user session and redirect to step 3.
     *
     * @param InquiryStep2 $newInquiryStep2
     * @ignorevalidation $newInquiryStep2
     * @return void
     */
    public function createAction(InquiryStep2 $newInquiryStep2)
    {
        // Write data to session
        $this->frontendController->fe_user->setKey('ses', self::sessionKey, serialize($newInquiryStep2));
        $this->frontendController->fe_user->storeSessionData();

        $this->redirect('new', 'InquiryStep3');
    }
}
