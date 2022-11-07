<?php
require "headerLogin.php";
?>

<main>

  <h1>Tarot Evi'ne Hoş Geldin</h1>
  <br>

  <div class="container2">
  <div class="container">

    <h2>Giriş Yap</h2>
    <br>
    <?php
    if ( isset( $_GET['error'] ) )
    {
      if ( $_GET['error'] == "emptyfields" )
      {
        echo '<p class = "signuperror">Fill in all the fileds!</p>';
      }
      else if ( $_GET['error'] == "nouserfound" )
      {
        echo '<p class = "signuperror">There is no user found with this username</p>';
      }
      else
      {
        echo '<p class = "signuperror">Wrong password!</p>';
      }
    }

   ?>
   <br>
   <form action = "includes/loginAction.php" method = "post">

     <input type = "text" name = "usernameInput" placeholder = "kullanıcı adı">
     <br>
     <br>
     <input type = "password" name = "passwordInput" placeholder = "şifre">
     <br>
     <p>Şifreni mi unuttun? O zaman <a href = "signup.php" >buraya tıkla</a>.</p>
     <input type = "submit" name = "loginSubmit" value="Giriş">
     <br>
     <br>
     <br>
   </form>
   <p>Henüz üye değilsen, üye olmak için <a href = "signup.php" >buraya tıkla</a>!</p>
 </div>
</div>

  <?php
  if ( isset( $_SESSION['userId'] ) )
  {
    echo "Hiiii!!! You are logged in!!!";
  }
  else
  {
    echo "you are not logged in";
  }
   ?>

<br>
<br>
<div class="containerShortcut">
  <p>Kayıt olmadan hızlıca bir fal bakıp çıkmak istiyorsan, <a href = "signup.php" >buraya tıklayarak</a> tarot sayfasına gidebilirsin.</p>
</div>

</main>

<?php
 require "footer.php";
?>
