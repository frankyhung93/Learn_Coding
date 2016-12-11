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
                <li><a href="#intro_sec">Summary</a></li>
                <li><a href="#substr_sec">Returns any portion of a string</a></li>
                <li><a href="#strlen_sec">Returns string length</a></li>
                <li><a href="#strstr_sec">Returns parted-string on 1st (string) occ.</a></li>
                <li><a href="#trim_sec">Trimming whitespaces(or others) off</a></li>
                <li><a href="#str_replace_sec">Replacing specified string parts</a></li>
                <li><a href="#strcmp_sec">Compares two strings</a></li>
                <li><a href="#strpos_sec">Returns needle position</a></li>
                </ul>
            </div>

            <div id="main-content">

			<section id="intro_sec"><a name="intro_sec"></a>
                <h2>Summary of the Useful functions</h2>
                <ul>
                	<li class="code_highlight"><a href="#substr_sec">substr</a></li>
                	<li class="code_highlight"><a href="#strlen_sec">strlen</a></li>
                	<li class="code_highlight"><a href="#strstr_sec">strstr</a></li>
                	<li class="code_highlight"><a href="#trim_sec">trim</a></li>
                	<li class="code_highlight"><a href="#str_replace_sec">str_replace</a></li>
                	<li class="code_highlight"><a href="#strcmp_sec">strcmp</a></li>
                	<li class="code_highlight"><a href="#strpos_sec">strpos</a></li>
                </ul>
                <hr>
            </section>             

            <section id="substr_sec"><a name="substr_sec"></a>
                <h2>substr (PHP 4,5,7)</h2>
                <p class="important">string substr ( string $string , int $start [, int $length ] )</p>
                <p>Returns the portion of string specified by the start and length parameters.</p>
                <p class="important">Returns FALSE if "start" is out of bounds</p>
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
                <p class="important">Returns FALSE if needle is not found</p>
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

            <section id="trim_sec"><a name="trim_sec"></a>
                <h2>trim (PHP 4,5,7)</h2>
                <p class="important">string trim ( string $str [, string $character_mask = " \t\n\r\0\x0B" ] )</p>
                <p>trim — Strip whitespace (or other characters) from the beginning and end of a string</p>
                <p>By Default, if second parameter isn't specified, the function will trim these characters:</p>
                <ul>
                	<li>" " (ASCII 32 (0x20)), an ordinary space.</li>
                	<li>"\t" (ASCII 9 (0x09)), a tab.</li>
                	<li>"\n" (ASCII 10 (0x0A)), a new line (line feed).</li>
                	<li>"\r" (ASCII 13 (0x0D)), a carriage return.</li>
                	<li>"\0" (ASCII 0 (0x00)), the NUL-byte.</li>
                	<li>"\x0B" (ASCII 11 (0x0B)), a vertical tab.</li>
                </ul>
                <div class="code-block">
                <pre>
    $text   = "\t\tMan this is hard...\n";
    $binary = "\x09Example string\x0A";
    $trimmed = trim($text);
    var_dump($trimmed); // outputs "Man this is hard..."
    
    echo var_dump(trim($binary)); // outputs "Example string"
    
    echo var_dump(trim($text, "\tM.\n")); // outputs "<?=trim("\t\tMan this is hard...\n", "\tM.\n")?>"
                </pre>
                </div>
                <p><span class="code_highlight">Character Mask: </span> (Optional) Simply list all characters that you want to be stripped. With .. you can specify a range of characters.</p>
                <hr>
            </section>

            <section id="str_replace_sec"><a name="str_replace_sec"></a>
                <h2>str_replace (PHP 4,5,7)</h2>
                <p class="important">mixed str_replace ( mixed $search , mixed $replace , mixed $subject [, int &$count ] )</p>
                <p>Replace all occurrences of the search string with the replacement string</p>
                <p>This function returns a string or an array with all occurrences of <span class="code_highlight">search</span> in <span class="code_highlight">subject</span> replaced with the given <span class="code_highlight">replace</span> value.</p>
                <p class="important">Returns the original string if search fails</p>
                <div class="code-block">
                <pre>
    $dummyText = "Hey guys, Let's EAT! I'm so fucking hungry";
    echo $stomach = <span class="code_highlight">str_replace("hungry", "full", $dummyText)</span>;
    // above output: <?php $dummyText = "Hey guys, Let's EAT! I'm so fucking hungry"; echo $stomach = str_replace("hangry", "full", $dummyText)    ;?>
    
    
    $vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
    echo $stmch = <span class="code_highlight">str_replace($vowels, "", $dummyText)</span>; 
    // above output: <?php $vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U"); echo $stmch = str_replace($vowels, "", $dummyText    );?>
    
    
    // Provides: You should eat pizza, beer, and ice cream every day
    $phrase  = "You should eat fruits, vegetables, and fiber every day.";
    $healthy = array("fruits", "vegetables", "fiber");
    $yummy   = array("pizza", "beer", "ice cream");
    
    echo $newphrase = str_replace($healthy, $yummy, $phrase);
    // above output: <?php 
    $phrase  = "You should eat fruits, vegetables, and fiber every day.";
    $healthy = array("fruits", "vegetables", "fiber");
    $yummy   = array("pizza", "beer", "ice cream");
    echo $newphrase = str_replace($healthy, $yummy, $phrase);
    ?>
    
    
    $letters = array('a', 'p');
    $fruit   = array('apple', 'pear');
    $text    = 'a p';
    $output  = str_replace($letters, $fruit, $text);
    // above output: apearpearle pear
                </pre>
                </div>
                <p>parameter <span class="code_highlight">count</span>: If passed, this will be set to the number of replacements performed. </p>
                <p class="important">Remember, the subject can also be an array too. (which then returns in array type)</p>
                <hr>
            </section>     

			<section id="strcmp_sec"><a name="strcmp_sec"></a>
                <h2>strcmp (PHP 4,5,7)</h2>
                <p class="important">int strcmp ( string $str1 , string $str2 )</p>
                <p>Binary safe plus case-sensitive string comparison</p>
                <div class="code-block">
                <pre>
    // Detailed explanation about the concept of "binary-safe"
    In C (and other machine-level languages), strings are often 
    represented internally by a pointer to a memory segment that 
    contains the data. The way that a string is terminated, 
    is by a special marker (a byte-value of 0 aka. the null byte). 
    This means that such strings can not contain the value 0, 
    since it would end the string. This works because most 
    charsets doesn't use the first couple of bytes to represent 
    characters, but it won't work if you try to store something 
    other than strings. Another way of storing strings would be 
    a pointer + an integer that holds the length of the string. 
    With this approach, the contents of the string doesn't matter, 
    so it can hold a 0 byte. It makes the management of the string 
    more complicated though, since you have to pass two values 
    (pointer+length), instead of just one.
    
    So, generally speaking, a binary-safe function is one 
    where the contents of the string doesn't matter.

    //Examples:
    $str1 = "Do you know?";
    $str2 = "Do"." you".' know'."?";
    echo strcmp($str1, $str2); // output 0

    $str3 = "Do you not know?";
    echo strcmp($str1, $str3); // output -1
    echo strcmp($str3, $str1); // output 1
                </pre>
                </div>
                <p><span class="code_highlight">Returns < 0</span> if str1 is less than str2; <span class="code_highlight">> 0</span> if str1 is greater than str2, <span class="code_highlight">and 0</span> if they are equal.</p>
                <hr>
            </section>

			<section id="strpos_sec"><a name="strpos_sec"></a>
                <h2>strpos (PHP 4,5,7)</h2>
                <p class="important">mixed strpos ( string $haystack , mixed $needle [, int $offset = 0 ] )</p>
                <p>Find the numeric position of the first occurrence of a substring in a string</p>
                <p class="important">Returns FALSE if needle not found.</p>
                <p class="important">Use "===" to test for "FALSE" value returned</p>
                <div class="code-block">
                <pre>
    $str = "Games are my wives!";
    $needle = "are";
    echo strpos($str, $needle); // outputs <?php echo strpos("Games are my wives!", "are");?> 
    echo strpos($str, "w"); // outputs <?php echo strpos("Games are my wives!", "w");?> 
    echo strpos($str, "w", 14); // no output since: <?php if (FALSE===strpos("Games are my wives!", "w", 14)) echo "FALSE";?> 
                </pre>
                </div>
                <p>The negative offset is not strictly tested</p>
                <p>Positive offset should be working: index from start of string</p>
                <p><span class="code_highlight">strrpos</span> : Almost everthing the same except it searches for the last occurence...</p>
                <hr>
            </section>

<!--    /// section template         
			<section id="abc"><a name="abc"></a>
                <h2></h2>
                <p class="important"></p>
                <p></p>
                <div class="code-block">
                <pre>

                </pre>
                </div>
                <hr>
            </section> 
-->

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