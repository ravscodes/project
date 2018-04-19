<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
  'Crossconcept.' . $_EXTKEY,
  'Inquiry',
  array(
    'InquiryStep1' => 'new, create,',
    'InquiryStep2' => 'new, create,',
    'InquiryStep3' => 'new, create,',
    'InquiryStep4' => 'new, create, completed,',
  ),
  // non-cacheable actions
  array(
    'InquiryStep1' => 'new, create,',
    'InquiryStep2' => 'new, create,',
    'InquiryStep3' => 'new, create,',
    'InquiryStep4' => 'new, create, completed,',
  )
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(' source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/mod.tx_news_domain_model_news.txt">');
