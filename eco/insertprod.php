

<?php

include('../includes/header-table.php');

if ($_SESSION['useremail']=="" OR $_SESSION['userrole']=="user" ) {
  header('location:login.php');
}



//SELECT CATEGORY From tbl_category-------
$cat = $con->query( "SELECT DISTINCT categoryname from tbl_category");





// --------------INSERT-----------------
if (isset($_POST['add_btn'])) {
  $username = $_POST['txtname'];
  $category = $_POST['txtcategory'];
  $cat_id = $con->query( "SELECT id from tbl_category where categoryname='$category'");
  $price = $_POST['txtprice'];
  $qty = $_POST['txtqty'];
  $description = $_POST['txtdescription'];
  
  $name = $_FILES['file']['name'];
  $tmp_name =  $_FILES['file']['tmp_name'];
  if (isset($name)) {
      if (!empty($name)) {
          $dst  ='./image/';
      } 
     move_uploaded_file($tmp_name,$dst.$name) ;
  }

 foreach($cat_id as $r) {
  $c_id = $r['id'];
  $sql = "INSERT INTO tbl_products (productname, category_id, productprice,productqty,productimage, productdescription )
  VALUES ('$username', '$c_id','$price', '$qty', '$name', '$description')";
  $insert = $con->query($sql); 
 }

  header('location:prods.php');
}


// ------------DELETE---------------- 
if(isset($_GET['delete_btn'])) {
$id = $_GET['delete_btn'];
  $sql = "DELETE FROM tbl_products WHERE product_id=$id";
  $delete = $con->query($sql); 
  header('location:prods.php');
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
        <div class="  dash "><i class="fas fa-th-list"></i></i>
        Category
        </div>
        </a>
         <a href="./prods.php">
        <div class=" current dash "><i class="fa fa-list-alt"></i>
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
          Add Product  
        </h1>

        <div class="box box-warning">
              <div class="box-body">
			<form  action = "" method = "POST" enctype="multipart/form-data" >
				 <div class="col-md-6">
									
					<div class="form-group">
						<label>Product Name</label>
						<input type="text" class="form-control" required name="txtname"required>
					</div>
          

					<div class="form-group">
						<label>Product Category</label>
     
						<select  class="form-control" name="txtcategory" required >
            
            <?php foreach ($cat as $row) {?>
                <option ><?php echo $row['categoryname']?></option> 
                <?php }?>        
            </select>
					</div>
              <div class="form-group">
						<label>Product Price</label>
						<input type="text" class="form-control" name="txtprice">
					</div>
          <div class="form-group">
						<label>Product Qty</label>
						<input type="number" min="1" step ="1" class="form-control" name="txtqty">
					</div>
          <div class="form-group">
						<label>Product Image</label>
						<input type="file" class="form-control input-image" name="file">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea style="padding-bottom:50px" class="form-control" name="txtdescription"></textarea>
					</div>
									
				
				<div style="float:right">
					<a href="./prods.php"><input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" ></a>
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