<?php
return array(
  'ctrl' => array(
    'title'	=> 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:classification',
    'label' => 'title',
    'tstamp' => 'tstamp',
    'sortby' => 'sorting',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'dividers2tabs' => TRUE,
    'versioningWS' => 2,
    'versioning_followPages' => TRUE,
    'languageField' => 'sys_language_uid',
    'transOrigPointerField' => 'l10n_parent',
    'transOrigDiffSourceField' => 'l10n_diffsource',
    'enablecolumns' => array(),
    'searchFields' => 'title,',
    'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('teichmann_craneconfigurator') . 'Resources/Public/Icons/classification.svg'
  ),
  'interface' => array(
    'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, title,',
  ),
  'types' => array(
    '1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, title, '),
  ),
  'palettes' => array(
    '1' => array('showitem' => ''),
  ),
  'columns' => array(
    'sys_language_uid' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
      'config' => array(
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'sys_language',
        'foreign_table_where' => 'ORDER BY sys_language.title',
        'items' => array(
          array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
          array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
        ),
      ),
    ),
    'l10n_parent' => array(
      'displayCond' => 'FIELD:sys_language_uid:>:0',
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
      'config' => array(
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => array(
          array('', 0),
        ),
        'foreign_table' => 'tx_teichmanncraneconfigurator_domain_model_classification',
        'foreign_table_where' => 'AND tx_teichmanncraneconfigurator_domain_model_classification.pid=###CURRENT_PID### AND tx_teichmanncraneconfigurator_domain_model_classification.sys_language_uid IN (-1,0)',
      ),
    ),
    'l10n_diffsource' => array(
      'config' => array(
        'type' => 'passthrough',
      ),
    ),
    't3ver_label' => array(
      'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'max' => 255,
      )
    ),
    'title' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:classification.title',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,required'
      ),
    ),
  ),
);
