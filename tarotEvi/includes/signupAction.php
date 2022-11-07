<?php

// check if user clicked sign up button
if ( isset($_POST['signupSubmit'] ) )
{
  // connect to the db
  require "dbHandler.php";

  // fetch the info from the form
  $username = $_POST['uid']; // trim
  $mail = $_POST['mail'];
  $firstName = $_POST['fName'];
  $lastName = $_POST['lName'];
  $birthday = $_POST['birthday'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwdRepeat'];

  // check for errors;

    // check for null info
    if ( empty( $username ) ||  empty( $mail ) ||  empty( $password ) ||  empty( $passwordRepeat ) ||  empty( $firstName ) ||  empty( $lastName ) ||  empty( $birthday ) )
    {
      // send back to sign up page
      header( "Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$mail );
      exit(); // stop
    }
    // check if username & email is valid
    else if ( ( !filter_var( $mail, FILTER_VALIDATE_EMAIL ) ) && ( !preg_match( "/^[a-zA-Z0-9]*$/", $username ) ) )
    {
      header( "Location: ../signup.php?error=invalidmailuid" );
      exit();
    }
    // check if the email is valid
    else if ( !filter_var( $mail, FILTER_VALIDATE_EMAIL ) )
    {
      header( "Location: ../signup.php?error=invalidmail&uid=".$username );
      exit();
    }
    // check if the username is valid
    else if ( !preg_match( "/^[a-zA-Z0-9]*$/", $username ) )
    {
      header( "Location: ../signup.php?error=invaliduid&mail=".$mail );
      exit();
    }
    // check if the passwords match each other
    else if ( $password !== $passwordRepeat )
    {
      header( "Location: ../signup.php?error=passwordcheck&mail=".$mail."&uid=".$username );
      exit();
    }
    // check if the username is already taken
    else
    {
      $stmt1 = $mysqli -> prepare( "SELECT usersName FROM users WHERE usersName = ?" );
      $stmt1 -> bind_param( "s", $username );
      $stmt1 -> execute();
      $result = $stmt1 -> get_result();

      if ( $result -> num_rows > 0 )
      {
          header( "Location: ../signup.php?error=usertaken&mail=".$mail );
          exit();
      }
    // check if the email is already taken
      $stmt2 = $mysqli -> prepare( "SELECT usersMail FROM users WHERE usersMail = ?" );
      $stmt2 -> bind_param( "s", $mail );
      $stmt2 -> execute();
      $result2 = $stmt2 -> get_result();

      if ( $result2 -> num_rows > 0 )
      {
          header( "Location: ../signup.php?error=mailtaken&uid=".$username );
          exit();
      }

      // no errors!! ---> sign up the user
      /* Prepared statement, stage 1: prepare */
      $stmt = $mysqli -> prepare( "INSERT INTO users( usersName, usersMail, usersFirstName, usersLastName, usersPwd, usersBday) VALUES (?, ?, ?, ?, ?, ?)" );
      $hashedPwd = password_hash( $password, PASSWORD_DEFAULT );

      /* Prepared statement, stage 2: bind and execute */
      $stmt -> bind_param( "sssssi", $username, $mail, $firstName, $lastName, $hashedPwd, $birthday );
      $stmt -> execute();

      // should we crate the session here?
      session_start();

      // get userId & username
      $stmt3 = $mysqli -> prepare( "SELECT usersId, usersName FROM users WHERE usersName = ?" );
      $stmt3 -> bind_param( "s", $username );
      $stmt3 -> execute();
      $result3 = $stmt3 -> get_result();
      $row = $result3 -> fetch_assoc();

      $_SESSION['userId'] = $row['usersId'];
      $_SESSION['userUid'] = $row['usersName'];

      header( "Location: ../mainPage.php" );
      exit();
    }

    // close the connections
    //???????????
  }
  else
  {
    header( "Location: ../signup.php" );
    exit();
  }
