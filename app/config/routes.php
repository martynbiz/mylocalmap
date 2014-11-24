<?php
/*
This is where our routes are defined so that we can generate js or json files

*/

return array(
    'routes' => array(
        '/' => array(
            'GET' => array(
                'controller' => 'home',
                'action' => 'index',
            ),
        ),
        '/about' => array(
            'GET' => array(
                'controller' => 'home',
                'action' => 'about',
            ),
        ),
        '/members' => array(
            '/' => array(
                'GET' => array(
                    'controller' => 'members',
                    'action' => 'index',
                ),
            ),
            '/places' => array(
                '/' => array(
                    'GET' => array(
                        'controller' => 'members',
                        'action' => 'places',
                    ),
                ),
                '/create' => array(
                    'GET' => array(
                        'controller' => 'members',
                        'action' => 'placescreate',
                    ),
                ),
            ),
        ),
    )
);