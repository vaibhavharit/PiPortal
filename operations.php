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
   $st=$_REQUEST["store_type"];
   $sr=$_REQUEST["server_type"];
   $sb=$_REQUEST["submitted_by"];
  $blb=$_REQUEST["blob_file"];

  $sql = "insert into oprr (client_name, client_number, client_email, store_type, server_type, submitted_by, blob_file)values('".$name."','".$num."','".$id."','".$st."','".$sr."','".$sb."','".$blb."')";
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
  Client Number : $num \r\n
  Client Email : $id \r\n
  VM Provisioned On : $st \r\n
  Specified Server (if applicable) : $sr \r\n
  Submitted By : $sb \r\n
  Attatchment: $blb \r\n";

  if ($mail->send()) {
    echo "<script type='text/javascript'>alert('Mail Sent!')</script>";
    echo "Done";
    }
  else
    echo "Error sending the mail";
?>
