<?php 

    // Include files to help conenct to the database and solve errors
    require "../config.php";
    require "common.php";

    // run when submit button is clicked
    if (isset($_POST['submit'])) {

        try {

            // Connect to the database
            $connection = new PDO($dsn, $username, $password, $options);  
            
            // Grab the elements entered into the forms as a set of variables
            $game =[
              "id"         => $_POST['id'],
              "gamename" => $_POST['gamename'],
              "gameconsolebrand"  => $_POST['gameconsolebrand'],
              "gameconsolename"   => $_POST['gameconsolename'],
              "gameyear"   => $_POST['gameyear'],
            ];
            
            // Create a SQL statement to update the information in the database where the ID matches
            $sql = "UPDATE `games` 
                    SET id = :id, 
                        gamename = :gamename, 
                        gameconsolebrand = :gameconsolebrand, 
                        gameconsolename = :gameconsolename, 
                        gameyear = :gameyear
                    WHERE id = :id";

            // Prepare the SQL statement to be run
            $statement = $connection->prepare($sql);
            
            // Execute the SQL statement
            $statement->execute($game);

        } 
        
        // Add a statement if the code tried to run and was unsuccessful, spit out the error onto the screen
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }


    // Get the information from the database so users can edit the information
    if (isset($_GET['id'])) {
                
        try {

            // Connect to the database
            $connection = new PDO($dsn, $username, $password, $options);
            
            // Set the ID as a variable which can be used
            $id = $_GET['id'];
            
            // Create a SQL statement to pull the correct data to show users
            $sql = "SELECT * FROM games WHERE id = :id";
            
            // prepare the connection
            $statement = $connection->prepare($sql);
            
            // Bind the ID to the PDO ID
            $statement->bindValue(':id', $id);
            
            // Execute the SQL statement
            $statement->execute();
            
            // Attach the SQL statement to the new variable so we can access it in the form
            $game = $statement->fetch(PDO::FETCH_ASSOC);
            
        }
        
        // Add a statement if the code tried to run and was unsuccessful, spit out the error onto the screen
        catch(PDOExcpetion $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }
    
    // If the website cannot find an ID associated, we need a fall back to let users know what happened
    else {
        // Show an error if there is no ID
        echo "No id - something went wrong";
        //exit;

    };
?>

<?php include "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<p>Game successfully updated.</p>
<?php endif; ?>

<h2>Edit a work</h2>

<form method="post">

    <label class="id" for="id">Game Name</label>
    <input type="text" name="id" class="id" value="<?php echo escape($game['id']); ?>">

    
    <label for="gamename">Game Name</label>
    <input type="text" name="gamename" id="gamename" value="<?php echo escape($game['gamename']); ?>">

    <label for="gameconsolebrand">Brand</label>
    <input type="text" name="gameconsolebrand" id="gameconsolebrand" value="<?php echo escape($game['gameconsolebrand']); ?>">

    <label for="gameconsolename">Console</label>
    <input type="text" name="gameconsolename" id="gameconsolename" value="<?php echo escape($game['gameconsolename']); ?>">

    <label for="gameyear">Year</label>
    <input type="text" name="gameyear" id="gameyear" value="<?php echo escape($game['gameyear']); ?>">

    <input type="submit" name="submit" value="Save">

</form>





<?php include "templates/footer.php"; ?>