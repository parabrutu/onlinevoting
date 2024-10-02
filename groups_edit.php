<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Groups Profile
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       Edit Group Profile 
      </button>
      </h6>
    </div>
<div class="card-body">
<?php
$connection = mysqli_connect("localhost:3306","root","","voting");

if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];
    
    $query = "SELECT * FROM groups WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    foreach($query_run as $row){
      ?>

<form action="code.php" method="POST">

<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

            <div class="form-group">
                <label> Name </label>
                <input type="text" name="edit_name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label> Mobile </label>
                <input type="mobile" name="edit_mobile" value="<?php echo $row['mobile'] ?>" class="form-control checking_email" placeholder="Enter Email">
                <small class="error_email" style="color: red;"></small>
            </div>
            <div class="form-group">
                <label> Password </label>
                <input type="password" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter Password">
            </div>

            <a href="gallery.php" class="btn btn-danger"> Cancel </a>
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