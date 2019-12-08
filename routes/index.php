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


    // For Sub Category
    $route->add('/sub-category',             'SubCategories' );
    $route->add('/sub-category/add',        'SubCategories@add',    'POST');
    $route->add('/sub-category/submit',     'SubCategories@submit', 'POST');
    $route->add('/sub-category/edit/:id', 'SubCategories@edit', 'POST');
    $route->add('/sub-category/save/:id',   'SubCategories@save',   'POST');
    $route->add('/sub-category/delete/:id', 'SubCategories@delete', 'POST');


    // For Min Sub Category

});


$blogOptions = [
    'prefix'        => '/',
    'controller'    => '',
    'middleware'    => [],
];
$app->route->group($blogOptions, function ($route){


    $route->add('/', 'Home');
    $route->add('/contact', 'Contact');
    $route->add('/test', 'Test');
    $route->add('/test/add',        'Test@add',     'POST');
    $route->add('/test/submit',     'Test@submit',  'POST');
    $route->add('/test/radio',     'Test@radio');
    $route->add('/test/getdata',     'Test@getdata',  'POST');

    $route->add('/test/search',     'Test@search',  'POST');
    $route->add('/test/edit/:id',   'Test@edit' ,   'POST');
    $route->add('/test/save/:id',   'Test@save',    'POST');
    $route->add('/test/delete/:id', 'Test@delete',  'POST');
    $route->add('/logout', 'Logout');


});


// //Share Admin LayOut
$app->share('Layout', function ($app){
   return $app->load->controller('Admin/Common/Layout');
});


$app->route->add('/404', 'NotFound');
$app->route->notFound('/404');






