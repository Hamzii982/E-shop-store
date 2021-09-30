<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'CustomerController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Customer Side Routes

$route['product-details']= 'CustomerController/productdetail';
$route['home'] = 'CustomerController/index';
$route['/'] = 'CustomerController/index';
$route['product-list'] = 'CustomerController/productlist';
$route['product-search'] = 'CustomerController/productsearch';
$route['user-account'] = 'CustomerController/account';
$route['contact-us'] = 'CustomerController/contact';
$route['cart'] = 'CustomerController/cart';
$route['about'] = 'CustomerController/about';
$route['gallery'] = 'CustomerController/gallery';
$route['wishlist'] = 'CustomerController/wishlist';
$route['checkout'] = 'CustomerController/checkout';
$route['checkout1'] = 'CustomerController/checkout1';
$route['login'] = 'Customer/LoginController/login';
$route['logout'] = 'customer/logincontroller/logout';
$route['addtocart'] = 'CustomerController/addtocart';
$route['addtowishlist'] = 'CustomerController/addtowishlist';
$route['removewishlist'] = 'CustomerController/removewishlist';
$route['removeitem'] = 'CustomerController/removeitem';
$route['buynow'] = 'CustomerController/buynow';
$route['editcredential'] = 'CustomerController/editcredential';
$route['editprofile'] = 'CustomerController/editprofile';
$route['placeorder'] = 'CustomerController/placeorder';
$route['cardpay'] = 'CustomerController/cardpay';
$route['payment'] = 'CustomerController/payment';
$route['doneorder'] = 'CustomerController/doneorder';
$route['newsletter'] = 'CustomerController/newsletter';
$route['newcontact'] = 'CustomerController/newcontact';
$route['reviewsubmit'] = 'CustomerController/reviewsubmit';


// Seller Side Routes

$route['seller/login'] = 'LoginController/register';
$route['seller/home'] = 'seller/mycontroller/index';
$route['seller/products'] = 'seller/productcontroller/product';
$route['seller/payment'] = 'seller/paymentcontroller/payment';
$route['seller/account'] = 'seller/Accountcontroller/index';
$route['seller/orders'] = 'seller/OrderController/order';
$route['seller/reviews'] = 'seller/OrderController/review';
$route['seller/orders'] = 'seller/OrderController/order';
$route['seller/orders'] = 'seller/OrderController/order';
$route['seller/login'] = 'LoginController/register';


// Admin Side Routes

$route['admin/order'] = 'OrderController/order';
$route['seller/logout'] = 'logincontroller/logout';
$route['admin/home'] = 'MyController/index';
$route['admin/products'] = 'ProductController/product';
$route['admin/categories'] = 'CategoryController/Category';
$route['admin/sub-categories'] = 'SubCategoryController/Category';
$route['admin/orders'] = 'OrderController/order';
$route['admin/user-accounts'] = 'AccountController/index';
$route['admin/payments'] = 'PaymentController/payment';
$route['admin/feedbacks'] = 'OrderController/feedback';
$route['admin/reviews'] = 'OrderController/review';
$route['admin/categories/add-new'] = 'CategoryController/newpage';
$route['admin/categories/edit'] = 'CategoryController/edit';
$route['admin/reply'] = 'OrderController/reply';
$route['admin/reply'] = 'OrderController/reply';
$route['admin/reply'] = 'OrderController/reply';

