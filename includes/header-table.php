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
    <!-- Header Start -->
 
    <header class="header-products">
      <div class="container-header">
     <a href="./index.php"><div class="flex-box-1">
      <img src="../img/beauty-logo.png"> 
           <h1><span class="font-primary text-primary"> <i>  Beaty</span></i></h1> 
        </div></a>
        <nav class="nav_links">
            <ul >
                <li><a href="./index.php">Home</a></li>
                <li><a href="./categories.php">Category</a></li>
                <li><a href="./products.php">See All</a></li>
                <li><a href="#contact">Contact US</a></li>
            </ul>
        </nav>
        <?php  if(isset($_SESSION['useremail']) and $_SESSION['userrole']=="admin") {
                foreach($result as $row) {  ?> 
         <div class="flex-box-3">
        <a class="profile-name" href="./adminprofile.php" ><i class="fas fa-user-circle"></i></a>
        <a href="./adminprofile.php"><?php echo $row['username']?></a>
        </div>
        <a class="logout" href="./clearsession.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        
       <?php } 
    }else {   ?>
    <div class="flex-box-3">
         <a class="profile-name " href="./login.php" >Sign in</a> 
         </div> 
         <?php }?>
     </div>
    </header>