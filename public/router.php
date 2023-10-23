<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\RootController;

$router = new AltoRouter();

// Router Base
$router->map('GET', '/home', 'HomeController#index', 'home');
$router->map('GET', '/', 'HomeController#index', 'root');
$router->map('GET', '/conditions', 'HomeController#indexConditions', 'conditions');
$router->map('GET', '/mentions', 'HomeController#indexMentions', 'mentions');
$router->map('GET', '/articles', 'ArticlesController#index', 'articles');
$router->map('GET', '/create', 'CreateController#index', 'create');
$router->map('GET', '/login', 'LoginController#index', 'login');
$router->map('GET', '/register', 'LoginController#index_Register', 'register');
$router->map('GET', '/logout', 'LoginController#logout', 'logout');
$router->map('GET', '/playstation/[i:id]', 'ArticlesController#indexPlaystation', 'playstation');
$router->map('GET', '/xbox/[i:id]', 'ArticlesController#indexXbox', 'xbox');
$router->map('GET', '/pc', 'HomeController#indexpc', 'pc');
$router->map('GET', '/steam/[i:id]', 'ArticlesController#indexSteam', 'steam');
$router->map('GET', '/rockstar/[i:id]', 'ArticlesController#indexRockstar', 'rockstar');
$router->map('GET', '/origin/[i:id]', 'ArticlesController#indexOrigin', 'origin');
$router->map('GET', '/epic/[i:id]', 'ArticlesController#indexEpic', 'epic');
$router->map('GET', '/support', 'HomeController#indexSupport', 'support');
$router->map('GET', '/topsel', 'HomeController#indextopsel', 'topsel');
$router->map('GET', '/verification', 'HomeController#indexVerify', 'verify');
$router->map('GET', '/panier', 'HomeController#indexShop', 'shop');
$router->map('GET', '/myprofile/[i:id]', 'HomeController#indexProfile', 'myprofile');
$router->map('GET', '/forgot-password', 'HomeController#indexForgot', 'forgot-password');
// Router Comment
$router->map('GET', '/comment/[i:id]', 'ArticlesController#indexComment', 'commentpsn');
$router->map('GET', '/create_comment/[i:id]', 'CreateController#CreateComment', 'create_comment');
// Router Post Check
$router->map('POST', '/checkCreate', 'CreateController#checkCreate', 'check_create');
$router->map('POST', '/checkPassword', 'LoginController#checkForgotPassword', 'check_forgot');
$router->map('POST', '/checkLogin', 'LoginController#checkLogin', 'check');
$router->map('POST', '/checkRegister', 'LoginController#registerUser', 'check_register');
$router->map('POST', '/checkEditProfile/[i:id]', 'CreateController#checkProfile', 'check_profile');
$router->map('POST', '/checkDeleteProfile/[i:id]', 'DeleteController#deleteUser', 'del_profile');
$router->map('POST', '/checkCreateComment/[i:id]', 'CreateController#checkComment', 'check_create_commentPSN');
$router->map('POST', '/checkEditArticle/[i:id]', 'CreateController#modifyArticle', 'modifyArticle');
$router->map('POST', '/checkSupport', 'CreateController#checkSupport', 'checkSupport');
$router->map('POST', '/checkVerify', 'LoginController#verifyUser', 'verifyUser');
$router->map('POST', '/checkAddShop/[i:id_article]/[i:quantite]', 'CreateController#checkAddShop', 'checkAddShop');
// Router Delete and Edit
$router->map('GET', '/delete/[i:id]', 'DeleteController#delete', 'delete');
$router->map('GET', '/deleteArticle/[i:id]', 'DeleteController#deleteArticle', 'deleteArticle');
$router->map('POST', '/deletePanier/[i:id]', 'DeleteController#deletePanier', 'deletePanier');
// Article ID
$router->map('GET', '/article_id/[i:id]', 'ArticlesController#indexArticleId', 'article');
// Router Create Article
$router->map('GET', '/viewCreateArticle', 'HomeController#viewCreateArticle', 'viewCreateArticle');
$router->map('POST', '/createArticle', 'CreateController#createArticle', 'createArticle');
$router->map('GET', '/viewEditArticle/[i:id]', 'CreateController#viewEditArticle', 'viewEditArticle');

$match = $router->match();

if ($match) {
    list($controller, $action) = explode('#', $match['target']);
    $controllerFile = dirname(__FILE__) . "/../Controller/$controller.php";

    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        $controllerClass = "App\\Controller\\$controller";
        $controllerInstance = new $controllerClass();
        call_user_func_array(array($controllerInstance, $action), $match['params']);
    } else {
        $rootController = new RootController();
        $rootController->displayError(404);
    }
} else {
    $rootController = new RootController();
    $rootController->displayError(404);
}
