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
 * Class Timeslot
 * @package Crossconcept\CcAppointment\Domain\Model
 */
class Timeslot extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Appointment the timeslot belongs to
     *
     * @var \Crossconcept\CcAppointment\Domain\Model\Appointment
     * @validate NotEmpty
     */
    protected $appointment;

    /**
     * Date of requested appointment
     *
     * @var string
     * @validate DateTime
     * @validate NotEmpty
     */
    protected $date;

    /**
     * Start time of requested appointment
     *
     * @var string
     * @validate NotEmpty
     */
    protected $timeFrom;

    /**
     * End time of requested appointment
     *
     * @var string
     * @validate NotEmpty
     */
    protected $timeTo;

    /**
     * @return Appointment
     */
    public function getAppointment()
    {
        return $this->appointment;
    }

    /**
     * @param Appointment $appointment
     */
    public function setAppointment($appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getTimeFrom()
    {
        return $this->timeFrom;
    }

    /**
     * @param mixed $timeFrom
     */
    public function setTimeFrom($timeFrom)
    {
        $this->timeFrom = $timeFrom;
    }

    /**
     * @return mixed
     */
    public function getTimeTo()
    {
        return $this->timeTo;
    }

    /**
     * @param mixed $timeTo
     */
    public function setTimeTo($timeTo)
    {
        $this->timeTo = $timeTo;
    }
}
