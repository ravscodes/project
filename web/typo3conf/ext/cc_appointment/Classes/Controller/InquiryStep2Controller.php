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
        $dow = date('N', $date->getTimestamp());

        switch ($dow) {
            // Monday
            case 1: $openingtimes = $appointment->getOpeningtimesMonday(); break;
            // Tuesday
            case 2: $openingtimes = $appointment->getOpeningtimesTuesday(); break;
            // Wednesday
            case 3: $openingtimes = $appointment->getOpeningtimesWednesday(); break;
            // Thursday
            case 4: $openingtimes = $appointment->getOpeningtimesThursday(); break;
            // Friday
            case 5: $openingtimes = $appointment->getOpeningtimesFriday(); break;
            // Saturday
            case 6: $openingtimes = $appointment->getOpeningtimesSaturday(); break;
            // Sunday
            case 7: $openingtimes = $appointment->getOpeningtimesSunday(); break;
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
        $slotLength         = (int) $appointment->getInterval() * 60; // Minutes to seconds

        foreach ($openingtimes as $openingtime) {

            $start  = (int) $openingtime->getTimeFrom();
            $end    = (int) $openingtime->getTimeTo();

            while ($start + $slotLength < $end) {

                // Create new available timeslot
                $timeslot = new Timeslot();
                $timeslot->setAppointment($appointment);
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
        $date = new DateTime();

        // Check if data of inquiryStep1 is available in session and assign it to view
        if ($this->frontendController->fe_user->getKey('ses', InquiryStep1Controller::sessionKey)) {
            $inquiryStep1data = unserialize($this->frontendController->fe_user->getKey('ses', InquiryStep1Controller::sessionKey));
            if ($inquiryStep1data instanceof InquiryStep1) {
                $this->view->assign('newInquiryStep1', $inquiryStep1data);
            }
        }

        // Check if data of inquiryStep2 is available in session and assign it to view
        if ($this->frontendController->fe_user->getKey('ses', self::sessionKey)) {
            $inquiryStep2data = unserialize($this->frontendController->fe_user->getKey('ses', self::sessionKey));
            if ($inquiryStep2data instanceof InquiryStep2) {
                $this->view->assign('newInquiryStep2', $inquiryStep2data);
            }
        }

        $timeslots = $this->getTimeslotsAvailable($inquiryStep1data->getAppointment(), $date); // @Todo check appointment

        $assignedValues = [
            'timeslots' => $timeslots
        ];

        $this->view->assignMultiple($assignedValues);
    }

    /**
     * action ajaxCall
     *
     * @param InquiryStep2 $newInquiryStep2
     * @return String $json Returns timeslots as a JSON
     */
    public function ajaxCallAction(InquiryStep2 $newInquiryStep2)
    {
        $json = json_encode(array('myResult' => 'World'));
        return $json;
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
        $pageType = $GLOBALS['TSFE'];
        $settings = $this->settings;

        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($pageType);
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($settings);die;

        if ($pageType == $settings['typeNum']) {
            $this->ajaxCallAction($newInquiryStep2);
        }
        // Write data to session
        $this->frontendController->fe_user->setKey('ses', self::sessionKey, serialize($newInquiryStep2));
        $this->frontendController->fe_user->storeSessionData();

        $this->redirect('new', 'InquiryStep3');
    }

}
