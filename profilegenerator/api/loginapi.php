<?php
$username = $_POST['username'];

$gg = file_get_contents("https://api.roblox.com/users/get-by-username?username=$username");
$data = json_decode($gg);
if(property_exists($data,'errorMessage')){
    echo 'Not Exist';
 }
 else{
     echo $data->Id;
 }
?>