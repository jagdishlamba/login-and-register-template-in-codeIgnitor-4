<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$host="localhost";
$username="root";
$password="Cosf15f1911@lcshp";
$dbname="ci";
$conn=mysqli_connect($host,$username,$password,$dbname);
$insert="insert into contact (name,email,phone,message) values('$name','$email_address','$phone','$message')";

$run_insert=mysqli_query($conn,$insert);
if($run_insert){
	return true;
}   
else {
	return true;
}
?>