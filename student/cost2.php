<?php
@session_start();
$user_name=$_SESSION['blogin'];
$connect = mysqli_connect('localhost','root','','ocsms');
$select =mysqli_query($connect, "select *from student where user_name='$user_name'");
$result=mysqli_fetch_assoc($select);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
<form method="post" action="form2.php">
  <div class="cost_sharing_agreement">

    <h4 class="per">Cost sharing agreement</h4><br>
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
              <span>Department</span>
              <select id="field" name="department" class="form-control">
                <option value="Fresh man">Fresh man</option> 
                <option value="Computer science">Computer science</option>
                <option value="Information technology">Information technology</option>
               <option value="civil engineering">civil engineering</option> 
                <option value="Construction management "> Construction management</option>
                <option value="Electrical engineering">Electrical engineering</option>
              </select>
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
      <span>What service would you demand?</span><br><br>

      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <span>A. In kind</span>
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            Food only <input type="radio" name="in_kind" value="food only" class="form-check-input" required>
          </div>

        </div>
        <div class="col-sm">
          <div class="form-group">
            Boarding only<input type="radio" name="in_kind" value="boarding only" class="form-check-input" required>
          </div>
        </div>

        <div class="col-sm">
          <div class="form-group">
            Food and Boarding<input type="radio" name="in_kind" value="food and boarding" class="form-check-input" required>
          </div>
        </div>


        <div class="col-sm">
          <div class="form-group">
            None<input type="radio" name="in_kind" value="none" class="form-check-input" required>
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
            Food only <input type="radio" name="in_cash" value="food only" class="form-check-input" required>
          </div>

        </div>
        <div class="col-sm">
          <div class="form-group">
            Boarding only<input type="radio" name="in_cash" value="boarding only" class="form-check-input" required>
          </div>
        </div>

        <div class="col-sm">
          <div class="form-group">
            Food and Boarding<input type="radio" name="in_cash" value="food and boarding" class="form-check-input" required>
          </div>
        </div>

        <div class="col-sm">
          <div class="form-group">
            None<input type="radio" name="in_cash" value="none" class="form-check-input" required>
          </div>
        </div>
      </div><br>





      <span>Estimated cost to be born by the beneficiaryy in the current acadamic year</span><br><br>

      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label>15% Education fee </label>
            <input class="form-control"  type="text" placeholder="15% Education fee"  name="education_expence" required>
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label>Food expence(birr)</label>
            <input class="form-control"  type="text" placeholder="food expence"  name="food_expence" required>
          </div>

        </div>
        <div class="col-sm">
          <div class="form-group">
            <label>Boarding expence(birr)</label>
            <input class="form-control"  type="text" placeholder="Boarding expence"  name="boarding_expence" required>
          </div>
        </div>

        <div class="col-sm">
          <div class="form-group">
            <label>Total(birr)</label>
            <input class="form-control"  type="text" placeholder="total" name="total_expence" required>
          </div>
        </div>
      </div><br>

    



        <div class="row">
      
        <div class="col-sm">
          <div class="form-group">
          <label>academic year</label>
          <input class="form-control"  type="text" placeholder="year" name="acadamic_year" required>
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




   

      <p>I in accordance with this contractual agreement and the higher education proclamation No.351/1995 and the
        higher education cost sharing
        registeration 154/2008 of the council of minister agreed and signed this contract
      </p>

     
    </div>
<br>
    <input type="checkbox" name="agreement" required >&nbsp&nbsp&nbsp<label><b>I am certain that the above provided information is
      true</b></label><br><br>

      <input type='hidden' name='no' value='<?php  ?>'>
      <input type="submit" class="btn btn-primary" value="Submit" name="submit">
   
</form>
<form action="home.php"><input id="can" type="submit" class="btn btn-danger" value="Cancel"></form>
    <script src="./js/js_form.js">

    </script>
</body>

</html>