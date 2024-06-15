<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Service Requests</title>
<style>
/* CSS Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
}

.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
}

.service-list {
    list-style-type: none;
    padding: 0;
}

.service-item {
    margin-bottom: 30px;
    padding: 20px;
    background-color: #f1f1f1;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.service-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
}

.service-id {
    font-weight: bold;
    color: #007bff;
}

.service-name {
    font-size: 20px;
    color: #333;
}

.service-description {
    color: #666;
}

.service-fee {
    font-weight: bold;
    color: #28a745;
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.fadeIn {
    animation-name: fadeIn;
    animation-duration: 1s;
}
</style>
</head>
<body>

<div class="container">
    <h1>Service Requests Today</h1>
    <ul class="service-list">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gov_management";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM Service";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li class='service-item fadeIn' style='background-color: ".random_color()."'>
                        <span class='service-id'>ID: " . $row["ServiceID"]. "</span><br>
                        <span class='service-name'>Name: " . $row["Name"]. "</span><br>
                        <span class='service-description'>Description: " . $row["Description"]. "</span><br>
                        <span class='service-fee'>Fee: Rs." . $row["Fee"]. "</span>
                      </li>";
            }
        } else {
            echo "<li class='service-item'>No service requests today.</li>";
        }
        $conn->close();

        function random_color() {
            return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }
        ?>
    </ul>
</div>

</body>
</html>
