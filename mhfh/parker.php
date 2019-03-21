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
$userQuery = 'SELECT vs_preferred_name, vs_first_name, vs_middle_name, vs_suffix, vs_birth_date, vs_death_date FROM vital_stats WHERE vs_preferred_name = "Parker"';  // must use double quotes on name
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
<h1>Parker</h1>
  
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

include_once 'footer.php';

?>
