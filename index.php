<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Government Scheme Management System</title>
<style>
/* CSS Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f3f3f3;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.header {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
}

.navbar {
    background-color: #555;
    overflow: hidden;
}

.navbar a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 20px;
    text-decoration: none;
}

.navbar a:hover {
    background-color: #ddd;
    color: black;
}

.hero {
    background-image: url('background.jpg');
    background-size: cover;
    background-position: center;
    color: #fff;
    text-align: center;
    padding: 100px 0;
}

.hero h1 {
    font-size: 3em;
}

@media (max-width: 600px) {
    .hero h1 {
        font-size: 2em;
    }
}

/* Additional Styles */
.table-container {
    margin-top: 50px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

.button-container {
    text-align: center;
}

.button-container button {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 0 10px;
}

.button-container button:hover {
    background-color: #45a049;
}

.login-container {
    text-align: center;
    margin-top: 50px;
}

.login-box {
    width: 75%;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.login-box h2 {
    margin-bottom: 20px;
}

.login-box input[type="text"],
.login-box input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.login-box input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.login-box input[type="submit"]:hover {
    background-color: #45a049;
}
</style>
</head>
<body>

<div class="header">
    <h1>Government Scheme Management System</h1>
</div>

<div class="navbar">
    <a href="#home">Home</a>
    <a href="schemes.php">Schemes</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>
</div>

<div class="hero">
    <h1 style="color: rgb(4, 4, 42);">Welcome to our Government Scheme Management System</h1>
    <p style="color: rgb(4, 4, 42);">Apply for various government schemes online!</p>
</div>

<div class="container">

    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form id="loginForm" onsubmit="return submitForm()">
                <input type="text" id="username" name="username" placeholder="Enter Username" required>
                <input type="password" id="password" name="password" placeholder="Enter Password" required>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
    <br><br>
    <div class="table-container">
        <h2>Sample Government Schemes</h2>
        <table>
            <thead>
                <tr>
                    <th>Scheme Name</th>
                    <th>Description</th>
                    <th>Eligibility</th>
                    <th>Application Process</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Education Scholarship Scheme</td>
                    <td>Provides financial assistance to students for pursuing higher education.</td>
                    <td>Students with excellent academic performance.</td>
                    <td>Online application through the official portal.</td>
                </tr>
                <tr>
                    <td>Healthcare Subsidy Scheme</td>
                    <td>Offers subsidies on medical treatments and healthcare services.</td>
                    <td>Low-income families and individuals.</td>
                    <td>Submission of documents at designated health centers.</td>
                </tr>
                <tr>
                    <td>Agricultural Equipment Subsidy</td>
                    <td>Provides subsidies on agricultural machinery and equipment.</td>
                    <td>Farmers with small and marginal landholdings.</td>
                    <td>Application through agricultural extension offices.</td>
                </tr>
            </tbody>
        </table>
    </div>
    <br><br>
    <h2>About Us</h2>
    <p>The Government Scheme Management System is a comprehensive web-based platform designed to streamline the management and administration of various government schemes in Tamil Nadu. With a user-friendly interface and robust database backend, the system facilitates efficient handling of scheme applications, eligibility verification, approval processes, and reporting requirements. Through this centralized platform, administrators can easily oversee the implementation of schemes, while scheme managers can effectively monitor and track applications. Applicants benefit from a seamless application process and transparent communication regarding the status of their submissions. The project aims to enhance the delivery of government services, promote accountability, and ultimately improve the lives of Tamil Nadu's residents by ensuring equitable access to vital resources and opportunities.</p>
    <br><br><br>
    
    <!-- Buttons to navigate to different pages -->
    <div class="button-container">
        <a href="schemes.php"><button>Explore Schemes</button></a>
        <a href="about.php"><button>About Us</button></a>
        <a href="contact.php"><button>Contact Us</button></a>
    </div>
</div>

<script>
function submitForm() {
    var username = document.getElementById("username").value;
    var lastName = username.split(" ").pop().toUpperCase();
    
    if (lastName === "EMP") {
        window.location.href = "service_request.php";
    } else if (lastName === "EMP_NEW") {
        window.location.href = "employee.php";
    }else {
        window.location.href = "citizen.php";
    }
    
    return false; // Prevent form submission
}
</script>

</body>
</html>
