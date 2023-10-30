

<?php
  @session_start();
  $id= $_SESSION['alogin'];
  $conn=mysqli_connect('localhost','root','','ocsms');
  
  if ($_SESSION['alogin']) {
  
  }
  else{
   header("location:../login.php");
  }
  if(isset($_POST['print'])){
    $sq="UPDATE login set printed=1 where printed=0";
  $sqll=mysqli_query($conn,$sq );
}
  	
    function generate_password($len = 4){
      $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, $len );
     return $password;
    
    }
     $password = generate_password();


  if(isset($_POST['add'])){
    $username=$_POST['username'];
   // $password=$_POST['password'];
    $firstname=$_POST['fname'];
    $lastname=$_POST['lname'];
    $sex=$_POST['sex'];
    $rolcol=$_POST['role'];
    $department=$_POST['department'];
      
    $sql="INSERT into login(user_name,pass_word,first_name,last_name,sex, department, role, printed) values('$username','$password','$firstname','$lastname','$sex','$department','$rolcol', 0)";
    $query=mysqli_query($conn,$sql);
    if($rolcol=='student'){
    $stu="INSERT into student(user_name,department) values('$username','Fresh man')";
    $que=mysqli_query($conn,$stu);}
}


 
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add New Users to The OCSMS</title>
    <link rel="stylesheet" href="../nav_style.css">
    <link rel="stylesheet" href="./css/adduser.css">
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

.print{
   
   background-color: #4CAF50;
   border: none;
   width: 75px;
   height: 37px;
   border-radius: 5px;
   color:white;
   cursor: pointer;
     
   }

   .print:hover{
       background-color: #62db66;
       transition: ease-out 500ms;
       }

       
#add{
  
  background-color: #008CBA;
  border: none;
width: 75px;
height: 37px;
border-radius: 5px;
color:white;
cursor: pointer;

}

#add:hover{
  background-color: #68cefd;
  transition: ease-out 500ms;
  }

#content{
    backg
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
             
                <a href="../logout.php"><input id="btn" type="submit" value="logout" ></a>
            </p>  </div>
            <div class="content">




            <p class="title" >Add user account</p>
    <form method="POST">
        <div id="content">
    <label>Username <input class="imp" name="username" placeholder="Enter username" type="text" required></label><br>
  <!--  <label>Password<input class="imp" name="password" placeholder="Enter Password" type="password" required></label><br>-->
  <label>First name<input class="imp" name="fname" placeholder="Enter First Name" type="text" required></label><br>
	<label>Last name<input class="imp" name="lname" placeholder="Enter Last Name" type="text" required></label><br>
	<label>Sex &nbsp&nbsp Male&nbsp <input name="sex" type="radio" value="Male" required>
			&nbsp&nbsp&nbspFemale&nbsp<input name="sex" type="radio" value="Female" required></label><br>
</label><br>
	
	<label>Select role</label>
    <div class="content">
        <div >
            <div class="selection"  id="select2">
                <select name="role" id="roleSel" class="cbx" tabindex="50">
                    <option value="selectoption" disabled>Select User role</option>
                    <option value="student" name="student">Student</option>
                    <option value="admin" name="admin">Admin</option>
                    <option value="department" name="department">Department</option>
                    <option value="student_service" name="service">Student service</option>
                </select>
            </div>
        </div>
    
            </div>
	<label>Select department</label>
    <div class="content">
        <div >
            <div class="selection" id="select2">
                <select name="department" id="dept" class="cbx" tabindex="50">
                    <option value="selectoption" disabled>Select User department</option>
                    <option value="Fresh man" >Freshman</option>
                    <option value="Computer science">Computer science</option>
                    <option value="civil engineering">civil engineering</option> 
                    <option value="Construction management "> Construction management</option>
                    <option value="Electrical engineering">Electrical engineering</option>
                    <option value="Information technology">Information technology</option>
                    <option value="admin" >Admin</option>
                    <option value="Student service" >Student service</option>
                </select>
            </div>
        </div>
    
            </div>
            	
            <input type="submit" value="Add" id="add" name="add">
    </form>
               
    <div>

<iframe name="toPrint" src="admin_print.php" width="0" height="0" tabindex="-1"></iframe>

<form method="POST">
<input class="print" type="submit" name="print" onclick="document.toPrint.printThePage();" value="Print">
</form>
</div>
                

                
             
                
        </div>
    </div>
 
    <script>
        function toggleSidebar() {
document.getElementById("sidebar").classList.toggle('active');
document.getElementById("main_content").classList.toggle('active');
document.getElementById("main_content").classList.toggle('active1');

var ids=["student","admin","department","student_service"];
                    var dropDown=document.getElementById("roleSel");
             
            
                    dropDown.onchange=function(){
                        document.getElementById("content").style.visibility="visible"
                        for(var x=0; x<ids.length;x++){
                            document.getElementById(ids[x]).style.display="none";
            
                        }
                        document.getElementById(this.value).style.display="block";
                    }
            
        }
    </script>
</body>

</html>
