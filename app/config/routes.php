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
        
        // members
        
        '/members' => array(
            '/settings' => array(
                'GET' => array(
                    'controller' => 'members',
                    'action' => 'settings',
                ),
            ),
        ),
        
        // accounts routes
        
        '/accounts' => array(
            '/' => array(
                'GET' => array(
                    'controller' => 'accounts',
                    'action' => 'index',
                ),
            ),
            '/(\d+)' => array(
                'GET' => array(
                    'controller' => 'accounts',
                    'action' => 'show',
                ),
            ),
            '/create' => array(
                'GET' => array(
                    'controller' => 'accounts',
                    'action' => 'create',
                ),
                'POST' => array(
                    'controller' => 'accounts',
                    'action' => 'create',
                ),
            ),
            '/(\d+)/edit' => array(
                'GET' => array(
                    'controller' => 'accounts',
                    'action' => 'edit',
                ),
                'PUT' => array(
                    'controller' => 'accounts',
                    'action' => 'edit',
                ),
            ),
            '/(\d+)/delete' => array(
                'GET' => array(
                    'controller' => 'accounts',
                    'action' => 'delete',
                ),
                'DELETE' => array(
                    'controller' => 'accounts',
                    'action' => 'delete',
                ),
            ),
            
            // transactions routes
            
            '/(\d+)/transactions' => array(
                '/' => array(
                    'GET' => array(
                        'controller' => 'transactions',
                        'action' => 'index',
                    ),
                ),
                '/(\d+)' => array(
                    'GET' => array(
                        'controller' => 'transactions',
                        'action' => 'show',
                    ),
                ),
                '/create' => array(
                    'GET' => array(
                        'controller' => 'transactions',
                        'action' => 'create',
                    ),
                    'POST' => array(
                        'controller' => 'transactions',
                        'action' => 'create',
                    ),
                ),
                '/(\d+)/edit' => array(
                    'GET' => array(
                        'controller' => 'transactions',
                        'action' => 'edit',
                    ),
                    'PUT' => array(
                        'controller' => 'transactions',
                        'action' => 'edit',
                    ),
                ),
                '/(\d+)/delete' => array(
                    'GET' => array(
                        'controller' => 'transactions',
                        'action' => 'delete',
                    ),
                    'DELETE' => array(
                        'controller' => 'transactions',
                        'action' => 'delete',
                    ),
                ),
            ),
        ),
    )
);