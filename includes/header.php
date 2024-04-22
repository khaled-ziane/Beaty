<?php  include('../includes/dbconnect.php');
session_start();

// echo $_SESSION['id'];
if(isset($_SESSION['useremail'])) {
    $user_id = $_SESSION['id'];
    $profile = "SELECT * from tbl_users where id='$user_id'";
    $result = $con->prepare($profile);
    $result->execute();  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedicalStore | Ecommerce Website</title>
    <link rel="stylesheet" href="../css/h.css">
    <link rel="stylesheet" href="../css/tables.css">
    <script src="../js/jquery.min.js"></script>
    <!-- <link rel="shortcut icon" type="image/x-icon" href="../img/favicon-logo.ico" > -->
    <link rel="shortcut icon" type="image/png" href="../img/logo.jpg"  >
    <script src="https://kit.fontawesome.com/9bb6ccdf9b.js"  
 crossorigin="anonymous">
</script>

</head>
<body>
    <!-- Header Start -->
 
    <header class="header-products">
      <div class="container-header">
      <a href="./index.php"><div class="flex-box-2">
      <img src="../img/beauty-logo.png"> 
           <h1 class="header-h1"><span class="font-primary text-primary"> <i>  Beaty</span></i></h1> 
        </div></a>
        <nav class="header_nav_links">
            <ul >
                <li><a href="./index.php">Home</a></li>
                <li><a href="./categories.php">Category</a></li>
                <li><a href="./products.php">See All</a></li>
                <li><a href="#contact">Contact US</a></li>
                <?php  ?>
            </ul>
        </nav>
        <?php  if(isset($_SESSION['useremail']) and $_SESSION['userrole']=="user") {
                foreach($result as $row) {  ?> 
         <div class="flex-box-3">
        <a class="profile-name" href="./userprofile.php" ><i class="fas fa-user-circle"></i></a>
        <p style="margin-right:5px;font-size:19px;color:#fff; cursor: pointer;" class="show-model"><?php echo $row['username']?> <i class="fas fa-caret-down" style="font-size:20px"></i></p>
        </div>
        <!-- <a class="logout" href="./clearsession.php"><i class="fas fa-sign-out-alt"></i>Logout</a> -->
       <?php } 
    }else if(isset($_SESSION['useremail']) and $_SESSION['userrole']=="admin") { 
                 foreach($result as $row) {  ?> 
         <div class="flex-box-3">
        <a class="profile-name" href="./adminprofile.php" ><i class="fas fa-user-circle"></i></a>
        <a href="./adminprofile.php"><?php echo $row['username']?></a>
        </div>
        <a class="logout" href="./clearsession.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    
        <?php }
    
    
       }else{   ?>
       <div class="flex-box-3">
         <a class="profile-name" href="./login.php" >Sign in</a> 
         </div> 
         <?php }?>  
     </div>
     <div class="user-nav_menu" style=" 
      text-align:center;
      background: #555;
      width:150px;
      position: absolute;
      z-index: 100;
      top:55px;
      right:200px;
      box-shadow:0 0 10px #555;
      display:none
      "
      >
      <a href="./userprofile.php" style="text-decoration:none;" >
        <p  style="padding:8px;font-size:18px;color:#fff;border-bottom:1px solid #dddddd">
        Profile
      </p> 
      </a>
      <a href="./userorders.php" style="text-decoration:none;" >
        <p  style="padding:8px;font-size:18px;color:#fff;border-bottom:1px solid #dddddd">
        Orders
      </p> 
      </a>
      <a href="./clearsession.php" style="text-decoration:none;" >
        <p style="padding:8px;font-size:18px;color:#fff;border-bottom:1px solid #dddddd">
      Logout
      </p> 
      </a>
  </div>
    </header>

  <script src="../js/showModel.js"></script>