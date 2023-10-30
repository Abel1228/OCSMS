<?php
@session_start();
$id= $_SESSION['alogin'];
$user_name=$_SESSION['blogin'];
//$id=$_GET['updateid'];
$conn = mysqli_connect('localhost','root','','ocsms');
$select = "select *from login where ID='$id'";
//$select =mysqli_query($conn, "select *from login where ID='$id'");

$query = mysqli_query($conn,$select);

if ($_SESSION['alogin']) {

}
else{
    header("location:../login.php");
}
?>
<?php 

if(isset($_POST['update'])){
        $photoname=$_FILES['photo']['name'];
        $tempo=$_FILES['photo']['tmp_name'];
        $storage="../uploads/".$photoname;
        $photo=' select*from login ';
        $photoquery=mysqli_query($conn,$photo);
          if($photoquery){
            move_uploaded_file($tempo,$storage);
          }
          else{
      
          }
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $oldpass=$_POST['old'];
  $new=$_POST['new'];
  $confirm=$_POST['confirm'];

  $select ="select *from login where ID='$id' AND pass_word='$oldpass'";
  $query=mysqli_query ($conn,$select);
$row=mysqli_fetch_assoc($query);
if($row>0){
if($new==$confirm){
   $sql = "UPDATE login SET  email='$email', phone_no='$phone', pass_word='$new', location='$photoname' where user_name='$user_name'";
  $result = mysqli_query($conn,$sql);

  if($result){
    header('location:personal_detail.php');
    }
    else{
      $error[] = 'FAILED TO UPDATE';

    }
}
else{
  $error[] = 'Password mismatched';
}
// $id=$_GET['updateid'];
 


}
else{
  $error[] = 'Incorrect old password';
}
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profile for sudents</title>
    <link rel="stylesheet" href="../edit_profile.css">

    <style>  #error-msg{
			
			color:rgb(255, 94, 94);
	
		}
    @media (max-width :1200px) {
    #content{
        margin:auto;
        width:60%;
    }
}
            @media (max-width :700px) {
    
    #content{
        margin: auto;
        width: 90%;
    }
}
    </style>
</head>

<body>

<?php   $row = mysqli_fetch_assoc($query)?>
    <div id="admin" class="hidden">
        <p class="title">Edit Account</p>
        <div id="content">



        <?php if(isset($error)){
            foreach($error as $error){
               echo '<span id="error-msg">'.$error.'</span>';
            };
         };
         ?>
        
           <form action="" method="POST" enctype="multipart/form-data">
           <p style="color:gray;">Enter the current data if you dont want to change</p>
            
            <label>Phone <input class="imp" name="phone"   type="text"></label><br>
            <label>Email <input class="imp" name="email"  type="text"></label><br>
            <label> Current Password <input class="imp" name="old" id="password" type="password"></label><br>
            <label> New Password <input class="imp" name="new" id="password" type="password"></label><br>
            <label>Confirm password <input class="imp" name="confirm" placeholder="confirm password" id="confirm_password" type="password"></label><br>
            <label>Photo<input type="file" name="photo" id="file"  class="custom-file-input" value="choose file" ></label><br>
            <input type='hidden' name='no' value='<?php echo $result['no']; ?>'>
            <button type="submit" name="update" id="add">Update</button>
            <button type="submit" name="cancel" id="can">cancel</button>
           </form>
        </div>


    </div>
</body>

</html>