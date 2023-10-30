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

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../nav_style.css">
    <link rel="stylesheet" href="./css/announcement.css">

    <style>


  #content
{

margin: auto;
width: 30%;
}

.title{
    color:  #03A9F4;
    padding: 10px 30px;
    font-size: 15px;
    padding-bottom: 40px;
}

#bt{
  
  background-color: #00ab66;
  border-style: none;
  width: 70px;
  height: 30px;
  border-radius: 5px;
  color: white;
  margin-top: 15px;

}

#bt:hover{
  background-color: #00ca79;
  transition: ease-out 500ms;
  }


.imp {
        width: 300px;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 1px solid #555;
        outline: none;
        border-radius: 5px;
        width: 100%;
       
      }
      
  .imp:focus {
        background-color: lightblue;
       
        transition: ease 200ms;
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
      <ul><li><a href="announcement.php"><img class="icon" src="../image/mic.png" alt="">Announcement</a></li></ul>
      <ul><li><a href="leaving.php"><img class="icon" src="../image/leave.png" alt="">leaving</a></li></ul> 
     
            </ul>
            <a href="../logout.php"><input id="btn2" type="submit" value="logout"></a>
           
        </div>
        <div id="main_content">
            <div class="header"><p > Ambo University Cost Sharing
            <a href="../logout.php"><input id="btn" type="submit" value="logout" ></a></p>  </div>
            <div class="content" style="@media (max-width :1200px)
  .imp{
      margin:auto;
      width:60%;
  }
}
          @media (max-width :700px) {
  
  .imp{
      margin: auto;
      width: 90%;
  }
}">


                
                    
                    <h1 class="title">Estimeated Cost to be born by the benificiary in the current academic year</h1>
                
                <div id="content">
                    
                <form action="../student/announcement.php">
                            <label for="announce0">15% Tuition fee( Birr):</label><br>
                            <input style="height:40px; width: 400px;" class="imp" type="text" id="announce0"><br><br>
                            <label for="announce1">Food expenses( Birr):</label><br>
                            <input style="height:40px; width: 400px;" class="imp" type="text" id="announce1"><br><br>
                            <label for="announce2">Boarding expenses( Birr):</label><br>
                            <input style="height:40px; width: 400px;" class="imp" type="text"  id="announce2"><br><br>
                            <label for="announce3">Total( Birr):</label><br>
                            <input style="height:40px; width: 400px;" class="imp" type="text"  id="announce3"><br><br>
                            <input id="bt" type="submit" value="Announce" onclick="passvalues()" style="padding:0px;">
                           </form>
                    </div>



                
             
                
        </div>
    </div>

    <script>
        function toggleSidebar() {
document.getElementById("sidebar").classList.toggle('active');
document.getElementById("main_content").classList.toggle('active');
document.getElementById("main_content").classList.toggle('active1');


            
        }


        function passvalues(){
     var a= document.getElementById("announce0").value;
     var b= document.getElementById("announce1").value;
     var c= document.getElementById("announce2").value;
     var d= document.getElementById("announce3").value;    

     localStorage.setItem("aa",a);
     localStorage.setItem("bb",b);
     localStorage.setItem("cc",c);
     localStorage.setItem("dd",d);
     return;
    }
    </script>
</body>

</html>
