<?php
// Step 1: Connect to the database
$host = 'localhost';
$db = 'registration_db';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

// Step 2: Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 3: Validate and sanitize form inputs
$errors = [];

function sanitize($data, $conn) {
    return htmlspecialchars(trim($conn->real_escape_string($data)));
}

$name = sanitize($_POST['name'] ?? '', $conn);
$email = sanitize($_POST['email'] ?? '', $conn);
$country_code = sanitize($_POST['country_code'] ?? '', $conn);
$phone = sanitize($_POST['phone_number'] ?? '', $conn);
$dob = sanitize($_POST['dob'] ?? '', $conn);
$gender = sanitize($_POST['gender'] ?? '', $conn);
$country = sanitize($_POST['country'] ?? '', $conn);
$password = $_POST['password'] ?? '';
$favorite_wine = sanitize($_POST['favorite_wine'] ?? '', $conn);
$comments = sanitize($_POST['comments'] ?? '', $conn);

// Step 4: Validation checks
if (empty($name) || !preg_match("/^[a-zA-Z ]+$/", $name)) {
    $errors[] = "Name must contain only letters and spaces.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email address.";
}

if (!is_numeric($phone)) {
    $errors[] = "Phone number must be numeric.";
}

if (strlen($password) < 6) {
    $errors[] = "Password must be at least 6 characters.";
}

if (empty($dob)) {
    $errors[] = "Date of birth is required.";
}

if (empty($gender)) {
    $errors[] = "Gender is required.";
}

if (empty($country)) {
    $errors[] = "Country is required.";
}

// Optional: check if email is already registered
$checkEmail = $conn->query("SELECT id FROM users WHERE email = '$email'");
if ($checkEmail && $checkEmail->num_rows > 0) {
    $errors[] = "Email is already registered.";
}

// If there are errors, stop and display them
if (!empty($errors)) {
    echo "<h3>There were some problems with your registration:</h3><ul>";
    foreach ($errors as $error) {
        echo "<li>" . $error . "</li>";
    }
    echo "</ul><a href='register.html'>Go Back</a>";
    $conn->close();
    exit();
}

// Step 5: Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Step 6: Insert into database
$sql = "INSERT INTO users (name, email, country_code, phone_number, dob, gender, country, password, favorite_wine, comments)
        VALUES ('$name', '$email', '$country_code', '$phone', '$dob', '$gender', '$country', '$hashed_password', '$favorite_wine', '$comments')";

if ($conn->query($sql) === TRUE) {
    header("Location: success.php?name=" . urlencode($name));
    exit();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
