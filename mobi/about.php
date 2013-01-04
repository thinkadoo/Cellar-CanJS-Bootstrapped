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
                    <li><a href="./index.php">Home</a></li>
                    <li class="active"><a href="">About</a></li>
                    <li><a href="./contact.php">Contact</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container">

<div class="row-fluid">
    <div class="span12">
        <h2>About</h2>
        <hr>
    </div>
</div>

<div class="row-fluid">

    <div class="span4">
        <h2>Idea</h2>
        <p>Code is <strong>functional</strong> when it works. </p>
        <p>It is <strong>valuable</strong> if it can be maintained by others. </p>
        <p>Code is an <strong>investment</strong> when it can be re-used by others. </p>
        <p>Return on investment (ROI) grows a business. </p>
    </div>
    <div class="span4">
        <h2>Motivation</h2>
        <p>We have so many front-ends to deploy our applications on, we can't afford to make server centric stand-alone apps from the ground up for every use case. </p>
        <p>Program with better ROI in mind. Stop duplicating work. </p>
    </div>
    <div class="span4">
        <h2>Solution</h2>
        <p>Separate front-end and back-end development. </p>
        <p>Make a JS MVC and REST reference CRUD implementation to demonstrate the concept. </p>
        <p>Find an accessible MVC framework for Javascript which everyone on the team can understand. [CanJS-JQuery]</p>
        <p>Find a light weight MVC framework for PHP that does not capture our code. [Slim]</p>
    </div>

</div>

<?php require("footer.php"); ?>