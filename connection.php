<?php

$con=new mysqli('localhost','root','','acm_lab');

if($con){
    echo "";
}else {
    die(mysqli_error($con));
}

?>