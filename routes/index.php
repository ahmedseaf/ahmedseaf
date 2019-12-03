<?php
//index From Application

// white list routes



$app = app();


// expected group code
$adminOptions = [
    'prefix'        => '/admin',
    'controller'    => 'Admin',
    'middleware'    => ['Admin\\Auth'],
];

$app->route->group($adminOptions, function ($route) {
    $route->add('/login', 'Login');
    $route->add('/login/submit', 'Login@submit', 'POST');

    // Dashboard
    $route->add('', 'Dashboard');
    $route->add('dashboard/submit', 'Dashboard@submit', 'POST');
    $route->add('/dashboard', 'Dashboard');

    // admin => users
    $route->package('/users', 'Users');
//    $route->add('/users', 'Users');
//    $route->add('/users/add', 'Users@add',             'POST');
//    $route->add('/users/submit', 'Users@submit',       'POST');
//    $route->add('/users/edit/:id', 'Users@edit',       'POST');
//    $route->add('/users/save/:id', 'Users@save',       'POST');
//    $route->add('/users/delete/:id', 'Users@delete',   'POST');

    // admin => users Group
    $route->package('/users-groups', 'UsersGroups');
//    $route->add('/users-groups/add', 'UsersGroups@add',            'POST');
//    $route->add('/users-groups/submit', 'UsersGroups@submit',      'POST');
//    $route->add('/users-groups/edit/:id', 'UsersGroups@edit',      'POST');
//    $route->add('/users-groups/save/:id', 'UsersGroups@save',      'POST');
//    $route->add('/users-groups/delete/:id', 'UsersGroups@delete',  'POST');


    // Admin Categories
    $route->add('/categories', 'Categories');
    $route->add('/categories/add', 'Categories@add', 'POST');
    $route->add('/categories/insert', 'Categories@insert', 'POST');
    $route->add('/categories/edit/:id', 'Categories@edit','POST');
    $route->add('/categories/edit/:id', 'Categories@edit');
    $route->add('/categories/save/:id', 'Categories@save', 'POST');
    $route->add('/categories/delete/:id', 'Categories@delete', 'POST');

});


$blogOptions = [
    'prefix'        => '/',
    'controller'    => '',
    'middleware'    => [],
];
$app->route->group($blogOptions, function ($route){

    $route->add('/', 'Home');
    $route->add('contact', 'Contact');
    $route->add('product', 'Product');
    $route->add('logout', 'Logout');


});


// //Share Admin LayOut
$app->share('Layout', function ($app){
   return $app->load->controller('Admin/Common/Layout');
});


$app->route->add('/404', 'NotFound');
$app->route->notFound('/404');






