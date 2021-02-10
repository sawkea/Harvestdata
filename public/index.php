<?php
session_start();

use App\Twig\Twig;
use App\model\User;
use App\model\UserController;

require('../vendor/autoload.php');

$router = new App\Router\Router($_GET['url']);

// Différentes routes 
// Login
$router->get('/', function(){ 
    $session = (isset($_SESSION['user']) && $_SESSION['user'] === true) ? true : false;
    $id = (isset($_SESSION['id'])) ? $_SESSION['id'] : false;

    if($session === true && $id !== false){ header('Location: scrap'); }

    $twig = new Twig('pages/login.html.twig');
    $twig->render([   
            
    ]); 
});

// Connexion user account
$router->post('/connexion-login', function() {
    $user = new User($_POST);

    $exist = UserController::existUser($user);
    if($exist === true) {
        $validate = UserController::connexionUser($user);
    }else{
        $validate = false;
    }
    
    echo json_encode($validate);
});  

// Scrap
$router->get('/scrap', function(){ 
    
    $twig = new Twig('pages/scrap.html.twig');
    $twig->render([   
            
    ]); 
});

// SESSION DESTROY
$router->get('/destroy', function(){ 
    session_destroy();
    header("Location: /harvestdata/");
});

$router->get('/posts', function(){ echo 'Tous les articles'; });
$router->get('/posts/:id', function($id){ echo 'Afficher l\'article' . $id; });
$router->post('/posts/:id', function($id){ echo 'Poster l\'article' . $id; });


$router->run();