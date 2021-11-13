<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=mysql;dbname=skeleton',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ],
        'mongodb' => [
            'class' => '\yii\mongodb\Connection',
            'dsn' => 'mongodb://127.0.0.1:27017/skeleton',
//            'options' => [
//                "username" => "Username",
//                "password" => "Password"
//            ]
        ],
        'cache' => [
            'class' => 'yii\redis\Cache',
            'redis' => [
                'hostname' => 'redis',
                'port' => 6379,
                'database' => 0,
            ]
        ],
        'redis' => [
            'class' => \yii\redis\Connection::className(),
            'database' => 2,
            'retries' => 1,
        ],
        'queue' => [
            'class' => \yii\queue\redis\Queue::className(),
            'redis' => 'redis',
            'channel' => 'queue',
            'as log' => \yii\queue\LogBehavior::className()
        ],

        'beanstalk'=>[
            'class' => 'udokmeci\yii2beanstalk\Beanstalk',
            'host'=> "127.0.0.1", // default host
            'port'=>11300, //default port
            'connectTimeout'=> 1,
            'sleep' => false, // or int for usleep after every job
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
//            'useFileTransport' => true,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
                'username' => 'yii2Test@yii2Test.com',
                'password' => 'password',
                'port' => '587', // Port 25 is a very common port too
                'encryption' => 'tls',
            ],
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'clientId' => '2213842398942198',
                    'clientSecret' => 'b17b0a4f178e11bd08b7f0efb6f60b51',
                ],
                'google' => [
                    'class' => 'yii\authclient\clients\Google',
                    'clientId' => '472348761788-dpa024t91k2dg7nepdgeo2bgp9v73020.apps.googleusercontent.com',
                    'clientSecret' => 'wFBFda4vZd8aiS2dI1tC85R-',
                ],

            ],
        ],
    ],
];
