<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Apply for Government Schemes</title>
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

input[type="text"], input[type="email"], select {
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

.popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #ffffff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}
</style>
</head>
<body>

<div class="container">
    <h2>Apply for Government Schemes</h2>
    <form id="schemeApplicationForm" method="post">
        <div class="form-group">
            <label for="citizenid">Citizen ID:</label>
            <input type="text" id="citizenid" name="citizenid" required>
        </div>
        <div class="form-group">
            <label for="scheme">Select Scheme:</label>
            <select id="scheme" name="scheme" required>
                <option value="">Select a scheme</option>
                <option value="Social Welfare Scheme">Social Welfare Scheme</option>
                <option value="Education Scheme">Education Scheme</option>
                <option value="Agricultural Scheme">Agricultural Scheme</option>
                <option value="Employment Scheme">Employment Scheme</option>
                <option value="Healthcare Scheme">Healthcare Scheme</option>
            </select>
        </div>
        <div class="form-group">
            <label for="serviceid">Service ID:</label>
            <input type="text" id="serviceid" name="serviceid" required>
        </div>
        <div class="form-group">
            <label for="fee">Fee:</label>
            <input type="number" id="fee" name="fee" required>
        </div>
        <input type="submit" value="Submit">
    </form>
</div>

<div class="overlay" id="overlay"></div>
<div class="popup" id="popup">
    <p>Payment successful!</p>
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
    $citizenid = $_POST["citizenid"];
    $scheme = $_POST["scheme"];
    $serviceid = $_POST["serviceid"];
    $fee = $_POST["fee"];

    $sql = "INSERT INTO Service (citizenid, ServiceID, Name, Description, Fee) VALUES ('$citizenid', '$serviceid', '$scheme', 'Description of $scheme', '$fee')";
    
    if ($conn->query($sql) === TRUE) {
        // Payment popup
        echo "<script>
                document.getElementById('overlay').style.display = 'block';
                document.getElementById('popup').style.display = 'block';
                setTimeout(function() {
                    document.getElementById('overlay').style.display = 'none';
                    document.getElementById('popup').style.display = 'none';
                }, 3000);
            </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>

</body>
</html>
