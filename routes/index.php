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



    // Admin Setting
    $route->add('/setting',             'Setting');
    $route->add('/setting/add',         'Setting@add',      'POST');
    $route->add('/setting/submit',      'Setting@submit',   'POST');
    $route->add('/setting/edit/:id',    'Setting@edit',     'POST');
    $route->add('/setting/save/:id',    'Setting@save',     'POST');
    $route->add('/setting/delete/:id',  'Setting@delete',   'POST');



    // Admin Product
    $route->add('/product',             'Product');
    $route->add('/product/add',         'Product@add');
    $route->add('/product/submit',      'Product@submit',   'POST');
    $route->add('/product/edit/:id',    'Product@edit');
    $route->add('/product/save/:id',    'Product@save',     'POST');
    $route->add('/product/delete/:id',  'Product@delete',   'POST');


    $route->add('/product/getsubcategoy',  'Product@getsubcategoy',   'POST');
    $route->add('/product/getmincategoy',  'Product@getmincategoy',   'POST');


    $route->add('/product/faveproduct'  ,  'Product@faveproduct',      'POST');





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


    // Contact Page
    $route->add('/contact', 'AboutUs');
    $route->add('/contact/view/:id', 'AboutUs@contactlist');
    $route->add('/contact/delete/:id', 'AboutUs@delete', 'POST');



    $route->add('/about',               'AboutUs@aboutView');
    $route->add('/about/add',           'AboutUs@addabout', 'POST');
    $route->add('/about/adddata',       'AboutUs@addaboutdata', 'POST');
    $route->add('/about/edit/:id',      'AboutUs@editabout', 'POST');
    $route->add('/about/update/:id',      'AboutUs@updateabout', 'POST');
    $route->add('/about/delete/:id',    'AboutUs@aboutdelete', 'POST');

    $route->add('/company',             'OurCompany');
    $route->add('/company/add',         'OurCompany@add',      'POST');
    $route->add('/company/submit',      'OurCompany@submit',   'POST');
    $route->add('/company/edit/:id',    'OurCompany@edit',     'POST');
    $route->add('/company/save/:id',    'OurCompany@save',     'POST');
    $route->add('/company/delete/:id',  'OurCompany@delete',   'POST');


});


$blogOptions = [
    'prefix'        => '/',
    'controller'    => '',
    'middleware'    => [],
];
$app->route->group($blogOptions, function ($route){


    $route->add('/', 'Home');
    //$route->add('/product/:text/:id', 'Home@products');
   // $route->add('/product/:id/:text', 'Home@products');


    $route->add('/product/view/:id/:text', 'Home@productView'); // صفحة المنج
    $route->add('/category/all', 'Home@allCategory');
    $route->add('/sub-category/filter/:id/:text', 'Home@subCategory');
    $route->add('/main-category/filter/:id/:text', 'Home@mainCategory');
    $route->add('/product/filter/:id/:text',    'Home@productFilter');

    $route->add('/product/brand/:id/:text',     'Home@getAllProductBrand');
    $route->add('/product/sitemap',             'Home@getSiteMap');
    $route->add('/product/test',                'Home@test');
    $route->add('/header/test',                 'Admin/WebCommon/HeaderWeb@test');
    $route->add('/test', 'Home@test');


    // Nav bar Search
    $route->add('/product/search',                 'Admin/WebCommon/NavbarWeb@search', 'POST');
    $route->add('/product/check',                 'Admin/WebCommon/NavbarWeb@checksearch', 'POST');

    //Start AboutUs
    $route->add('/about/us',        'Admin/AboutUs@aboutUs');
    $route->add('/contact/us',      'Admin/AboutUs@contactUs');
    $route->add('/contact/message', 'Admin/AboutUs@insert', 'POST');



    $route->add('/contact', 'Contact');
    $route->add('/test', 'Test');
    $route->add('/test/add',            'Test@add',     'POST');
    $route->add('/test/submit',         'Test@submit',  'POST');
    $route->add('/test/radio',          'Test@radio');
    $route->add('/test/getdata',        'Test@getdata',  'POST');

    $route->add('/test/search',     'Test@search',  'POST');
    $route->add('/test/edit/:id',   'Test@edit' ,   'POST');
    $route->add('/test/save/:id',   'Test@save',    'POST');
    $route->add('/test/delete/:id', 'Test@delete',  'POST');


    $route->add('/user/login',          'Admin/Login');
    $route->add('/user/login-user',     'Admin/Login@checkIfAdmin', 'POST');
    $route->add('/user/login-admin',    'Admin/Login@adminLogin', 'POST');
    $route->add('/user/register',       'Admin/Login@newRegister');
    $route->add('/user/post-register',  'Admin/Login@postRegister', 'POST');



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






