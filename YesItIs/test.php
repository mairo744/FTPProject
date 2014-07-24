<?php
/**
 * Created by PhpStorm.
 * User: mairo744
 * Date: 21.7.2014
 * Time: 20:48
 */

?>

<!DOCTYPE html>
<html>
<head>
    <title>Test comunication Yii and jQuery</title>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        var SERVIS = "/YesItIs/index.php/user/";
        var innerHTML = '';

        $.post(SERVIS + "getusers", function(data) {

            var res = JSON.parse(data);


            for (var i = 0; i < res.length; i++) {
                innerHTML += res[i]["name"] + "<br/>";

            }
            $("#getusers").append(innerHTML);
        });

        $.post(SERVIS + "getuser", {
            id : 2
        },function(data) {

            $("#getuser").append(data);

        });

    });
</script>


</head>
<body>


    <div id="getusers">
        <b> Tu najdete mena uzivatelov: </b> <br/>
    </div>
    <div id="getuser">
        <b> Uzivatel s id 2: </b>
    </div>
</body>
</html>