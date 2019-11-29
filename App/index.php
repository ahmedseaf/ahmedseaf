<?php
//index From Application

// white list routes

use System\Application;

$app = Application::getInstance();



if(strpos($app->request->url(), '/admin') === 0 ) {
    $app->route->callFirst(function ($app) {
        $app->load->action('Access' , 'index');
    });
}


$app->route->add('/', 'Home');
$app->route->add('/contact', 'Contact');
$app->route->add('/product', 'Product');


//$app->route->add('/access', 'Access');


//ِAdmin Routes
$app->route->add('/admin/login', 'Admin/Login');
$app->route->add('/admin/login/submit', 'Admin/Login@submit', 'POST');
//
//
//
// //Share Admin LayOut
$app->share('Layout', function ($app){
   return $app->load->controller('Admin/Common/Layout');
});
//
//
// admin => Categories
$app->route->add('/admin/categories', 'Admin/Categories');
$app->route->add('/admin/categories/add', 'Admin/Categories@add', 'POST');
$app->route->add('/admin/categories/insert', 'Admin/Categories@insert', 'POST');
//$app->route->add('/admin/categories/edit/:id', 'Admin/Categories@edit','POST');
$app->route->add('/admin/categories/edit/:id', 'Admin/Categories@edit');
$app->route->add('/admin/categories/save/:id', 'Admin/Categories@save', 'POST');
$app->route->add('/admin/categories/delete/:id', 'Admin/Categories@delete', 'POST');






// Dashboard
$app->route->add('/admin', 'Admin/Dashboard');
$app->route->add('/dashboard/submit', 'Admin/Dashboard@submit', 'POST');
$app->route->add('/admin/dashboard', 'Admin/Dashboard');


// admin => users
$app->route->add('/admin/users', 'Admin/Users');
$app->route->add('/admin/users/add', 'Admin/Users@add',             'POST');
$app->route->add('/admin/users/submit', 'Admin/Users@submit',       'POST');
$app->route->add('/admin/users/edit/:id', 'Admin/Users@edit',       'POST');
$app->route->add('/admin/users/save/:id', 'Admin/Users@save',       'POST');
$app->route->add('/admin/users/delete/:id', 'Admin/Users@delete',   'POST');





// admin => users Group
$app->route->add('/admin/users-groups', 'Admin/UsersGroups');
$app->route->add('/admin/users-groups/add', 'Admin/UsersGroups@add',            'POST');
$app->route->add('/admin/users-groups/submit', 'Admin/UsersGroups@submit',      'POST');
$app->route->add('/admin/users-groups/edit/:id', 'Admin/UsersGroups@edit',      'POST');
$app->route->add('/admin/users-groups/save/:id', 'Admin/UsersGroups@save',      'POST');
$app->route->add('/admin/users-groups/delete/:id', 'Admin/UsersGroups@delete',  'POST');




//Admin Ads
$app->route->add('/admin/ads', 'Admin/Ads');
$app->route->add('/admin/ads/add', 'Admin/Ads@add', 'POST');
$app->route->add('/admin/ads/submit', 'Admin/Ads@submit', 'POST');
$app->route->add('/admin/ads/edit/:id', 'Admin/Ads@edit', 'POST');
$app->route->add('/admin/ads/save/:id', 'Admin/Ads@save', 'POST');
$app->route->add('/admin/ads/delete/:id', 'Admin/Ads@delete', 'POST');




// admin => Posts
$app->route->add('/admin/posts', 'Admin/Posts');
$app->route->add('/admin/posts/add', 'Admin/Posts@add', 'POST');
$app->route->add('/admin/posts/submit', 'Admin/Posts@submit', 'POST');
$app->route->add('/admin/posts/edit/:id', 'Admin/Posts@edit', 'POST');
$app->route->add('admin/posts/save/:id', 'Admin/Posts@save', 'POST');
$app->route->add('/admin/posts/delete/:id', 'Admin/Posts@delete', 'POST');



// Admin Comments
$app->route->add('/admin/posts/:id/comments', 'Admin/Comments');
$app->route->add('/admin/comments/edit/:id', 'Admin/Comments@edit');
$app->route->add('/admin/comments/save/:id', 'Admin/Comments@save', 'POST');
$app->route->add('/admin/comments/delete/:id', 'Admin/Comments@delete');











// Admin Settings
$app->route->add('/admin/settings', 'Admin/Settings');
$app->route->add('/admin/settings/save', 'Admin/Settings@save', 'POST');




// Admin Contacts
$app->route->add('/admin/contacts', 'Admin/Contacts');
$app->route->add('/admin/contacts/reply/:id', 'Admin/Contacts@reply');
$app->route->add('/admin/contacts/send/:id', 'Admin/Contacts@send', 'POST');




// logout
$app->route->add('/logout', 'Logout');






$app->route->add('/404', 'NotFound');

$app->route->notFound('/404');
