<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StudentDetails</title>
    <link rel="stylesheet" href="styles/home.css">
</head>
<body>
<div class="container">
<?php
    include("connection.php");

    if(isset($_POST['delete'])) {
        $rollNoToDelete = $_POST['delete'];
        $deleteQuery = "DELETE FROM students WHERE roll = $rollNoToDelete";
        mysqli_query($conn, $deleteQuery);
    }

    $query = "SELECT * FROM students";
    $result = mysqli_query($conn, $query);
        echo "<table>";
        echo "<tr><th class='head'>RollNo</th><th class='head'>Name</th><th class='head'>Mark</th>
        		<th class='tools'></th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr class='body'>";
            echo "<td class='data'>" . $row["roll"] . "</td>";
            echo "<td class='data'>" . $row["name"] . "</td>";
            echo "<td class='data'>" . $row["mark"] . "</td>";
            echo "<td class='tools'>
            		<a class='edit' href='edit.php?id=" . $row["roll"] . "'>Edit</a>
            		<form method='POST'>
            			<button class='toolButton' type='submit' name='delete' value='".$row["roll"]."'>
            				Delete
            			</button>
            		</form>
            	  </td>";
            echo "</tr>";
        }
        echo "</table>";



    if (!mysqli_num_rows($result) > 0)
        echo "No data avialable !";
?>
</div>
<div class="insert">
    <a href="insert.php">Insert new data</a>
</div>
</body>
</html>
