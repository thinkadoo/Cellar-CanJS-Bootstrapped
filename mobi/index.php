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
?>

<?php require("header.php"); ?>

    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="../">Cellar</a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li class="active"><a href="">Home</a></li>
                        <li><a href="./about.php">About</a></li>
                        <li><a href="./contact.php">Contact</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>

    <div class="container">

    <div class="row-fluid" id="wines" ><!--/The Wines List and Details Views are injected here-->

    </div><!--/row-->


    <hr>

    <div class="row-fluid">
        <div class="span4">
            <h3>CanJS</h3>
            <p>CanJS is a MIT-licensed, client-side, JavaScript framework that makes building rich web applications easy. It's unique annotated style and OOP approach lays the foundation for powerful MVC architectures. </p>
            <p><a class="btn" href="http://canjs.us/" target="_blank">View details &raquo;</a></p>
        </div>
        <div class="span4">
            <h3>jQuery</h3>
            <p>jQuery is a fast and concise JavaScript Library that simplifies HTML document traversing, event handling, animating, and Ajax interactions for rapid web development. jQuery is designed to change the way that you write JavaScript. </p>
            <p><a class="btn" href="http://jquery.com/" target="_blank">View details &raquo;</a></p>
        </div>
        <div class="span4">
            <h3>Bootstrap</h3>
            <p>Sleek, intuitive, and powerful front-end framework for faster and easier web development. </p>
            <p><a class="btn" href="http://twitter.github.com/bootstrap/" target="_blank">View details &raquo;</a></p>
        </div>
    </div>


<?php require("footer.php"); ?>

