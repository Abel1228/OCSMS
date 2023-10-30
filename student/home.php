<?php
@session_start();
//$id= $_SESSION['alogin'];
$user_name=$_SESSION['blogin'];
$connect = mysqli_connect('localhost','root','','ocsms');

$select=  "select *from student where user_name='$user_name'";
$query =mysqli_query($connect,$select);
$row = mysqli_fetch_assoc($query);
//$row = mysqli_fetch_assoc($select);

if ($_SESSION['blogin']) {

}
else{
    header("location:../login.php");
}


?>



<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</body>
</html>


<head>
    <meta charset="UTF-8">
    <title>Students home page</title>
    <link rel="stylesheet" type="text/css" href="./css/style_tset.css">
    <link rel="stylesheet" href="../nav_style.css">
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
                <?php 

              $year=$row['year'];
              $status=$row['status'];
              if($status=='0'){
                if($year=='1'){
                  echo "<ul><li><a href='cost_form.php'><img class='icon' src='../image/form.png' alt=''> Cost Form</a></li></ul>";
                } 
            else{
              echo "<ul><li><a href='cost2.php'><img class='icon' src='../image/form.png' alt=''>Update Cost</a></li></ul>";
            } 
           }
          else{

           
          }
              
              ?> 
      <ul><li><a href="announcement.php"><img class="icon" src="../image/mic.png" alt=""> Announcement</a></li></ul>
      <ul><li><a href="help.php"><img class="icon" src="../image/question.png" alt=""> Help</a></li></ul>
            </ul>
            <a href="../logout.php"><input id="btn2" type="submit" value="logout" ></a>
           
        </div>
        <div id="main_content">
            <div class="header"><p>Ambo University Cost Sharing
            <a href="../logout.php"><input id="btn" type="submit" value="logout" ></a></p>  </div>
            <div class="content">
           

           
   <div class="alert">
        
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
<p >logged in successfully</p>
  <h3 >Welcome <?php echo $row['first_name'];?>
               <?php echo $row['middle_name'];?> 
               <?php echo $row['last_name'];?> 
   
            </h3>
</div>


<input type="button" id="button2" value="cost sharing detail" onclick="javascript:jump2()">
            <input type="button" id="button" value="personal detail" onclick="javascript:jump()"><br>
   <iframe id="iframe" scrolling="" name="window" frameborder="0" src="cost_sharing_detail.php"></iframe>


            
            
                
             
                
        </div>
        
    </div>

    <script>
        function toggleSidebar() {
document.getElementById("sidebar").classList.toggle('active');
document.getElementById("main_content").classList.toggle('active');
document.getElementById("main_content").classList.toggle('active1');

        }

function jump() {
          var url="personal_detail.php";
          document.getElementById("iframe").src=url;
          document.getElementById("button").style.backgroundColor = "white";
          document.getElementById("button2").style.backgroundColor="#34444d";
          document.getElementById("button").style.color="black";
          document.getElementById("button2").style.color="white";

           
       }

       function jump2() {
          var url="cost_sharing_detail.php";
          document.getElementById("iframe").src=url;
          document.getElementById("button2").style.backgroundColor = "white";
          document.getElementById("button").style.backgroundColor="#34444d";
          document.getElementById("button2").style.color="black";
          document.getElementById("button").style.color="white";
         
           
       }
            
        
    </script>
</body>

</html>