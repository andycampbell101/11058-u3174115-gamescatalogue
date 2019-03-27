<?php

	// Include the file to understand connection to database
	require "../config.php";

	// Try/Catch Statement for running command
	try {

		// Connect to the database
		$connection = new PDO($dsn, $username, $password, $options);

		// Create the SQL statement to show the results from the database
		$sql = "SELECT * FROM games";

		// Now we run the SQL statement to add the information to the database
		$statement = $connection->prepare($sql);
		$statement->execute();

		// Put it into a new code so we can access the information and project it to the webpage
		$result = $statement->fetchAll();

	}

	// Add a statement if the code tried to run and was unsuccessful, spit out the error onto the screen
	catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}

?>

<?php include "templates/header.php"?>

<h2>Results</h2>

<?php 
                // This is a loop, which will loop through each result in the array
                foreach($result as $row) { 
            ?>

<p>
    
    <?php echo $row['gamename']; ?>, <?php echo $row['gameconsolebrand']; ?> <?php echo $row['gameconsolename']; ?>, <?php echo $row['gameyear']; ?><br>
     <a href="delete-game.php?id=<?php echo $row['id']; ?>">Delete</a>
</p>
<?php 
                            // this willoutput all the data from the array
                            //echo '<pre>'; var_dump($row); 
                        ?>

<hr>
<?php }; //close the foreach
        
?>

<?php include "templates/footer.php"?>