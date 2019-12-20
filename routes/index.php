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
    $route->add('/sub-category/edit/:id', 'SubCategories@edit',     'POST');
    $route->add('/sub-category/save/:id',   'SubCategories@save',   'POST');
    $route->add('/sub-category/delete/:id', 'SubCategories@delete', 'POST');


    // For Min Sub Category
    $route->add('/min-category',             'MinSubCategories' );
    $route->add('/min-category/add',         'MinSubCategories@add',    'POST');
    $route->add('/min-category/submit',      'MinSubCategories@submit', 'POST');
    $route->add('/min-category/select',      'MinSubCategories@select', 'POST');
    $route->add('/min-category/edit/:id',    'MinSubCategories@edit',   'POST');
    $route->add('/min-category/save/:id',    'MinSubCategories@save',   'POST');
    $route->add('/min-category/delete/:id',  'MinSubCategories@delete', 'POST');


    // Admin Brand
    $route->add('/brand',             'Brand');
    $route->add('/brand/add',         'Brand@add',      'POST');
    $route->add('/brand/submit',      'Brand@submit',   'POST');
    $route->add('/brand/edit/:id',    'Brand@edit',     'POST');
    $route->add('/brand/save/:id',    'Brand@save',     'POST');
    $route->add('/brand/delete/:id',  'Brand@delete',   'POST');



    // Admin Product
    $route->add('/product',             'Product');
    $route->add('/product/add',         'Product@add');
    $route->add('/product/submit',      'Product@submit',   'POST');
    $route->add('/product/edit/:id',    'Product@edit');
    $route->add('/product/save/:id',    'Product@save',     'POST');
    $route->add('/product/delete/:id',  'Product@delete',   'POST');

    //$route->add('/product/deleteimg/:id',  'Product@deleteimg',   'POST');

    $route->add('/product/getsubcategoy',  'Product@getsubcategoy',   'POST');
    $route->add('/product/getmincategoy',  'Product@getmincategoy',   'POST');
    $route->add('/product/getimagedata/:id',  'Product@getimagedata', 'POST');
    $route->add('/product/uploadimage/:id',  'Product@uploadimage', 'POST');
    $route->add('/product/getdatamagebyid/:id',  'Product@getdatamagebyid', 'POST');
    $route->add('/product/deleteimg/:id',  'Product@deleteimg', 'POST');
    $route->add('/product/deleteoptions/:id',  'Product@deleteoptions', 'POST');
    $route->add('/product/radio',  'Product@radio');

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


    $route->add('/login', 'Admin/Login');
    $route->add('/login/login', 'Admin/Login@login', 'POST');
    $route->add('/login/forget', 'Admin/Login@forget', 'POST');
    $route->add('/login/register', 'Admin/Login@register', 'POST');
    $route->add('/login/submit', 'Login@submit', 'POST');


    $route->add('/logout', 'Logout');


});


// //Share Admin LayOut
$app->share('Layout', function ($app){
   return $app->load->controller('Admin/Common/Layout');
});


$app->route->add('/404', 'NotFound');
$app->route->notFound('/404');






