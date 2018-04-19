<?php

namespace Crossconcept\CcAppointment\Service;

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

use TYPO3\CMS\Core\Mail\MailMessage;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * MailService class
 */
class MailService extends MailMessage
{
    /**
     * @param array  $recipient        recipient of the email in the format array('recipient@domain.tld' => 'Recipient Name')
     * @param array  $sender           sender of the email in the format array('sender@domain.tld' => 'Sender Name')
     * @param string $subject          subject of the email
     * @param array  $variables        variables to be passed to the Fluid view
     * @param string $pathTextTemplate path to text email template
     * @param string $pathHtmlTemplate path to html email template
     * @param array  $embed            embed files to be passed to the Fluid view returns a boolean, true on success.
     * @param array  $cc               BCC recipient of the email in the format array('recipient@domain.tld' => 'Recipient Name')
     * @param array  $bcc              BCC recipient of the email in the format array('recipient@domain.tld' => 'Recipient Name')
     *
     * @return boolean TRUE on success, otherwise false
     */

    public function sendTemplateEmail(
        array $recipient,
        array $sender,
        $subject,
        array $variables = [],
        array $attachments = [],
        $pathTextTemplate = '',
        $pathHtmlTemplate = '',
        array $embed = [],
        array $cc = [],
        array $bcc = []
    ) {
        // Add Application context specific prefix if not in production context
        if (!GeneralUtility::getApplicationContext()->isProduction()) {
            $subject = '[' . strtoupper(GeneralUtility::getApplicationContext()->__toString()) . '] ' . $subject;
        }

        /** @var $message MailMessage */
        $this->setTo($recipient);
        $this->setFrom($sender);
        $this->setSubject($subject);

        // Set cc recipients
        if (!empty($cc)) {
            $this->setCc($cc);
        }

        // Set bcc recipients
        if (!empty($bcc)) {
            $this->setBcc($bcc);
        }

        // Attachments
        if (!empty($attachments)) {
            foreach ($attachments as $attachment) {
                $this->attach(\Swift_Attachment::fromPath($attachment));
            }
        }

        if (!empty($embed)) {
            foreach ($embed as $key => $value) {
                $embed = $this->embed(\Swift_Image::fromPath($value));
                $variables[$key] = $embed;
            }
        }

        // Give it a body
        if ($this->settings['emailBodyHtml'] || $pathHtmlTemplate != '') {
            $this->setBody($this->renderTemplateEmail($variables, (($pathHtmlTemplate == '') ? $this->settings['emailBodyHtml'] : $pathHtmlTemplate)), 'text/html');
            $this->addPart($this->renderTemplateEmail($variables, (($pathTextTemplate == '') ? $this->settings['emailBodyText'] : $pathTextTemplate)), 'text/plain');
        } else {
            $this->setBody($this->renderTemplateEmail($variables, (($pathTextTemplate == '') ? $this->settings['emailBodyText'] : $pathTextTemplate)), 'text/plain');
        }

        $this->send();

        return $this->isSent();
    }

    /**
     * @param array  $variables    variables to be passed to the Fluid view
     * @param string $templatepath path to the template that should be rendered
     *
     * @return string rendered template with assigned variables
     */
    public function renderTemplateEmail(array $variables = [], $templatePath)
    {
        /** @var \TYPO3\CMS\Fluid\View\StandaloneView $emailView */
        $objectManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');

        $emailView = $objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
        $emailView->setTemplatePathAndFilename($templatePath);
        $emailView->assignMultiple($variables);

        return $emailView->render();
    }

}
