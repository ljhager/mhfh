<?php
  include_once "header.php";
  include_once "navigation.php";
  include_once "includes/dbh.inc.php";
?>

<td class="main">
<h2>Your Search Results</h2>
<div class="results">


<?php
  if (isset($_POST['submit'])) {
    // get search input
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    // query db
    $sql = "SELECT * FROM vital_stats WHERE vs_preferred_name LIKE '%?%' OR vs_first_name LIKE '%?%'";
    
    // start prepared stmt
    $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
        		echo "SQL error";
        	} else {
        		// assign data to prepared stmt and replace the placeholder '?' with '$search'
        		mysqli_stmt_bind_param($stmt, "ssss", $search, $search, $search, $search);
        		// execute stmt
        		mysqli_stmt_execute($stmt);
            // get number of results from search
        		$result = mysqli_stmt_get_result($stmt);
            $resultCount = mysqli_num_rows($result);

            if ($resultCount > 0) {
              echo "There are ".$resultCount." results!";

              while ($row = mysqli_fetch_assoc($result)) {
                // output search results
                // Could also add a link around result - link would take user to full article. Creates a unique link that carries information regarding which article it is, to next page.
                  
                    echo "<p>".$row[vs_preferred_name]."</p>
                    <p>".$row[vs_first_name]."</p>";
                  
                }
            }
        	}
        }
      ?>
    </div>
</td>


<?php

mysqli_close($conn);   // close connection
 
include_once 'footer.php';

?>
