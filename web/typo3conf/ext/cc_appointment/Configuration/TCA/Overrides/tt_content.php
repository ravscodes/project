<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'cc_appointment',
    'Contactform',
    'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:tx_ccappointment'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['ccappointment_contactform'] = 'layout, select_key';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['ccappointment_contactform'] = 'pi_flexform';

// Add a flexform XML reference
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('ccappointment_contactform', 'FILE:EXT:cc_appointment/Configuration/FlexForms/flexform_contactform.xml');

// Allow table for "insert record"
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToInsertRecords('tx_news_domain_model_news');
