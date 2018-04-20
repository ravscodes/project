<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Crossconcept.' . $_EXTKEY,
    'Contactform',
    array(
        'InquiryStep1' => 'new,create',
        'InquiryStep2' => 'new,create,ajaxCall',
        'InquiryStep3' => 'new,create',
    ),
    // non-cacheable actions
    array(
        'InquiryStep1' => 'new,create',
        'InquiryStep2' => 'new,create,ajaxCall',
        'InquiryStep3' => 'new,create',
    )
);