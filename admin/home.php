<?php
$connection=new mysqli("localhost","root","","ocsms");

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

<?php
 if(isset($_POST['enable'])){  
  $sel =mysqli_query($connect, "select *from student");
 

   $row = mysqli_fetch_assoc($sel);
   $year= $row['year'];
    $year= $year+1;
          
        
    $sql = "UPDATE student SET status = 0, year=$year ";
    $sqli="UPDATE cost_table SET year=$year ";
    $result = mysqli_query($connection,$sql);

    if($result){
     header('location:home.php');
    }
    else{
        echo "FAILED";
    }
}
if(isset($_POST['disable'])){



 
    $sql = "UPDATE student SET status = 5 ";
    $result = mysqli_query($connection,$sql);

    if($result){
     header('location:home.php');
    }
    else{
        echo "FAILED";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin home page</title>
    <link rel="stylesheet" href="../nav_style.css">
    <link rel="stylesheet" href="./css/home.css">
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

  .enable{
    background-color: #04AA6D;
    border: none;
    width: 75px;
    height: 37px;
    border-radius: 5px;
    color:white;
    cursor: pointer;
    margin-left :30px;
    margin-right:30px;
      }
      .disable{
    background-color: #f44336;
    border: none;
    width: 75px;
    height: 37px;
    border-radius: 5px;
    color:white;
    cursor: pointer;
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
      <ul><li><a href="add_user.php"><img class="icon" src="../image/add _users.png" alt="">Add user</a></li></ul>
      <ul><li><a href="personal_detail.php"><img class="icon" src="../image/user.png" alt="">Personal detail</a></li></ul>
      
     
            </ul>
           
            <a href="../logout.php"><input id="btn2" type="submit" value="logout" ></a>
           
        </div>
        <div id="main_content">
            <div class="header"><p>Ambo University Cost Sharing
                
            
            <a href="../logout.php"><input id="btn" type="submit" value="logout" ></a></p>  </div>
            <div class="content">
           <?php $row = mysqli_fetch_assoc($select);?>

            <div class="alert">
        
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
      <p >logged in successfully</p>
        <h3 >Welcome <?php echo $row['first_name'];?>
                  <?php echo $row['last_name'];?> 
         
                  </h3>
      </div>



                
                    <div class="dashboard">
                    <div class="items"><a href="admin_list.php"><p>Admin</p></a><img style="margin-left:30px; "width="100px" height="100px" src="../image/admin.png" alt=""><h1><?php $result= mysqli_query($connection,"SELECT *FROM login where role='admin' "); $rows= mysqli_num_rows($result); if($rows>0){ echo $rows;}?></h1></div>
                        
                        <div class="items"><a href="student_list.php"><p>Student</p></a><img style="margin-left:30px; "width="100px" height="100px" src="../image/student.png" alt=""><h1><?php $result= mysqli_query($connection,"SELECT *FROM login where role='student'"); $rows= mysqli_num_rows($result); if($rows>0){ echo $rows;}?></h1></h1></div>
                        
                        <div class="items"><a href="department_list.php"><p>Department</p></a><img style="margin-left:30px; "width="100px" height="100px" src="../image/department.png" alt=""><h1><?php $result= mysqli_query($connection,"SELECT *FROM login where role='department' "); $rows= mysqli_num_rows($result); if($rows>0){ echo $rows;}?></h1></h1></div>
                        <div class="items"><a href="student_service_list.php"><p>Student service</p></a><img style="margin-left:30px; "width="100px" height="100px" src="../image/student_service.png" alt=""><h1><?php $result= mysqli_query($connection,"SELECT *FROM login where role='student_service' "); $rows= mysqli_num_rows($result); if($rows>0){ echo $rows;}?></h1></h1></div>
       
                    </div>
                    
                
                    <div>
    <form method='POST' >
					
					<input class="enable" type="submit" name="enable"  value="Enable" onClick="alert( 'Cost sharing form is available' )">					
				  
		
		<input class="disable" type="submit" name="disable"  value="Disable" onClick="alert( 'Cost sharing  form is unavailable' )" >					
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


    </script>
</body>

</html>
