<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Full Stack PHP Login and Register Page With User and Admin Page</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <div class="form-box active" id="login-form">
      <form action="login_register.php" method="post">
        <h2>Login</h2>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
        <p>Don't have an account? <a href="#" onclick="showForm('register-form')">Register</a></p>
      </form>
    </div>
    <div class="form-box" id="register-form">
      <form action="login_register.php" method="post">
        <h2>Register</h2>
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="role" required>
          <option value="">--Select Role--</option>
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
        <button type="submit" name="register">Register</button>
        <p>Already have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>
      </form>
    </div>
  </div>
  <script src="main.js"></script>
</body>

</html>