<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$db="test";
$conn=new mysqli($dbhost,$dbuser,$dbpass,$db);
//if($conn->Connect-error){
 //  echo"ERROR - 404";
//}else{
//echo "connected ";
//}
$username = $_POST['firstname'];
$password = $_POST['pwd'];
//echo $username;
//echo $password;
$sql= "SELECT *FROM regestration WHERE firstname='$username' AND pwd='$password'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
if($row['firstname']==$username && $row['pwd'] == $password)
{
    echo"<script>location.replace('home.html')</script>";
    ;
}else{
    echo"<script>window.alert('check your username or password')</script>";
    echo"<script>location.replace('login.html')</script>";
}
?>