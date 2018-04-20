<?php
return [
    'BE' => [
        'debug' => true,
        'explicitADmode' => 'explicitAllow',
        'installToolPassword' => '$pbkdf2-sha256$25000$OKNdyz8XNcZkDgmeayUmcA$xM33RQg2ThRidnXwnzOzQgvGwTaEhvDINzNen2LY7FM',
        'loginSecurityLevel' => 'rsa',
    ],
    'DB' => [
        'Connections' => [
            'Default' => [
                'charset' => 'utf8',
                'dbname' => 'project',
                'driver' => 'mysqli',
                'host' => '127.0.0.1',
                'password' => 'root',
                'port' => 3306,
                'user' => 'root',
            ],
        ],
    ],
    'EXT' => [
        'extConf' => [
            'cc_appointment' => 'a:0:{}',
            'rsaauth' => 'a:1:{s:18:"temporaryDirectory";s:0:"";}',
            'saltedpasswords' => 'a:2:{s:3:"BE.";a:4:{s:21:"saltedPWHashingMethod";s:41:"TYPO3\\CMS\\Saltedpasswords\\Salt\\Pbkdf2Salt";s:11:"forceSalted";i:0;s:15:"onlyAuthService";i:0;s:12:"updatePasswd";i:1;}s:3:"FE.";a:5:{s:7:"enabled";i:1;s:21:"saltedPWHashingMethod";s:41:"TYPO3\\CMS\\Saltedpasswords\\Salt\\Pbkdf2Salt";s:11:"forceSalted";i:0;s:15:"onlyAuthService";i:0;s:12:"updatePasswd";i:1;}}',
            'vhs' => 'a:1:{s:20:"disableAssetHandling";s:1:"0";}',
        ],
    ],
    'EXTCONF' => [
        'lang' => [
            'availableLanguages' => [
                'de',
            ],
        ],
    ],
    'FE' => [
        'cHashExcludedParameters' => 'L, pk_campaign, pk_kwd, utm_source, utm_medium, utm_campaign, utm_term, utm_content, gclid, tx_ccappointment_contactform[action]=ajaxCall',
        'debug' => true,
        'loginSecurityLevel' => 'rsa',
        'pageNotFoundOnCHashError' => false,
    ],
    'GFX' => [
        'jpg_quality' => '80',
        'processor' => 'ImageMagick',
        'processor_allowTemporaryMasksAsPng' => '',
        'processor_colorspace' => 'RGB',
        'processor_effects' => '0',
        'processor_enabled' => '1',
        'processor_path' => '/usr/bin/',
        'processor_path_lzw' => '/usr/bin/',
    ],
    'MAIL' => [
        'transport' => 'sendmail',
        'transport_sendmail_command' => '/usr/sbin/sendmail -t -i ',
        'transport_smtp_encrypt' => '',
        'transport_smtp_password' => '',
        'transport_smtp_server' => '',
        'transport_smtp_username' => '',
    ],
    'SYS' => [
        'caching' => [
            'cacheConfigurations' => [
                'extbase_object' => [
                    'backend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\ApcuBackend',
                    'frontend' => 'TYPO3\\CMS\\Core\\Cache\\Frontend\\VariableFrontend',
                    'groups' => [
                        'system',
                    ],
                    'options' => [
                        'defaultLifetime' => 0,
                    ],
                ],
            ],
        ],
        'devIPmask' => '*',
        'displayErrors' => 1,
        'enableDeprecationLog' => 'file',
        'encryptionKey' => '48f46bcdce67b43b00d54b9cb7905ac917dafced9e1d19fe32636534798a5b5254be8a64deee6e2180ee920ee3a7e9f0',
        'exceptionalErrors' => 28674,
        'isInitialDatabaseImportDone' => true,
        'isInitialInstallationInProgress' => false,
        'lang' => [
            'cache' => [
                'clear_menu' => true,
            ],
        ],
        'sitename' => 'Mein Projekt',
        'sqlDebug' => 1,
        'systemLogLevel' => 0,
    ],
];
