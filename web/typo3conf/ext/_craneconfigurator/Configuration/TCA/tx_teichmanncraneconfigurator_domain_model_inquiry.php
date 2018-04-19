<?php
return array(
  'ctrl' => array(
    'title'	=> 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:inquiry',
    'label' => 'lastname',
    'label_alt' => 'firstname',
    'label_alt_force' => 1,
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'dividers2tabs' => TRUE,
    'versioningWS' => 2,
    'versioning_followPages' => TRUE,
    'languageField' => 'sys_language_uid',
    'transOrigPointerField' => 'l10n_parent',
    'transOrigDiffSourceField' => 'l10n_diffsource',
    'enablecolumns' => array(),
    'searchFields' => '',
    'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('teichmann_craneconfigurator') . 'Resources/Public/Icons/inquiry.svg'
  ),
  'interface' => array(
    'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, cranetype, constructiontype, industry, customindustry, purpose, classification, containeramount, containerunit, payloadmin, payloadmax, reachmin, reachmax, gaugemin, gaugemax, reachsolidsupportmin, reachsolidsupportmax, reachstabilizermin, reachstabilizermax, reachassembly, liftheight, liftheightabove, liftheightbelow, workingspeed, workingspeedliftinggear, workingspeedcatgear, workingspeedcranegear, rotatingtrolley, rotatingspreader, steering, hookpath, installationheight, operationarea, rails, hall, conductorrail, track, tracklengthexisting, tracklengthplanned, trackinfo, loadhandlingdevice, loadhandlingdevicegrab, loadhandlingdeviceinfo, projectphase, commissioningdate, projectinformation, company, position, lastname, firstname, street, zip, city, phone, email, privacy',
  ),
  'types' => array(
    '1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, cranetype, constructiontype, industry, customindustry, purpose, classification, containeramount, containerunit, payloadmin, payloadmax, reachmin, reachmax, gaugemin, gaugemax, reachsolidsupportmin, reachsolidsupportmax, reachstabilizermin, reachstabilizermax, reachassembly, liftheight, liftheightabove, liftheightbelow, workingspeed, workingspeedliftinggear, workingspeedcatgear, workingspeedcranegear, rotatingtrolley, rotatingspreader, steering, hookpath, installationheight, operationarea, rails, hall, conductorrail, track, tracklengthexisting, tracklengthplanned, trackinfo, loadhandlingdevice, loadhandlingdevicegrab, loadhandlingdeviceinfo, projectphase, commissioningdate, projectinformation, company, position, lastname, firstname, street, zip, city, phone, email, privacy'),
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
        'foreign_table' => 'tx_teichmanncraneconfigurator_domain_model_inquiry',
        'foreign_table_where' => 'AND tx_teichmanncraneconfigurator_domain_model_inquiry.pid=###CURRENT_PID### AND tx_teichmanncraneconfigurator_domain_model_inquiry.sys_language_uid IN (-1,0)',
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
    'cranetype' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:cranetype',
      'config' => array(
        'type' => 'select',
        'renderType' => 'selectSingle',
        'minitems' => 1,
        'foreign_table' => 'tx_teichmanncraneconfigurator_domain_model_cranetype',
        'foreign_table_where' => 'ORDER BY tx_teichmanncraneconfigurator_domain_model_cranetype.title',
        'items' => array(
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:label.select', ''),
        ),
      ),
    ),
    'constructionType' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:constructionType',
      'config' => array(
        'type' => 'select',
        'renderType' => 'selectSingle',
        'minitems' => 1,
        'foreign_table' => 'tx_teichmanncraneconfigurator_domain_model_constructiontype',
        'foreign_table_where' => 'ORDER BY tx_teichmanncraneconfigurator_domain_model_constructiontype.title',
        'items' => array(
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:label.select', ''),
        ),
      ),
    ),
    'industry' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:industry',
      'config' => array(
        'type' => 'select',
        'renderType' => 'selectSingle',
        'minitems' => 1,
        'foreign_table' => 'tx_teichmanncraneconfigurator_domain_model_industry',
        'foreign_table_where' => 'ORDER BY tx_teichmanncraneconfigurator_domain_model_industry.title',
        'items' => array(
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:industry.other', 0),
        ),
      ),
    ),
    'customindustry' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:customindustry',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'purpose' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:purpose',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'classification' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:classification',
      'config' => array(
        'type' => 'select',
        'renderType' => 'selectSingle',
        'minitems' => 1,
        'foreign_table' => 'tx_teichmanncraneconfigurator_domain_model_classification',
        'foreign_table_where' => 'ORDER BY tx_teichmanncraneconfigurator_domain_model_classification.title',
        'items' => array(
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:label.select', ''),
        ),
      ),
    ),
    'containeramount' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:containeramount',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'containerunit' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:containerunit',
      'config' => array(
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => array(
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:label.select', 0),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:containerunit.1', 1),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:containerunit.2', 2),
        ),
      ),
    ),
    'payloadmin' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:payloadmin',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'payloadmax' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:payloadmax',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'reachmin' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:reachmin',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'reachmax' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:reachmax',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'gaugemin' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:gaugemin',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'gaugemax' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:gaugemax',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'reachsolidsupportmin' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:reachsolidsupportmin',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,'
      ),
    ),
    'reachsolidsupportmax' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:reachsolidsupportmax',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'reachstabilizermin' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:reachstabilizermin',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'reachstabilizermax' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:reachstabilizermax',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'reachassembly' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:reachassembly',
      'config' => array(
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => array(
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:label.select', ''),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:reachassembly.1', 1),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:reachassembly.2', 2),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:reachassembly.3', 3),
        ),
      ),
    ),
    'liftheight' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:liftheight',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'liftheightabove' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:liftheightabove',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'liftheightbelow' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:liftheightbelow',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'workingspeed' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:workingspeed',
      'config' => array(
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => array(
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:label.select', 0),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:workingspeed.default', 1),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:workingspeed.custom', 2),
        ),
      ),
    ),
    'workingspeedliftinggear' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:workingspeedliftinggear',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'workingspeedcatgear' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:workingspeedcatgear',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'workingspeedcranegear' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:workingspeedcranegear',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'rotatingtrolley' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:rotatingtrolley',
      'config' => array(
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => array(
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:label.select', 0),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:rotatingtrolley.1', 1),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:rotatingtrolley.2', 2),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:rotatingtrolley.3', 3),
        ),
      ),
    ),
    'rotatingspreader' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:rotatingspreader',
      'config' => array(
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => array(
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:label.select', 0),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:rotatingspreader.1', 1),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:rotatingspreader.2', 2),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:rotatingspreader.3', 3),
        ),
      ),
    ),
    'steering' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:steering',
      'config' => array(
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => array(
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:label.select', 0),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:steering.1', 1),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:steering.2', 2),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:steering.3', 3),
        ),
      ),
    ),
    'hookpath' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:hookpath',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'installationheight' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:installationheight',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'operationarea' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:operationarea',
      'config' => array(
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => array(
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:label.select', 0),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:operationarea.1', 1),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:operationarea.2', 2),
        ),
      ),
    ),
    'rails' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:rails',
      'config' => array(
        'type' => 'passthrough',
      ),
    ),
    'hall' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:hall',
      'config' => array(
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => array(
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:label.select', 0),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:hall.1', 1),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:hall.2', 2),
        ),
      ),
    ),
    'conductorrail' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:conductorrail',
      'config' => array(
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => array(
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:label.select', 0),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:conductorrail.available', 1),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:conductorrail.necessary', 2),
        ),
      ),
    ),
    'track' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:track',
      'config' => array(
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => array(
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:label.select', 0),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:track.1', 1),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:track.2', 2),
        ),
      ),
    ),
    'tracklengthexisting' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:tracklengthexisting',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'tracklengthplanned' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:tracklengthplanned',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'trackinfo' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:trackinfo',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'loadhandlingdevice' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:loadhandlingdevice',
      'config' => array(
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => array(
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:label.select', 0),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:loadhandlingdevice.1', 1),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:loadhandlingdevice.2', 2),
        ),
      ),
    ),
    'loadhandlingdevicegrab' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:loadhandlingdevice.2',
      'config' => array(
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => array(
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:label.select', 0),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:loadhandlingdevice.2.1', 1),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:loadhandlingdevice.2.2', 2),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:loadhandlingdevice.2.3', 3),
        ),
      ),
    ),
    'loadhandlingdeviceinfo' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:loadhandlingdeviceinfo',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'projectphase' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:projectphase',
      'config' => array(
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => array(
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:label.select', 0),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:projectphase.1', 1),
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:projectphase.2', 2),
        ),
      ),
    ),
    'commissioningdate' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:commissioningdate',
      'config' => array(
        'type' => 'input',
        'size' => 16,
        'eval' => 'datetime',
        'default' => 0,
      ),
    ),
    'projectinformation' => array(
      'exclude' => 1,
      'label'   => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:projectinformation',
      'config'  => array(
        'type' => 'text',
        'cols' => 40,
        'rows' => 15,
        'eval' => 'trim'
      )
    ),
    'firstname' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:firstname',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'lastname' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:lastname',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'address' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:address',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'zip' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:zip',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'city' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:city',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'country' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:country',
      'config' => array(
        'type' => 'select',
        'renderType' => 'selectSingle',
        'minitems' => 1,
        'foreign_table' => 'static_countries',
        'foreign_table_where' => 'ORDER BY static_countries.cn_official_name_local',
        'items' => array(
          array('LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:label.select', 0),
        ),
      ),
    ),
    'phone' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:phone',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'email' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:email',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'position' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:position',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'company' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:company',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'privacy' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:privacy',
      'config' => array(
        'type' => 'check',
        'eval' => 'required',
      ),
    ),
  ),
);
