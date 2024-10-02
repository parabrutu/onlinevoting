<?php
  include("dbconfig.php");

  if(isset($_POST['send_btn'])){
  $name=$_POST["full_name"];
  $email=$_POST["email"];
  $feedback=$_POST["opinion"];

  $query=mysqli_query($connection,"INSERT INTO feedback(full_name,email,opinion) VALUES('$name','$email','$feedback')");
  if($query)
  {
    echo '
      <script>
         alert("Feedback Submitted Successfully!");
         window.location="../";
      </script>
    ';
   }
  else{
    echo '
        <script>
           alert("Some error occured!");
           window.location="../";
        </script>
    ';
  }
}
?>