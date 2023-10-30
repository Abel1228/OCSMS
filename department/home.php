<?php
@session_start();
$id= $_SESSION['alogin'];
$user_name=$_SESSION['blogin'];
$dept=$_SESSION['dept'];
$conn = mysqli_connect('localhost','root','','ocsms');
$select = "select *from student where status='1' and department='$dept'";
$query = mysqli_query($conn,$select);

//if(isset($_GET['ID'])){
  
  //}
  
  //$id=$_GET['ID'];
  
  ?>
 
 <?php
if(isset($_POST['detail'])){

	$_SESSION['blogin']=$_POST['user_name'];
	header("Location:../student/print.php");
//}
}

    if(isset($_POST['acceptall'])){


        $sql = "UPDATE student SET status = 2 where status=1 and department='$dept'";
        $results = mysqli_query($conn,$sql);
    if($results){
      header('location:home.php');
        }
}
?>


<?php 

if(isset($_POST['accept'])){
  
  $username=$_POST['user_name'];
	// $val= $_GET[mysqli_fetch_assoc('status')];
 
	$sql = "UPDATE student SET status = 2 where user_name='$username'";
	$results = mysqli_query($conn,$sql);

	if($results){
	header('location:home.php');
	}
	else{
		echo "FAILED";
	}
}

 
 if(isset($_POST['reject'])){

  $username=$_POST['user_name'];
   
		   
	   // $val= $_GET[mysqli_fetch_assoc('status')];
	
	   $sql = "UPDATE student SET status = 4 where user_name='$username'";
	   $results = mysqli_query($conn,$sql);
   
	   if($results){
		header('location:home.php');
	   }
	   else{
		   echo "FAILED";
	   }
   }
   

if ($_SESSION['blogin']) {

}
else{
    header("location:../login.php");
}

?>	

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home page of the department head</title>
    <link rel="stylesheet" href="../nav_style.css">
    <link rel="stylesheet" href="./css/home.css">
	<link rel="stylesheet" href="./css/home_style.css">

	<style>
        .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
  }
  
  .closebtn:hover {
    color: black;
  }

  .alert {
    padding: 20px;
    background-color:#04AA6D;
    color: white;
    border-radius:5px;
    transition:ease 1000ms;
   
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
      <ul><li><a href="personal_detail.php"><img class="icon" src="../image/user.png" alt="">Personal detail</a></li></ul>
      
     
            </ul>
            <a href="../logout.php"><input id="btn2" type="submit" value="logout" ></a>
           
        </div>
        <div id="main_content">
            <div class="header"><p>Ambo University Cost Sharing
            <a href="../logout.php"><input id="btn" type="submit" value="logout" ></a></p>  </div>
            <div class="content">
              
              <?php
              $res =mysqli_query($conn, "select *from login where user_name='$user_name'");
      $row = mysqli_fetch_assoc($res);?>

<div class="alert">

<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
<p >logged in successfully</p>
<h3 >Welcome <?php echo $row['first_name'];?>
	  <?php echo $row['last_name'];?> 

	  </h3>
</div>
                
                    
                    
          

				  


<table id="table">
  <tr>
  <th>ID</th>
			<th>Full name</th>
			<th>Deparment</th>
			<th colspan=2>action</th>
      <th>detail</th>
  </tr>
 


  <?php
   
  
    
   $number=0;
     //  $num=mysqli_num_rows($query);
     //  if($num>0){ 
       while($result=mysqli_fetch_assoc($query)){ 
          
      $number++;
      echo "
      <tr>
         <td>".$number."</td>
         <td>".$result['first_name']." ".$result['middle_name']." ".$result['last_name']."</td>
         <td>".$result['department']."</td>
         
         ";
         ?>
         
         <form method='POST' >
         <td>
           <input type='hidden' name='user_name' value='<?php echo $result['user_name']; ?>'>
           <input type="submit" name="accept" class="btn-success" value="Accept">					
           
          </td>
          <td> 
            <input type="submit" name="reject" class="btn-danger" value="Reject">					 
          </td>
          <td>  
            <input type="submit" name="detail" class="btn-primary"  value="Detail">					
         </td>
         </form>
    </tr>
    <?php	
      }
      // }
   ?>

</table>
<br>  
            <form method="POST" action="">
            <input type="submit" name="acceptall" class="btn-primary" value="Acceptall">					
            </form>
   </div>
 

    <script>
        function toggleSidebar() {
document.getElementById("sidebar").classList.toggle('active');
document.getElementById("main_content").classList.toggle('active');
document.getElementById("main_content").classList.toggle('active1');


            
        }
    </script>
</body>

</html>
