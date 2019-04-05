<?php

function redirect($page = false, $message = null, $message_type = null)
{
  if (is_string($page)) {
    $location = $page;
  } else {
    $location = $_SERVER['SCRIPT_NAME'];
  }

  //Check for mesage
  if ($message != null) {
    //Set Message
    $_SESSION['message'] = $message;
  }
  //Check for type
  if ($message_type != null) {
    //Set message type
    $_SESSION['message_type'] = $message_type;
  }

  //redirect
  header('Location: ' . $location);
  exit;
}


//Display Message
function displayMessage()
{
  if (!empty($_SESSION['message'])) {
    //Assing message var
    $message = $_SESSION['message'];

    if (!empty($_SESSION['message_type'])) {
      //Assing type var
      $message_type = $_SESSION['message_type'];
      //Create output
      if ($message_type == 'error') {
        echo '<div class="alert alert-danger">' . $message . '</div>';
      } else {
        echo '<div class="alert alert-success">' . $message . '</div>';
      }
    }
    //Unset message
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
  } else {
    echo '';
  }
}
