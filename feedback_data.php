<?php
session_start();
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">FeedBack Data
      </h6>
    </div>
<div class="card-body">

  <div class="table-responsive">
  <?php
  $connection = mysqli_connect("localhost:3306","root","","voting");
           $query = "SELECT * FROM feedback";
           $query_run = mysqli_query($connection, $query);
  ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>Email</th>
            <th>Opinion</th>
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
                  <td><?php  echo $row['full_name']; ?></td>
                  <td><?php  echo $row['email']; ?></td>
                  <td><?php  echo $row['opinion']; ?></td>
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