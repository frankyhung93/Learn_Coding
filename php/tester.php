<?php
$raw = get_defined_functions();
$defined_functions_array = $raw["internal"];
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Learn PHP - Tester</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include "head_script.php"; ?>
        <link rel="stylesheet" href="custom.css">
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div id="motherdiv" style="width: 100%;">
        <div id="header" style="padding: 15px;">
            <div id="run_div">
                <button id="run_button" class="run_button">RUN</button>
            </div>
            <div id="code_div">
                <textarea id="code_placeholder" style="width: 100%; height: 100%;"></textarea>
            </div>
        </div>

        <div id="main-container">

        </div>
    </div>
        <?php include "foot_script.php"; ?>
    </body>

<script type="text/javascript">
    $(function() {
        $("#run_button").click(function() {
            var code_content = $("#code_placeholder").val();
            $.get(
                "eval_code.php",
                {code: code_content},
                function(data) {
                    $("#main-container").html(data);
                },
                "text"
                )
        });
    });
</script>

</html>