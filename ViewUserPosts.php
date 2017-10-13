<html>
<head>
  <title>User Posts</title>
  <style type="text/css">
    td { width: 800px; overflow: hidden; }
    table { width : 800px; table-layout: fixed; }
  </style>
</head>
<body>
  <center>
<?php

  $userName = $_POST['userName'];

  $mysqli = new mysqli("mysql.eecs.ku.edu", "kray", "mypassword", "kray");
  if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
  }

  $getPosts = "SELECT * FROM Posts WHERE author_id = '$userName' ORDER BY post_id";

  $result = $mysqli->query($getPosts);

  echo("<table border=\"1\">".
          "<tr>".
          "<th>Posts</th>".
          "</tr>");

  while ($row = $result->fetch_assoc()) {
        echo ("<tr><td>".$row['content']."</td></tr>");
  }
  echo "</table>";
?>
</center>
</body>

</html>
