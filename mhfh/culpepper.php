<?php
  include_once "header.php";
  include_once "navigation.php";
  include_once "includes/dbh.inc.php";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if( !$conn) 
{
	die('ERROR: Cannot connect to database $db on server $server 
	using user name $user ('.mysqli_connect_errno().
	', '.mysqli_connect_error().')');
}
$userQuery = 'SELECT vs_preferred_name, vs_first_name, vs_middle_name, vs_suffix, vs_birth_date, vs_death_date FROM vital_stats WHERE vs_preferred_name = "Culpepper"';  // must use double quotes on name
$result = mysqli_query($conn, $userQuery);

if (!$result) 
{
	die('Could not successfully run query ($userQuery) from $db: ' .	
		mysqli_error($conn) );
}

if (mysqli_num_rows($result) == 0) 
{
	print('No records found with query $userQuery');
}
else 
{ 

?>

<td class="main">
<h1>Culpepper</h1>

<?php
	print('<table border = \'1\'>');
	print('<tr><th>Last</th><th>First</th><th>Middle</th><th>Suffix</th><th>Birth</th><th>Death</th></tr>');

	while ($row = mysqli_fetch_assoc($result))
	{
	   print ('<tr><td>'.$row['vs_preferred_name'].
            '</td><td>'.$row['vs_first_name'].
            '</td><td>'.$row['vs_middle_name'].
            '</td><td>'.$row['vs_suffix'].
            '</td><td>'.$row['vs_birth_date'].
            '</td><td>'.$row['vs_death_date'].'</td></tr>');
	}
	print('</table');
}
?>

</td>
 
<?php
mysqli_close($conn);   // close the connection
?>

<div class="gallery">
  <figure>
     <img src="images/family/culpepperCassandra&AndrewCulpepper.jpg" alt="Cassandra & Andrew Culpepper Hager" width="100" height="170">
    <figcaption>Cassandra &amp; Andrew<br>Culpepper Hager</figcaption>
  </figure>
  
  <figure>
     <img src="images/family/culpepperCassandraHagerSignature.jpg" alt="Cassandra Culpepper Hager's Signature" width="200" height="130">
    <figcaption>Cassandra Culpepper<br>Hager's Signature</figcaption>
  </figure>
  
  <figure>
     <img src="images/family/culpepperHattie&ArthurVinson.jpg" alt="Hattie Culpepper & Arthur Vinson Wedding Photo" width="100" height="170">
    <figcaption>Hattie Culpepper &amp;<br>Arthur Vinson Wedding Photo</figcaption>
  </figure>
  
  <figure>
     <img src="images/family/culpepperWilliamMonty.jpg" alt="William Monty Culpepper" width="75" height="100">
    <figcaption>William Monty<br>Culpepper</figcaption>
  </figure>
</div>

<?php 
include_once 'footer.php';
?>
