<?php
namespace Crossconcept\CcAppointment\Domain\Repository;

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
use Crossconcept\CcAppointment\Domain\Model\Appointment;

/**
 * TimeslotRepository
 */
class TimeslotRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = array(
        'time_from'   => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        'time_to'     => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    );

    /**
     * Find unavailable timeslots by appointment and date
     *
     * @param Appointment $appointment Chosen appointment
     * @param DateTime $date Picked in calendar, otherwise current date
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findByAppointmentDate(Appointment $appointment, DateTime $date)
    {
        $constraints    = [];
        $query          = $this->createQuery();

        $query->getQuerySettings()->setRespectStoragePage(FALSE);

        if (!empty($appointment) && !empty($date)) {
            $constraints[] = $query->equals('appointment', $appointment);
            $constraints[] = $query->equals('date', $date);
        }

        $query->matching($query->logicalAnd($constraints));
        return $query->execute();
    }
}
