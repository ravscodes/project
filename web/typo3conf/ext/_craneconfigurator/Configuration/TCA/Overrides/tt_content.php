<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
  'teichmann_craneconfigurator',
  'Inquiry',
  'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:inquiryform'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['teichmanncraneconfigurator_inquiry'] = 'layout, select_key, recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['teichmanncraneconfigurator_inquiry'] = 'pi_flexform';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('teichmanncraneconfigurator_inquiry',
    'FILE:EXT:teichmann_craneconfigurator/Configuration/FlexForms/flexform_inquiry.xml');