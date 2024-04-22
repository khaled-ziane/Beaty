

<?php

include('../includes/header-table.php');


 if ($_SESSION['useremail']=="" OR $_SESSION['userrole']=="user" ) {
  header('location:login.php');
}




// $sql = "select * from tbl_products p,tbl_category c where p.category_id=c.id  ";
$sql = "SELECT * from tbl_category  ";
$data = $con->query($sql);


?>

<?php include('../includes/nav-table.php');?>
    
   
<a href="./adminprofile.php">
        <div class="  dash "><i class="fas fa-user-circle"></i>
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
        <div class="  dash "><i class="fab fa-product-hunt"></i>
        Products
        </div>
        </a>

        <a href="./users.php">
        <div class="  dash "><i class="fas fa-users"></i>
        Users
        </div>
        </a>
        <a href="./orders.php">
        <div class="  dash "><i class="fas fa-list-alt"></i>
        Orders
        </div>
        </a>
      
    
    </section>
  
    <section class="coll-2 cc">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <h1>
          
        </h1>

        <div class="box box-warning">
              <div class="box-body">
              <div class="container-xl" >
          <div class="table-responsive">
            <div class="table-wrapper">
              <div class="table-title">
               <div class="roww" >
                  <!-- <div class="col-sm-6">
                    <h2>Manage <b>Employees</b></h2>
                  </div> -->
                  <div class=" adduser">
                    <h2>Manage <b>Categories</b></h2>
                    <a href="./insertcateg.php"  > <button type="button" class="btn btn-success">Add New Categpry</button></a>
                  
                  </div>
                </div>
              </div>
              
              <table id="tableproducts" class="table table-striped table-hover">
               
                <thead>
                  <tr>
                    <!-- <th>
                      <span class="custom-checkbox">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                      </span>
                    </th> -->
                    <!-- <th>id</th> -->
                    <th>Category Name</th>
                    <th>Image</th>
                    <th style="width:40px">Details</th>
                    <th style="width:40px">Edit</th>
                    <th style="width:50px">Delete</th>
                    
                  </tr>
                </thead>
               
                <tbody>
                  <!-- Fetch Data From DataBase   -->
                <?php 
                foreach($data as $row) {
        
                echo '<tr>
                  
                   
                  <!-- <td> '.$row['id'].'</td> -->
                  <td> '.$row['categoryname'].'</td>
                 
                  <td> <img src="./image/'.$row['categoryimage'].' " style=" width:50px;height:50px " > </td>
                 
                

                  <td>
                  <a href="viewcateg.php?view_btn='.$row['id'].' " class="delete" ><button type="button" class="btn btn-primary">View</button></a>
                  </td>	

                  <td>
                  <a href="updatecateg.php?edit='.$row['id'].' " class="edit" ><button type="button" class="btn btn-warning">Edit</button></a>
                  </td>

                  <td>
                  <a href="insertcateg.php?delete_btn='.$row['id'].' " class="delete" ><button type="button" class="btn btn-danger">Delete</button></a>
                  </td>
                 	
                          
                  </tr>';
                  
                  
                  
                }
                     
                ?>
              </tbody>
            </table>
   
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