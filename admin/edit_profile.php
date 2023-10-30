<?php

@session_start();
$id= $_SESSION['alogin'];
//$id=$_GET['updateid'];
$user_name= $_SESSION['blogin'];

$conn = mysqli_connect('localhost','root','','ocsms');
$select = "select *from login where ID='$id'";
//$select =mysqli_query($conn, "select *from login where ID='$id'");

$query = mysqli_query($conn,$select);
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

  $select ="select *from login where user_name='$user_name' AND pass_word='$oldpass'";
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
      echo "FAILED TO UPDATE";
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



/*$id=$_GET['updateid'];
if(isset($_POST['update'])){
  
 
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
		
	// $val= $_GET[mysqli_fetch_assoc('status')];
 
	$sql = "UPDATE 'login' SET no='$id' email='$email', phone_no='$phone', password='$password' ";
	$result = mysqli_query($conn,$sql);

	if($result){
	echo"ACCEPTED";
	}
	else{
		echo "FAILED";
	}
}
*/
if ($_SESSION['alogin']) {

}
else{
    header("location:../login.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../nav_style.css">
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
    <div class="wrapper">
        <div id="sidebar">
            <div class="toggle-btn" onclick="toggleSidebar()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <h2><img src="../image/logo.jpg" alt=""></h2>
            <ul>
                <ul><li><a href="home.php"><img class="icon" src="../image/home.png" alt=""> Home</a></li></ul>
                <ul><li><a href="add_user.php"><img class="icon" src="../image/add _user.png" alt="">Add user</a></li></ul>
                <ul><li><a href="personal_detail.php"><img class="icon" src="../image/users.png" alt="">Personal detail</a></li></ul>
                
               
            </ul>
            <a href="../logout.php"><input id="btn2" type="submit" value="logout" ></a>
           
        </div>
        <div id="main_content">
            <div class="header"><p>Ambo University Cost Sharing
            <a href="../logout.php"><input id="btn" type="submit" value="logout" ></a></p>  </div>
            <div class="content">
    
               
            <div id="admin" class="hidden">
        <p class="title">Edit Account</p>
        <div id="content">
           <form action="" method="post" enctype="multipart/form-data">
           <?php if(isset($error)){
            foreach($error as $error){
               echo '<span id="error-msg">'.$error.'</span>';
            };
         };
         ?>

           <p style="color:gray;">Enter the current data if you dont want to change</p>
            
            <label>Phone <input class="imp" name="phone"  type="text" required></label><br>
            <label>Email <input class="imp" name="email"   type="text"></label><br>
            <label> current Password <input class="imp" name="old" id="password" type="password"></label><br>
            <label> New Password <input class="imp" name="new" id="password" type="password"></label><br>
            <label>Confirm password <input class="imp" name="confirm" placeholder="confirm password" id="confirm_password" type="password"></label><br>
            
            <label>Photo <br><input type="file" name="photo" id="file" value="choose file"></label><br>
            
            <input type='hidden' name='no' value='<?php echo $result['no']; ?>'>
            <button type="submit" name="update" id="add">Update</button>
           </form>
        </div>


    </div>

                
             
                
        </div>
    </div>

    <script>
        function toggleSidebar() {
document.getElementById("sidebar").classList.toggle('active');
document.getElementById("main_content").classList.toggle('active');
document.getElementById("main_content").classList.toggle('active1');


            
        }


        function validateImage(id) {
		    var formData = new FormData();
		    var file = document.getElementById(id).files[0];
		    formData.append("Filedata", file);
		    var t = file.type.split('/').pop().toLowerCase();
		    if (t != "jpeg" && t != "jpg" && t != "png") {
		        alert('Please select a valid image file');
		        document.getElementById(id).value = '';
		        return false;
		    }
		    if (file.size > 1050000) {
		        alert('Max Upload size is 1MB only');
		        document.getElementById(id).value = '';
		        return false;
		    }

		    return true;
		}
    </script>
</body>

</html>
