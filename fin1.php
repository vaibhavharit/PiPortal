<?php
  $hostname="localhost";
  $username="";
  $password="";
  $dbname="PiProject";

  $conn=mysqli_connect($hostname,$username,$password)
  or die("connection failed");

  $db=mysqli_select_db($conn,$dbname)
  or die("database problem".mysqli_error());

  $name=$_REQUEST["client_name"];
  $num=$_REQUEST["client_number"];
  $id=$_REQUEST["client_email"];
  $cs=$_REQUEST["client_status"];
  $blb=$_REQUEST["blob_file"];

  $sql = "insert into financee (client_name, client_number, client_email, client_status, blob_file)values('".$name."','".$num."','".$id."','".$cs."','".$blb."')";
  $result=mysqli_query($conn,$sql);
  if ($result) {
    echo "<script type='text/javascript'>alert('Submitted Successfully!')</script>";
  }
  else {
    echo "<script type='text/javascript'>alert('Submission Failed!')</script>";
  }

  mysqli_close($conn);

  require 'phpmailer/PHPMailerAutoload.php';

  $mail = new PHPMailer();

  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPSecure = "tls";
  $mail->Port = 587;
  $mail->SMTPAuth = true;
  $mail->Username = '';
  $mail->Password = '';
  md5($mail->Password);

  $mail->setFrom('vaibhav16x@gmail.com', 'Vaibhav');
  $mail->addAddress('vaibhav16x@gmail.com');
  $mail->Subject = 'Pi: Details Submitted';
  $mail->Body = "Details for the client $name are recorded as submitted below. \r\n
  Client number : $num \r\n
  Client Email : $id \r\n
  Client Status : $cs \r\n
  Attatchments: $blb \r\n ";

  if ($mail->send()) {
    echo "<script type='text/javascript'>alert('Mail Sent!')</script>";
    echo "Done";
    }
  else
    echo "Error sending the mail";
?>
