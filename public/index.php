<?php

// Inclusion of other classes.
use App\Controller\RootController;

require_once dirname(__FILE__) . '/../Model/DB.php';
require_once dirname(__FILE__) . '/../Controller/AbstractController.php';
require_once dirname(__FILE__) . '/../Controller/RootController.php';
require_once dirname(__FILE__) . '/../Controller/ArticlesController.php';
require_once dirname(__FILE__) . '/../Controller/UserController.php';
require_once dirname(__FILE__) . '/../Controller/CreateController.php';
require_once dirname(__FILE__) . '/../Controller/DeleteController.php';
require_once dirname(__FILE__) . '/../Controller/LoginController.php';


// Inclusion of entities.
require_once dirname(__FILE__) . '/../Model/Entity/User.php';
require_once dirname(__FILE__) . '/../Model/Entity/Comment.php';
require_once dirname(__FILE__) . '/../Model/Entity/Article.php';
require_once dirname(__FILE__) . '/../Model/Entity/ArticlePanier.php';

// Inclusion of managers.
require_once dirname(__FILE__) . '/../Model/Manager/UserManager.php';
require_once dirname(__FILE__) . '/../Model/Manager/CommentManager.php';
require_once dirname(__FILE__) . '/../Model/Manager/ArticleManager.php';


require_once dirname(__FILE__) . '/router.php';