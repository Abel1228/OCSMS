<?php
@session_start();
$id= $_SESSION['alogin'];
$user_name=$_SESSION['blogin'];
$connect = mysqli_connect('localhost','root','','ocsms');

$connect = mysqli_connect('localhost','root','','ocsms');
$select =mysqli_query($connect, "select *from login where user_name='$user_name'");

if ($_SESSION['blogin']) {

}
else{
    header("location:../login.php");
}
?>
<?php   $row = mysqli_fetch_assoc($select)?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student personal detail</title>

    <style>
      .profile{
    display: grid;
    grid-template-columns: 20% 80%;
    grid-template-rows: 1fr;
   padding-left: 10%;
    justify-content: center;
    align-content: center;
    
}
  #pp{
      width: 130px;
      height: 150px;
      padding: 50px;
      
  }

  .profile-item{
      color: #03A9F4;
  }

  #btn{
  
  background-color: #03A9F4;
  border-style: none;
  width: 70px;
  height: 30px;
  border-radius: 5px;
  color: white;
  margin: 50px;
}

#btn:hover{
  background-color: #68cefd;
  transition: ease-out 500ms;
  }


  @media only screen and (max-width: 768px) {
 
    .profile{
        grid-template-columns: 100%;

    }
  }


    </style>
</head>
<body>
            
                <img src="<?php echo  '../uploads/'.$row['location'].''; ?>" alt="PROFILE PICTURE" id="pp">
             

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

    
  
     
</body>
</html>