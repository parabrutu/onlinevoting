<?php
  include("dbconfig.php");

  if(isset($_POST['sbtn']))
  {
    $name=$_POST["name"];
    $mobile=$_POST["mobile"];
    $email=$_POST["email"];
    $subject=$_POST["subject"];
    $message=$_POST["message"];

    $query=mysqli_query($connection,"INSERT INTO contact(name,mobile,email,subject,message) VALUES('$name','$mobile','$email','$subject','$message')");
    if($query)
    {
        echo '
            <script>
                alert("Your Response Successfully Recorded!");
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