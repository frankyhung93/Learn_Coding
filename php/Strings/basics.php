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
            <h1>String Fundamentals</h1>
            <a href="index.php">Table of Contents</a> | <a href="functions.php">Next</a>
            <hr>
        </div>

        <div id="main-container">
            <div id="side-menu" class="sticky">
                <ul id="web_nav">
                <li><a href="#intro_sec">Introduction</a></li>
                <li><a href="#single_sec">Single Quoted</a></li>
                <li><a href="#double_sec">Double Quoted</a></li>
                </ul>
            </div>

            <div id="main-content">

            <section id="intro_sec"><a name="intro_sec"></a>
                <h2>Strings</h2>
                <p class="important">A String can be specified in 4 different ways</p>
                <ol>
                    <li>Single Quoted</li>
                    <li>Double Quoted</li>
                    <li>Heredoc</li>
                    <li>Nowdoc</li>
                </ol>
                <hr>
            </section>

            <section id="single_sec"><a name="single_sec"></a>
                <h2>Single Quoted</h2>
                <p>Only two exceptions: \' and \\ would escape the later character within the single-quoted string...</p>
                <p class="code_highlight">All other instances with \ in front would print them unescaped (e.g. \r, \n).</p>
                <p class="code_highlight">$variables would not be expanded within '' string too.</p>
                <div class="code-block">
                <pre>
    echo 'Arnold once said: "I\'ll be back"'; (escaped)

    echo 'You deleted C:\\*.*?'; (escaped)

    echo 'This will not expand: \n a newline'; (not escaped)
    echo 'Variables do not $expand $either'; (not escaped)
                </pre>
                </div>
                <hr>
            </section>

            <section id="double_sec"><a name="double_sec"></a>
                <h2>Double Quoted</h2>
                <p>Here is an overview of the escape sequence in Double Quotes</p>
                <table class="simple-table">
                    <tr>
                        <th>Sequence</th>
                        <th>Meaning</th>
                    </tr>
                    <tr>
                        <td>\n</td>
                        <td>linefeed / newline</td>
                    </tr>
                    <tr>
                        <td>\r</td>
                        <td>carriage return</td>
                    </tr>
                    <tr>
                        <td>\t</td>
                        <td>horizontal tab</td>
                    </tr>
                    <tr>
                        <td>\v</td>
                        <td>vertical tab (>= PHP 5.25)</td>
                    </tr>
                    <tr>
                        <td>\e</td>
                        <td>escape (>= PHP 5.44)</td>
                    </tr>
                    <tr>
                        <td>\f</td>
                        <td>form feed (>= PHP 5.25)</td>
                    </tr>
                    <tr>
                        <td>\\</td>
                        <td>Backslash</td>
                    </tr>
                    <tr>
                        <td>\$</td>
                        <td>Dollar Sign</td>
                    </tr>
                    <tr>
                        <td>\"</td>
                        <td>Double Quote</td>
                    </tr>
                </table>
                <p><span class="code_highlight">\[0-7]{1,3}</span> - the sequence of characters matching the regular expression is a character in octal notation, which silently overflows to fit in a byte (e.g. "\400" === "\000")</p>
                <p><span class="code_highlight">\x[0-9A-Fa-f]{1,2}</span> - the sequence of characters matching the regular expression is a character in hexadecimal notation</p>
                <p><span class="code_highlight">\u{[0-9A-Fa-f]+}</span> - the sequence of characters matching the regular expression is a Unicode codepoint, which will be output to the string as that codepoint's UTF-8 representation (added in PHP 7.0.0)</p>
                <p class="important">Double Quotes are usually used to expand PHP $variables!</p>
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