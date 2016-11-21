<?php
require_once('db_connect.php');
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Learn PHP - Mysql</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include "head_script.php"; ?>
        <link rel="stylesheet" href="../custom.css">
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div id="motherdiv">
        <div id="header">
            <h1>How to use mysql_query() and other functions?</h1>
            <hr>
        </div>

        <div id="main-container">
            <div id="side-menu">
                <ul id="web_nav">
                <li><a href="#">Introduction</a></li>
                <li><a href="#">Database Connection</a></li>
                </ul>
            </div>

            <div id="main-content">

            <section>
                <h2>MYSQL</h2>
                <p class="important">This extension is deprecated as of PHP 5.5.0, and has been removed as of PHP 7.0.0.</p>
                <hr>
            </section>

            <section>
                <h2>Database Connection</h2>
                <p>This section lists the steps for how to connect to a database under this extension.</p>
                <div class="code-block">
                    <pre>
    $hostname = "localhost";
    $user = "root";
    $password = "admin";
    $database = "employees";

    mysql_connect($hostname, $user, $password);
    mysql_set_charset('utf8');
    @mysql_select_db($database) or die( "Unable to select database");
    mysql_query("SET NAMES 'utf8'");
                    </pre>
                </div>
                <hr>
            </section>

            </div>
        </div>
    </div>
        <?php include "foot_script.php"; ?>
    </body>
</html>

<?php require_once('db_close.php'); ?>
