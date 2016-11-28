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
            <h1>The Improved PHP MySQL extension</h1>
            <hr>
        </div>

        <div id="main-container">
            <div id="side-menu" class="sticky">
                <ul id="web_nav">
                <li><a href="#intro_sec">Introduction</a></li>
                <li><a href="#db_con_sec">Database Connection</a></li>
                <li><a href="#query_sec">Query and data processing</a></li>
                <li><a href="#err_sec">Showing errors</a></li>
                <li><a href="#prep_sec">Prepared Statements</a></li>
                <li><a href="#stored_sec">Stored Procedures</a></li>
                <li><a href="#trans_sec">Transactions</a></li>
                <li><a href="#play_sec">Playground</a></li>
                </ul>
            </div>

            <div id="main-content">

            <section id="intro_sec"><a name="intro_sec"></a>
                <h2>MYSQLi</h2>
                <p class="important">The mysqli extension allows you to access the functionality provided by MySQL 4.1 and above. It supports the procedural and object-oriented programming paradigm with the later one preferred in most cases for cleaner and more readible code. One edge of mysqli over mysql extension is the Prepared Statements. Bound parameters do not need to be escaped as they are never substituted into the query string directly.</p>
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
    
    $mysqli = new mysqli($hostname, $user, $password, $database);
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit;
    }
    if (!$mysqli->set_charset("utf8")) {
        printf("Error loading character set utf8: %s\n", $mysqli->error);
        exit;
    }
                </pre>
                </div>
                <p>There is also the procedural way to do it. But we would stick to the OO way in this reference.</p>
                <hr>
            </section>

            <section id="query_sec"><a name="query_sec"></a>
                <h2>Query and data processing</h2>
                <p>mysqli_query() combines statement execution and <span class="code_highlight">result set buffering</span>.</p>
                <p>Client-side result set buffering allows the server to free resources associated with the statement results as early as possible. PHP applications can navigate freely through buffered results. Navigation is fast because the result sets are held in client memory. Please, keep in mind that it is often easier to <span class="code_highlight">scale by client</span> than it is to scale the server.</p>
                <div class="code-block">
                <pre>
    $res = $mysqli->query("SELECT id FROM employees ORDER BY id ASC");

    // Forward Order
    $res->data_seek(0);
    while ($row = $res->fetch_array()) {
        echo " id = " . $row['id'] . "\n";
    }

    // Reverse Order
    for ($row_no = $res->num_rows - 1; $row_no >= 0; $row_no--) {
        $res->data_seek($row_no);
        $row = $res->fetch_array();
        echo " id = " . $row['id'] . "\n";
    }
                </pre>
                </div>
                <p><span class="code_highlight">$mysqli->query()</span> returns FALSE on failure. For successful SELECT, SHOW, DESCRIBE or EXPLAIN queries mysqli_query() will return a mysqli_result object. For other successful queries mysqli_query() will return TRUE.</p>
                <p><span class="code_highlight">$mysqli->fetch_array()</span> is an extended version of the mysqli_fetch_row() function. In addition to storing the data in the numeric indices of the result array, the mysqli_fetch_array() function can also store the data in associative indices, using the field names of the result set as keys. Actually the buffer pointer points at the zeroth indice just after the $res is loaded with data. "$res->data_seek(0)" is usually used to loop the result set once again from the start.</p>
                <p><span class="code_highlight">$mysqli->fetch_row()</span> only fetches one row of data from the result set and returns it as an enumerated array, where each column is stored in an array offset starting from 0 (zero).</p>
                <p><span class="code_highlight">$mysqli->fetch_assoc()</span> returns an associative array that corresponds to the fetched row or NULL if there are no more rows.</p>
                <p><span class="code_highlight">$mysqli->affected_rows</span> returns an integer greater than zero indicates the number of rows affected or retrieved. Zero indicates that no records were updated for an UPDATE statement, no rows matched the WHERE clause in the query or that no query has yet been executed. -1 indicates that the query returned an error.</p>
                <p><span class="code_highlight">$mysqli->insert_id</span> returns the ID generated by a query on a table with a column having the AUTO_INCREMENT attribute. If the last query wasn't an INSERT or UPDATE statement or if the modified table does not have a column with the AUTO_INCREMENT attribute, this function will return zero.</p>
                <hr>
            </section>

            <section id="err_sec"><a name="err_sec"></a>
                <h2>Showing SQL errors</h2>
                <p>The attributes accessed here are "errno" and "error".</p>
                <div class="code-block">
                <pre>
    if (!$mysqli->query("DROP TABLE IF EXISTS test") ||
        !$mysqli->query("CREATE TABLE test(id INT)") ||
        !$mysqli->query("INSERT INTO test(id) VALUES (1)")) {
        echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }
                </pre>
                </div>
                <p>Use <span class="code_highlight">$statement->error</span> if the error relates to a statement expression.</p>
                <hr>
            </section>

            <section id="prep_sec"><a name="prep_sec"></a>
                <h2>Prepared Statements</h2>
                <p>At the prepare stage a statement template is sent to the database server. The server performs a syntax check and initializes server internal resources for later use. The MySQL server supports using anonymous, positional placeholder with ?.</p>
                <div class="code-block">
                <pre>
    /* Prepared statement, stage 1: prepare */
    if (!($stmt = $mysqli->prepare("INSERT INTO test(id) VALUES (?)"))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    /* Prepared statement, stage 2: bind and execute */
    $id = 1;
    if (!$stmt->bind_param("i", $id)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
                </pre>
                </div>

                <p>A more complicated example with LIKE operators and <span class="code_highlight">$statement->get_result()</span> + <span class="code_highlight">$result->fetch_assoc()</span> methods</p>
                <div class="code-block">
                <pre>
    /* A more complicated example */
    $member_name = "%$member_name%";
    $member_number = "%$member_number%";
    ...
    $stmt = $mysqli->prepare("SELECT ... WHERE
                            (CONCAT(`chi_last_name`, `chi_first_name`) LIKE ? OR CONCAT(`eng_last_name`, ' ', `eng_first_name`) LIKE ?) AND
                            (`member_id` LIKE ? OR `member_id` IS NULL OR `member_id` = '') AND 
                            $idn_str AND $atn_str AND
                            att.`status` = 1 AND con.`status` = 1 AND att.`parent_id` = ?
                            ");
    $stmt->bind_param("sssi", $member_name, $member_name, $member_number, $event_id); //must provide only variable, not php expr
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    // or use while-loop to fetch through the $res
                </pre>
                </div>

                <p>Another way of fetching results by <span class="code_highlight">$statement->bind_result($X, $Y, $....)</span> + <span class="code_highlight">$statement->fetch()</span></p>
                <div class="code-block">
                <pre>
    ...
    $stmt->execute();
    $stmt->bind_result($name, $code);
    while ($stmt->fetch()) {
        printf ("%s (%s)\n", $name, $code);
    }
                </pre>
                </div>
                <p>Comparing the above two methods of result fetching:</p>
                <p>Using <span class="code_highlight">$statement->bind_result(): (PHP 5, PHP 7)</span> Prepared statements return unbuffered result sets by default. If a client fails to fetch all results or the client closes the statement before having fetched all data, the data has to be fetched implicitly by mysqli.</p>
                <p>Using <span class="code_highlight">$statement->get_result(): (PHP 5 >= 5.3.0, PHP 7)</span> Using the mysqli_result interface offers buffered result set which implies the additional benefit of flexible client-side result set navigation. (can use data_seek(int) on the buffered result set)</p>
                <p><span class="code_highlight">$statement->free_result()</span> frees the result memory associated with the statement, which was allocated by mysqli_stmt_store_result().</p>
                <p><span class="code_highlight">$statement->close()</span> closes a prepared statement. mysqli_stmt_close() also deallocates the statement handle. If the current statement has pending or unread results, this function cancels them so that the next query can be executed.</p>
                <hr>
            </section>

            <section id="stored_sec"><a name="stored_sec"></a>
                <h2>Stored Procedures</h2>
                <p>Stored procedures can have IN, INOUT and OUT parameters, depending on the MySQL version. The mysqli interface has no special notion for the different kinds of parameters.</p>
                <div class="code-block">
                <pre>
    $mysqli->query(
        "CREATE PROCEDURE p(IN id_val INT) BEGIN INSERT INTO test(id) VALUES(id_val); END;"
    );

    if (!$mysqli->query("CALL p(1)")) {
        echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    if (!($res = $mysqli->query("SELECT id FROM test"))) {
        echo "SELECT failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    var_dump($res->fetch_assoc());
                </pre>
                </div>
                <p>Input parameters are provided with the CALL statement. Please, make sure values are <span class="code_highlight">escaped correctly</span>.</p>
                <hr>
            </section>

            <section id="trans_sec"><a name="trans_sec"></a>
                <h2>Transactions</h2>
                <p>Stored procedures can have IN, INOUT and OUT parameters, depending on the MySQL version. The mysqli interface has no special notion for the different kinds of parameters. Since MySQL 5.5, the default storage engine is InnoDB. InnoDB has full ACID transaction support.</p>
                <p class="important">MyISAM vs InnoDB:      </p>
                <p>"First major difference I see is that InnoDB implements row-level lock while MyISAM can do only a table-level lock. You will find better crash recovery in InnoDB. However, it doesn't have FULLTEXT search indexes, as does MyISAM. <span class="code_highlight">InnoDB also implements transactions, foreign keys and relationship constraints while MyISAM does not.</span>" - http://stackoverflow.com/questions/17918310/commit-and-rollback-not-work-in-mysqls-myisam</p>
                <div class="code-block">
                <pre>
    /* activate reporting */
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli->autocommit(false);

    try {
        $res1 = $mysqli->query($sql1);
        $res2 = $mysqli->query($sql2);
        $res3 = $mysqli->query($sql3);
        $mysqli->commit();
    } catch (mysqli_sql_exception $e) {
        $mysqli->rollback();
        echo $e->__toString();
    }
    /* switch back autocommit status */
    $mysqli->autocommit(TRUE);
    mysqli_report(MYSQLI_REPORT_OFF);
                </pre>
                </div>
                <p><span class="code_highlight">mysqli_report()</span>: Be very careful using this function - it's a per-process setting. If your server is set up to reuse a single PHP process for multiple requests, that means the last setting of this function in any script will affect all other scripts using mysqli. To be safe always call "mysqli_report(MYSQLI_REPORT_OFF)" at the end of a script.</p>
                <hr>
            </section>            

            <section id="play_sec"><a name="play_sec"></a>
                <h2>Playground</h2>
                <p>Here we play with the "employees" database.</p>
                <p>coming soon...</p>
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
