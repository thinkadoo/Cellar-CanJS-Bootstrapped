<?php
/**
 * Cellar : a demonstration of separating front-end and back-end development.
 * JS MVC and PHP REST reference CRUD implementation to demonstrate the concept.
 *
 * Objectives:
 * Find an accessible MVC framework for Javascript which everyone on the team can understand. [CanJS-JQuery]
 * Find a light weight MVC framework for PHP that does not capture our code. [Slim]
 *
 * @author      Andre Venter <andre.n.venter@gmail.com>
 * @copyright   2012 Andre Venter
 * @link        http://think-a-doo.net
 * @version     1.0.0
 * @package     Slim
 *
 * MIT LICENSE
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

require_once 'vendor/autoload.php';

$app = new \Slim\Slim();

require_once 'functions/loader.php';

// VIEWS //

$app->get('/', 'welcome');
$app->get('/data', 'data');
$app->get('/services', 'services');
$app->get('/downloads', 'downloads');
$app->get('/about', 'about');
$app->get('/contact', 'contact');

// API //

// GET routes
$app->get('/wines', 'getWines');
$app->get('/wines/:id',	'getWine');
$app->get('/wines/search/:query', 'findByName');

// POST routes
$app->post('/wines', 'addWine');

// PUT routes
$app->put('/wines/:id', 'updateWine');

// DELETE routes
$app->delete('/wines/:id',	'deleteWine');


$app->run();