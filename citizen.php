<?php
session_start();

// Generate a unique Citizen ID
$citizenID = uniqid();

// Store the Citizen ID in the session
$_SESSION['citizenID'] = $citizenID;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Citizen Registration</title>
<style>
/* CSS Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f3f3f3;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.form-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-container h2 {
    margin-bottom: 20px;
}

.form-container label {
    display: block;
    margin-bottom: 10px;
}

.form-container input[type="text"],
.form-container input[type="date"],
.form-container select {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.form-container input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.form-container input[type="submit"]:hover {
    background-color: #45a049;
}
</style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2>Citizen Registration</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="citizenID">Citizen ID:</label>
            <input type="text" id="citizenID" name="citizenID"  required>
            
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
            
            <label for="dateOfBirth">Date of Birth:</label>
            <input type="date" id="dateOfBirth" name="dateOfBirth" required>
            
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            
            <label for="contactInformation">Contact Information:</label>
            <input type="text" id="contactInformation" name="contactInformation" required>
            
            <label for="citizenshipStatus">Citizenship Status:</label>
            <input type="text" id="citizenshipStatus" name="citizenshipStatus" required>
            
            <input type="submit" value="Submit">
        </form>
    </div>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gov_management";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO Citizen (CitizenID, Name, Address, DateOfBirth, Gender, ContactInformation, CitizenshipStatus)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $citizenID, $name, $address, $dateOfBirth, $gender, $contactInformation, $citizenshipStatus);

        $citizenID = $_POST["citizenID"];
        $name = $_POST["name"];
        $address = $_POST["address"];
        $dateOfBirth = $_POST["dateOfBirth"];
        $gender = $_POST["gender"];
        $contactInformation = $_POST["contactInformation"];
        $citizenshipStatus = $_POST["citizenshipStatus"];

        if ($stmt->execute()) {
            echo "<p>New record inserted successfully</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }

        $stmt->close();
        $conn->close();
    }
    ?>
    <p>Thank you for logging in. Please select a scheme <a href="scheme_applied.php">here</a>.</p>
</div>

</body>
</html>
