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

use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * InquiryStep4Controller
 */
class InquiryStep4Controller extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController  {

  /**
   * Session-Key for InquiryStep4
   */
  const sessionKey = 'inquiryFormStep4data';

    /**
     * countryRepository
     *
     * @var \SJBR\StaticInfoTables\Domain\Repository\CountryRepository
     * @inject
     */
    protected $countryRepository = NULL;

    /**
     * constructionTypeRepository
     *
     * @var \Crossconcept\TeichmannCraneconfigurator\Domain\Repository\CraneTypeRepository
     * @inject
     */
    protected $constructionTypeRepository = NULL;

    /**
     * inquiryRepository
     *
     * @var \Crossconcept\TeichmannCraneconfigurator\Domain\Repository\InquiryRepository
     * @inject
     */
    protected $inquiryRepository = NULL;

    /**
     * industryRepository
     *
     * @var \Crossconcept\TeichmannCraneconfigurator\Domain\Repository\IndustryRepository
     * @inject
     */
    protected $industryRepository = NULL;

    /**
     * Configuration Manager
     *
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
     * @inject
     */
    protected $configurationManager;

    /**
     * persistenceManager
     *
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
     * @inject
     */
    protected $persistenceManager;

    /**
     * mailService
     *
     * @var \Crossconcept\CcFluidmailer\Service\MailService
     * @inject
     */
    protected $mailService = NULL;

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

        if ($this->frontendController->fe_user->getKey('ses', InquiryStep3Controller::sessionKey)) {
            $inquiryStep3data = unserialize($this->frontendController->fe_user->getKey('ses', InquiryStep3Controller::sessionKey));
            if($inquiryStep3data instanceof \Crossconcept\TeichmannCraneconfigurator\Domain\Model\InquiryStep3) {
                $this->view->assign('newInquiryStep3', $inquiryStep3data);
            }
        }

        if ($this->frontendController->fe_user->getKey('ses', self::sessionKey)) {
            $inquiryStep4data = unserialize($this->frontendController->fe_user->getKey('ses', self::sessionKey));
            if($inquiryStep4data instanceof \Crossconcept\TeichmannCraneconfigurator\Domain\Model\InquiryStep4) {
                $this->view->assign('newInquiryStep4', $inquiryStep4data);
            }
        }

