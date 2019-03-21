<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Hager Family History</title>
    <link href="css/jquery-ui.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/script.js"></script>
  </head>

<body>  <!-- greenBG -->
<div id="container">  <!-- pinkGreen -->
	<div id="inner">  <!-- pale pink -->
		
    <header>
      <table id="masthead">
       <tr>
         <td>
           <a href="index.php"><img src="images/myHagerCOA.png" alt="My Hager COA" /></a>
         </td>
         <td>
          <p class="title">My Hager Family History</p>
         </td>
        </tr>
      </table>
    </header> 

    <div class="nav-login">
      <div class="greeting">    
<?php
    if (isset($_SESSION["u_first"])) {
      echo "Hello ", $_SESSION["u_first"];
  }
?>
</div>
            <?php
              if (isset($_SESSION['u_id'])) {
                echo '<form action="includes/logout.inc.php" method="POST">
                  <button type="submit" name="submit">Log Out</button>
                </form>';
              } else {
                echo '<form action="includes/login.inc.php" method="POST">
                  <input type="text" name="uid" placeholder="Username/Email">
                  <input type="password" name="pwd" placeholder="Password">
                  <button type="submit" name="submit">Log In</button>
                </form>';
              }
            ?>
    
    </div>  <!-- end nav-login --> 


    <table id="content">  <!-- orange border -->
		  <tr>
 