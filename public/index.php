<?php
session_start();

use App\Twig\Twig;
use App\model\User;
use App\model\UserController;
use App\Router\Router;

// require('../vendor/autoload.php');
require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "vendor/autoload.php";

// define('BASE_PATH', './harvestdata');
// define('SERVER_URI', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . BASE_PATH);

$router = new Router($_GET['url']);

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

// Connexion create account
$router->get('/create-account', function() {
    $twig = new Twig('pages/account.html.twig');
    $twig->render([   

    ]); 
});  

// Add User
$router->post('add-user', function() {
    $addUser = UserController::addUser();
    return $addUser;
    // header("Location: /harvestdata/scrap");
    // ???
});


// Scrap
$router->get('/scrap', function(){ 
    $twig = new Twig('pages/scrap.html.twig');
    $user = new User($_POST);
    $twig->render([   
        // $_firstname = $_GET['firstname']
        'firstname' => $user->get_firstname(),
    ]); 
});

// History
$router->get('/history', function(){ 
    $twig = new Twig('pages/history.html.twig');
    $twig->render([   
        // $firstname = $_GET['firstname'],
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