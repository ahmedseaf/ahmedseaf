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

    // admin => users Group
    $route->package('/users-groups', 'UsersGroups');


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




    // Admin Main Page
    $route->add('/main-page',             'MainPage');
    $route->add('/main-page/add',         'MainPage@add',    'POST');
    $route->add('/main-page/submit',      'MainPage@submit',   'POST');
    $route->add('/main-page/delete/:id',  'MainPage@delete',   'POST');



});


$blogOptions = [
    'prefix'        => '/',
    'controller'    => '',
    'middleware'    => [],
];
$app->route->group($blogOptions, function ($route){


    $route->add('/', 'Home');
    //$route->add('/product/:text/:id', 'Home@products');
    $route->add('/product/:id/:text', 'Home@products');


    $route->add('/product/view/:id/:text', 'Home@productView'); // صفحة المنج
    $route->add('/category/all', 'Home@allCategory');
    $route->add('/sub-category/filter/:id/:text', 'Home@subCategory');
    $route->add('/main-category/filter/:id/:text', 'Home@mainCategory');
    $route->add('/product/filter/:id/:text', 'Home@productFilter');
    $route->add('/product/test', 'Home@test');



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


    $route->add('/user/login', 'Admin/Login');
    $route->add('/user/login-user', 'Admin/Login@checkIfAdmin', 'POST');
    $route->add('/user/login-admin', 'Admin/Login@adminLogin', 'POST');
//    $route->add('/login/login', 'Admin/Login@login', 'POST');
//    $route->add('/login/forget', 'Admin/Login@forget', 'POST');
//    $route->add('/reserpassword', 'Admin/Login@reserpassword');
//    $route->add('/newpassword', 'Admin/Login@newpassword', 'POST');
//    $route->add('/login/register', 'Admin/Login@register', 'POST');
//    $route->add('/login/submit', 'Login@submit', 'POST');


    $route->add('/logout', 'Logout');


});


// //Share Admin LayOut

$app->share('Layout', function ($app){
   return $app->load->controller('Admin/Common/Layout');
});



$app->share('webLayout', function ($app){
    return $app->load->controller('Admin/WebCommon/LayoutWeb');
});


$app->route->add('/not-found/404', 'NotFound');
$app->route->notFound('/404');






