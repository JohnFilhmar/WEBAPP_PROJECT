<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC Framework
 * ------------------------------------------------------------------
 *
 * MIT License
 * 
 * Copyright (c) 2020 Ronald M. Marasigan
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package LavaLust
 * @author Ronald M. Marasigan <ronald.marasigan@yahoo.com>
 * @copyright Copyright 2020 (https://ronmarasigan.github.io)
 * @since Version 1
 * @link https://lavalust.pinoywap.org
 * @license https://opensource.org/licenses/MIT MIT License
 */

/*
| -------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------
| Here is where you can register web routes for your application.
|
|
*/

// MAIN FRONT PAGES
$router->get('/', 'UserController::home');
$router->get('/home', 'UserController::home');
$router->get('/services', 'UserController::services');
$router->get('/contact', 'UserController::contact');
$router->get('/policies', 'UserController::policies');
$router->get('/licensing', 'UserController::licensing');
$router->get('/about', 'UserController::about');

$router->get('/inventory', 'ProductController::inventory');
$router->post('createitem', 'ProductController::createitem');
$router->get('/deleteitem/(:num)', 'ProductController::delete');
$router->get('/edititem/(:num)', 'ProductController::edit');
$router->post('/submitedit/(:num)', 'ProductController::submitedit');

$router->get('/addtocart/(:num)', 'CartController::addtocart');
$router->get('/removefromcart/(:num)', 'CartController::remove');

// BASE LOGIN REGISTER AUTHENTICATION
$router->get('/login', 'UserController::login');
$router->get('/register', 'UserController::register');
$router->post('auth', 'UserController::auth');
$router->post('createaccount', 'UserController::createaccount');

// USER ICON DROPDOWN LINKS
$router->get('/profile', 'UserController::profile');
$router->post('profileEdit/(:num)', 'UserController::profile');
$router->get('/settings', 'UserController::settings');
$router->get('/logout', 'UserController::logout');