<?php
session_start();
require_once 'config.php';

if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password. Other options include PASSWORD_ARGON2I, PASSWORD_ARGON2ID, PASSWORD_BCRYPT etc
  $role = $_POST['role'];

  // Check if email already exists
  $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);

  if ($stmt->execute()) {
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
      $_SESSION['register_error'] = "Email already registered. Please use a different email.";
      $_SESSION["active_form"] = "register";
      $stmt->close();
    } else {
      // Register new user
      $stmt1 = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
      $stmt1->bind_param("ssss", $name, $email, $password, $role);

      if ($stmt1->execute()) {
        $_SESSION['register_success'] = "Registration successful. Please login.";
        $_SESSION['active_form'] = "login";
      } else {
        $_SESSION['register_error'] = "Registration failed. Please try again.";
        // echo "Error: " . $stmt1->error;
      }

      $stmt1->close();
    }
  } else {
    echo "Error: " . $stmt->error;
  }

  header("Location: index.php");
  exit();
}

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $result = $conn->query("SELECT id, name, email, password, role FROM users WHERE email = '$email'");

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
      $_SESSION['name'] = $user['name'];
      $_SESSION['email'] = $user['email'];

      if ($user['role'] == 'admin') {
        header("Location: admin.php");
      } else {
        header("Location: user.php");
      }

      exit();
    }
  }

  $_SESSION['login_error'] = "Invalid email or password.";
  $_SESSION["active_form"] = "login";
  header("Location: index.php");
  exit();
}


