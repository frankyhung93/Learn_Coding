<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Learn PHP - Strings</title>
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
            <h1>String Functions (Basics)</h1>
            <a href="basics.php">Prev</a> | <a href="index.php">Table of Contents</a> | <a href="functions_adv.php">Next</a>
            <hr>
        </div>

        <div id="main-container">
            <div id="side-menu" class="sticky">
                <ul id="web_nav">
                <li><a href="#substr_sec">Returns any portion of a string</a></li>
                <li><a href="#strlen_sec">Returns string length</a></li>
                <li><a href="#strstr_sec">Returns parted-string on first (string) occurrence</a></li>
                </ul>
            </div>

            <div id="main-content">

            <section id="substr_sec"><a name="substr_sec"></a>
                <h2>substr (PHP 4,5,7)</h2>
                <p class="important">string substr ( string $string , int $start [, int $length ] )</p>
                <p>Returns the portion of string specified by the start and length parameters.</p>
                <p class="code_highlight"></p>
                <div class="code-block">
                <pre>
    $str = "abc_activity";
    $part = substr($str, -8);
    echo $part; // output "activity"

    $part2 = substr($str, 4);
    echo $part2; // output "activity" 

    $part3 = substr($str, 15); // $part3 === FALSE
                </pre>
                </div>
                <p><span class="code_highlight">start >= 0 : </span> from start'th position, counting from string's start (index: 0)</p>
                <p><span class="code_highlight">start < 0 : </span> from start'th character, counting from string's end</p>
                <div class="code-block">
                <pre>
    $str = "Ghost in the Shell";
    echo $part1 = substr($str, 6, 6); // output "in the"

    echo $part2 = substr($str, 0, -2); // output "Ghost in the She"
                </pre>
                </div>
                <p><span class="code_highlight">length > 0 : </span> Number of characters from start</p>
                <p><span class="code_highlight">length < 0 : </span> Number of characters omitted from the end</p>
                <hr>
            </section>

            <section id="strlen_sec"><a name="strlen_sec"></a>
                <h2>strlen (PHP 4,5,7)</h2>
                <p class="important">int strlen ( string $string )</p>
                <p>Returns the length of the given string in "int" type.</p>
                <div class="code-block">
                <pre>
    $str = "Ghost in the Shell";
    echo strlen($str); // output 18

    $int = 56778;
    echo strlen($int); // output 5

    echo strlen(TRUE); // output 1
    echo strlen(FALSE); // output 0
                </pre>
                </div>
                <hr>
            </section>

            <section id="strstr_sec"><a name="strstr_sec"></a>
                <h2>strstr (PHP 4,5,7)</h2>
                <p class="important">string strstr ( string $haystack , mixed $needle [, bool $before_needle = false ] )</p>
                <p class="code_highlight">strstr — Find the first occurrence of a string</p>
                <p>Returns part of haystack string starting from and including the first occurrence of needle to the end of haystack.</p>
                <div class="code-block">
                <pre>
    $str = "frankyhung93@gmail.com";

    // ASCII code for "@" is 64
    echo strstr($str, 64); // output "@gmail.com"
    echo strstr($str, "@"); // output "@gmail.com"
    echo strstr($str, "hung"); // output "hung93@gmail.com"

    //As of PHP5.3, the third parameter is added to the function
    echo strstr($str, "@", true); // output "frankyhung93"
                </pre>
                </div>
                <p class="code_highlight">This function is case-sensitive. For case-insensitive searches, use <span class="important">stristr()</span>.</p>
                <p class="code_highlight">If needle is not a string, it is converted to an integer and applied as the ordinal value of a character.</p>
                <hr>
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