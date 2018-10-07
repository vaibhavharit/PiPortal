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
  <center><h1>Bid Management Database Records</h1></center> <br>

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
  $sqlget = "SELECT * FROM bidd";
  $sqldata = mysqli_query($conn, $sqlget) or die ('Error getting database');

  echo "<table>";
  echo "<tr><th>Client Name</th><th>Client Number</th><th>Client Email</th><th>vCPU</th><th>RAM</th><th>Total Storage</th><th>Storage Type</th><th>Operating System</th><th>Windows Partion</th><th>Linux Partion</th><th>Database</th><th>Database Administration</th><th>Database Backup</th><th>IPs</th><th>Antivirus</th><th>Backup</th><th>VM Name</th><th>Start Date</th><th>End Date</th><th>Time Period</th><th>Service Agreement</th><th>Submitted by</th><th>Attatchment</th><th>Zoho ID</th></tr>";

  // while($row = mysqli_fetch_array($result)) {
  while ($row = mysqli_fetch_array($sqldata)) {
    echo "<tr><td>";
    echo $row['Client Name'];
    echo "</td><td>";
    echo $row['Client Number'];
    echo "</td><td>";
    echo $row['Client email-id'];
    echo "</td><td>";
    echo $row['vCPU'];
    echo "</td><td>";
    echo $row['RAM'];
    echo "</td><td>";
    echo $row['Total Storage'];
    echo "</td><td>";
    echo $row['Storage Type'];
    echo "</td><td>";
    echo $row['Operating System'];
    echo "</td><td>";
    echo $row['Windows Partition'];
    echo "</td><td>";
    echo $row['Linux Partition'];
    echo "</td><td>";
    echo $row['Dtbse'];
    echo "</td><td>";
    echo $row['Database Administration'];
    echo "</td><td>";
    echo $row['Database backup'];
    echo "</td><td>";
    echo $row['IPs'];
    echo "</td><td>";
    echo $row['Antivirus'];
    echo "</td><td>";
    echo $row['Backup'];
    echo "</td><td>";
    echo $row['VM Name'];
    echo "</td><td>";
    echo $row['Start date'];
    echo "</td><td>";
    echo $row['End date'];
    echo "</td><td>";
    echo $row['Time period'];
    echo "</td><td>";
    echo $row['Service agreement'];
    echo "</td><td>";
    echo $row['Submitted by'];
    echo "</td><td>";
    echo $row['blob_file'];
    echo "</td><td>";
    echo $row['zoho_id'];
    echo "</td></tr>";
  }
  echo "</table>";

  mysqli_close($conn);
  ?>
</body>
</html>
