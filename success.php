<?php
$name = $_GET['name'] ?? 'Guest';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration Successful</title>
  <link rel="stylesheet" href="register.css">
  <style>
    body {
      background: #FAF3E0;
      font-family: Arial, sans-serif;
      text-align: center;
      padding-top: 100px;
    }
    .success-box {
      background: #5E0B15;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
      max-width: 500px;
      margin: auto;
    }
    .success-box h2 {
      color: #E3CDA8;
      margin-bottom: 20px;
    }
    .success-box p {
      font-size: 18px;
      color: #E3CDA8;
    }
    .success-box a {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background:#FAF3E0;
      color:  #5E0B15;
      text-decoration: none;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <div class="success-box">
    <h2>Registration Successful!</h2>
    <p>Thank you, <?php echo htmlspecialchars($name); ?>. You’ve been registered successfully.</p>
    <a href="index.html">Return to Home</a>
  </div>
</body>
</html>
