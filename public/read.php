<?php

// Code to state command to run after submit button is pressed

if (isset($_POST['submit'])) {

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

}
?>

<?php include "templates/header.php"?>

<?php  
    if (isset($_POST['submit'])) {
        //if there are some results
        if ($result && $statement->rowCount() > 0) { ?>
<h2>Results</h2>

<?php 
                // This is a loop, which will loop through each result in the array
                foreach($result as $row) { 
            ?>

<p>
    
    <?php echo $row['gamename']; ?>, <?php echo $row['gameconsolebrand']; ?> <?php echo $row['gameconsolename']; ?>, <?php echo $row['gameyear']; ?><br>
</p>
<?php 
                            // this willoutput all the data from the array
                            //echo '<pre>'; var_dump($row); 
                        ?>

<hr>
<?php }; //close the foreach
        }; 
    }; 
?>

<form method="post">

	<input type="submit" name="submit" value="View all">

</form>

<?php include "templates/footer.php"?>

