<?php
include("connection.php");
echo "Connection established.<br>";

if (isset($_GET['id'])) {
    $studentID = $_GET['id'];

    $query = "SELECT * FROM students WHERE roll = $studentID";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)){

?>
<!DOCTYPE html><span>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data</title>
    <link rel="stylesheet" href="styles/edits.css">
    <style>
        
    </style>
</head>
<body>
    <div class="container">
        <h2 class="header">Edit Student Details</h2>
        <form class="form" method="POST">
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
                <input type="submit" name="update" value="Update">
            </div>
        </form>
        <a href="index.php">View All Data</a> <br>
    </div>
</body>
</html>
<?php 
    }else 
        echo "Student not found.";
}else
    echo "Student ID not specified.";

if(isset($_POST['update'])){
    // Handle form submission for updating student details
    $newRoll = $_POST['roll'];
    $newName = $_POST['name'];
    $newMark = $_POST['mark'];

    // Construct and execute an SQL query to update the data
    $updateQuery = "UPDATE students SET roll = $newRoll, name = '$newName', mark = $newMark WHERE roll = $studentID";

    if (mysqli_query($conn, $updateQuery)) {
        echo "Data updated successfully.";
    } else {
        echo "Error updating data: " . mysqli_error($conn);
    }
}
?>