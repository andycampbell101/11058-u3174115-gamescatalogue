<?php

	// Include files to help conenct to the database and solve errors
	require "../config.php";
	require "common.php";

	// Code to pull the data from the database to be changed
	if (isset($_GET['id'])) {
		try {

			// Connect to the database
			$connection = new PDO($dsn, $username, $password, $options);

			// Set the ID as a variable
			$id = $_GET['id'];

			// Create a SQL statement to remove the correct data
			$sql = 'DELETE FROM games WHERE id = :id';

			// Prepare the SQL statement to be run
			$statement = $connection->prepare($sql);

			// Bind the ID to the PDO ID
			$statement->bindValue(':id', $id);

			// Execute the SQL statement
			$statement->execute();

			// Success message
            $success = "Game successfully deleted";

		}

		// Add a statement if the code tried to run and was unsuccessful, spit out the error onto the screen
		catch(PDOException $error) {
			echo $sql . "<br>" . $error->getMessage();
		}

	};
    
    // At page load, show the entries from the database so users can delete entries
	try {

        // Connect to the database
		$connection = new PDO($dsn, $username, $password, $options);

        // Create a SQL statement to pull the correct data to show users
		$sql = "SELECT * FROM games";

        // Prepare the SQL statement to be run
		$statement = $connection->prepare($sql);

        // Execute the SQL statement
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


<!-- Code to show if the entry was deleted from the database successfully -->
<?php if ($success) echo $success; ?>

<?php include "templates/footer.php"?>