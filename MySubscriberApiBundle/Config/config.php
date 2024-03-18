<?php
// MySubscriberApiBundle/Config/config.php
use MauticPlugin\MySubscriberApiBundle\Controller\Api\SubscriberApiController;

return [
    'name'        => 'My Subscriber API',
    'description' => 'Provides API endpoints for managing subscribers.',
    'version'     => '1.0',
    'author'      => 'Jyoti',

    // Routing configurations for the API endpoints
    'routes' => [
        'api' => [
            // Route for creating a subscriber
            'my_subscriber_api_create' => [
                'path'       => '/subscribers/new',
                'controller' => SubscriberApiController::class . '::createAction',
                'method'     => 'POST',
            ],
            // Route for getting all subscribers
            'my_subscriber_api_list' => [
                'path'       => '/subscribers',
                'controller' => SubscriberApiController::class . '::listAction',
                'method'     => 'GET',
            ],
            // Route for getting a specific subscriber by ID
            'my_subscriber_api_get' => [
                'path'       => '/subscribers/{id}',
                'controller' => SubscriberApiController::class . '::getEntityAction',
                'method'     => 'GET',
                'requirements' => [
                    'id' => '\d+'
                ],
            ],
            // Route for deleting a subscriber
            'my_subscriber_api_delete' => [
                'path'       => '/subscribers/{id}/delete',
                'controller' => SubscriberApiController::class . '::deleteAction',
                'method'     => 'DELETE',
                'requirements' => [
                    'id' => '\d+'
                ],
            ],
        ],
    ],

    // Register services, if you have any
    'services' => [
    ],

    // Register your menu items, if any
    'menu' => [
        // ...
    ],

    // Register any parameters, if needed
    'parameters' => [
        // ...
    ],
];