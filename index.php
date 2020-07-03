<?php
include_once('connection.php');

$userdata = new DB_con();
if(isset($_POST['submit']))
{

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$town_name=$_POST['town_name'];
$gender_id=$_POST['gender_id'];
 
$sql=$userdata->registration($first_name,$last_name,$town_name,$gender_id);
if($sql){$message = "Registered successfully"; }
else{ $message = "failed"; }
}
?>

<!DOCTYPE html>
<html lang="en">
 <head>
    <title>Customer Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
<body>
	<div class="header">
    	<h2>Customer Registeration</h2>
    </div>

    <form method="post" action="" onsubmit="return validate();">

      <!--notification -->
      <div class="message"><?php if(isset($message)){ echo $message; } ?></div>

    	<div class="input-group">
    	  <label>First Name</label>
    	  <input type="text" name="first_name" id="f-name" required="required">
    	</div>
    	<div class="input-group">
    	  <label>Last Name</label>
    	  <input type="text" name="last_name" required="required">
    	</div>
	      <div class="input-group">
	        <label>Town</label>
	        <input type="text" name="town_name" required="required">
	      </div>
	      <div class="input-group">
	        <label>Gender</label>
	        <?php 
	             // $getGender = mysqli_query($userdata,"SELECT id, gender_name FROM gender");
	             // echo '<select name="gender_id" id="gender">';
	             // echo '<option value="">Choose</option>';
	                //while($row = mysqli_fetch_assoc($getGender))
	                //  {
	               //     echo '<option value=' . $row["id"] . '>' . $row["gender_name"] . '</option>';
	               //   }
	             // echo '</select>';
	        ?>
	        <select name="gender_id" id="gender" style="width: 100px " required="required">
	        	<option value="">choose</option>
	        	<option value="1">Female</option>
	        	<option value="2">Male</option>
	        </select>
	      </div>
    	<div class="input-group">
    	  <button type="submit" class="btn" name="register_customer">Register</button>
    	</div>
    </form>
</body>

<script>
  function validate() {
   var value = document.getElementById('f-name').value;
   if (value.length < 3) {
     alert("First name must be atleast 3 characters");
     return false;
   }else{
    return true;
  }
   
  }
</script>
</html>