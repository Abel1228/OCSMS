
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
    



<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./css/announcement.css">
    <link rel="stylesheet" href="../nav_style.css">
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




                <div class="announcement"><br>
                    <h2 class="title">Estimeated Cost to be born by the benificiary in the current academic year</h2 >
                    <div class="sub_title">
                    15% Tuition fee( Birr): <span class="result" id="result0"></span><br><br>
                    Food expenses( Birr): <span class="result" id="result1"></span><br><br>
                    Boarding expenses( Birr): <span class="result" id="result2"></span><br><br>
                   <b>Total( Birr): <span class="total" id="result3"></span></b> 
                    </div>
                    
                
             
                
        </div>
    </div>

    <script>
        function toggleSidebar() {
document.getElementById("sidebar").classList.toggle('active');
document.getElementById("main_content").classList.toggle('active');
document.getElementById("main_content").classList.toggle('active1');



        }


       
                    document.getElementById("result0").innerHTML = localStorage.getItem("aa");
                    document.getElementById("result1").innerHTML = localStorage.getItem("bb");
                    document.getElementById("result2").innerHTML = localStorage.getItem("cc");
                    document.getElementById("result3").innerHTML = localStorage.getItem("dd");
                    

          
    </script>
</body>

</html>