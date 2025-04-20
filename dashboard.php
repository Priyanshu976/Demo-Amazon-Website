<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "Access denied. Please log in first.";
    exit();
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome | Amazon Demo</title>
  <link rel="icon" href="https://www.amazon.com/favicon.ico">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #eaeded;
      margin: 0;
      padding: 0;
    }

    .navbar {
      background-color: #232f3e;
      color: white;
      padding: 15px 30px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .navbar img {
      height: 30px;
    }

    .welcome {
      font-size: 1.2rem;
    }

    .dashboard {
      max-width: 600px;
      background-color: white;
      margin: 40px auto;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .dashboard h2 {
      color: #111;
      border-bottom: 1px solid #ddd;
      padding-bottom: 10px;
    }

    .info {
      margin-top: 20px;
    }

    .info p {
      font-size: 1rem;
      padding: 8px 0;
      border-bottom: 1px solid #eee;
    }

    .logout {
      margin-top: 25px;
      text-align: center;
    }

    .logout a {
      text-decoration: none;
      background-color: #f0c14b;
      color: #111;
      padding: 10px 20px;
      border: 1px solid #a88734;
      border-radius: 5px;
      font-weight: bold;
    }

    .logout a:hover {
      background-color: #ddb347;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" alt="Amazon Logo">
    <div class="welcome">Hi, <?php echo htmlspecialchars($user['name']); ?>!</div>
  </div>

  <div class="dashboard">
    <h2>Your Account Details</h2>
    <div class="info">
      <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
      <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
      <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
      <p><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
    </div>

    <div class="logout">
      <a href="logout.php">Log Out</a>
    </div>
  </div>
</body>
</html>