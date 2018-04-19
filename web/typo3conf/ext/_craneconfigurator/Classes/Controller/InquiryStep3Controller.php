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
 * InquiryStep3Controller
 */
class InquiryStep3Controller extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController  {

  /**
   * Session-Key for InquiryStep3
   */
  const sessionKey = 'inquiryFormStep3data';

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

      if ($this->frontendController->fe_user->getKey('ses', InquiryStep2Controller::sessionKey)) {
          $inquiryStep2data = unserialize($this->frontendController->fe_user->getKey('ses', InquiryStep2Controller::sessionKey));
          if($inquiryStep2data instanceof \Crossconcept\TeichmannCraneconfigurator\Domain\Model\InquiryStep2) {
              $this->view->assign('newInquiryStep2', $inquiryStep2data);
          }
      }

      if ($this->frontendController->fe_user->getKey('ses', self::sessionKey)) {
          $inquiryStep3data = unserialize($this->frontendController->fe_user->getKey('ses', self::sessionKey));
          if($inquiryStep3data instanceof \Crossconcept\TeichmannCraneconfigurator\Domain\Model\InquiryStep3) {
            $this->view->assign('newInquiryStep3', $inquiryStep3data);
          }
      }
  }

    /**
     * initialize create action
     *
     * @param void
     */
    public function initializeCreateAction() {
        $inquiryStep3 = $this->arguments->getArgument('newInquiryStep3');

        $inquiryStep3->getPropertyMappingConfiguration()->forProperty('commissioningdate')
            ->setTypeConverterOption(
                'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,
                'd.m.Y'
            );
    }

  /**
   * action create
   *
   * @param \Crossconcept\TeichmannCraneconfigurator\Domain\Model\InquiryStep3 $newInquiryStep3
   * @ignorevalidation $newInquiryStep3
   * @return void
   */
  public function createAction(\Crossconcept\TeichmannCraneconfigurator\Domain\Model\InquiryStep3 $newInquiryStep3) {

      // Write data to session
      $this->frontendController->fe_user->setKey('ses', self::sessionKey, serialize($newInquiryStep3));
      $this->frontendController->fe_user->storeSessionData();

      $this->redirect('new', 'InquiryStep4');
  }

}
