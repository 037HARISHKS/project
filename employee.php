<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Registration</title>
<style>
/* CSS Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f3f3f3;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="text"], input[type="number"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}
</style>
</head>
<body>

<div class="container">
    <h2>Employee Registration</h2>
    <form id="employeeRegistrationForm" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="position">Position:</label>
            <input type="text" id="position" name="position" required>
        </div>
        <div class="form-group">
            <label for="department">Department:</label>
            <input type="text" id="department" name="department" required>
        </div>
        <div class="form-group">
            <label for="salary">Salary:</label>
            <input type="number" id="salary" name="salary" required>
        </div>
        <div class="form-group">
            <label for="contactInformation">Contact Information:</label>
            <input type="text" id="contactInformation" name="contactInformation" required>
        </div>
        <input type="submit" value="Register">
    </form>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gov_management";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $position = $_POST["position"];
    $department = $_POST["department"];
    $salary = $_POST["salary"];
    $contactInformation = $_POST["contactInformation"];

    $sql = "INSERT INTO Employee (Name, Position, Department, Salary, ContactInformation) VALUES ('$name', '$position', '$department', '$salary', '$contactInformation')";
    
    if ($conn->query($sql) === TRUE) {
       
        echo "<script>
                setTimeout(function() {
                    alert('Login successful. The service requested by the people today!');
                    window.location.href = 'service_request.php';
                }, 2000); // 2 seconds delay
            </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>

</body>
</html>
