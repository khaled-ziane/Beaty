

<?php

include('../includes/header-table.php');

if ($_SESSION['useremail']=="" OR $_SESSION['userrole']=="user" ) {
  header('location:login.php');
}


// --------------INSERT-----------------
if (isset($_POST['add_btn'])) {
  $username = $_POST['txtname'];
  $name = $_FILES['file']['name'];
  $tmp_name =  $_FILES['file']['tmp_name'];
  if (isset($name)) {
      if (!empty($name)) {
          $dst  ='./image/';
      } 
     move_uploaded_file($tmp_name,$dst.$name) ;
  }

 

  $sql = "INSERT INTO tbl_category (categoryname,categoryimage )
  VALUES ('$username', '$name')";
  $insert = $con->query($sql); 
 

  header('location:categs.php');
}


// ------------DELETE---------------- 
if(isset($_GET['delete_btn'])) {
$id = $_GET['delete_btn'];
  $sql = "DELETE FROM tbl_category WHERE id=$id";
  $delete = $con->query($sql); 
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
          Add Category  
        </h1>

        <div class="box box-warning">
              <div class="box-body">
			<form  action = "" method = "POST" enctype="multipart/form-data" >
				 <div class="col-md-6">
									
					<div class="form-group">
						<label>Category Name</label>
						<input type="text" class="form-control" required name="txtname" placeholder="Add New Category" required>
					</div>
                    

                    <div class="form-group">
						<label>Category Image</label>
						<input type="file" class="form-control input-image" name="file">
					</div>

					
            
          
									
				
				<div style="float:right">
					<a href="./categs.php"><input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" ></a>
					<input type="submit" class="btn btn-success" value="Add" name="add_btn">
				</div>
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