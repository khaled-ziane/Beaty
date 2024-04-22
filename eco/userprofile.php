<?php include('../includes/header.php');

if ($_SESSION['useremail']=="" OR $_SESSION['userrole']=="admin" ) {
    header('location:login.php');
  }

$user_id = $_SESSION['id'];

   $test = $con->prepare( "SELECT * from tbl_users u where u.id='$user_id' ");
   $test->execute();
   foreach($test as $ro) {
      if($ro['address_id'] == "") {
            echo "U Must Complete Your Profile";
      }
    }




        $select ="SELECT * from tbl_users u, tbl_address a where u.address_id = a.id and u.id='$user_id'";
        $data = $con->prepare($select);
        $data->execute();
       
     

   

    


?>

<div class="container-profile">
    <?php foreach($data as $row) { ?>
    <div class="box-col-1">
    <h1>Profile Information</h1>
     <a href="./updateuserprofile.php?id=<?php echo $row['id'] ?>" class="btn bg-primary">Edit Profile</a>
    </div>
    <hr style="margin-bottom:60px">
    <div class="box-col-1">
     <label for="">First Name</label>
     <h3><?php echo $row['username']?></h3>
     
     </div>

     <hr>
     <div class="box-col-1">
     <label for="">Last Name</label>
     <h3><?php echo $row['userlastname']?></h3>
     
     </div>
      <hr>
      
      <div class="box-col-1">
     <label for="">Email</label>
     <h3><?php echo $row['useremail']?></h3>
     
     </div>
     <hr>
    
     
     <div class="box-col-1">
     <label for="">Password</label>
     <h3><?php echo $row['userpassword']?></h3>
     
     </div>
     <hr>
     <div class="box-col-1">
     <label for="">Address</label>
     <h3><?php echo $row['useraddress']?></h3>
     
     </div>
     <hr>

     <div class="box-col-1">
     <label for="">City</label>
     <h3><?php echo $row['usercity']?></h3>
     
     </div>
    <hr>
    <div class="box-col-1">
     <label for="">Code Postal</label>
     <h3><?php echo $row['userpostal']?></h3>
     
     </div>
     <hr>
     <div class="box-col-1">
     <label for="">Country</label>
     <h3><?php echo $row['usercountry']?></h3>
     
     </div>
     <hr>
     <div class="box-col-1">
     <label for="">Phone</label>
     <h3><?php echo $row['userphone']?></h3>
     
     </div>
     <hr>
     <?php }?>
</div>
<script src="../js/smooth.js"></script>

<?php include('../includes/footer.php');?>