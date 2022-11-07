<?php
require "headerSignup.php";
?>

<main>

  <h1>Şimdi kayıt ol!</h1>
    <br>




    <div id="containerInfo">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
         incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>

    <div id="containerRight">
    <div id="containerClear1">
        <h2>Sign up</h2>
        <br>
        <?php

        if ( isset( $_GET['error'] ) )
        {
          if ( $_GET['error'] == "emptyfields" )
          {
            echo '<p class = "signuperror">Fill in all the fileds!</p>';
          }
          else if ( $_GET['error'] == "invalidmailuid" )
          {
            echo '<p class = "signuperror">Please enter a valid username and email</p>';
          }
          else if ( $_GET['error'] == "invalidmail" )
          {
            echo '<p class = "signuperror">Please enter a valid email</p>';
          }
          else if ( $_GET['error'] == "invaliduid" )
          {
            echo '<p class = "signuperror">Please enter a valid username</p>';
          }
          else if ( $_GET['error'] == "passwordcheck" )
          {
            echo '<p class = "signuperror">Passwords do not match!</p>';
          }
          else if ( $_GET['error'] == "usertaken" )
          {
            echo '<p class = "signuperror">This username is already taken!</p>';
          }
          else
          {
            echo '<p class = "signuperror">This email address is already taken!</p>';
          }
        }
         ?>
          <form action = "includes/signupAction.php" method = "post">
              <input type = "text" id = "uid" name = "uid" placeholder = "Kullanıcı adı">
            <br>
            <br>
              <input type = "email" id = "mail" name = "mail" placeholder = "eposta adresi">
            <br>
            <br>
            <input type = "text" id = "fName" name = "fName" placeholder = "İsim">
          <br>
          <br>
          <input type = "text" id = "lName" name = "lName" placeholder = "Soyisim">
        <br>
        <br>

      </div>
      <span>

      <div id = "containerClear2">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <input type = "date" id = "birthday" name = "birthday" placeholder = "01/01/2000">
        <br>
        <br>
        <input type = "password" id = "pwd" name = "pwd" placeholder = "Şifre">
            <br>
            <br>
              <input type = "password" id = "pwdRepeat" name = "pwdRepeat" placeholder = "Şifre tekrarı">
            <br>
            <br>
              <input type = "submit" name = "signupSubmit" value="Kayıt ol">
            <br>
            <br>
            <br>
          </form>
      </div>
    </div>
      <br class = "clr">





</main>

<?php
 require "footer.php";
?>
