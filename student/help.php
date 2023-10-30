<?php
@session_start();
$id= $_SESSION['alogin'];
//if(isset($_GET['ID'])){
$connect = mysqli_connect('localhost','root','','ocsms');

//}

//$id=$_GET['ID'];
$select =mysqli_query($connect, "select *from login where ID='$id'");

if ($_SESSION['alogin']) {

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
    <title>Document</title>
    <link rel="stylesheet" href="./css/help.css">
    <link rel="stylesheet" href="../nav_style.css">
    <style type="text/css">
     #text{
    background-color: lightgray;
    border-radius: 5px;
    padding: 10px;
 font-family: roboto;
    margin: auto;
    width: 60%;
  
}</style>
   
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
              $row = mysqli_fetch_assoc($select);
              $dept=$row['department'];
              if($dept=='Fresh man'){
                echo "<ul><li><a href='cost_form.php'><img class='icon' src='../image/form.png' alt=''> Cost Form</a></li></ul>";
              } 
              else{
                echo "<ul><li><a href='cost2.php'><img class='icon' src='../image/form.png' alt=''>Update Cost</a></li></ul>";
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

                <br>
                <h3 align="center"><b>How to use the website</h3></b>  <br><br>
                   <p> <div id="text">
                    1. To see the cost anouncement of the year you can go to the annpuncement page.<br>
                    2.If you want to fill or update cost sharing form go to cost form page and fill all the nessasary information on the provided space.After you fill the cost sharing form properly you can follow your approvement in cost sharing detail.if your form is accepted you must print the form from cost sharing detail page and give the form to the register to finish your registeration.<br>
                    3.you can view your cost sharing detail from the cost sharing detail page.it shows the total cost sharing detail from your 1st year upto your current year.<br><br>
                </div>
                  
                   
                </p>

                
             
                
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