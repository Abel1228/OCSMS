<?php

@session_start();
$id= $_SESSION['alogin'];
//$user_name=$_SESSION['blogin'];
$conn = mysqli_connect('localhost','root','','ocsms');
$select = "select *from student";
$insert= "select *from cost_table";
//$select =mysqli_query($conn, "select *from login where ID='$id'");

$result = mysqli_query($conn,$select);
$result1=mysqli_query($conn,$insert);
if ($_SESSION['alogin']) {

}
else{
    header("location:../login.php");
}


if(isset($_POST['submit']))
{
  //$photo=$_POST['photo'];
  $photoname=$_FILES['photo']['name'];
  $tempo=$_FILES['photo']['tmp_name'];
  $storage="../uploads/".$photoname;
  $photo=' select *from student  ';
  $photoquery=mysqli_query($conn,$photo);
    if($photoquery){
      move_uploaded_file($tempo,$storage);
    }
    else{

    }

$user_name=$_POST['user_name'];
$first_name=$_POST['first_name'];
$middle_name=$_POST['middle_name'];
$last_name=$_POST['last_name'];


$gender=$_POST['gender'];
$student_nationality=$_POST['student_nationality'];


$student_date_of_birth=$_POST['student_date_of_birth'];


$student_birth_region=$_POST['student_birth_region'];
$student_birth_wereda=$_POST['student_birth_wereda'];
$student_birth_town=$_POST['student_birth_town'];

$mother_name=$_POST['mother_name'];


$mother_region=$_POST['mother_region'];
$mother_wereda=$_POST['mother_wereda'];
$mother_town=$_POST['mother_town'];


$university=$_POST['university'];
$institute=$_POST['institute'];
$acadamic_year=$_POST['acadamic_year'];


$stream=$_POST['stream'];


$date_of_withdraw=$_POST['date_of_withdraw'];


$transfered_university=$_POST['transfered_university'];
$transfered_department=$_POST['transfered_department'];
$date_of_transfer=$_POST['date_of_transfer'];


$in_kind=$_POST['in_kind'];
$in_cash=$_POST['in_cash'];


$education_expence=$_POST['education_expence'];
$food_expence=$_POST['food_expence'];
$boarding_expence=$_POST['boarding_expence'];
$total_expence=$_POST['total_expence'];


$paiment_method=$_POST['paiment_method'];



$sql="UPDATE student set first_name='$first_name', middle_name='$middle_name', last_name='$last_name', gender='$gender', student_nationality='$student_nationality',
student_date_of_birth='$student_date_of_birth', student_birth_region='$student_birth_region', student_birth_wereda='$student_birth_wereda',
 student_birth_town='$student_birth_town', mother_name='$mother_name', mother_region='$mother_region', mother_wereda='$mother_wereda', mother_town='$mother_town' ,
university='$university', institute='$institute', acadamic_year='$acadamic_year', stream='$stream', date_of_withdraw='$date_of_withdraw', 
transfered_university='$transfered_university', transfered_department='$transfered_department', 
date_of_transfer='$date_of_transfer', paiment_method='$paiment_method',  location='$photoname', status= 1 where user_name='$user_name'  ";


$sqli="INSERT INTO cost_table (user_name, acadamic_year, in_kind, in_cash ,food_expence,education_expence, 
boarding_expence,total_expence)
VALUES ('$user_name','$acadamic_year','$in_kind','$in_cash','$food_expence','$education_expence',
'$boarding_expence','$total_expence')";

$upd=mysqli_query($conn,$sql);
$ins=mysqli_query($conn,$sqli);
if($upd){
  if($ins){
  header('location:home.php');
}}
else echo 'error';


}
?>









