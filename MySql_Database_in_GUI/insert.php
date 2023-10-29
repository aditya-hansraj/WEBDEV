<?php 
	include("connection.php");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Insert</title>
 	<link rel="stylesheet" href="styles/insertion.css">
 	<style>

 	</style>
 </head>
 <body>
 	<div class="form-control">
 		<form method="POST">
            <div class="miniform">
                <div class="label">
                    <span class="left">
                        <label for="roll">Roll No:</label>
                    </span>

                    <span class="left">
                        <label for="name">Name:</label>
                    </span>

                    <span class="left">
                        <label for="mark">Mark:</label>
                    </span>
                </div>

                <div class="input">
                    <span class="left">
                        <input type="text" id="roll" name="roll" value="<?php echo $row['roll']; ?>">
                    </span>

                    <span class="left">
                        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>">
                    </span>

                    <span class="left">
                        <input type="text" id="mark" name="mark" value="<?php echo $row['mark']; ?>">
                    </span>
                </div>
            </div>
            <div id="submit">
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
        <a id="link" href="index.php">View All Data</a> <br>
 	</div>
 </body>
 </html>

 <?php 
 	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	    $roll = intval($_POST['roll']);
	    $name = $_POST['name'];
	    $mark = $_POST['mark'];


	    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM students WHERE roll = $roll")) > 0) 
	    	echo "<h1 class='alert'>Roll number $roll already exists. Please use a different roll number.</h1>";
		else {
		    $insertQuery = "INSERT INTO students (roll, name, mark) VALUES ($roll, '$name', $mark)";

		    if (mysqli_query($conn, $insertQuery)) {
		        echo "Data inserted successfully.";
		    } else {
		        echo "Error inserting data: " . mysqli_error($conn);
		    }
		}
	}
	mysqli_close($conn);

  ?>