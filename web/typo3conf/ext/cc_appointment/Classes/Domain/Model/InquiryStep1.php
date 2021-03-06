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
 * Class InquiryStep1
 * @package Crossconcept\CcAppointment\Domain\Model
 */
class InquiryStep1 extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Selected appointment type
     *
     * @var \Crossconcept\CcAppointment\Domain\Model\Appointment
     * @validate NotEmpty
     */
    protected $appointment = '';

    /**
     * @return \Crossconcept\CcAppointment\Domain\Model\Appointment
     */
    public function getAppointment()
    {
        return $this->appointment;
    }

    /**
     * @param \Crossconcept\CcAppointment\Domain\Model\Appointment $appointment
     */
    public function setAppointment($appointment)
    {
        $this->appointment = $appointment;
    }
}
