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
    protected $openingtimeMonday;

    /**
     * Openingtimes on Tuesday
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime>
     */
    protected $openingtimeTuesday;

    /**
     * Openingtimes on Wednesday
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime>
     */
    protected $openingtimeWednesday;

    /**
     * Openingtimes on Thursday
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime>
     */
    protected $openingtimeThursday;

    /**
     * Openingtimes on Friday
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime>
     */
    protected $openingtimeFriday;

    /**
     * Openingtimes on Saturday
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime>
     */
    protected $openingtimeSaturday;

    /**
     * Openingtimes on Sunday
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime>
     */
    protected $openingtimeSunday;

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
        $this->openingtimeMonday    = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->openingtimeTuesday   = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->openingtimeWednesday = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->openingtimeThursday  = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->openingtimeFriday    = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->openingtimeSaturday  = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->openingtimeSunday    = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
    public function addOpeningtimeMonday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimeMonday->attach($openingtime);
    }

    /**
     * Removes a openingtime on Monday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtimeToRemove The \Crossconcept\CcAppointment\Domain\Model\Openingtime to be removed
     * @return void
     */
    public function removeOpeningtimeMonday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtimeToRemove) {
        $this->openingtimeMonday->detach($openingtimeToRemove);
    }

    /**
     * Returns the openingtimes on Monday
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimeMonday
     */
    public function getOpeningtimeMonday() {
        return $this->openingtimeMonday;
    }

    /**
     * Sets the openingtimes on Monday
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimeMonday
     * @return void
     */
    public function setOpeningtimeMonday(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $openingtimeMonday) {
        $this->openingtimeMonday = $openingtimeMonday;
    }

    /**
     * Adds a openingtime on Tuesday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime
     * @return void
     */
    public function addOpeningtimeTuesday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimeTuesday->attach($openingtime);
    }

    /**
     * Removes a openingtime on Tuesday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtimeToRemove The \Crossconcept\CcAppointment\Domain\Model\Openingtime to be removed
     * @return void
     */
    public function removeOpeningtimeTuesday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtimeToRemove) {
        $this->openingtimeTuesday->detach($openingtimeToRemove);
    }

    /**
     * Returns the openingtimes on Tuesday
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimeTuesday
     */
    public function getOpeningtimeTuesday() {
        return $this->openingtimeTuesday;
    }

    /**
     * Sets the openingtimes on Tuesday
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimeTuesday
     * @return void
     */
    public function setOpeningtimeTuesday(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $openingtimeTuesday) {
        $this->openingtimeTuesday = $openingtimeTuesday;
    }

    /**
     * Adds a openingtime on Wednesday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime
     * @return void
     */
    public function addOpeningtimeWednesday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimeWednesday->attach($openingtime);
    }

    /**
     * Removes a openingtime on Wednesday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtimeToRemove The \Crossconcept\CcAppointment\Domain\Model\Openingtime to be removed
     * @return void
     */
    public function removeOpeningtimeWednesday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtimeToRemove) {
        $this->openingtimeWednesday->detach($openingtimeToRemove);
    }

    /**
     * Returns the openingtimes on Wednesday
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimeWednesday
     */
    public function getOpeningtimeWednesday() {
        return $this->openingtimeWednesday;
    }

    /**
     * Sets the openingtimes on Wednesday
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimeWednesday
     * @return void
     */
    public function setOpeningtimeWednesday(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $openingtimeWednesday) {
        $this->openingtimeWednesday = $openingtimeWednesday;
    }

    /**
     * Adds a openingtime on Thursday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime
     * @return void
     */
    public function addOpeningtimeThursday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimeThursday->attach($openingtime);
    }

    /**
     * Removes a openingtime on Thursday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtimeToRemove The \Crossconcept\CcAppointment\Domain\Model\Openingtime to be removed
     * @return void
     */
    public function removeOpeningtimeThursday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtimeToRemove) {
        $this->openingtimeThursday->detach($openingtimeToRemove);
    }

    /**
     * Returns the openingtimes on Thursday
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimeThursday
     */
    public function getOpeningtimeThursday() {
        return $this->openingtimeThursday;
    }

    /**
     * Sets the openingtimes on Thursday
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimeThursday
     * @return void
     */
    public function setOpeningtimeThursday(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $openingtimeThursday) {
        $this->openingtimeThursday = $openingtimeThursday;
    }

    /**
     * Adds a openingtime on Friday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime
     * @return void
     */
    public function addOpeningtimeFriday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimeFriday->attach($openingtime);
    }

    /**
     * Removes a openingtime on Friday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtimeToRemove The \Crossconcept\CcAppointment\Domain\Model\Openingtime to be removed
     * @return void
     */
    public function removeOpeningtimeFriday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtimeToRemove) {
        $this->openingtimeFriday->detach($openingtimeToRemove);
    }

    /**
     * Returns the openingtimes on Friday
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimeFriday
     */
    public function getOpeningtimeFriday() {
        return $this->openingtimeFriday;
    }

    /**
     * Sets the openingtimes on Friday
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimeFriday
     * @return void
     */
    public function setOpeningtimeFriday(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $openingtimeFriday) {
        $this->openingtimeFriday = $openingtimeFriday;
    }

    /**
     * Adds a openingtime on Saturday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime
     * @return void
     */
    public function addOpeningtimeSaturday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimeSaturday->attach($openingtime);
    }

    /**
     * Removes a openingtime on Saturday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtimeToRemove The \Crossconcept\CcAppointment\Domain\Model\Openingtime to be removed
     * @return void
     */
    public function removeOpeningtimeSaturday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtimeToRemove) {
        $this->openingtimeSaturday->detach($openingtimeToRemove);
    }

    /**
     * Returns the openingtimes on Saturday
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimeSaturday
     */
    public function getOpeningtimeSaturday() {
        return $this->openingtimeSaturday;
    }

    /**
     * Sets the openingtimes on Saturday
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimeSaturday
     * @return void
     */
    public function setOpeningtimeSaturday(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $openingtimeSaturday) {
        $this->openingtimeSaturday = $openingtimeSaturday;
    }

    /**
     * Adds a openingtime on Sunday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime
     * @return void
     */
    public function addOpeningtimeSunday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtime) {
        $this->openingtimeSunday->attach($openingtime);
    }

    /**
     * Removes a openingtime on Sunday
     *
     * @param \Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtimeToRemove The \Crossconcept\CcAppointment\Domain\Model\Openingtime to be removed
     * @return void
     */
    public function removeOpeningtimeSunday(\Crossconcept\CcAppointment\Domain\Model\Openingtime $openingtimeToRemove) {
        $this->openingtimeSunday->detach($openingtimeToRemove);
    }

    /**
     * Returns the openingtimes on Sunday
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimeSunday
     */
    public function getOpeningtimeSunday() {
        return $this->openingtimeSunday;
    }

    /**
     * Sets the openingtimes on Sunday
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\CcAppointment\Domain\Model\Openingtime> $openingtimeSunday
     * @return void
     */
    public function setOpeningtimeSunday(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $openingtimeSunday) {
        $this->openingtimeSunday = $openingtimeSunday;
    }
}
