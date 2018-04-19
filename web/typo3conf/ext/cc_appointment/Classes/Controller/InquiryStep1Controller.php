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

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Crossconcept\CcAppointment\Domain\Model\InquiryStep1;

/**
 * InquiryStep1Controller
 */
class InquiryStep1Controller extends ActionController
{
    /**
     * Session-Key for InquiryStep1
     */
    const sessionKey = 'inquiryFormStep1data';

    /**
     * appointmentRepository
     *
     * @var \Crossconcept\CcAppointment\Domain\Repository\AppointmentRepository
     * @inject
     */
    protected $appointmentRepository = null;

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
     * action new
     *
     * @return void
     */
    public function newAction()
    {
        // Check if data of inquiryStep1 is available in session and assign it to view
        if ($this->frontendController->fe_user->getKey('ses', self::sessionKey)) {

            // Get data from session
            $inquiryStep1data = unserialize($this->frontendController->fe_user->getKey('ses', self::sessionKey));

            if ($inquiryStep1data instanceof InquiryStep1) {
                // Assign data to view
                $this->view->assign('newInquiryStep1', $inquiryStep1data);
            }
        }

        $appointments = $this->appointmentRepository->findAll();

        $assignedValues = [
            'appointments' => $appointments
        ];

        $this->view->assignMultiple($assignedValues);
    }

    /**
     * Saves data of step 1 to user session and redirect to step 2.
     *
     * @param InquiryStep1 $newInquiryStep1
     * @ignorevalidation $newInquiryStep1
     *
     * @return void
     */
    public function createAction(InquiryStep1 $newInquiryStep1)
    {
        // Write data to session
        $this->frontendController->fe_user->setKey('ses', self::sessionKey, serialize($newInquiryStep1));
        $this->frontendController->fe_user->storeSessionData();

        $this->redirect('new', 'InquiryStep2');
    }

}
