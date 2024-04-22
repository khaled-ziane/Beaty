<?php include('../includes/header.php');
if ($_SESSION['useremail']=="" OR $_SESSION['userrole']=="admin" ) {
    header('location:login.php');
  }
$id = $_SESSION['id'];



$sql2 = "SELECT * from tbl_users u,tbl_address a where u.address_id=a.id and u.id='$id' ";  
$data2 = $con->prepare($sql2);
$data2->execute();
foreach($data2 as $row) {
    $_SESSION['userphone']=$row['userphone'];
}
$phone = $_SESSION['userphone'];
$sql = "SELECT * from tbl_orders where orderphone='$phone'  ";
$data = $con->query($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="../css/order.css">
</head>
<body>
    <div class="row ">
        <h1>Orders</h1>
        <table id="myTable">
                <thead>
                    <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Address</th>
                    <th>phone</th>
                    <th>Status</th>
                     
                    </tr>
                </thead>
                <tbody>
                <?php 
                   foreach($data as $row) {
                  ?>
                    <tr>
                    <td> <?php  echo  $row['ordername'] ?> </td>
                  <td> <?php echo $row['orderdate'] ?> </td>
                  <td> <?php echo $row['orderaddress'] ?> </td>
                  <td> <?php echo   $row['orderphone'] ?></td>
                  <td> 
  
                      <?php 
                        if ($row['orderstatus']==1) {
                            $status = "Delivered";
                              echo  '<p  style="color:green;font-weight:bold " >'.$status.'</p>';
                         
                         }else {
                            $status = "Pending";
                        
                           echo '<p style="color:orange ; font-weight:bold">'.$status.'</p>';
                         }
                    ?> 


                  </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
       <script src="../js/jquery.min.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function(){
             // $('#tableproducts').hide();
              $('#myTable').DataTable();
            });
          </script>



