<?php
require "headerMain.php";


    if ( !(isset( $_SESSION['userId'] ) ) )
    {
      header( "Location: index.php" );
      exit();
    }
    else
    {

        require "includes/tarotType.html";
      }
    ?>
</body>
</html>
