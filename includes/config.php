<?php 
// defined('BASEPATH') OR exit('No direct script access allowed');

$host = 'localhost';
$username='root';
$password='6727';
$db='iawd_2';

$con = mysqli_connect($host, $username, $password, $db);

if(!$con){
    echo 'Database Connection Failed';
}