<html>
<head>
  <title>Database Records</title>
  <style type="text/css">
  table {
    border: 2px solid red;
    background-color: #FFC;
  }
  th {
    border-bottom: 5px solid #000;
  }
  td {
    border-bottom: 2px solid #666;
  }
  </style>
</head>

<body>
  <center><h1>Operations Department Database Records</h1></center> <br>

  <?php
  $hostname="localhost";
  $username="Vaibhav";
  $password="cdefghij";
  $dbname="PiProject";

  $conn=mysqli_connect($hostname,$username,$password)
  or die("Connection Failed");

  $db=mysqli_select_db($conn,$dbname)
  or die("Database Problem".mysqli_error());

  // $selected = mysqli_select_db("test_db", $conn)
  // or die("Unable to connect");
  //
  // $result = mysqli_query("SELECT * FROM bidd");

  //include('bid.php');
  $sqlget = "SELECT * FROM oprr";
  $sqldata = mysqli_query($conn, $sqlget) or die ('Error getting database');

  echo "<table>";
  echo "<tr><th>Client Name</th><th>Client Number</th><th>Client Email</th><th>Store Type</th><th>Server Type</th><th>Submitted by</th><th>Attatchment</th></tr>";

  // while($row = mysqli_fetch_array($result)) {
  while ($row = mysqli_fetch_array($sqldata)) {
    echo "<tr><td>";
    echo $row['client_name'];
    echo "</td><td>";
    echo $row['client_number'];
    echo "</td><td>";
    echo $row['client_email'];
    echo "</td><td>";
    echo $row['store_type'];
    echo "</td><td>";
    echo $row['server_type'];
    echo "</td><td>";
    echo $row['submitted_by'];
    echo "</td><td>";
    echo $row['blob_file'];
    echo "</td></tr>";
  }
  echo "</table>";

  mysqli_close($conn);
  ?>
</body>
</html>
