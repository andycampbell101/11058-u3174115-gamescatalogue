<?php

// Code to state command to run after submit button is pressed

if (isset($_POST['submit'])) {

	// Include the file to understand connection to database
	require "../config.php";

	// Try/Catch Statement for running command
	try {

		// Connect to the database
		$connection = new PDO($dsn, $username, $password, $options);

		// Get the contents from the forms that information will have been entered by the user and store in array
		$new_game = array(
			"gamename" => $_POST['gamename'],
			"gameconsolebrand" => $_POST['gameconsolebrand'],
			"gameconsolename" => $_POST['gameconsolename'],
			"gameyear" => $_POST['gameyear'],
		);

		// Convert the array with the information provided into an SQL statement to then store the information in the database
		$sql = "INSERT INTO games (gamename, gameconsolebrand, gameconsolename, gameyear) VALUES (:gamename, :gameconsolebrand, :gameconsolename, :gameyear)";

		// Now we run the SQL statement to add the information to the database
		$statement = $connection->prepare($sql);
		$statement->execute($new_game);

	}

	// Add a statement if the code tried to run and was unsuccessful, spit out the error onto the screen
	catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}

}
?>

<?php include "templates/header.php"?>

	<h2>Add a game</h2>

<?php

	if (isset($_POST['submit']) && $statement) {

?>

	<p>Game successfully added to the catalogue.</p>

<?php 

	}

 ?>

 <!-- These are the forms which the information is going to be collected from -->

 <form method="post">
 	<p>
        <label for="gamename">Name of the game</label>
        <input type="text" name="gamename" id="gamename">
    </p>

    <p>
        <label for="gameconsolebrand">Brand of console</label>
        <select name="gameconsolebrand" id="gameconsolebrand">
            <option>Select a brand</option>
            <option id="Atari" value="Atari">Atari</option>
            <option id="SEGA" value="SEGA">SEGA</option>
            <option id="Nintendo" value="Nintendo">Nintendo</option>
            <option id="Microsoft" value="Microsoft">Microsoft</option>
            <option id="Sony" value="Sony">Sony</option>
            <option id="Other" value="Other">Other</option>
        </select>
    </p>

    <p>
        <label for="gameconsolename" class="gameconsolename">Console name</label>
        <select name="gameconsolename" class="gameconsolename">
            <option>Select a console</option>
            <option class="Atari" value="2600">2600</option>
            <option class="SEGA"value="Genesis">Genesis</option>
            <option class="Nintendo" value="Game Boy/Game Boy Colour">Game Boy/Game Boy Colour</option>
            <option class="Nintendo" value="Game Boy Advance">Game Boy Advance</option>
            <option class="Nintendo" value="NES/NES Classic">NES/NES Classic</option>
            <option class="Nintendo" value="SNES/SNES Classic">SNES/SNES Classic</option>
            <option class="Nintendo" value="GameCube">Nintendo GameCube</option>
            <option class="Nintendo" value="DS">DS</option>
            <optoin class="Nintendo" value="3DS">3DS</optoin>
            <option class="Nintendo" value="Wii">Wii</option>
            <option class="Nintendo" value="Wii U">Wii U</option>
            <option class="Nintendo" value="Switch">Switch</option>
            <option class="Microsoft" value="Windows">Windows</option>
            <option class="Microsoft" value="Xbox">Xbox</option>
            <option class="Microsoft" value="Xbox 360">Xbox 360</option>
            <option class="Microsoft" value="Xbox One">Xbox One</option>
            <option class="Sony" value="PlayStation">PlayStation</option>
            <option class="Sony" value="PlayStation 2">PlayStation 2</option>
            <option class="Sony" value="PlayStation 3">PlayStation 3</option>
            <option class="Sony" value="PlayStation 4">PlayStation 4</option>
            <option class="Sony" value="PlayStation Portable (PSP)">PlayStation Portable (PSP)</option>
            <option class="Sony" value="PlayStation Vita">PlayStation Vita</option>
            <option class="Other" value="Mobile">Mobile</option>

        </select>
    </p>

    <p>
        <label for="gameyear" class="gameyear">Year of release</label>
        <select name="gameyear" class="gameyear">
            <option>Select a year</option>
            <option value="2019">2019</option>
            <option value="2018">2018</option>
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
            <option value="2007">2007</option>
            <option value="2006">2006</option>
            <option value="2005">2005</option>
            <option value="2004">2004</option>
            <option value="2003">2003</option>
            <option value="2002">2002</option>
            <option value="2001">2001</option>
            <option value="2000">2000</option>
            <option value="1999">1999</option>
            <option value="1998">1998</option>
            <option value="1997">1997</option>
            <option value="1996">1996</option>
            <option value="1995">1995</option>
            <option value="1994">1994</option>
            <option value="1993">1993</option>
            <option value="1992">1992</option>
            <option value="1991">1991</option>
            <option value="1990">1990</option>
            <option value="1989">1989</option>
            <option value="1988">1988</option>
            <option value="1987">1987</option>
            <option value="1986">1986</option>
            <option value="1985">1985</option>
            <option value="1984">1984</option>
            <option value="1983">1983</option>
            <option value="1982">1982</option>
            <option value="1981">1981</option>
            <option value="1980">1980</option>
            <option value="1979">1979</option>
            <option value="1978">1978</option>
            <option value="1977">1977</option>
            <option value="1976">1976</option>
            <option value="1975">1975</option>
            <option value="1974">1974</option>
            <option value="1973">1973</option>
            <option value="1972">1972</option>
            <option value="1971">1971</option>
            <option value="1970">1970</option>
        </select>
    </p>

 	<input type="submit" name="submit" value="Submit">

 </form>

