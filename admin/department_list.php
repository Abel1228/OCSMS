<?php
@session_start();
//$id= $_SESSION['alogin'];
$user_name=$_SESSION['blogin'];
$conn = mysqli_connect('localhost','root','','ocsms');
$select = "select *from login where role='department'";
$query = mysqli_query($conn,$select);

?>

<?php 
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
    <title>department list</title>
    <link rel="stylesheet" href="../nav_style.css">
    <link rel="stylesheet" href="./css/home.css">
    <style>
        #table {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
  #table td, #table th {
    border: 1px solid #ddd;
    padding: 8px;
  }
  
  #table tr:nth-child(even){background-color: #f2f2f2;}
  
  #table tr:hover {background-color: #ddd;}
  
  #table th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #263238;
    color: white;

  }

  .btn-success{
background-color: #4CAF50;
border: none;
width: 75px;
height: 37px;
border-radius: 5px;
color:white;
cursor: pointer;
  }
  .btn-danger{
background-color: #f44336;
border: none;
width: 75px;
height: 37px;
border-radius: 5px;
color:white;
cursor: pointer;
  }
  .btn-primary{
      background-color: #008CBA;
      border: none;
width: 75px;
height: 37px;
border-radius: 5px;
color:white;
cursor: pointer;
  }


  
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
            <form action="home.php">                   
                     <button class="btn-primary" >Home</button>
                    </form>
                    <br>
                    
                <table id="table">
                    <tr>
                        <th>NO.</th>
                        <th>ID</th>
                        <th>Full name</th>
                        <th>Deparment</th>
                        
                    </tr>
            
                    <?php
   
  
    
   $number=0;
   $num=mysqli_num_rows($query);
   if($num>0){ 
     while($result=mysqli_fetch_assoc($query)){ 

  $number++;
  echo "
  <tr>
     <td>".$number."</td>
     <td>".$result['user_name']."</td>
     <td>".$result['first_name']." "." ".$result['last_name']."</td>
 <td>".$result['department']."</td>

";
?>	  

<?php	echo "</tr>
 

";
}
}
?>

</table>


<br>
     
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
