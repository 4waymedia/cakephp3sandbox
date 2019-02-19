<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'Importer',
    ['path' => '/importer'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
        $routes->get('/content', ['controller' => 'Content', 'action'=>'index']);
        // example from Cakebook
        //$routes->get('/contacts/:id', ['controller' => 'Contacts', 'action' => 'view']);
    }
);
