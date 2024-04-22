<?php
include('../includes/dbconnect.php');
session_start();
if(isset($_SESSION['useremail']) AND $_SESSION['userrole']=="admin") {
  header('location:./dash.php');
}

if(isset($_SESSION['useremail']) AND $_SESSION['userrole']=="user") {
  header('location:./userprofile.php');
}

if(!isset($_SESSION['useremail'])) {
$email = "";
$password= "";
if(isset($_POST['login_btn'])) {
  $email = $_POST['txtemail'];
  $password = $_POST['txtpassword'];
   $sql = "select * from tbl_users where useremail='$email' and userpassword = '$password' ";  
  $data = $con->prepare($sql);
  $data->execute();
  
 


$x = false ;
foreach($data as $row){
  if ($row['useremail']==$email and $row['userrole']=="admin" AND $x == false) {
    $_SESSION['id']=$row['id'];
    $_SESSION['username']=$row['username'];
    $_SESSION['useremail']=$row['useremail'];
    $_SESSION['userrole']=$row['userrole'];
    $x = true ;
    header('location:./dash.php');
   
   
  }else if ($row['useremail']==$email and $row['userrole']=="user" AND $x==false) {
    $_SESSION['id']=$row['id'];
    $_SESSION['username']=$row['username'];
    $_SESSION['useremail']=$row['useremail'];
    $_SESSION['userrole']=$row['userrole'];
    
    $x = true ;
    header('location:./products.php');
  
  }
}
 if ($x == false) {  
 
  //  header('location:./login.php') ;
   $msg ="Login Failed !";
  
 
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

<?php  
  include('../includes/header-login.php');
?>

<div class="showcase" >
  <div class="showcase-content">
    <div class="showcase-title">
<h2>HELLO </h2>
<p>Join Our Community and discover thousands of Beaty Products .</p>
   </div>
    <div class="login-page">
      <div class="form">
        
            <h1 class="loginh1">Sign in</h1>
          <form class="register-form" action ="" method = "POST">
         
            <input type="text" placeholder="Email"  value="<?php echo $email?>" name="txtemail" required />
            <br>
            <input type="password" placeholder="Password" value="<?php echo $password?>" name="txtpassword" required/>
             <br>
            <button type="submit" name="login_btn" class="bg-primary" >Sign in</button>
            <p  class="message" style="color:#333">Not registered? <a href="./registration.php" class="text-primary">Join In</a></p>
            <?php if (!$email== "" and $x == false) {?>
             <p style="color:red;margin-top:10px;"><?php echo "The account email or password that you have entered is incorrect."?></p>
              <?php }?>
            </form>
        </div>
      </div>
      </div>
</div>

<script src="../js/smooth.js"></script>
<?php 
include('../includes/footer.php');
?>

<?php }?>