        $this->countryRepository->setDefaultOrderings(array('cn_short_local' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
        $countries = $this->countryRepository->findAll();

        $assignedValues = [
            'countries' => $countries,
        ];

        $this->view->assignMultiple($assignedValues);
    }

    /**
     * action create
     *
     * @param \Crossconcept\TeichmannCraneconfigurator\Domain\Model\InquiryStep4 $newInquiryStep4
     * @ignorevalidation $newInquiryStep4
     * @return void
     */
    public function createAction(\Crossconcept\TeichmannCraneconfigurator\Domain\Model\InquiryStep4 $newInquiryStep4) {

      $settings = $this->settings;

      if ($this->frontendController->fe_user->getKey('ses', InquiryStep1Controller::sessionKey)) {
        $inquiryStep1data = unserialize($this->frontendController->fe_user->getKey('ses', InquiryStep1Controller::sessionKey));
      }

      if ($this->frontendController->fe_user->getKey('ses', InquiryStep2Controller::sessionKey)) {
        $inquiryStep2data = unserialize($this->frontendController->fe_user->getKey('ses', InquiryStep2Controller::sessionKey));
      }

      if ($this->frontendController->fe_user->getKey('ses', InquiryStep3Controller::sessionKey)) {
        $inquiryStep3data = unserialize($this->frontendController->fe_user->getKey('ses', InquiryStep3Controller::sessionKey));
      }

      $inquiryStep4data = $newInquiryStep4;

      // Create a new inquiry
      $inquiry = new \Crossconcept\TeichmannCraneconfigurator\Domain\Model\Inquiry();

      $inquiry->setCranetype($inquiryStep1data->getCraneType());
      $inquiry->setConstructionType($inquiryStep1data->getConstructionType());
      $inquiry->setIndustry($inquiryStep2data->getIndustry());
      $inquiry->setCustomindustry($inquiryStep2data->getCustomindustry());
      $inquiry->setPurpose($inquiryStep2data->getPurpose());
      $inquiry->setClassification($inquiryStep2data->getClassification());
      $inquiry->setContaineramount($inquiryStep2data->getContaineramount());
      $inquiry->setContainerunit($inquiryStep2data->getContainerunit());

      $inquiry->setPayloadmin($inquiryStep3data->getPayloadmin());
      $inquiry->setPayloadmax($inquiryStep3data->getPayloadmax());
      $inquiry->setReachmin($inquiryStep3data->getReachmin());
      $inquiry->setReachmax($inquiryStep3data->getReachmax());
      $inquiry->setPayloadandreach1($inquiryStep3data->getPayloadandreach1());
      $inquiry->setPayloadandreach2($inquiryStep3data->getPayloadandreach2());
      $inquiry->setPayloadandreach3($inquiryStep3data->getPayloadandreach3());
      $inquiry->setPayloadandreach4($inquiryStep3data->getPayloadandreach4());
      $inquiry->setGaugemin($inquiryStep3data->getGaugemin());
      $inquiry->setGaugemax($inquiryStep3data->getGaugemax());
      $inquiry->setReachsolidsupportmin($inquiryStep3data->getReachsolidsupportmin());
      $inquiry->setReachsolidsupportmax($inquiryStep3data->getReachsolidsupportmax());
      $inquiry->setReachstabilizermin($inquiryStep3data->getReachstabilizermin());
      $inquiry->setReachstabilizermax($inquiryStep3data->getReachstabilizermax());
      $inquiry->setReachassembly($inquiryStep3data->getReachassembly());
      $inquiry->setLiftheight($inquiryStep3data->getLiftheight());
      $inquiry->setLiftheightabove($inquiryStep3data->getLiftheightabove());
      $inquiry->setLiftheightbelow($inquiryStep3data->getLiftheightbelow());
      $inquiry->setWorkingspeed($inquiryStep3data->getWorkingspeed());
      $inquiry->setWorkingspeedliftinggear($inquiryStep3data->getWorkingspeedliftinggear());
      $inquiry->setWorkingspeedcatgear($inquiryStep3data->getWorkingspeedcatgear());
      $inquiry->setWorkingspeedcranegear($inquiryStep3data->getWorkingspeedcranegear());
      $inquiry->setBuildingheight($inquiryStep3data->getBuildingheight());
      $inquiry->setWallcomposition($inquiryStep3data->getWallcomposition());
      $inquiry->setSteering($inquiryStep3data->getSteering());
      $inquiry->setRotatingtrolley($inquiryStep3data->getRotatingtrolley());
      $inquiry->setRotatingspreader($inquiryStep3data->getRotatingspreader());
      $inquiry->setLoadhandlingdevice($inquiryStep3data->getLoadhandlingdevice());
      $inquiry->setLoadhandlingdevicegrab($inquiryStep3data->getLoadhandlingdevicegrab());
      $inquiry->setLoadhandlingdeviceinfo($inquiryStep3data->getLoadhandlingdeviceinfo());
      $inquiry->setHookpath($inquiryStep3data->getHookpath());
      $inquiry->setInstallationheight($inquiryStep3data->getInstallationheight());
      $inquiry->setOperationarea($inquiryStep3data->getOperationarea());
      $inquiry->setRails($inquiryStep3data->getRails());
      $inquiry->setHall($inquiryStep3data->getHall());
      $inquiry->setTrack($inquiryStep3data->getTrack());
      $inquiry->setTracktype($inquiryStep3data->getTracktype());
      $inquiry->setTracksupportdistance($inquiryStep3data->getTracksupportdistance());
      $inquiry->setTracklengthexisting($inquiryStep3data->getTracklengthexisting());
      $inquiry->setTracklengthplanned($inquiryStep3data->getTracklengthplanned());
      $inquiry->setConductorrail($inquiryStep3data->getConductorrail());
      $inquiry->setTrackinfo($inquiryStep3data->getTrackinfo());
      $inquiry->setProjectphase($inquiryStep3data->getProjectphase());
      $inquiry->setCommissioningdate($inquiryStep3data->getCommissioningdate());
      $inquiry->setProjectinformation($inquiryStep3data->getProjectinformation());

      $inquiry->setCompany($inquiryStep4data->getCompany());
      $inquiry->setPosition($inquiryStep4data->getPosition());
      $inquiry->setLastname($inquiryStep4data->getLastname());
      $inquiry->setFirstname($inquiryStep4data->getFirstname());
      $inquiry->setAddress($inquiryStep4data->getAddress());
      $inquiry->setZip($inquiryStep4data->getZip());
      $inquiry->setCity($inquiryStep4data->getCity());
      $inquiry->setCountry($inquiryStep4data->getCountry());
      $inquiry->setPhone($inquiryStep4data->getPhone());
      $inquiry->setEmail($inquiryStep4data->getEmail());
      $inquiry->setPrivacy($inquiryStep4data->getPrivacy());

      // Persist inquiry
      $this->inquiryRepository->add($inquiry);
      $this->persistenceManager->persistAll();

      $salesforcetitle = $inquiry->getCranetype()->getSalesforcetitle();

      if (!empty($salesforcetitle)) {

        // Step 1
        $salesforceMessage  = '<p>';
        if (!empty($inquiry->getConstructionType())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'constructiontype', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getConstructionType()->getTitle() . '<br />';
        }
        if (!empty($inquiry->getIndustry())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'industry', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getIndustry()->getTitle() . '<br />';
        }
        if (!empty($inquiry->getCustomindustry())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'customindustry', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getCustomindustry() . '<br />';
        }
        if (!empty($inquiry->getPurpose())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'purpose', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getPurpose() . '<br />';
        }
        if (!empty($inquiry->getClassification())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'classification', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getClassification()->getTitle() . '<br />';
        }
        if (!empty($inquiry->getContaineramount())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'containeramount', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getContaineramount();
        }
        if (!empty($inquiry->getContainerunit())) {
          switch ($inquiry->getContainerunit()) {
            case '1':
              $salesforceMessage .= '/' . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'containerunit.1', $this->request->getControllerExtensionKey()) . '<br />';
              break;
            case '2':
              $salesforceMessage .= '/' . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'containerunit.2', $this->request->getControllerExtensionKey()) . '<br />';
              break;
          }
        }
        $salesforceMessage .= '</p>';

        // Step 2
        $salesforceMessage .= '<p>';
        if (!empty($inquiry->getPayloadmin()) || !empty($inquiry->getPayloadmax())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'payload', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getPayloadmin() . '-' . $inquiry->getPayloadmax() . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'label.t', $this->request->getControllerExtensionKey()) . '<br />';
        }
        if (!empty($inquiry->getReachmin()) || !empty($inquiry->getReachmax())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('reach', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getReachmin() . '-' . $inquiry->getReachmax() . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('label.m', $this->request->getControllerExtensionKey()) . '<br />';
        }
        if (!empty($inquiry->getPayloadandreach1())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'payloadandreach1', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getPayloadandreach1() . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'label.t', $this->request->getControllerExtensionKey()) . '<br />';
        }
        if (!empty($inquiry->getPayloadandreach2())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'payloadandreach2', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getPayloadandreach2() . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'label.m', $this->request->getControllerExtensionKey()) . '<br />';
        }
        if (!empty($inquiry->getPayloadandreach3())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'payloadandreach3', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getPayloadandreach3() . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'label.m', $this->request->getControllerExtensionKey()) . '<br />';
        }
        if (!empty($inquiry->getPayloadandreach4())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'payloadandreach4', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getPayloadandreach4() . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'label.t', $this->request->getControllerExtensionKey()) . '<br />';
        }
        if (!empty($inquiry->getGaugemin()) || !empty($inquiry->getGaugemax())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'gauge', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getGaugemin() . '-' . $inquiry->getGaugemax() . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'label.m', $this->request->getControllerExtensionKey()) . '<br />';
        }
        if (!empty($inquiry->getReachsolidsupportmin()) || !empty($inquiry->getReachsolidsupportmax())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('reachsolidsupport', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getReachsolidsupportmin() . '-' . $inquiry->getReachsolidsupportmax() . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('label.m', $this->request->getControllerExtensionKey()) . '<br />';
        }
        if (!empty($inquiry->getReachstabilizermin()) || !empty($inquiry->getReachstabilizermax())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('reachstabilizer', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getReachstabilizermin() . '-' . $inquiry->getReachstabilizermax() . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('label.m', $this->request->getControllerExtensionKey()) . '<br />';
        }
        if (!empty($inquiry->getReachassembly())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'reachassembly', $this->request->getControllerExtensionKey()) . ': ';
          switch ($inquiry->getReachassembly()) {
            case '1':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'reachassembly.3', $this->request->getControllerExtensionKey()) . '<br />';
              break;
            case '2':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'reachassembly.1', $this->request->getControllerExtensionKey()) . '<br />';
              break;
            case '3':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'reachassembly.2', $this->request->getControllerExtensionKey()) . '<br />';
              break;
          }
        }
        if (!empty($inquiry->getLiftheight())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'liftheight', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getLiftheight() . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'label.m', $this->request->getControllerExtensionKey()) . '<br />';
        }
        if (!empty($inquiry->getLiftheightabove())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'liftheightabove', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getLiftheightabove() . '<br />';
        }
        if (!empty($inquiry->getLiftheightbelow())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'liftheightbelow', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getLiftheightbelow() . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('label.m', $this->request->getControllerExtensionKey()) .'<br />';
        }
        if (!empty($inquiry->getWorkingspeed())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'workingspeed', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getWorkingspeed() . '<br />';
        }
        if (!empty($inquiry->getWorkingspeedliftinggear())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'workingspeedliftinggear', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getWorkingspeedliftinggear() . '<br />';
        }
        if (!empty($inquiry->getWorkingspeedcatgear())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'workingspeedcatgear', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getWorkingspeedcatgear() . '<br />';
        }
        if (!empty($inquiry->getWorkingspeedcranegear())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'workingspeedcranegear', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getWorkingspeedcranegear() . '<br />';
        }
        if (!empty($inquiry->getBuildingheight())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'buildingheight', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getBuildingheight() .  \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'label.m', $this->request->getControllerExtensionKey()) . '<br />';
        }
        if (!empty($inquiry->getWallcomposition())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'wallcomposition', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getWallcomposition() . '<br />';
        }
        if (!empty($inquiry->getSteering())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'steering', $this->request->getControllerExtensionKey()) . ': ';
          switch ($inquiry->getSteering()) {
            case '1':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'steering.1', $this->request->getControllerExtensionKey()) . '<br />';
              break;
            case '2':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'steering.2', $this->request->getControllerExtensionKey()) . '<br />';
              break;
            case '3':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'steering.3', $this->request->getControllerExtensionKey()) . '<br />';
              break;
          }
        }
        if (!empty($inquiry->getRotatingtrolley())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'rotatingtrolley', $this->request->getControllerExtensionKey()) . ': ';
          switch ($inquiry->getSteering()) {
            case '1':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'rotatingtrolley.1', $this->request->getControllerExtensionKey()) . '<br />';
              break;
            case '2':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'rotatingtrolley.2', $this->request->getControllerExtensionKey()) . '<br />';
              break;
            case '3':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'rotatingtrolley.3', $this->request->getControllerExtensionKey()) . '<br />';
              break;
          }
        }
        if (!empty($inquiry->getRotatingspreader())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'rotatingspreader', $this->request->getControllerExtensionKey()) . ': ';
          switch ($inquiry->getSteering()) {
            case '1':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'rotatingspreader.1', $this->request->getControllerExtensionKey()) . '<br />';
              break;
            case '2':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'rotatingspreader.2', $this->request->getControllerExtensionKey()) . '<br />';
              break;
            case '3':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'rotatingspreader.3', $this->request->getControllerExtensionKey()) . '<br />';
              break;
          }
        }
        if (!empty($inquiry->getLoadhandlingdevice())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'loadhandlingdevice', $this->request->getControllerExtensionKey()) . ': ';
          switch ($inquiry->getLoadhandlingdevice()) {
            case '1':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'loadhandlingdevice.1', $this->request->getControllerExtensionKey()) . '<br />';
              break;
            case '2':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'loadhandlingdevice.2', $this->request->getControllerExtensionKey()) . '<br />';
              break;
          }
        }
        if (!empty($inquiry->getLoadhandlingdevicegrab())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'loadhandlingdevicegrab', $this->request->getControllerExtensionKey()) . ': ';
          switch ($inquiry->getLoadhandlingdevice()) {
            case '1':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'loadhandlingdevice.2.1', $this->request->getControllerExtensionKey()) . '<br />';
              break;
            case '2':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'loadhandlingdevice.2.2', $this->request->getControllerExtensionKey()) . '<br />';
              break;
          }
        }
        if (!empty($inquiry->getLoadhandlingdeviceinfo())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'loadhandlingdeviceinfo', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->loadhandlingdeviceinfo() . '<br />';
        }
        if (!empty($inquiry->getHookpath())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'hookpath', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getHookpath() .  \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'label.m', $this->request->getControllerExtensionKey()) .'<br />';
        }
        if (!empty($inquiry->getInstallationheight())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'installationheight', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getInstallationheight() .  \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'label.m', $this->request->getControllerExtensionKey()) .'<br />';
        }
        if (!empty($inquiry->getOperationarea())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'operationarea', $this->request->getControllerExtensionKey()) . ': ';
          switch ($inquiry->getOperationarea()) {
            case '1':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'operationarea.1', $this->request->getControllerExtensionKey()) . '<br />';
              break;
            case '2':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'operationarea.2', $this->request->getControllerExtensionKey()) . '<br />';
              break;
          }
        }
        if (!empty($inquiry->getRails())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'rails', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getRails() .  \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'label.m', $this->request->getControllerExtensionKey()) .'<br />';
        }
        if (!empty($inquiry->getHall())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'hall', $this->request->getControllerExtensionKey()) . ': ';
          switch ($inquiry->getHall()) {
            case '1':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'hall.1', $this->request->getControllerExtensionKey()) . '<br />';
              break;
            case '2':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'hall.2', $this->request->getControllerExtensionKey()) . '<br />';
              break;
          }
        }
        if (!empty($inquiry->getTrack())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'track', $this->request->getControllerExtensionKey()) . ': ';
          switch ($inquiry->getTrack()) {
            case '1':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'track.1', $this->request->getControllerExtensionKey()) . '<br />';
              break;
            case '2':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'track.2', $this->request->getControllerExtensionKey()) . '<br />';
              break;
          }
        }
        if (!empty($inquiry->getTracktype())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'tracktype', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getTracktype() .'<br />';
        }
        if (!empty($inquiry->getTracksupportdistance())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'tracksupportdistance', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getTracksupportdistance() .  \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'label.m', $this->request->getControllerExtensionKey()) .'<br />';
        }
        if (!empty($inquiry->getTracklengthexisting())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'tracklengthexisting', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getTracklengthexisting() .  \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'label.m', $this->request->getControllerExtensionKey()) .'<br />';
        }
        if (!empty($inquiry->getTracklengthplanned())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'tracklengthplanned', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getTracklengthplanned() .  \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'label.m', $this->request->getControllerExtensionKey()) .'<br />';
        }
        if (!empty($inquiry->getConductorrail())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'conductorrail', $this->request->getControllerExtensionKey()) . ': ';
          switch ($inquiry->getConductorrail()) {
            case '1':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'conductorrail.available', $this->request->getControllerExtensionKey()) . '<br />';
              break;
            case '2':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'conductorrail.necessary', $this->request->getControllerExtensionKey()) . '<br />';
              break;
          }
        }
        if (!empty($inquiry->getTrackinfo())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'trackinfo', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getTrackinfo() .'<br />';
        }
        if (!empty($inquiry->getProjectphase())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'projectphase', $this->request->getControllerExtensionKey()) . ': ';
          switch ($inquiry->getProjectphase()) {
            case '1':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'projectphase.1', $this->request->getControllerExtensionKey()) . '<br />';
              break;
            case '2':
              $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'projectphase.2', $this->request->getControllerExtensionKey()) . '<br />';
              break;
          }
        }
        if (!empty($inquiry->getCommissioningdate())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'commissioningdate', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getCommissioningdate()->format('d.m.Y') .'<br />';
        }
        if (!empty($inquiry->getProjectinformation())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'projectinformation', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getProjectinformation() .'<br />';
        }
        $salesforceMessage .= '</p>';


        // Step 4
        $salesforceMessage .= '<p>';
        if (!empty($inquiry->getCompany())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'company', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getCompany() .'<br />';
        }
        if (!empty($inquiry->getPosition())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'position', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getPosition() .'<br />';
        }
        if (!empty($inquiry->getLastname())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'lastname', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getLastname() .'<br />';
        }
        if (!empty($inquiry->getFirstname())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'firstname', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getFirstname() .'<br />';
        }
        if (!empty($inquiry->getAddress())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'address', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getAddress() .'<br />';
        }
        if (!empty($inquiry->getZip())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'zip', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getZip() .'<br />';
        }
        if (!empty($inquiry->getCity())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'city', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getCity() .'<br />';
        }
        if (!empty($inquiry->getCountry())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'country', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getCountry()->getShortNameLocal() .'<br />';
        }
        if (!empty($inquiry->getPhone())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'phone', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getPhone() .'<br />';
        }
        if (!empty($inquiry->getEmail())) {
          $salesforceMessage .= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( 'email', $this->request->getControllerExtensionKey()) . ': ' . $inquiry->getEmail() .'<br />';
        }
        $salesforceMessage .= '</p>';

        // Initialize Guzzle client
        $client = new \GuzzleHttp\Client();

        $response = $client->request(
          'POST',
          'https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8',
          [
            'form_params' => [
              'oid' => '00D0Y000000qEVT',
              'Campaign_ID' => '7010Y000000EJiG',
              'retURL' => 'http://www.teichmanngruppe.de',
              'company' => $inquiry->getCompany(),
              'salutation' => '',
              'first_name' => $inquiry->getFirstname(),
              'last_name' => $inquiry->getLastname(),
              'street' => $inquiry->getAddress(),
              'zip' => $inquiry->getZip(),
              'city' => $inquiry->getCity(),
              'email' => $inquiry->getEmail(),
              'phone' => $inquiry->getPhone(),
              '00N0Y00000RXYvN' => $salesforcetitle,
              'description' => '',
              'Info__c' => $salesforceMessage,
            ],
          ]
        );
      }

      // Deactivate admin mail
      unset($settings['email']['admin']);

      // Send admin mail
      if (isset($settings['email']['admin']['from']) && trim($settings['email']['admin']['from']) !== ''
          && isset($settings['email']['admin']['fromEmail']) && trim($settings['email']['admin']['fromEmail']) !== ''
          && isset($settings['email']['admin']['toEmail']) && trim($settings['email']['admin']['toEmail']) !== '') {

          $from = array(
              $settings['email']['admin']['fromEmail'] => $settings['email']['admin']['fromName']
          );

          $subject = $settings['email']['admin']['subject'];
          $recipient = explode(',', $settings['email']['admin']['toEmail']);

          $variables = array();

          $extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
          $logo = isset($extbaseFrameworkConfiguration['page.']['theme.']['logoFallback']) ? $extbaseFrameworkConfiguration['page.']['theme.']['logoFallback'] : 'fileadmin/Medien/Logos/teichmanngruppe.png';

          $emailTemplate = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($this->request->getControllerExtensionKey()) . 'Resources/Private/Emails/EmailAdmin.html';
          $emailTemplateHtml = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($this->request->getControllerExtensionKey()) . 'Resources/Private/Emails/HtmlEmailAdmin.html';

          // Render and send email
          $sent = $this->mailService->sendTemplateEmail(
              $recipient,
              $from,
              $subject,
              $variables,
              array(),
              $emailTemplate,
              $emailTemplateHtml,
              array('logo' => $logo),
              array(),
              array()
          );
      }

      // Remove data from session
      $this->frontendController->fe_user->setKey('ses', InquiryStep1Controller::sessionKey, null);
      $this->frontendController->fe_user->setKey('ses', InquiryStep2Controller::sessionKey, null);
      $this->frontendController->fe_user->setKey('ses', InquiryStep3Controller::sessionKey, null);
      $this->frontendController->fe_user->setKey('ses', self::sessionKey, null);
      $this->frontendController->fe_user->storeSessionData();

      // redirect based on industry
      if ($inquiryStep2data->getIndustry() != NULL) {
        $redirectPid = $settings['thankYouPageIndustry' . $inquiryStep2data->getIndustry()->getUid() . 'Pid'];
      } else {
        $redirectPid = $settings['thankYouPageIndustry6Pid'];
      }

      $uriBuilder = $this->uriBuilder;
      $uri = $uriBuilder
        ->setTargetPageUid($redirectPid)
        ->build();
      $this->redirectToURI($uri, 0, 200);
    }


}
