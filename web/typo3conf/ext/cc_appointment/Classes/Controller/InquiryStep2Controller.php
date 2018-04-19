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
     * Get the openingtimes for the given appointment and date.
     *
     * @param Appointment $appointment Chosen appointment
     * @param DateTime $date Picked in calendar, otherwise current date
     * @return $openingtimes
     */
    public function getOpeningtimesByDate(Appointment $appointment, DateTime $date)
    {
        $openingtimes = [];

        // Get the day of the week by the given date
        // to call the corresponding getter. (ISO-8601)
        $dow = date('N', $date);

        switch ($dow) {
            // Sunday
            case 1: $openingtimes = $appointment->getOpeningtimesSunday(); break;
            // Monday
            case 2: $openingtimes = $appointment->getOpeningtimesMonday(); break;
            // Tuesday
            case 3: $openingtimes = $appointment->getOpeningtimesTuesday(); break;
            // Wednesday
            case 4: $openingtimes = $appointment->getOpeningtimesWednesday(); break;
            // Thursday
            case 5: $openingtimes = $appointment->getOpeningtimesThursday(); break;
            // Friday
            case 6: $openingtimes = $appointment->getOpeningtimesFriday(); break;
            // Saturday
            case 7: $openingtimes = $appointment->getOpeningtimesSaturday(); break;
        }

        return $openingtimes;
    }

    /**
     * Get all available timeslots. A timeslots is valid as long as it fits
     * into the length of a given openingtime.
     *
     * @param Appointment $appointment Chosen appointment
     * @param DateTime $date Picked in calendar, otherwise current date
     * @return $timeslotsAvailable
     */
    public function getTimeslotsAvailable(Appointment $appointment, DateTime $date)
    {
        $timeslotsAvailable = [];
        $openingtimes       = $this->getOpeningtimesByDate($appointment, $date);
        $slotLength         = $appointment->getInterval();

        foreach ($openingtimes as $openingtime) {

            $start  = $openingtime->getTimeFrom();
            $end    = $openingtime->getTimeTo();

            while ($start + $slotLength < $end) {

                // Create new available timeslot
                $timeslot = new Timeslot();
                $timeslot->setDate($date);
                $timeslot->setTimeFrom($start);
                $timeslot->setTimeTo($start + $slotLength);

                $timeslotsAvailable[] = $timeslot;
                $start = $start + $slotLength;
            }
        }

        return $timeslotsAvailable;
    }

    /**
     * Get all reserved timeslots because they are booked already.
     *
     * @param Appointment $appointment Chosen appointment
     * @param DateTime $date Picked in calendar, otherwise current date
     * @return $timeslotsUnavailable
     */
    public function getTimeslotsUnavailable(Appointment $appointment, DateTime $date)
    {
        $timeslotsUnavailable = [];

        $result = $this->timeslotRepository->findByAppointmentDate();
        $result->toArray();
        // @Todo Create repositoy action / use toArray()

        return $timeslotsUnavailable;
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {
        $timeslots = [];

        // Check if data of inquiryStep1 is available in session and assign it to view
        if ($this->frontendController->fe_user->getKey('ses', InquiryStep1Controller::sessionKey)) {

            // Get data from session
            $inquiryStep1data = unserialize($this->frontendController->fe_user->getKey('ses', InquiryStep1Controller::sessionKey));

            if ($inquiryStep1data instanceof InquiryStep1) {
                // Assign data to view
                $this->view->assign('newInquiryStep1', $inquiryStep1data);

                $timeslotsAvailable     = [];
                $timeslotsUnavailable   = [];
                $date                   = new DateTime(); // @Todo Get chosen date

                // Filter available timeslots by unavaible timeslots
                $timeslotsAvailable      = $this->getTimeslotsAvailable($inquiryStep1data->getAppointment(), $date);
                $timeslotsUnavailable    = $this->getTimeslotsUnavailable($inquiryStep1data->getAppointment(), $date);

                if (count($timeslotsUnavailable) === 0) {
                    $timeslots = $timeslotsAvailable;
                } else {
                    // @Todo ...
                }
            }
        }

        // Check if data of inquiryStep2 is available in session and assign it to view
        if ($this->frontendController->fe_user->getKey('ses', self::sessionKey)) {

            // Get data from session
            $inquiryStep2data = unserialize($this->frontendController->fe_user->getKey('ses', self::sessionKey));

            if ($inquiryStep2data instanceof InquiryStep2) {
                // Assign data to view
                $this->view->assign('newInquiryStep2', $inquiryStep2data);
            }
        }

        $assignedValues = [
            'timeslots' => $timeslots
        ];

        $this->view->assignMultiple($assignedValues);
    }

    /**
     * Saves data of step 2 to user session and redirect to step 3.
     *
     * @param InquiryStep2 $newInquiryStep2
     * @ignorevalidation $newInquiryStep2
     *
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
