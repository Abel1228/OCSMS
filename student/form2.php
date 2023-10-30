<?php
@session_start();
//$id= $_SESSION['alogin'];
$user_name=$_SESSION['blogin'];
$conn = mysqli_connect('localhost','root','','ocsms');
$select = "select *from student";
//$result = mysqli_query($conn,$select);

if ($_SESSION['alogin']) {

}
else{
    header("location:../login.php");
}


if(isset($_POST['submit']))
{
  
  $username=$_POST['user_name'];
  

$acadamic_year=$_POST['acadamic_year'];
$department=$_POST['department'];
$in_kind=$_POST['in_kind'];
$in_cash=$_POST['in_cash'];


$education_expence=$_POST['education_expence'];
$food_expence=$_POST['food_expence'];
$boarding_expence=$_POST['boarding_expence'];
$total_expence=$_POST['total_expence'];

$rese=mysqli_query($conn,"select *from student where user_name='$username'");
$fet=mysqli_fetch_assoc($rese);
  $year=$fet['year'];

$sql="INSERT INTO cost_table (user_name, acadamic_year, year, in_kind, in_cash ,food_expence,education_expence, 
boarding_expence,total_expence)
VALUES ('$username','$acadamic_year','$year','$in_kind','$in_cash','$food_expence','$education_expence',
'$boarding_expence','$total_expence')";
$ins=mysqli_query($conn,$sql);

$sqli="UPDATE student set status=1, department='$department' where user_name='$username'";
$upd=mysqli_query($conn,$sqli);

  if($ins){
  header('location:home.php');
}
else echo 'error'. $conn->connect_error;




}


?>









