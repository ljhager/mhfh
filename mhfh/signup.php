<?php
	include_once "header.php";
  include_once "navigation.php";
?>

<td class="main">
	<h2>Sign Up</h2>
	
		<form class="signup-form" action="includes/signup.inc.php" method="POST">
<?php
			 // prevents user data deletion
				if (isset($_GET['first'])) {
					$first = $_GET['first'];
					echo '<input type="text" name="first" placeholder="First Name" value="'.$first.'">';
				}
				else {
					echo '<input type="text" name="first" placeholder="First Name">';
				}

				if (isset($_GET['last'])) {
					$last = $_GET['last'];
					echo '<input type="text" name="last" placeholder="Last Name" value="'.$last.'">';
				}
				else {
					echo '<input type="text" name="last" placeholder="Last Name">';
				}
?>
			
			<input type="text" name="email" placeholder="Email">
			
<?php
      
			if (isset($_GET['uid'])) {
				$uid = $_GET['uid'];
				echo '<input type="text" name="uid" placeholder="Username" value="'.$uid.'">';
			}
			else {
				echo '<input type="text" name="uid" placeholder="Username">';
			}
?>
			<input type="password" name="pwd" placeholder="Password">
			<button type="submit" name="submit">Sign up</button>
		</form>
</td>


<?php
      // create error messages using GET methods
			// first check if GET not in URL named "signup"
			if (!isset($_GET['signup'])) {
				// if not exit script and do nothing
				exit();
			}
			else {
				// if so assign GET to a variable
				$signupCheck = $_GET['signup'];
				// check if GET value is equal to a specific string
				if ($signupCheck == "empty") {
					// if so create error or success message
					echo "<p class='error'>Please complete all fields</p>";  // user data deleted, correct error message
					exit();
				}
				elseif ($signupCheck == "char") {
					echo "<p class='error'>Please enter valid characters a-z</p>";  // 'invalid' in URL, no message, username sticks
					exit();
				}
				elseif ($signupCheck == "email") {
					echo "<p class='error'>Please enter a valid email address</p>"; // THIS ONE WORKS
					exit();
				}
        elseif ($signupCheck == "usertaken") {
					echo "<p class='error'>Username already taken. Please select another</p>"; // THIS ONE WORKS
					exit();
				}
				elseif ($signupCheck == "success") {
					echo "<p class='success'>You are signed up!</p>";  // 'success' in URL, returns to Home page, no message
					exit();
				}
			}
?>

<?php
	include_once "footer.php";
?>












