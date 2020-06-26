<?php
return array(
    'article/([0-9])+' => 'article/view/$1',
    'category/([0-9])+/([0-9])+' => 'catalog/category/$1/$2',
    'category/([0-9])+/_([0-9])+' => 'catalog/category/$1/$2',
    'category/([0-9])+' => 'catalog/category/$1',
    'catalog/_([0-9])+' => 'catalog/index/$1',
    'catalog/([0-9])+' => 'catalog/index/$1',
    'catalog' => 'catalog/index',
    'product/([0-9]+)' => 'product/view/$1',
    // -- user interaction -- 
    'register' => 'user/register',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',
    'login' => 'user/login',
    'logout' => 'user/logout',
    // cart interaction:
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    'cart/add/([0-9]+)' => 'cart/add/$1', // for synchrone adding 
    'cart/order/([0-9]+)' => 'cart/order/$1',
    'cart/order' => 'cart/order',
    'cart/del/([0-9]+)' => 'cart/delete/$1',
    'cart' => 'cart/index',
    // admin interaction:
    // manage products: 
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',
    // manage categories:
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',
    // manage articles:
    'admin/article/create' => 'adminArticle/create',
    'admin/article/update/([0-9]+)' => 'adminArticle/update/$1',
    'admin/article/delete/([0-9]+)' => 'adminArticle/delete/$1',
    'admin/article' => 'adminArticle/index',
    // manage orders: 
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',
    // admin pane:
    'admin' => 'admin/index',
    // contacts about
    'outer_contacts_handler' => 'main/outer',
    'contacts' => 'main/contact',
    'main/contact' => 'main/contact',
    'about' => 'main/about',
    // -- redirects to main page --
    'index.html' => 'main/index',
    'index.php' => 'main/index',
    'index.htm' => 'main/index',
    '' => 'main/index', 
    
);

