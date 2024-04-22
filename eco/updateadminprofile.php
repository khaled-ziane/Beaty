<?php
include('../includes/header-table.php');

if ($_SESSION['useremail']=="" OR $_SESSION['userrole']=="user" ) {
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

header('location: adminprofile.php');
}


?>

<?php include('../includes/nav-table.php');?>
    
 
       
        <a href="./adminprofile.php">
        <div class=" current dash "><i class="fa fa-dashboard"></i>
        Profile
        </div>
        <a href="./dash.php">
        <div class="  dash "><i class="fa fa-dashboard"></i>
        Dashboard
        </div>
        </a>
        
        <a href="./categs.php">
        <div class="  dash "><i class="fas fa-th-list"></i></i>
        Category
        </div>
        </a>
         <a href="./prods.php">
        <div class="  dash "><i class="fa fa-list-alt"></i>
        Products
        </div>
        </a>
        <a href="./users.php">
        <div class="  dash "><i class="fa fa-registered"></i>
        Users
        </div>
        </a>
        <a href="./orders.php">
        <div class="  dash "><i class="fa fa-registered"></i>
        Orders
        </div>
        </a>
  
    
    </section>
  
    <section class="coll-2 cc">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <h1>
          Edit Profile 
         
        </h1>
      
        <div class="box box-success">
              <div class="box-body">
               
              <div class="container-profile-admin">
    <form action="" method ="POST">
    <?php foreach($data as $row) { ?>
    
    <!-- <hr style="margin-bottom:60px"> -->
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
     <label for="">Phone</label>
     <input type="text" value="<?php echo $row['userphone']?>" name="txtuserphone" >     
     
     </div>
     <hr>
<button type="submit" class="btn btn-success" name="edit_btn">Save </button>
     <?php }?>
     </form>
</div>
      

        </div>

        </div>
        
 

    </section>

  </div>
  <?php include('../includes/footer-table.php') ;?>



 <script>
   $(document).ready(function(){
    // $('#tableproducts').hide();
     $('#tableproducts').DataTable();
   });
 </script>
 

</body>
</html>