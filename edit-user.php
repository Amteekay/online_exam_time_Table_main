<?php  
session_start();

//check if user is not logged in
 if(!isset($_SESSION["user"])){
     header("location: login.php");
 }
//check if logged in as user
// if($_SESSION["user"]["role"] == "user"){
//     header("location: index.php");
// };

//header links
 require "inc/header.php"; ?>

<div class="container">

    <?php
 //header content
 require './pages/header-home.php';
 include 'inc/process.php'; 
 //if user click edit
if(isset($_GET["edit_user_id"]) && !empty($_GET["edit_user_id"])){
    $edit_user_id = $_SESSION["user"]["id"]; 
    //sql
    $sql = "SELECT * FROM users WHERE id = '$edit_user_id'";
    $query = mysqli_query($connection,$sql);
    $result = mysqli_fetch_assoc($query);
}else{
    header("location: users.php");

}
 ?>

    <div class="container p-3">
        <div class="row">
            
            <div class="col-3" style="background-color:#3F2305; border-radius:5px;">
    <h5 class="text-muted my-2 mx-2">Profile Settings</h5>
    <ul style="list-style-type: none; padding-left: 0; margin-top: 10px;">
        <li style="margin-bottom: 10px;">
            <a href="my-profile.php" class=" text-muted mx-4" style="text-decoration: none;">
                <i class="fas fa-user-circle"></i> My Profile
            </a>
        </li>
        <li style="margin-bottom: 10px;">
            <a href="view-profile.php" style="text-decoration: none;" class="text-danger mx-4">
                <i class="fas fa-eye"></i> View Profile
            </a>
        </li>
    </ul>
</div>
            <div class="col-9">
                <div class="container">
                    <h6>Edit User</h6>
                    <?php 
                    if(isset($error)) {
                    ?>
                    <div class="alert alert-danger">
                        <strong><?php echo $error ?></strong>
                    </div>
                    <?php
                         }elseif (isset($success)) {
                    ?>
                    <div class="alert alert-success">
                        <strong><?php echo $success ?></strong>
                    </div>
                    <?php
                   }
                 ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="<?php echo $result["name"];?>"
                                placeholder="Enter new name" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" value="<?php echo $result["email"];?>"
                                placeholder="Enter new email" class="form-control" id="">
                        </div>
                        <div class="form-group my-2">
                            <label for="">Change password</label>
                            <input type="checkbox" name="change_password" id="">
                        </div>
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="password" name="password" placeholder="Enter new password" class="form-control"
                                id="">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="edit_user" style="background-color:#ffffc2"
                                class="btn btn-sm text-dark my-2">
                                Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>


<?php
 //footer script
  require "inc/footer.php";  ?>
