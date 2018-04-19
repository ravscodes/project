<?php
namespace Crossconcept\CcAppointment\Domain\Model;

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

/**
 * Class Appointment
 * @package Crossconcept\CcAppointment\Domain\Model
 */
class Appointment extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Title of the appointment
     *
     * @var string
     * @validate NotEmpty
     */
    protected $title;

    /**
     * Length of an appointment in minutes
     *
     * @var int
     */
    protected $interval;

    /**
     * Amount of days to request an appointment from now
     *
     * @var int
     */
    protected $leadTime;

    /**
     * Openingtimes on Monday
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime>
     */
    protected $openingtimesMonday;

    /**
     * Openingtimes on Tuesday
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime>
     */
    protected $openingtimesTuesday;

    /**
     * Openingtimes on Wednesday
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime>
     */
    protected $openingtimesWednesday;

    /**
     * Openingtimes on Thursday
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime>
     */
    protected $openingtimesThursday;

    /**
     * Openingtimes on Friday
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime>
     */
    protected $openingtimesFriday;

    /**
     * Openingtimes on Saturday
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime>
     */
    protected $openingtimesSaturday;

    /**
     * Openingtimes on Sunday
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime>
     */
    protected $openingtimesSunday;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->openingtimesMonday    = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->openingtimesTuesday   = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->openingtimesWednesday = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->openingtimesThursday  = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->openingtimesFriday    = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->openingtimesSaturday  = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->openingtimesSunday    = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * @param int $interval
     */
    public function setInterval($interval)
    {
        $this->interval = $interval;
    }

    /**
     * @return int
     */
    public function getLeadTime()
    {
        return $this->leadTime;
    }

    /**
     * @param int $leadTime
     */
    public function setLeadTime($leadTime)
    {
        $this->leadTime = $leadTime;
    }

    /**
     * Adds a openingtime on Monday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime
     * @return void
     */
    public function addOpeningtimesMonday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimesMonday->attach($openingtime);
    }

    /**
     * Removes a openingtime on Monday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime The \Crossconcept\CcAppointment\Domain\Model\Openingtime to be removed
     * @return void
     */
    public function removeOpeningtimesMonday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimesMonday->detach($openingtime);
    }

    /**
     * Returns the openingtimes on Monday
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimesMonday
     */
    public function getOpeningtimesMonday() {
        return $this->openingtimesMonday;
    }

    /**
     * Sets the openingtimes on Monday
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimesMonday
     * @return void
     */
    public function setOpeningtimesMonday(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $openingtimesMonday) {
        $this->openingtimesMonday = $openingtimesMonday;
    }

    /**
     * Adds a openingtime on Tuesday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime
     * @return void
     */
    public function addOpeningtimesTuesday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimesTuesday->attach($openingtime);
    }

    /**
     * Removes a openingtime on Tuesday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime The \Crossconcept\CcAppointment\Domain\Model\Openingtime to be removed
     * @return void
     */
    public function removeOpeningtimesTuesday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimesTuesday->detach($openingtime);
    }

    /**
     * Returns the openingtimes on Tuesday
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimesTuesday
     */
    public function getOpeningtimesTuesday() {
        return $this->openingtimesTuesday;
    }

    /**
     * Sets the openingtimes on Tuesday
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimesTuesday
     * @return void
     */
    public function setOpeningtimesTuesday(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $openingtimesTuesday) {
        $this->openingtimesTuesday = $openingtimesTuesday;
    }

    /**
     * Adds a openingtime on Wednesday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime
     * @return void
     */
    public function addOpeningtimesWednesday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimesWednesday->attach($openingtime);
    }

    /**
     * Removes a openingtime on Wednesday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime The \Crossconcept\CcAppointment\Domain\Model\Openingtime to be removed
     * @return void
     */
    public function removeOpeningtimesWednesday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimesWednesday->detach($openingtime);
    }

    /**
     * Returns the openingtimes on Wednesday
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimesWednesday
     */
    public function getOpeningtimesWednesday() {
        return $this->openingtimesWednesday;
    }

    /**
     * Sets the openingtimes on Wednesday
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimesWednesday
     * @return void
     */
    public function setOpeningtimesWednesday(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $openingtimesWednesday) {
        $this->openingtimesWednesday = $openingtimesWednesday;
    }

    /**
     * Adds a openingtime on Thursday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime
     * @return void
     */
    public function addOpeningtimesThursday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimesThursday->attach($openingtime);
    }

    /**
     * Removes a openingtime on Thursday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime The \Crossconcept\CcAppointment\Domain\Model\Openingtime to be removed
     * @return void
     */
    public function removeOpeningtimesThursday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimesThursday->detach($openingtime);
    }

    /**
     * Returns the openingtimes on Thursday
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimesThursday
     */
    public function getOpeningtimesThursday() {
        return $this->openingtimesThursday;
    }

    /**
     * Sets the openingtimes on Thursday
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimesThursday
     * @return void
     */
    public function setOpeningtimesThursday(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $openingtimesThursday) {
        $this->openingtimesThursday = $openingtimesThursday;
    }

    /**
     * Adds a openingtime on Friday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime
     * @return void
     */
    public function addOpeningtimesFriday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimesFriday->attach($openingtime);
    }

    /**
     * Removes a openingtime on Friday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime The \Crossconcept\CcAppointment\Domain\Model\Openingtime to be removed
     * @return void
     */
    public function removeOpeningtimesFriday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimesFriday->detach($openingtime);
    }

    /**
     * Returns the openingtimes on Friday
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimesFriday
     */
    public function getOpeningtimesFriday() {
        return $this->openingtimesFriday;
    }

    /**
     * Sets the openingtimes on Friday
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimesFriday
     * @return void
     */
    public function setOpeningtimesFriday(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $openingtimesFriday) {
        $this->openingtimesFriday = $openingtimesFriday;
    }

    /**
     * Adds a openingtime on Saturday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime
     * @return void
     */
    public function addOpeningtimesSaturday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimesSaturday->attach($openingtime);
    }

    /**
     * Removes a openingtime on Saturday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime The \Crossconcept\CcAppointment\Domain\Model\Openingtime to be removed
     * @return void
     */
    public function removeOpeningtimesSaturday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimesSaturday->detach($openingtime);
    }

    /**
     * Returns the openingtimes on Saturday
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimesSaturday
     */
    public function getOpeningtimesSaturday() {
        return $this->openingtimesSaturday;
    }

    /**
     * Sets the openingtimes on Saturday
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimesSaturday
     * @return void
     */
    public function setOpeningtimesSaturday(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $openingtimesSaturday) {
        $this->openingtimesSaturday = $openingtimesSaturday;
    }

    /**
     * Adds a openingtime on Sunday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime
     * @return void
     */
    public function addOpeningtimesSunday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimesSunday->attach($openingtime);
    }

    /**
     * Removes a openingtime on Sunday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime The \Crossconcept\CcAppointment\Domain\Model\Openingtime to be removed
     * @return void
     */
    public function removeOpeningtimesSunday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimesSunday->detach($openingtime);
    }

    /**
     * Returns the openingtimes on Sunday
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimesSunday
     */
    public function getOpeningtimesSunday() {
        return $this->openingtimesSunday;
    }

    /**
     * Sets the openingtimes on Sunday
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimesSunday
     * @return void
     */
    public function setOpeningtimesSunday(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $openingtimesSunday) {
        $this->openingtimesSunday = $openingtimesSunday;
    }
}
