

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
  $select = "SELECT * from tbl_products WHERE product_id='$id' ";
  $cat = $con->prepare("SELECT DISTINCT categoryname from tbl_category ");
  $cat->execute();
  $data = $con->prepare($select);
  $data->execute();

 
}

// --------------UPDATE-----------------
if (isset($_POST['edit_btn'])) {
$username = $_POST['txtname'];
$category = $_POST['txtcategory'];
$cat_id = $con->query( "SELECT id from tbl_category where categoryname='$category'");
$price = $_POST['txtprice'];
$qty =  $_POST['txtqty'];
$description = $_POST['txtdescription'];

$name = $_FILES['file']['name'];
  $tmp_name =  $_FILES['file']['tmp_name'];
  if (isset($name)) {
      if (!empty($name)) {
          $dst  ='./image/';
      } 
     move_uploaded_file($tmp_name,$dst.$name) ;
  }

$id = $_GET['edit'];

foreach($cat_id as $r) {
  $c_id = $r['id'];
  $sql = "UPDATE  tbl_products SET   productname='$username', category_id='$c_id' , productprice='$price',productqty='$qty' ,productimage= '$name' , productdescription='$description' WHERE product_id='$id'";
  $update = $con->prepare($sql);
  $update->execute();
}



 
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
  
    <section class="coll-2 ">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <h1>
          Update Product  
        </h1>

        <div class="box box-warning">
              <div class="box-body">
			<form  action = "" method = "POST"  enctype="multipart/form-data" >
				 <div class="col-md-6">
									<?php foreach($data as $row) { ?>
					<div class="form-group">
						<label>Product Name</label>
						<input type="text" value="<?php echo $row['productname'] ?> " class="form-control"  name="txtname"required>
					</div>
					<div class="form-group">
 
						<label>Product Category</label>
						<select  class="form-control" name="txtcategory" required >
            <?php foreach($cat as $row2) {?>
                            <option ><?php echo $row2['categoryname'] ?> </option>
                            <?php }?> 
                        </select>
                     
				       	</div>
                  <div class="form-group">
						<label>Product Price</label>
						<input type="text" value="<?php echo $row['productprice'] ?> " class="form-control" name="txtprice">
					</div>
          <div class="form-group">
						<label>Product Qty</label>
						<input type="text" value="<?php echo $row['productqty'] ?> " class="form-control" name="txtqty">
					</div>
          <div class="form-group">
						<label>Product Image</label>
            <div  style="width:100px;text-align:center;">
            <img src="./image/<?php  echo $row['productimage']?>" style=" width:70px;height:70px ">
            </div>
						<input  style="border:none;padding:10px;"  type="file"   class="form-control input-image" name="file">
					</div>

					<div class="form-group">
						<label>Description</label>
						<textarea style="padding-bottom:50px"   class="form-control" name="txtdescription"><?php echo $row['productdescription'] ?></textarea>
					</div>
									
				
				<div style="float:right">
					<a href="./prods.php"><input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" ></a>
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