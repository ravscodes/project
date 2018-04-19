<?php
return [
    'ctrl'      => [
        'title'                    => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:appointment',
        'label'                    => 'title',
        'tstamp'                   => 'tstamp',
        'crdate'                   => 'crdate',
        'cruser_id'                => 'cruser_id',
        'dividers2tabs'            => true,
        'default_sortby'           => 'ORDER BY title ASC',
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
        'searchFields'             => 'title, interval, lead_time',
        'iconfile'                 => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('cc_appointment') . 'Resources/Public/Icons/appointment.svg'
    ],
    'interface' => [
        'showRecordFieldList' => 'title, interval, lead_time, openingtimes_monday, openingtimes_tuesday, openingtimes_wednesday, openingtimes_thursday, openingtimes_friday, openingtimes_saturday, openingtimes_sunday',
    ],
    'types'     => [
        '1' => [
            'showitem' => '
                        ---palette--;;paletteConfig,
                        ---palette--;;paletteCore,
                    --div--;LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:tabs.openingtimes,
                        ---palette--;;paletteOpeningtimesMonday,
                        ---palette--;;paletteOpeningtimesTuesday,
                        ---palette--;;paletteOpeningtimesWednesday,
                        ---palette--;;paletteOpeningtimesThursday,
                        ---palette--;;paletteOpeningtimesFriday,
                        ---palette--;;paletteOpeningtimesSaturday,
                        ---palette--;;paletteOpeningtimesSunday,
                    --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
                        ---palette--;;paletteAccess'
        ],
    ],
    'palettes'  => [
        'paletteConfig'               => [
            'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource'
        ],
        'paletteCore'                 => [
            'showitem' => '
                    title, interval,
                    --linebreak--,
                    lead_time'
        ],
        'paletteOpeningtimesMonday'    => [
            'label'    => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:palette.openingtimes_monday',
            'showitem' => 'openingtimes_monday'
        ],
        'paletteOpeningtimesTuesday'   => [
            'label'    => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:palette.openingtimes_tuesday',
            'showitem' => 'openingtimes_tuesday'
        ],
        'paletteOpeningtimesWednesday' => [
            'label'    => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:palette.openingtimes_wednesday',
            'showitem' => 'openingtimes_wednesday'
        ],
        'paletteOpeningtimesThursday'  => [
            'label'    => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:palette.openingtimes_thursday',
            'showitem' => 'openingtimes_thursday'
        ],
        'paletteOpeningtimesFriday'    => [
            'label'    => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:palette.openingtimes_friday',
            'showitem' => 'openingtimes_friday'
        ],
        'paletteOpeningtimesSaturday'  => [
            'label'    => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:palette.openingtimes_saturday',
            'showitem' => 'openingtimes_saturday'
        ],
        'paletteOpeningtimesSunday'    => [
            'label'    => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:palette.openingtimes_monday',
            'showitem' => 'openingtimes_sunday'
        ],
        'paletteAccess'               => [
            'showitem' => 'hidden;;1, starttime, endtime'
        ],
    ],
    'columns'   => [
        'sys_language_uid'      => [
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
        'l10n_parent'           => [
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
        'l10n_diffsource'       => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label'           => [
            'label'  => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max'  => 255,
            ]
        ],
        'hidden'                => [
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config'  => [
                'type' => 'check',
            ],
        ],
        'starttime'             => [
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
        'endtime'               => [
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
        'title'                 => [
            'exclude' => 1,
            'label'   => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:appointment.title',
            'config'  => [
                'type' => 'input',
                'size' => 40,
                'eval' => 'required, trim'
            ],
        ],
        'interval'              => [
            'exclude' => 1,
            'label'   => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:appointment.interval',
            'config'  => [
                'type'       => 'select',
                'renderType' => 'selectSingle',
                'items'      => [
                    ['LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:appointment.interval.5', 5],
                    ['LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:appointment.interval.10', 10],
                    ['LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:appointment.interval.15', 15],
                    ['LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:appointment.interval.30', 30],
                    ['LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:appointment.interval.45', 45],
                    ['LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:appointment.interval.60', 60],
                ],
                'default'    => 15,
                'minitems'   => 1,
                'maxitems'   => 1,
                'eval'       => 'required, trim'
            ],
        ],
        'lead_time'             => [
            'exclude' => 1,
            'label'   => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:appointment.lead_time',
            'config'  => [
                'type'  => 'input',
                'size'  => 10,
                'eval'  => 'required, trim, int',
                'range' => [
                    'lower' => 1,
                    'upper' => 365
                ]
            ],
        ],
        'openingtimes_monday'    => [
            'exclude' => 1,
            'label'   => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:appointment.openingtimes_monday',
            'config'  => [
                'type'          => 'inline',
                'foreign_table' => 'tx_ccappointment_domain_model_openingtime',
                'minitems'      => 0,
                'maxitems'      => 4,
                'appearance'    => [
                    'collapseAll'        => false,
                    'useSortable'        => false,
                    'levelLinksPosition' => 'bottom',
                    'enabledControls'    => [
                        'delete' => true,
                        'hide'   => false
                    ]
                ]
            ]
        ],
        'openingtimes_tuesday'   => [
            'exclude' => 1,
            'label'   => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:appointment.openingtimes_tuesday',
            'config'  => [
                'type'          => 'inline',
                'foreign_table' => 'tx_ccappointment_domain_model_openingtime',
                'minitems'      => 0,
                'maxitems'      => 4,
                'appearance'    => [
                    'collapseAll'        => false,
                    'useSortable'        => false,
                    'levelLinksPosition' => 'bottom',
                    'enabledControls'    => [
                        'delete' => true,
                        'hide'   => false
                    ]
                ]
            ]
        ],
        'openingtimes_wednesday' => [
            'exclude' => 1,
            'label'   => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:appointment.openingtimes_wednesday',
            'config'  => [
                'type'          => 'inline',
                'foreign_table' => 'tx_ccappointment_domain_model_openingtime',
                'minitems'      => 0,
                'maxitems'      => 4,
                'appearance'    => [
                    'collapseAll'        => false,
                    'useSortable'        => false,
                    'levelLinksPosition' => 'bottom',
                    'enabledControls'    => [
                        'delete' => true,
                        'hide'   => false
                    ]
                ]
            ]
        ],
        'openingtimes_thursday'  => [
            'exclude' => 1,
            'label'   => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:appointment.openingtimes_thursday',
            'config'  => [
                'type'          => 'inline',
                'foreign_table' => 'tx_ccappointment_domain_model_openingtime',
                'minitems'      => 0,
                'maxitems'      => 4,
                'appearance'    => [
                    'collapseAll'        => false,
                    'useSortable'        => false,
                    'levelLinksPosition' => 'bottom',
                    'enabledControls'    => [
                        'delete' => true,
                        'hide'   => false
                    ]
                ]
            ]
        ],
        'openingtimes_friday'    => [
            'exclude' => 1,
            'label'   => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:appointment.openingtimes_friday',
            'config'  => [
                'type'          => 'inline',
                'foreign_table' => 'tx_ccappointment_domain_model_openingtime',
                'minitems'      => 0,
                'maxitems'      => 4,
                'appearance'    => [
                    'collapseAll'        => false,
                    'useSortable'        => false,
                    'levelLinksPosition' => 'bottom',
                    'enabledControls'    => [
                        'delete' => true,
                        'hide'   => false
                    ]
                ]
            ]
        ],
        'openingtimes_saturday'  => [
            'exclude' => 1,
            'label'   => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:appointment.openingtimes_saturday',
            'config'  => [
                'type'          => 'inline',
                'foreign_table' => 'tx_ccappointment_domain_model_openingtime',
                'minitems'      => 0,
                'maxitems'      => 4,
                'appearance'    => [
                    'collapseAll'        => false,
                    'useSortable'        => false,
                    'levelLinksPosition' => 'bottom',
                    'enabledControls'    => [
                        'delete' => true,
                        'hide'   => false
                    ]
                ]
            ]
        ],
        'openingtimes_sunday'    => [
            'exclude' => 1,
            'label'   => 'LLL:EXT:cc_appointment/Resources/Private/Language/locallang.xlf:appointment.openingtimes_sunday',
            'config'  => [
                'type'          => 'inline',
                'foreign_table' => 'tx_ccappointment_domain_model_openingtime',
                'minitems'      => 0,
                'maxitems'      => 4,
                'appearance'    => [
                    'collapseAll'        => false,
                    'useSortable'        => false,
                    'levelLinksPosition' => 'bottom',
                    'enabledControls'    => [
                        'delete' => true,
                        'hide'   => false
                    ]
                ]
            ]
        ],
    ],
];