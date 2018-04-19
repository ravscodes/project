<?php

namespace Crossconcept\TeichmannCraneconfigurator\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017 Matej Mericnjak <matej.mericnjak@crossconcept.de>, crossconcept GmbH
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
 * InquiryStep2Controller
 */
class InquiryStep2Controller extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController  {

  /**
   * Session-Key for InquiryStep2
   */
  const sessionKey = 'inquiryFormStep2data';

    /**
     * industryRepository
     *
     * @var \Crossconcept\TeichmannCraneconfigurator\Domain\Repository\IndustryRepository
     * @inject
     */
    protected $industryRepository = NULL;

  /**
   * classificationRepository
   *
   * @var \Crossconcept\TeichmannCraneconfigurator\Domain\Repository\ClassificationRepository
   * @inject
   */
  protected $classificationRepository = NULL;

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
      if ($this->frontendController->fe_user->getKey('ses', InquiryStep1Controller::sessionKey)) {
          $inquiryStep1data = unserialize($this->frontendController->fe_user->getKey('ses', InquiryStep1Controller::sessionKey));
          if($inquiryStep1data instanceof \Crossconcept\TeichmannCraneconfigurator\Domain\Model\InquiryStep1) {
              $this->view->assign('newInquiryStep1', $inquiryStep1data);
          }
      }

      if ($this->frontendController->fe_user->getKey('ses', self::sessionKey)) {
          $inquiryStep2data = unserialize($this->frontendController->fe_user->getKey('ses', self::sessionKey));
          if($inquiryStep2data instanceof \Crossconcept\TeichmannCraneconfigurator\Domain\Model\InquiryStep2) {
            $this->view->assign('newInquiryStep2', $inquiryStep2data);
          }
      }

        $industries = $this->industryRepository->findAll();
        $classifications = $this->classificationRepository->findAll();

        $assignedValues = [
          'industries' => $industries,
          'classifications' => $classifications,
        ];

        $this->view->assignMultiple($assignedValues);
  }

  /**
   * action create
   *
   * @param \Crossconcept\TeichmannCraneconfigurator\Domain\Model\InquiryStep2 $newInquiryStep2
   * @ignorevalidation $newInquiryStep2
   * @return void
   */
  public function createAction(\Crossconcept\TeichmannCraneconfigurator\Domain\Model\InquiryStep2 $newInquiryStep2) {

    // Write data to session
    $this->frontendController->fe_user->setKey('ses', self::sessionKey, serialize($newInquiryStep2));
    $this->frontendController->fe_user->storeSessionData();

    $this->redirect('new', 'InquiryStep3');
  }

}
