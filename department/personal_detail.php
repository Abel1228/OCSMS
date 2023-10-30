<?php
@session_start();
$id= $_SESSION['alogin'];
//if(isset($_GET['ID'])){
$connect = mysqli_connect('localhost','root','','ocsms');

//}

//$id=$_GET['ID'];
$select =mysqli_query($connect, "select *from login where ID='$id'");

   $row = mysqli_fetch_assoc($select);

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
    <title>Department head personal detail</title>
    <link rel="stylesheet" href="../nav_style.css">
    <link rel="stylesheet" href="../edit_profile.css">
    <link rel="stylesheet" href="../personal_detail.css">

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
            {?>
                <img src="<?php echo  '../uploads/'.$row['location'].''; ?>" alt="" id="pp">
            <?php } ?>
   

   <div class="profile">
   
     <div class="profile-item">
       <p>ID</p>
      </div>

      <div class="profile-detail">
       <p><?php echo $row['user_name'];?></p>
      </div>
      
      <div class="profile-item">
          <p>Name</p>
       </div>

      <div class="profile-detail"> 
            <p><?php echo $row['first_name'];?>
            <?php echo $row['last_name'];?> 
   
            </p>
           </div>


      <div class="profile-item">
       <p>sex</p>
      </div>


      <div class="profile-detail">
       <p><?php echo $row['sex'];?> </p>
      </div>

      <div class="profile-item">
       <p>Department</p>
    </div>

   <div class="profile-detail"> 
         <p><?php echo $row['department'];?></p>
        </div>

        
   <div class="profile-item">
    <p>Email</p>
   </div>


   <div class="profile-detail">
    <p><?php echo $row['email'];?></p>
   </div>
   <?php 
   echo '
   <a href="edit_profile.php?updateid='.$id.'"  ><input type="submit" value="Edit" id="btn"></a
   ';
   
   ?>
>
   </div>




                
             
                
        </div>
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
