<?php
require_once('db_connect.php');

$depts = mysql_query("SELECT * FROM `departments`");
if (!$depts) {
    echo mysql_error(); exit;
}

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
            <h1>The Original PHP MySQL extension</h1>
            <hr>
        </div>

        <div id="main-container">
            <div id="side-menu" class="sticky">
                <ul id="web_nav">
                <li><a href="#intro_sec">Introduction</a></li>
                <li><a href="#db_con_sec">Database Connection</a></li>
                <li><a href="#query_sec">Query and data processing</a></li>
                <li><a href="#exp_sec">Example</a></li>
                </ul>
            </div>

            <div id="main-content">

            <section id="intro_sec"><a name="intro_sec"></a>
                <h2>MYSQL</h2>
                <p class="important">This extension is deprecated as of PHP 5.5.0, and has been removed as of PHP 7.0.0.</p>
                <hr>
            </section>

            <section id="db_con_sec"><a name="db_con_sec"></a>
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
                <p>There is a more generic/proper way by listing the $link identifier in the methods</p>
                <div class="code-block">
                <pre>
    $hostname = "localhost";
    $user = "root";
    $password = "admin";
    $database = "employees";
    
    $link = mysql_connect($hostname, $user, $password);
    mysql_set_charset('utf8', $link);
    @mysql_select_db($database, $link) or die( "Unable to select database");
    mysql_query("SET NAMES 'utf8'", $link);
    
    ...query statements...
    
    mysql_close($link);
                </pre>
                </div>
                <p>If the link identifier is not specified, the <span class="code_highlight">last link</span> opened by mysql_connect() is assumed.</p>
                <hr>
            </section>

            <section id="query_sec"><a name="query_sec"></a>
                <h2>Query and data processing</h2>
                <p>This section shows how query and result fetching is done</p>
                <div class="code-block">
                <pre>
    $result = mysql_query("SELECT * FROM `departments`");
    
    if (!$result) {
        echo mysql_error();
        exit;
    }

    while ($row = mysql_fetch_array($result)) {
        echo $row['dept_no'].' AND '.$row['dept_name'];
    }

    echo "Total num of depts: ".mysql_num_rows($result);

    //Use mysql_data_seek($result, 0) if data has to be re-looped
    //Use mysql_affected_rows() to find out how many rows were affected by a DELETE, INSERT, REPLACE, or UPDATE statement.
    //Use mysql_insert_id() to retrieve the ID generated for an AUTO_INCREMENT column by the previous query (usually INSERT).
                </pre>
                </div>
                <p>For <span class="code_highlight">mysql_fetch_array()</span>, it has an optional second parameter: By using MYSQL_BOTH (default), you'll get an array with both associative and number indices.</p>
                <hr>
            </section>

            <section id="exp_sec"><a name="exp_sec"></a>
                <h2>Example</h2>
                <p>Here we bring forth an example query result from the "employees" database.</p>
                <div class="code-block">
                    <pre>
    $depts = mysql_query("SELECT * FROM `departments`");
                    </pre>
                </div>
                <br>
                <table border="1">
                    <tr>
                        <th>dept_no</th>
                        <th>dept_name</th>
                    </tr>
                    <?php
                        while ($dept = mysql_fetch_array($depts)) {
                            echo "
                            <tr>
                                <td>$dept[0]</td>
                                <td>$dept[1]</td>
                            <tr>
                            ";
                        }
                    ?>
                </table>
            </section>

            </div>
        </div>
    </div>
        <?php include "foot_script.php"; ?>
        <script src="../stickyfill.js"></script><!-- https://github.com/wilddeer/stickyfill -->
        <script type="text/javascript">
            $(document).ready(function(){
                $("#side-menu").Stickyfill();
            });            
        </script>
    </body>
</html>

<?php require_once('db_close.php'); ?>
