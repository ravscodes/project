<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$tableArray = array(
  'inquiry',
  'cranetype',
  'constructiontype',
  'industry',
  'classification',
);

foreach ($tableArray as $table) {
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_teichmanncraneconfigurator_domain_model_' . $table);
  \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class)
    ->registerIcon(
      $table,
      TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
      [
        'source' => 'EXT:' . $_EXTKEY . '/Resources/Public/Icons/' . $table . '.svg',
      ]
    );
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Teichmann Craneinquiry');
