<?php
@session_start();
if(isset($_POST['login'])){
    $username= $_POST['user_name'];
    $password= $_POST['password'];
    $conn=new mysqli("localhost", "root", "", "ocsms");
	
    $login="SELECT * FROM login WHERE user_name='$username' AND pass_word='$password'";
	$query = mysqli_query($conn,$login);
	$count=mysqli_num_rows($query);
	if($count>0){
		while($row=mysqli_fetch_assoc($query)){
			if($row['role']=='student'){
				$_SESSION['alogin']=$row['ID'];
				$_SESSION['dept']=$row['department'];
				header("Location:student/home.php");
			}
			if($row['role']=='admin'){
				$_SESSION['alogin']=$row['ID'];
				$_SESSION['dept']=$row['department'];
				header("Location:admin/home.php");
			}
			if($row['role']=='department'){
				$_SESSION['alogin']=$row['ID'];
				$_SESSION['dept']=$row['department'];
				header("Location:department/home.php");
			}
			if($row['role']=='student_service'){
				$_SESSION['alogin']=$row['ID'];
				$_SESSION['dept']=$row['department'];
				header("Location:student_service/personal_detail.php");
			}
	 
		}
		
	}
	
      else {
			echo "incorrect user name or password";
	  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style_login.css">
</head>

<body><div id="header"><img src="./image/logo.png" alt="">
    <img id="user" src="./image/user gray.png" alt="">

 </div>
<div class="container">

    <form action="" method="POST">
        <div class="container">
        <h3 class="login_title">LOGIN</h3>
        <div class="inp">
            <input id="user_name" name="user_name" type="text" placeholder="user name" name="us" required><br>
        <input id="password" name="password" type="password" placeholder="password" name="pass" required><br>
    </div>
        
        <input id="submit_btn" type="submit" value="Login" name="login"><br>
        <a id="forgot" href="#" onmousedown="click()">forgot pasword?</a>
       
    </div> 
    </form>
  
</body>
</html>