<?php
/*
 * Author Siarhei Astapchyk
 * igentuman@gmail.com
 */

return [
  //....
    'queue' => [
        'amqp' => [//used for ampq queue connection
            'host' => 'rabbitmq',//define your parameters here
            'port' => 5672,
            'user' => 'guest',
            'password' => 'guest',
            'virtualhost' => '/'
        ]
    ],
    'cron_consumers_runner' => [
        'cron_run' => true,
        'max_messages' => 0,
        'consumers' => [
            'ign_my_custom_db_consumer',
            'ign_my_custom_ampq_consumer'

        ],
        'multiple_processes' => [
            'ign_my_custom_db_consumer' => 4, //define if you want to run multiple processes for a consumer
            'ign_my_custom_ampq_consumer' => 2
        ]
    ]
];