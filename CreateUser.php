<?php

  $userName = $_POST['userName'];

  $mysqli = new mysqli("mysql.eecs.ku.edu", "kray", "mypassword", "kray");

  /* check connection */
  if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }

  if (strlen($userName) === 0) {
    echo "User name was left empty.";
  } elseif (strlen($userName) > 255) {
    echo "User name is too long.";
  } else {
    $insert = "insert into Users (user_id) VALUES ('$userName')";
    if ($result = $mysqli->query($insert)) {
      echo "User succesfully created.";
    } else {
      echo "User name already exists.";
    }
    $result->free();
    $mysqli->close();
  }
?>
