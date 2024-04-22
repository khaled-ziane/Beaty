

<?php

include('../includes/header-table.php');

if ($_SESSION['useremail']=="" OR $_SESSION['userrole']=="user" ) {
  header('location:login.php');
}

if(!isset($_GET['edit'])) {
  header('location:prods.php');
}

if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $select = "SELECT * from tbl_category WHERE id='$id' ";
  $data = $con->prepare($select);
  $data->execute();

 
}

// --------------UPDATE-----------------
if (isset($_POST['edit_btn'])) {
$username = $_POST['txtname'];
$name = $_FILES['file']['name'];
  $tmp_name =  $_FILES['file']['tmp_name'];
  if (isset($name)) {
      if (!empty($name)) {
          $dst  ='./image/';
      } 
     move_uploaded_file($tmp_name,$dst.$name) ;
  }

$id = $_GET['edit'];

 
  $sql = "UPDATE  tbl_category SET   categoryname='$username',  categoryimage= '$name'  WHERE id='$id'";
  $update = $con->prepare($sql);
  $update->execute();




 
header('location:categs.php');

}

?>

<?php include('../includes/nav-table.php');?>
  
       
        <a href="./adminprofile.php">
        <div class="  dash "><i class="fa fa-dashboard"></i>
        Profile
        </div>
        <a href="./dash.php">
        <div class="  dash "><i class="fa fa-dashboard"></i>
        Dashboard
        </div>
        </a>

        <a href="./categs.php">
        <div class=" current dash "><i class="fas fa-th-list"></i></i>
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
          Update Category  
        </h1>

        <div class="box box-warning">
              <div class="box-body">
			<form  action = "" method = "POST"  enctype="multipart/form-data" >
				 <div class="col-md-6">
									<?php foreach($data as $row) { ?>
					<div class="form-group">
						<label>Category Name</label>
						<input type="text" value="<?php echo $row['categoryname'] ?>" class="form-control"  name="txtname" required>
					</div>
          <div class="form-group">
						<label>Category Image</label>
            <div  style="width:100px;text-align:center;">
            <img src="./image/<?php  echo $row['categoryimage']?>" style=" width:70px;height:70px ">
            </div>
						<input  style="border:none;padding:10px;"  type="file"   class="form-control input-image" name="file">
					</div>

				
									
				
				<div style="float:right">
					<a href="./categs.php"><input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" ></a>
					<input type="submit" class="btn btn-success" value="Update" name="edit_btn">
				</div>
        <?php }?>
         </div>
			</form>
	
              
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