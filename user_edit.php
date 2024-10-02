<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Users Profile
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       Edit User Profile 
      </button>
      </h6>
    </div>
<div class="card-body">
<?php
$connection = mysqli_connect("localhost:3306","root","","voting");

if(isset($_POST['edit_btn']))
{
    $id = $_POST['et_id'];
    $query = "SELECT * FROM user WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    foreach($query_run as $row){
      ?>

<form action="code.php" method="POST">

<input type="hidden" name="et_id" value="<?php echo $row['id'] ?>">

            <div class="form-group">
                <label> Name </label>
                <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label> Mobile </label>
                <input type="mobile" name="mobile" value="<?php echo $row['mobile'] ?>" class="form-control checking_email" placeholder="Enter Email">
                <small class="error_email" style="color: red;"></small>
            </div>
            <div class="form-group">
                <label> Password </label>
                <input type="password" name="password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label> Address </label>
                <input type="text" name="address" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter Password">
            </div>

            <a href="blog.php" class="btn btn-danger"> Cancel </a>
            <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>
    </form>

            <?php
    }

}
        ?>


    </div>
   </div>
</div>


<?php
include('includes/scripts.php');

?>