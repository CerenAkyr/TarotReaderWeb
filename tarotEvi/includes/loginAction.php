<?php

if ( isset( $_POST['loginSubmit'] ) )
{
  // connect to the db
  require "dbHandler.php";


  $username = $_POST['usernameInput'];
  $pwd = $_POST['passwordInput'];

  if ( empty( $username ) || empty( $pwd ) )
  {
    header( "Location: ../index.php?error=emptyfields" );
    exit();
  }
  else
  {
    // check if there is a user with that name
    $stmt = $mysqli -> prepare( "SELECT usersId, usersName, usersPwd FROM users WHERE usersName = ?" );
    $stmt -> bind_param( "s", $username );
    $stmt -> execute();
    $result = $stmt -> get_result();
    $row = $result -> fetch_assoc();

    // kullanıcı ismi doğru mu bak
    if ( $result -> num_rows <= 0 )
    {
        header( "Location: ../index.php?error=nouserfound" );
        exit();
    }
    // id there is a username
    else
    {
      // check if the pwd is true
      if ( password_verify( $pwd, $row['usersPwd'] ) )
      {
        session_start();
        $_SESSION['userId'] = $row['usersId'];
        $_SESSION['userUid'] = $row['usersName'];
        header( "Location: ../mainPage.php" );
        exit();

      }
      // somehow it could be a string not true false so true condition is written first
      else
      {
        header( "Location: ../index.php?error=wrongpwd" );
        exit();
      }
    }
  }

}
else
{
  header( "Location: ../index.php" );
  exit();
}
