<?php
return array(
  'ctrl' => array(
    'title'	=> 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:cranetype',
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
    'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('teichmann_craneconfigurator') . 'Resources/Public/Icons/cranetype.svg'
  ),
  'interface' => array(
    'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, id, title, salesforcetitle, image, icon, constructiontype, ',
  ),
  'types' => array(
    '1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, id, title, salesforcetitle, image, icon, constructiontype, '),
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
        'foreign_table' => 'tx_teichmanncraneconfigurator_domain_model_cranetype',
        'foreign_table_where' => 'AND tx_teichmanncraneconfigurator_domain_model_cranetype.pid=###CURRENT_PID### AND tx_teichmanncraneconfigurator_domain_model_cranetype.sys_language_uid IN (-1,0)',
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
      'id' => array(
          'exclude' => 1,
          'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:cranetype.id',
          'config' => array(
              'type' => 'input',
              'size' => 30,
              'eval' => 'trim,required'
          ),
      ),
    'title' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:cranetype.title',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,required'
      ),
    ),
    'salesforcetitle' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:cranetype.salesforcetitle',
      'config' => array(
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ),
    ),
    'constructiontype' => [
      'exclude' => true,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:cranetype.constructiontype',
      'config' => [
          'type' => 'select',
          'renderType' => 'selectMultipleSideBySide',
          'foreign_table' => 'tx_teichmanncraneconfigurator_domain_model_constructiontype',
          'size' => 5,
          'minitems' => 0,
          'maxitems' => 100,
          'MM' => 'tx_teichmanncraneconfigurator_domain_model_cranetype_ctype',
      ]
    ],
    'image' => [
      'exclude' => 1,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:cranetype.image',
      'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('image', [
          'appearance' => [
              'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
          ],
          'maxitems' => 1,
          'foreign_match_fields' => [
              'fieldname' => 'image',
              'tablenames' => 'tx_teichmanncraneconfigurator_domain_model_cranetype',
              'table_local' => 'sys_file',
          ],
          'foreign_types' => [
              '0' => [
                  'showitem' => '
                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                --palette--;;filePalette'
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                  'showitem' => '
                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                --palette--;;filePalette'
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                  'showitem' => '
                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                --palette--;;filePalette'
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                  'showitem' => '
                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                --palette--;;filePalette'
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                  'showitem' => '
                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                --palette--;;filePalette'
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                  'showitem' => '
                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                --palette--;;filePalette'
              ]
          ]
      ], $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'])
    ],
    'icon' => [
      'exclude' => 1,
      'label' => 'LLL:EXT:teichmann_craneconfigurator/Resources/Private/Language/locallang.xlf:cranetype.icon',
      'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('icon', [
          'appearance' => [
              'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
          ],
          'maxitems' => 1,
          'foreign_match_fields' => [
              'fieldname' => 'icon',
              'tablenames' => 'tx_teichmanncraneconfigurator_domain_model_cranetype',
              'table_local' => 'sys_file',
          ],
          'foreign_types' => [
              '0' => [
                  'showitem' => '
            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
            --palette--;;filePalette'
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                  'showitem' => '
            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
            --palette--;;filePalette'
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                  'showitem' => '
            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
            --palette--;;filePalette'
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                  'showitem' => '
            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
            --palette--;;filePalette'
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                  'showitem' => '
            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
            --palette--;;filePalette'
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                  'showitem' => '
            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
            --palette--;;filePalette'
              ]
          ]
      ], $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'])
    ],
  ),
);
