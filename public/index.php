<?php

use App\Twig;

require('../vendor/autoload.php');

$router = new App\Router\Router($_GET['url']);

// Différentes routes 
$router->get('/', function(){ 
   
    $twig = new Twig('base.html.twig');
    $twig->render([   
            
    ]); 
});
$router->get('/posts', function(){ echo 'Tous les articles'; });
$router->get('/posts/:id', function($id){ echo 'Afficher l\'article' . $id; });
$router->post('/posts/:id', function($id){ echo 'Poster l\'article' . $id; });


$router->run();