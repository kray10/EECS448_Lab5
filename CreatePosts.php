<?php

  $mysqli = new mysqli("mysql.eecs.ku.edu", "kray", "mypassword", "kray");

  /* check connection */
  if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }

  $userName = $_POST['userName'];
  $content = $_POST['content'];
  $getUsername = "SELECT * FROM Users WHERE user_id = '$userName';";
  $savePost = "INSERT INTO Posts (content, author_id) VALUES ('$content', '$userName')";

  if (strlen($content) === 0) {
    echo "Posts content was left blank.";
  } elseif (strlen($userName) === 0) {
    echo "User name was left blank.";
  } else {
    if ($userResult = $mysqli->query($getUsername)) {
      if (mysqli_num_rows($userResult) == 0) {
        echo "User name not found";
      } else {
        if ($postResult = $mysqli->query($savePost)) {
          echo "Post saved";
        } else {
          echo "User was found, but post unable to be saved.";
        }
      }
    }
  }

?>
