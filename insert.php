<?php

   $connect = mysqli_connect("localhost","root","","ajax_tweet");
   $sql = "INSERT INTO tbl_tweet (tweet) VALUES('".$_POST["tweet"]."')";
   mysqli_query($connect, $sql);
?>