<?php
  $hostname="localhost";
  $username="";
  $password="";
  $dbname="PiProject";

  $conn=mysqli_connect($hostname,$username,$password)
  or die("Connection Failed");

  $db=mysqli_select_db($conn,$dbname)
  or die("Database Problem".mysqli_error());

  $name=$_REQUEST["client_name"];
  $zid=$_REQUEST["zoho_id"];
  $num=$_REQUEST["client_number"];
  $id=$_REQUEST["client_email"];
  $cpu=$_REQUEST["vcpu"];
  $rm=$_REQUEST["ram"];
  $strg=$_REQUEST["storage"];
  $strtyp=$_REQUEST["store_type"];
  $oprsys=$_REQUEST["os"];
   $winpar=$_REQUEST["windows_partition"];
   $lipar=$_REQUEST["linux_partition"];
   $db=$_REQUEST["database"];
   $dbadmin=$_REQUEST["database_administration"];
   $dbbac=$_REQUEST["database_backup"];
   $ips=$_REQUEST["ip"];
   $antvir=$_REQUEST["antivirus"];
   $bckup=$_REQUEST["backup"];
   $vm=$_REQUEST["vm_name"];
   $sd=$_REQUEST["start_date"];
   $ed=$_REQUEST["end_date"];
   $tp=$_REQUEST["time_period"];
   $ser=$_REQUEST["service_agreement"];
   $sb=$_REQUEST["submitted_by"];
   $blb=$_REQUEST["blob_file"];

  $bidd= isset($_POST['bidd']) ? $_POST['bidd'] : '';
  $sql="insert into bidd values('".$name."','".$num."','".$id."','".$cpu."','".$rm."','".$strg."','".$strtyp."','".$oprsys."','".$winpar."','".$lipar."','".$db."','".$dbadmin."','".$dbbac."','".$ips."','".$antvir."','".$bckup."','".$vm."','".$sd."','".$ed."','".$tp."','".$ser."','".$sb."','".$blb."','".$zid."')";
  $result=mysqli_query($conn,$sql);
  if ($result) {
    echo "<script type='text/javascript'>alert('Submitted Successfully!')</script>";
  }
  else {
    echo "<script type='text/javascript'>alert('Submission Failed!')</script>";
  }
  //echo "Added Sucessfully, ";

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
  Zoho ID: $zid \r\n
  Client Email : $id \r\n
  vCPU : $cpu \r\n
  RAM : $rm \r\n
  Total Storage : $strg \r\n
  Storage Type : $strtyp \r\n
  Operating System : $oprsys \r\n
  Windows Partition : $winpar \r\n
  Linux Partition : $lipar \r\n
  Database : $db \r\n
  Database Administration : $dbadmin \r\n
  Database Backup : $dbbac \r\n
  IPs : $ips \r\n
  Antivirus : $antvir \r\n
  Backup : $bckup \r\n
  VM Name : $vm \r\n
  Start Date : $sd \r\n
  End Date : $ed \r\n
  Time Period : $tp \r\n
  Service Agreement : $ser \r\n
  Submitted By : $sb \r\n
  Work Order Uploaded : $blb \r\n";

  if ($mail->send()) {
    echo "<script type='text/javascript'>alert('Mail Sent!')</script>";
    echo "Done";
    }
  else
    echo "Error sending the mail";
?>
