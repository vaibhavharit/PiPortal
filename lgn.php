<?php
  $hostname="localhost";
  $username="";
  $password="";
  $dbname="PiProject";

  $conn=mysqli_connect($hostname,$username,$password)
  or die("connection failed");

  $db=mysqli_select_db($conn,$dbname)
  or die("database problem".mysqli_error());

  $name=$_REQUEST["uname"];
  $passwrd=$_REQUEST["pwd"];
  $depar=$_REQUEST["dept"];

  if($depar=="FINANCE") {
    $sql="select * from finance where Username='".$name."' and Password='".$passwrd."'" ;
  }
  elseif($depar=="BID") {
    $sql="select * from BID where Username='".$name."' and Password='".$passwrd."'" ;
  }
  elseif($depar=="PMO") {
    $sql="select * from PMO where Username='".$name."' and Password='".$passwrd."'" ;
  }
  elseif($depar=="OPERATIONS") {
    $sql="select * from OPERATIONS where Username='".$name."' and Password='".$passwrd."'" ;
  }
  else
    echo "invalid";

  $result=mysqli_query($conn,$sql) or
  die("query execution failed".mysqli_error());

  if(mysqli_num_rows($result)>0) {
    if($depar=="BID") {
      header("Location: bigm.html");
    }
    elseif($depar=="FINANCE") {
      header("Location: finance.html");
    }
    elseif($depar=="PMO") {
      header("Location: pmo.html");
    }
    else {
      header("Location: operations.html");
    }
  }
  else
    echo "Not Registered User";

  mysqli_close($conn); ?>
