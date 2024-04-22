<?php include('../includes/header.php');

if ($_SESSION['useremail']==""  ) {
     header('location:login.php');
   }

$user_id = $_SESSION['id'];
$select ="SELECT * from tbl_users u, tbl_address a where u.address_id = a.id and u.id='$user_id'";
$data = $con->prepare($select);
$data->execute();

if(isset($_POST['edit_btn'])) {
    $id = $_SESSION['id'];
      $username =$_POST['txtusername'];
      $lastname =$_POST['txtuserlastname'];
      $email =$_POST['txtuseremail'];
      $password =$_POST['txtuserpassword'];
      $address =$_POST['txtuseraddress'];
      $city =$_POST['txtusercity'];
      $postal =$_POST['txtuserpostal'];
      $country =$_POST['txtusercountry'];
      $phone =$_POST['txtuserphone'];
 

   $sql = "UPDATE  tbl_users u, tbl_address a SET   username='$username', userlastname='$lastname', useremail='$email',userpassword='$password' ,useraddress= '$address', usercity='$city', userpostal='$postal', usercountry='$country', userphone='$phone'  WHERE  u.address_id = a.id and  u.id='$id'";
$update = $con->prepare($sql);
$update->execute();

header('location: userprofile.php');
}

  

?>

<div class="container-profile">
    <form action="" method ="POST">
    <?php foreach($data as $row) { ?>
    <div class="box-col-1">
    <h1>Edit Profile</h1>
    </div>
    <hr style="margin-bottom:60px">
    <div class="box-col-1">
     <label for="">First Name</label>
     <input type="text" value="<?php echo $row['username']?>" name="txtusername" >     
     </div>

     <hr>
     <div class="box-col-1">
     <label for="">Last Name</label>
     <input type="text" value="<?php echo $row['userlastname']?>" name="txtuserlastname" >     
     
     </div>
      <hr>
      
      <div class="box-col-1">
     <label for="">Email</label>
     <input type="text" value="<?php echo $row['useremail']?>" name="txtuseremail" >     
     
     </div>
     <hr>
    
     
     <div class="box-col-1">
     <label for="">Password</label>
     <input type="password" value="<?php echo $row['userpassword']?>" name="txtuserpassword" >     
     
     </div>
     <hr>
     <div class="box-col-1">
     <label for="">Address</label>
     <input type="text" value="<?php echo $row['useraddress']?>" name="txtuseraddress" >     
     
     </div>
     <hr>

     <div class="box-col-1">
     <label for="">City</label>
     <input type="text" value="<?php echo $row['usercity']?>" name="txtusercity" >     
     
     </div>
    <hr>
    <div class="box-col-1">
     <label for="">Code Postal</label>
     <input type="text" value="<?php echo $row['userpostal']?>" name="txtuserpostal" >     
     
     </div>
     <hr>
     <div class="box-col-1">
     <label for="">Country</label>
     <input type="text" value="<?php echo $row['usercountry']?>" name="txtusercountry" >     
     
     </div>
     <hr>
     <div class="box-col-1">
     <label for="">Phone</label>
     <input type="text" value="<?php echo $row['userphone']?>" name="txtuserphone" >     
     </div>
     <hr>
<button type="submit" class="btn bg-primary" name="edit_btn">Save </button>
     <?php }?>
     </form>
</div>
<br>
<br>
<br>
<script src="../js/smooth.js"></script>


