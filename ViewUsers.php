<html>
<head>
  <title>Users</title>
  <style type="text/css">
    td { width: 200px; overflow: hidden; }
    table { width : 200px; table-layout: fixed; }
  </style>
</head>
<body>
  <center>
<?php

  $mysqli = new mysqli("mysql.eecs.ku.edu", "kray", "mypassword", "kray");

  /* check connection */
  if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }

  $getUsername = "SELECT * FROM Users";

  $result = $mysqli->query($getUsername);

  echo("<table border=\"1\">".
          "<tr>".
          "<th>User Name</th>".
          "</tr>");

  while ($row = $result->fetch_assoc()) {
        echo ("<tr><td>".$row["user_id"]."</td></tr>");
    }
  echo "</table>";
?>
</center>
</body>
</html>
