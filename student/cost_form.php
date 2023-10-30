<?php
@session_start();
$id= $_SESSION['alogin'];
$user_name=$_SESSION['blogin'];
//if(isset($_GET['ID'])){
$connect = mysqli_connect('localhost','root','','ocsms');

//}

//$id=$_GET['ID'];
$select =mysqli_query($connect, "select *from login where user_name='$user_name'");

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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students Cost Filling Page</title>
  <link rel="stylesheet" href="./css/bootstrap.css">
  <link rel="stylesheet" href="./css/style_form.css">
  <style>
    #can{
     margin-top: 20px;
    }
  </style>
</head>

<body>
<div class="fed">
    <h4><strong>FEDERAL DEMOCRATIC REPUBLIC OF ETHIOPIA <br>
        HIGHER EDUCATION COST SHARING REGULATION <br>
        BENEFICIARIES AGREEMENT FORM</strong> <br></h4>
  </div>

  <div class="ins">
    <h6><strong>FILL THE INFORMATION BELOW</strong></h4>
  </div>

  <div class="personal_information">

    <h4 class="per">Personal Information</h4><br>
    <form method="post" action="form.php" enctype="multipart/form-data">
      <div class="container">


      <div class="row">
          <div class="col-sm">
            <div class="form-group">
              <label for="pwd">User name:</label>
              <input type="text" class="form-control" id="pwd" placeholder="user name" name="user_name" required>
            </div>
          </div>
          <div class="col-sm">
            <div class="form-group">
            
            </div>
          </div>
          <div class="col-sm">
            <div class="form-group">
            
            </div>
          </div>
          <div class="col-sm">
            <div class="form-group">
         
            </div>
          </div>
        </div><br>



        <div class="row">
          <div class="col-sm">
            <div class="form-group">
              <label for="pwd">Fist Name:</label>
              <input type="text" class="form-control" id="pwd" placeholder="first name" name="first_name" required>
            </div>
          </div>
          <div class="col-sm">
            <div class="form-group">
              <label for="pwd">Middle Name:</label>
              <input type="text" class="form-control" id="pwd" placeholder="middle name" name="middle_name" required>
            </div>
          </div>
          <div class="col-sm">
            <div class="form-group">
              <label for="pwd">Last Name:</label>
              <input type="text" class="form-control" id="pwd" placeholder="last name" name="last_name" required>
            </div>
          </div>
          <div class="col-sm">
            <div class="form-group">
            <label>Photo:</label>
            <input type="file" class="form-control"  name="photo" id="file" value="choose file" required>
            </div>
          </div>
        </div><br>


        <div class="row">
          <div class="col-sm">
            <div class="form-group">
              Sex</span> <input type="radio" name="gender" value="male" class="form-check-input">
              <span>Male</span> <input type="radio" name="gender" value="female" class="form-check-input">
              <span>Female</span>
            </div>
          </div>
          <div class="col-sm">
            <div class="form-group">
              <span> Nationality</span><input type="text" id="field" name="student_nationality" class="form-control" value="Ethiopia">
              
            </div>
          </div>
          <div class="col-sm">

          </div>
        </div>
        <br>





        <div class="row">
          <div class="col-sm">
            <div class="form-group">


              Date of birth</span> <input type="date" id="field" class="form-control" name="student_date_of_birth">
            </div>
          </div>
          <div class="col-sm">
            <div class="form-group">

            </div>
          </div>
          <div class="col-sm">
            <div class="form-group">

            </div>
          </div>
        </div><br>






        <div class="row">
          <div class="col-sm">
            <div class="form-group">

              <span>Place of birth</span>
              <select id="field" name="student_birth_region" class="form-control">
                <option value="Addis Ababa">Addis Ababa</option>
                <option value="Amhara">Diredawa</option>
                <option value="Amhara">Amhara</option>
                <option value="Amhara">Afar</option>
                <option value="Amhara">Benishangul Gumez</option>
                <option value="Oromia">Oromia</option>
                <option value="Amhara">Gambela</option>
                <option value="Amhara">Hariri</option>
                <option value="Amhara">Tigray</option>
                <option value="Amhara">Somali</option>
                <option value="Amhara">Sidama</option>
                <option value="Amhara">SNNPR</option>
              </select>
            </div>
          </div>
          <div class="col-sm">
            <div class="form-group">
              <span>Wereda</span> <input class="form-control" id="field" type="text" placeholder="wereda" name="student_birth_wereda">
            </div>

          </div>
          <div class="col-sm">
            <div class="form-group">
              <span>Town</span> <input class="form-control" id="field" type="text" placeholder="town" name="student_birth_town" >
            </div>
          </div>
        </div><br>








        <div class="row">
          <div class="col-sm">
            <div class="form-group">
              <span>Mothers’ /adopter’s full name</span> <input id="field" type="text" class="form-control" name="mother_name">
            </div>
          </div>
          <div class="col-sm">
            <div class="form-group">


            </div>
          </div>
          <div class="col-sm">
            <div class="form-group">

            </div>
          </div>

        </div><br>




        <div class="row">
          <div class="col-sm">
            <div class="form-group">

              <span>Place of birth</span>
              <select id="field" name="mother_region" class="form-control">
                <option value="Addis Ababa">Addis Ababa</option>
                <option value="Diredawa">Diredawa</option>
               <option value="Afar">Afar</option> 
               <option value="Amhara">Amhara</option> 
                <option value="Benishangul Gumez">Benishangul Gumez</option>
                <option value="Oromia">Oromia</option>
                <option value="Gambela">Gambela</option>
                <option value="Hariri">Hariri</option>
                <option value="Tigray">Tigray</option>
                <option value="Somali">Somali</option>
                <option value="Sidama">Sidama</option>
                <option value="SNNPR">SNNPR</option>
              </select>
            </div>
          </div>
          <div class="col-sm">
            <div class="form-group">
              <span>Wereda</span> <input class="form-control" id="field" type="text" placeholder="wereda" name="mother_wereda">
            </div>

          </div>
          <div class="col-sm">
            <div class="form-group">
              <span>Town</span> <input class="form-control" id="field" type="text" placeholder="town" name="mother_town">
            </div>
          </div>
        </div><br>





      </div>
  </div>








  <div class="educational_background">
    <h4 class="per">Educational Background</h4><br>
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <span>University</span> <input id="field" type="text" class="form-control" name="university">
          </div>




        </div>
        <div class="col-sm">
          <div class="form-group">
            <span>Institute/College</span> <input id="field" type="text" class="form-control" name="institute">
          </div>
        </div>

      </div><br>


      <div class="row">
        <div class="col-sm">
          <div class="form-group">

            Acadamic Year</span> <input type="text" id="field" class="form-control" name="acadamic_year">
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <span>Stream</span>
            <select id="field" name="stream" class="form-control">
              <option value="Natural science">Natural science</option>
              <option value="Scoial science">Social science</option>
            </select>
          </div>
        </div>
        <div class="col-sm">
         <!-- <div class="form-group">
            <span>Year</span>
            <select id="field" name="year" class="form-control">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="3">4</option>
              <option value="3">5</option>
            </select>
          </div>-->
        </div>
      </div><br>

      <span>If you have withdrawn from the university indicate</span><br><br>

      <div class="row">
        <div class="col-sm">
          <div class="form-group">

            Date of withdraw</span> <input type="date" id="field" class="form-control" name="date_of_withdraw">
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">

          </div>

        </div>
        <div class="col-sm">
          <div class="form-group">

          </div>
        </div>
      </div><br>






      <span>If are transferd from other University indicate</span><br><br>

      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label>Name of University </label>
            <input type="text" class="form-control" id="pwd" placeholder="name of university"  name="transfered_university">
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label>Department </label>
            <input type="text" class="form-control" id="pwd" placeholder="department"  name="transfered_department">
          </div>

        </div>
        <div class="col-sm">
          <div class="form-group">
            Date of transfer</span> <input type="date" id="field" class="form-control" name="date_of_transfer">
          </div>
        </div>
      </div><br>
    </div>
  </div>







  <div class="cost_sharing_agreement">

    <h4 class="per">Cost sharing agreement</h4><br>
    <div class="container">
      <span>What service would you demand?</span><br><br>

      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <span>A. In kind</span>
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            Food only <input type="radio" name="in_kind" value="food only" class="form-check-input">
          </div>

        </div>
        <div class="col-sm">
          <div class="form-group">
            Boarding only<input type="radio" name="in_kind" value="boarding only" class="form-check-input">
          </div>
        </div>

        <div class="col-sm">
          <div class="form-group">
            Food and Boarding<input type="radio" name="in_kind" value="food and boarding" class="form-check-input">
          </div>
        </div>


        <div class="col-sm">
          <div class="form-group">
            None<input type="radio" name="in_kind" value="none" class="form-check-input">
          </div>
        </div>
      </div><br>







      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <span>B. In cash</span>
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            Food only <input type="radio" name="in_cash" value="food only" class="form-check-input">
          </div>

        </div>
        <div class="col-sm">
          <div class="form-group">
            Boarding only<input type="radio" name="in_cash" value="boarding only" class="form-check-input">
          </div>
        </div>

        <div class="col-sm">
          <div class="form-group">
            Food and Boarding<input type="radio" name="in_cash" value="food and boarding" class="form-check-input">
          </div>
        </div>

        <div class="col-sm">
          <div class="form-group">
            None<input type="radio" name="in_cash" value="none" class="form-check-input">
          </div>
        </div>
      </div><br>





      <span>Estimated cost to be born by the beneficiaryy in the current acadamic year</span><br><br>

      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label>15% Education fee </label>
            <input class="form-control"  type="text" placeholder="15% Education fee"  name="education_expence">
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label>Food expence(birr)</label>
            <input class="form-control"  type="text" placeholder="food expence"  name="food_expence">
          </div>

        </div>
        <div class="col-sm">
          <div class="form-group">
            <label>Boarding expence(birr)</label>
            <input class="form-control"  type="text" placeholder="Boarding expence"  name="boarding_expence">
          </div>
        </div>

        <div class="col-sm">
          <div class="form-group">
            <label>Total(birr)</label>
            <input class="form-control"  type="text" placeholder="total" name="total_expence">
          </div>
        </div>
      </div><br>





   

      <p>I in accordance with this contractual agreement and the higher education proclamation No.351/1995 and the
        higher education cost sharing
        registeration 154/2008 of the council of minister agreed and signed this contract
      </p>

      <p>Choose the paiment method</p>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <input type="radio" id="field" class="form-contro" name="paiment_method" value="in cash"> <label>To be paid from my income</label>
          </div>
        </div>
      </div><br>
        
        <div class="col-sm">
          <div class="form-group">
            <input type="radio" id="field" class="form-contro" name="paiment_method" value="in service"> <label>To provide service not more than
              the training period in my profession(for teaching and health students)</label>
          </div>


          




        </div><br>




      </div>
   
<br>
    <input type="checkbox" name="agreement" required >&nbsp&nbsp&nbsp<label><b>I am certain that the above provided information is
      true</b></label><br><br>
      <input type='hidden' name='no' value='<?php echo $result['user_name']; ?>'>
      <button type="submit" class="btn btn-primary" name="submit" >submit</button>
   
    </form>
    <form action="home.php"><input id="can" type="submit" class="btn btn-danger" value="Cancel"></form>
    <script src="./js/js_form.js">

    </script>
</body>

</html>