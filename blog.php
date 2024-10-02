<?php
session_start();
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="adduserprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">
            <div class="form-group">
                <label>NAME</label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>MOBILE</label>
                <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email">
                <small class="error_email" style="color: red;"></small>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>ADDRESS</label>
                <input type="text" name="address" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>ROLE</label>
                <input type="integer" name="role" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>STATUS</label>
                <input type="integer" name="status" class="form-control" placeholder="Enter Password">
            </div>
       


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Users Profile
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       Add User Profile 
      </button>
      </h6>
    </div>
<div class="card-body">

  <div class="table-responsive">
  <?php
  $connection = mysqli_connect("localhost:3306","root","","voting");
           $query = "SELECT * FROM user";
           $query_run = mysqli_query($connection, $query);
  ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>MOBILE</th>
            <th>PASSWORD</th>
            <th>ADDRESS</th>
            <th>ROLE</th>
            <th>STATUS</th>
            <th>EDIT</th>
            <th>DELETE</th>

          </tr>
        </thead>
        <tbody>
        <?php
            if(mysqli_num_rows($query_run) > 0)        
            {
                while($row = mysqli_fetch_assoc($query_run))
                {
                  ?>
                  <tr>
                  <td><?php  echo $row['id']; ?></td>
                  <td><?php  echo $row['name']; ?></td>
                  <td><?php  echo $row['mobile']; ?></td>
                  <td><?php  echo $row['password']; ?></td>
                  <td><?php  echo $row['address']; ?></td>
                  <td><?php  echo $row['role']; ?></td>
                  <td><?php  echo $row['status']; ?></td>
                  <td>
                      <form action="user_edit.php" method="post">
                          <input type="hidden" name="et_id" value="<?php echo $row['id']; ?>">
                          <button type="submit" name="et_btn" class="btn btn-success"> EDIT</button>
                      </form>
                  </td>
                  <td>
                      <form action="code.php" method="post">
                          <input type="hidden" name="del_id" value="<?php echo $row['id']; ?>">
                          <button type="submit" name="del_btn" class="btn btn-danger"> DELETE</button>
                      </form>
                  </td>
              </tr>
              <?php
                }
              }
              else{
                echo "No Record Found";
              }
        ?>

        </tbody>
      </table>
    
   </div>
  </div>
 </div>
</div>

<?php
include('includes/scripts.php');

?>