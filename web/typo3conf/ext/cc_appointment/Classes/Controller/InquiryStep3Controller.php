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

use Crossconcept\CcAppointment\Domain\Model\Inquiry;
use Crossconcept\CcAppointment\Domain\Model\InquiryStep1;
use Crossconcept\CcAppointment\Domain\Model\InquiryStep2;
use Crossconcept\CcAppointment\Domain\Model\InquiryStep3;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * InquiryStep3Controller
 */
class InquiryStep3Controller extends ActionController
{

    /**
     * Session-Key for InquiryStep3
     */
    const sessionKey = 'inquiryFormStep3data';

    /**
     * inquiryRepository
     *
     * @var \Crossconcept\CcAppointment\Domain\Repository\InquiryRepository
     * @inject
     */
    protected $inquiryRepository = null;

    /**
     * inquiryStep1Controller
     *
     * @var \Crossconcept\CcAppointment\Controller\InquiryStep1Controller
     * @inject
     */
    protected $inquiryStep1Controller = null;

    /**
     * inquiryStep2Controller
     *
     * @var \Crossconcept\CcAppointment\Controller\InquiryStep2Controller
     * @inject
     */
    protected $inquiryStep2Controller = null;

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
     * @var \Crossconcept\CcAppointment\Service\MailService
     * @inject
     */
    protected $mailService = null;

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
     * Return the data serialized in user session
     *
     * @return mixed $sessionData Data of current session
     */
    public function getSessionData()
    {
        $sessionData = null;

        // Check if data of inquiryStep1 is available in session and assign it to view
        if ($this->frontendController->fe_user->getKey('ses', self::sessionKey)) {

            // Get data from session
            $inquiryStep3data = unserialize($this->frontendController->fe_user->getKey('ses', self::sessionKey));

            if ($inquiryStep3data instanceof InquiryStep1) {

                $sessionData = $inquiryStep3data;
            }
        }

        return $sessionData;
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {
        // Check if data of inquiryStep1 is available in session and assign it to view
        $inquiryStep1data = $this->inquiryStep1Controller->getSessionData();
        $this->view->assign('newInquiryStep1', $inquiryStep1data);

        // Check if data of inquiryStep2 is available in session and assign it to view
        $inquiryStep2data = $this->inquiryStep2Controller->getSessionData();
        $this->view->assign('newInquiryStep2', $inquiryStep2data);
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($inquiryStep2data);

        // Check if data of inquiryStep3 is available in session and assign it to view
        $inquiryStep3data = $this->getSessionData();
        $this->view->assign('newInquiryStep3', $inquiryStep3data);
    }

    /**
     * action create
     *
     * @param InquiryStep3 $newInquiryStep3
     * @ignorevalidation $newInquiryStep3
     *
     * @return void
     */
    public function createAction(InquiryStep3 $newInquiryStep3)
    {

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

        $inquiryStep3data = $newInquiryStep3;

        // Create a new inquiry
        $inquiry = new Inquiry();

        $inquiry->setAppointment($inquiryStep1data->getAppointment());
        // @Todo Fill inquiry


        // Persist inquiry
        $this->inquiryRepository->add($inquiry);
        $this->persistenceManager->persistAll();


        // Deactivate admin mail
        unset($settings['email']['admin']);

        // Send admin mail
        if (isset($settings['email']['admin']['from']) && trim($settings['email']['admin']['from']) !== ''
            && isset($settings['email']['admin']['fromEmail'])
            && trim($settings['email']['admin']['fromEmail']) !== ''
            && isset($settings['email']['admin']['toEmail'])
            && trim($settings['email']['admin']['toEmail']) !== ''
        ) {

            $from = [
                $settings['email']['admin']['fromEmail'] => $settings['email']['admin']['fromName']
            ];

            $subject = $settings['email']['admin']['subject'];
            $recipient = explode(',', $settings['email']['admin']['toEmail']);

            $variables = [];

            $extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
            $logo = isset($extbaseFrameworkConfiguration['page.']['theme.']['logoFallback']) ? $extbaseFrameworkConfiguration['page.']['theme.']['logoFallback'] : 'fileadmin/Medien/Logos/teichmanngruppe.png';

            $emailTemplate = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($this->request->getControllerExtensionKey()) . 'Resources/Private/Emails/EmailAdmin.html';
            $emailTemplateHtml = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($this->request->getControllerExtensionKey()) . 'Resources/Private/Emails/HtmlEmailAdmin.html';

            // Render and send email
            $sent = $this->mailService->sendTemplateEmail($recipient, $from, $subject, $variables, [], $emailTemplate, $emailTemplateHtml, ['logo' => $logo], [], []);
        }

        // Remove data from session
        $this->frontendController->fe_user->setKey('ses', InquiryStep1Controller::sessionKey, null);
        $this->frontendController->fe_user->setKey('ses', InquiryStep2Controller::sessionKey, null);
        $this->frontendController->fe_user->setKey('ses', InquiryStep3Controller::sessionKey, null);
        $this->frontendController->fe_user->setKey('ses', self::sessionKey, null);
        $this->frontendController->fe_user->storeSessionData();

        // redirect based on industry
        if ($inquiryStep2data->getIndustry() != null) {
            $redirectPid = $settings['thankYouPageIndustry' . $inquiryStep2data->getIndustry()->getUid() . 'Pid'];
        } else {
            $redirectPid = $settings['thankYouPageIndustry6Pid'];
        }

        $uriBuilder = $this->uriBuilder;
        $uri = $uriBuilder->setTargetPageUid($redirectPid)->build();
        $this->redirectToURI($uri, 0, 200);
    }


}
