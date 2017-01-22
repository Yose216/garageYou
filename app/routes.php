<?php

// Home page
 $app->get('/', "garage\Controller\HomeController::indexAction")->bind('home');

// Detailed info about an article
// $app->match('/article/{id}', "cms\Controller\HomeController::articleAction")->bind('article');

// Login form
 $app->get('/login', "garage\Controller\HomeController::loginAction")->bind('login');

// Admin zone
 $app->get('/admin', "garage\Controller\AdminController::indexAction")->bind('admin');

// Add a new voiture
 $app->match('/admin/voiture/add', "garage\Controller\AdminController::addVoitureAction")->bind('admin_voiture_add');

// Edit an existing voiture
$app->match('/admin/voiture/{id}/edit', "garage\Controller\AdminController::editVoitureAction")->bind('admin_voiture_edit');

// Remove an voiture
 $app->get('/admin/voiture/{id}/delete', "garage\Controller\AdminController::deleteVoitureAction")->bind('admin_voiture_delete');

// Edit an existing comment
// $app->match('/admin/comment/{id}/edit', "cms\Controller\AdminController::editCommentAction")->bind('admin_comment_edit');

// Remove a comment
// $app->get('/admin/comment/{id}/delete', "cms\Controller\AdminController::deleteCommentAction")->bind('admin_comment_delete');

// Add a user
 $app->match('/admin/user/add', "garage\Controller\AdminController::addUserAction")->bind('admin_user_add');

// Edit an existing user
 $app->match('/admin/user/{id}/edit', "garage\Controller\AdminController::editUserAction")->bind('admin_user_edit');

// Remove a user
 $app->get('/admin/user/{id}/delete', "garage\Controller\AdminController::deleteUserAction")->bind('admin_user_delete');

// API : get all articles
// $app->get('/api/articles', "cms\Controller\ApiController::getArticlesAction")->bind('api_articles');

// API : get an article
// $app->get('/api/article/{id}', "cms\Controller\ApiController::getArticleAction")->bind('api_article');

//New hach for password
// $app->get('/newpwd', function() use ($app) {
    // $rawPassword = '3007';
    // $salt = '%qUgq3NAYfC1MKwrW?yevbE';
    // $encoder = $app['security.encoder.digest'];
    // return $encoder->encodePassword($rawPassword, $salt);
// });

// $app->get('/web/images/Articles', function(Request $request) use ($app) {
	
// });
