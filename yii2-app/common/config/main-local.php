<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=db;dbname=extra',
            'username' => 'root',
            'password' => 'root_password',
            'charset' => 'utf8',
        ],
        'db2' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=db;dbname=extra_june',
            'username' => 'root',
            'password' => 'root_password',
            'charset' => 'utf8',
        ],
        'db3' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=db;dbname=extra_polis',
            'username' => 'root',
            'password' => 'root_password',
            'charset' => 'utf8',
        ],
        'db4' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=db;dbname=extra_mtros',
            'username' => 'root',
            'password' => 'root_password',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
	    'enableSwiftMailerLogging' => true,
            'transport' => [
                'class' => 'Swift_MailTransport',
                //'class' => 'Swift_SmtpTransport',
                //'host' => 'smtp.spaceweb.ru',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
                //'username' => 'test@vozduhtest.ru',
                //'password' => 'OWC5ZA6XuVCVr0I',
                //'port' => '587', // Port 25 is a very common port too
                //'encryption' => 'tls', // It is often used, check your provider or mail server specs
            ],
        ],
        'onesignal' => [
            'class' => 'rocketfirm\onesignal\OneSignal',
            'apiKey' => 'MjNkMmEzOGMtZDZiZS00NDMyLWE2YjUtM2E1Njk4MDRmY2Mw', // для моб. приложений
            'appId' => '978aaaa1-916f-4fb0-97af-a7c39ce694c5',
        ],
    ],
];
