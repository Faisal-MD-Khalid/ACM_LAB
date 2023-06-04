<?php
include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm-password'];

  if ($password != $confirm_password) {
    echo "Password and confirm password do not match";
  } else {
   
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
 
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
    if (mysqli_query($conn, $sql)) {
      echo "User registered successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
  
  // Close the database connection
  mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  <link rel="stylesheet" href="style2.css">
  <style>
    .form-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin: 20px;
    }
    .form-field {
      margin: 10px;
      width: 300px;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid gray;
    }
    .form-button {
      margin: 10px;
      padding: 10px 20px;
      background-color: blue;
      color: white;
      border-radius: 5px;
      border: 1px solid blue;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Sign Up</h2>
    <form>
      <div class="form-field">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-field">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-field">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-field">
        <label for="confirm-password">Confirm Password:</label>
        <input type="password" id="confirm-password" name="confirm-password" required>
      </div>
      <button type="submit" class="form-button">Sign Up</button>
    </form>
  </div>
</body>
</html>

