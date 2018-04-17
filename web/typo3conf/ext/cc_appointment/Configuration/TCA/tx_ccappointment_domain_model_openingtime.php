<?php
return [
    'ctrl'      => [
        'title'                    => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:openingtime',
        'label'                    => 'time_from',
        'tstamp'                   => 'tstamp',
        'crdate'                   => 'crdate',
        'cruser_id'                => 'cruser_id',
        'dividers2tabs'            => true,
        'default_sortby'           => 'ORDER BY time_from ASC',
        'versioningWS'             => 2,
        'versioning_followPages'   => true,
        'languageField'            => 'sys_language_uid',
        'transOrigPointerField'    => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete'                   => 'deleted',
        'enablecolumns'            => [
            'disabled'  => 'hidden',
            'starttime' => 'starttime',
            'endtime'   => 'endtime',
        ],
        'searchFields'             => '',
        'iconfile'                 => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('cc_appointment') . 'Resources/Public/Icons/openingtime.svg'
    ],
    'interface' => [
        'showRecordFieldList' => 'time_from, time_to',
    ],
    'types'     => [
        '1' => [
            'showitem' => '---palette--;;paletteCore'
        ],
    ],
    'palettes'  => [
        '1'             => [
            'showitem' => '',
        ],
        'paletteConfig' => [
            'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource'
        ],
        'paletteCore'   => [
            'showitem' => 'time_from, time_to'
        ],
        'paletteAccess' => [
            'showitem' => 'hidden;;1, starttime, endtime'
        ],
    ],
    'columns'   => [
        'sys_language_uid' => [
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config'  => [
                'type'                => 'select',
                'renderType'          => 'selectSingle',
                'foreign_table'       => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items'               => [
                    ['LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1],
                    ['LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0]
                ],
            ],
        ],
        'l10n_parent'      => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude'     => 1,
            'label'       => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config'      => [
                'type'                => 'select',
                'renderType'          => 'selectSingle',
                'items'               => [
                    ['', 0],
                ],
                'foreign_table'       => 'tx_ccappointment_domain_model_appointment',
                'foreign_table_where' => 'AND tx_ccappointment_domain_model_appointment.pid=###CURRENT_PID### AND tx_ccappointment_domain_model_appointment.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource'  => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label'      => [
            'label'  => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max'  => 255,
            ]
        ],
        'hidden'           => [
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config'  => [
                'type' => 'check',
            ],
        ],
        'starttime'        => [
            'exclude'   => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label'     => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config'    => [
                'type'     => 'input',
                'size'     => 13,
                'max'      => 20,
                'eval'     => 'datetime',
                'checkbox' => 0,
                'default'  => 0,
                'range'    => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ],
            ],
        ],
        'endtime'          => [
            'exclude'   => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label'     => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config'    => [
                'type'     => 'input',
                'size'     => 13,
                'max'      => 20,
                'eval'     => 'datetime',
                'checkbox' => 0,
                'default'  => 0,
                'range'    => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ],
            ],
        ],
        'time_from'        => [
            'exclude' => 1,
            'label'   => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:openingtime.time_from',
            'config'  => [
                'type'       => 'input',
                'renderType' => 'inputDateTime',
                'size'       => 30,
                'eval'       => 'required, trim, time'
            ],
        ],
        'time_to'          => [
            'exclude' => 1,
            'label'   => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:openingtime.time_to',
            'config'  => [
                'type'       => 'input',
                'renderType' => 'inputDateTime',
                'size'       => 30,
                'eval'       => 'required, trim, time'
            ],
        ],
    ],
];