<!-- Some basic jQuery to hide the entries depending on which brand console is selected by the user -->

 <script>

 	$(document).ready(function(){

 		$(".gameconsolename").hide();
 		$(".gameyear").hide();
 		$(".Atari").hide();
 		$(".SEGA").hide();
 		$(".Nintendo").hide();
 		$(".Microsoft").hide();
 		$(".Sony").hide();
 		$(".Other").hide();

 		$("#gameconsolebrand").change(function(){
 			if($(this).val() == 'Atari') {
 				$(".gameconsolename").fadeIn();
 				$(".gameyear").fadeIn();
 				$(".Atari").fadeIn();
		 		$(".SEGA").hide();
		 		$(".Nintendo").hide();
		 		$(".Microsoft").hide();
		 		$(".Sony").hide();
		 		$(".Other").hide();
 			}
 		});

 		$("#gameconsolebrand").change(function(){
 			if($(this).val() == 'SEGA') {
 				$(".gameconsolename").fadeIn();
 				$(".gameyear").fadeIn();
 				$(".SEGA").fadeIn();
		 		$(".Atari").hide();
		 		$(".Nintendo").hide();
		 		$(".Microsoft").hide();
		 		$(".Sony").hide();
		 		$(".Other").hide();
 			}
 		});	

 		$("#gameconsolebrand").change(function(){
 			if($(this).val() == 'Nintendo') {
 				$(".gameconsolename").fadeIn();
 				$(".gameyear").fadeIn();
 				$(".Nintendo").fadeIn();
		 		$(".Atari").hide();
		 		$(".SEGA").hide();
		 		$(".Microsoft").hide();
		 		$(".Sony").hide();
		 		$(".Other").hide();
 			}
 		});	

 		$("#gameconsolebrand").change(function(){
 			if($(this).val() == 'Microsoft') {
 				$(".gameconsolename").fadeIn();
 				$(".gameyear").fadeIn();
 				$(".Microsoft").fadeIn();
		 		$(".Atari").hide();
		 		$(".SEGA").hide();
		 		$(".Nintendo").hide();
		 		$(".Sony").hide();
		 		$(".Other").hide();
 			}
 		});	

 		$("#gameconsolebrand").change(function(){
 			if($(this).val() == 'Sony') {
 				$(".gameconsolename").fadeIn();
 				$(".gameyear").fadeIn();
 				$(".Sony").fadeIn();
		 		$(".Atari").hide();
		 		$(".SEGA").hide();
		 		$(".Nintendo").hide();
		 		$(".Microsoft").hide();
		 		$(".Other").hide();
 			}
 		});	

 		$("#gameconsolebrand").change(function(){
 			if($(this).val() == 'Other') {
 				$(".gameconsolename").fadeIn();
 				$(".gameyear").fadeIn();
 				$(".Other").fadeIn();
		 		$(".Atari").hide();
		 		$(".SEGA").hide();
		 		$(".Nintendo").hide();
		 		$(".Microsoft").hide();
		 		$(".Sony").hide();
 			}
 		});	

 	});

 </script>

 <?php include "templates/footer.php"?>