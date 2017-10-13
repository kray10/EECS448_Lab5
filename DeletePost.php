<html>
<head>
  <title>Delete Posts</title>
</head>
<body>
  <center>
<?php

  $mysqli = new mysqli("mysql.eecs.ku.edu", "kray", "mypassword", "kray");
  if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
  }

  if(isset($_POST['delete'])) {
    $delete = $_POST['delete'];
    $errors = false;
    $succesfulDelete = array();
    $unsuccesfulDelete = array();

    foreach ($delete as $post){
      $deletPosts = "DELETE FROM Posts WHERE post_id = '$post'";
      if ($result = $mysqli->query($deletPosts)) {
        array_push($succesfulDelete, $post);
      }  else {
        array_push($unsuccesfulDelete, $post);
        $errors = true;
      }
    }
  echo "The following entries were successfully deleted:<br><br>";
  foreach ($succesfulDelete as $good){
    echo $good."<br />";
  }
  if ($errors) {
    echo "The following entries failed to be deleted:<br><br>";
    foreach ($unsuccesfulDelete as $bad){
      echo $bad."<br />";
    }
  }
} else {
  echo "No posts were selected.";
}
?>
</center>
</body>

</html>
