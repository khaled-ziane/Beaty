<?php

include('../includes/dbconnect.php');
// Start Session
session_start();
header("localhost:login.php");
$username = "";
$lastname = "";
$email = "";
$password= "";

if(isset($_POST['btn'])) {
  $username = $_POST['txtusername'];
  $lastname = $_POST['txtuserlastname'];
  $email = $_POST['txtemail'];
  $password = $_POST['txtpassword'];
  $sql = "SELECT * from tbl_users ";
  $data = $con->query($sql);
  // $prep = $con->prepare($sql);
  // $data = $prep->execute(); 
$x = false ;
foreach($data as $row)  {
  if ($row['useremail']==$email AND $x == false){
    echo "Already Registrated";
    $x = true ;
  }
}

 if ($x == false) {  
   $added_on = date('y-m-d h:i:s');
  $con->query("INSERT into tbl_users(username ,userlastname ,useremail , userpassword ,userdate,userrole) values ('$username', '$lastname','$email','$password','$added_on','user')"); 
  header('location: ./login.php');
}
 
    /*
    
    
      $rgs = " insert into tbl_users(username , useremail , password) values ('$username','$email','$password')";
       $prepp =$con->prepare($rgs);
       $prepp->excute();
    }
 */
  
  
}

/*
$password = $_POST['txtpassword'];
$password_confirm = $_POST['txtpassword_confirm'];
*/
?>

<?php include('../includes/header-login.php')?>
<div class="showcase" >
  <div class="showcase-content">
    <div class="login-page">
        <div class="form">
            <h1 class="loginh1">New Account</h1>
          <form class="register-form" action ="" method = "POST">
            <input type="text" placeholder="First Name" name="txtusername" required/> <br> 
            <input type="text" placeholder="Lasr Name" name="txtuserlastname"   required/> <br>
            <input type="email" placeholder="Email"  name="txtemail"required />  <br>
            <input type="password" placeholder="Password" name="txtpassword" required/> <br>
            <button type="submit" name="btn" class="bg-primary">Create</button>
            <p class="message" style="color:#333">Already registered? <a href="./login.php" class="text-primary">Sign In</a></p>
          </form>
        </div>
      </div>
      </div>
</div>
<script src="../js/smooth.js"></script>
<?php include('../includes/footer.php') ?>



