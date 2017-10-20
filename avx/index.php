<!DOCTYPE html>
<html>
<head>
    <title>Avxhome</title>
    <meta charset="UTF-8">
    <base href="http://avxhome.in" target="_blank">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
    <style>
        body {
            font-family:"Helvetica";
        }
        div { text-align:center; }
        .title-link {
             display: none;
             color:#a52a2a; 
             font-size:16px;
             font-weight:500;
             text-decoration:none;
             text-transform:none;
        }
        #pgdn {
            box-sizing: border-box;
            font-size: 40px;
            width: 50px;
            height: 50px;
            background-color: cornsilk;
            border: 1px solid black;
            text-align: center;
            position: fixed;
            left: 60%;
            bottom: 10%;
        }
        img {
            width: 200px;
        }
    </style>
    <script>
        function pageScroll() {
            window.scrollBy(0, window.innerHeight);
        }
    </script>
</head>
<body>
    <div id="pgdn" onclick="pageScroll()">&mapstodown;</div>
<?php 
ob_implicit_flush(true);
require 'simple_html_dom.php';


for($i = 1; $i <= 69; $i++) {
    $html = file_get_html("http://avxhome.in/pages/" . $i);
    foreach($html->find('script') as $crap) { $crap->innertext=""; }
    
    foreach($html->find('div[class=article]') as $element) {
        echo $element;
    }
    //for($k = 0; $k < 40000; $k++) { echo ' '; }
    sleep(5);
}


//<div class="col-md-12 article">
?>
</body>
</html>

