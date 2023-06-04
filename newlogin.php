<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="center">
      <h1>Login Form</h1>
      <form method="post">
        <label>Login As</label>
        <div class="txt_field">
            <select name="usertype">
              <option value="teacher">Teacher</option>
              <option value="student">Student</option>
              <option value="lab-assistant">Lab Assistant</option>
            </select>
          </div>
        <div class="txt_field">
          <input type="text" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" value="Login">
        <div class="signup_link">
         Don't have an account? <a href="file:///D:/Computer%20engineering/4th%20sem/database/project/Login%20Form%20-%20No%20JavaScript/signup.html">Signup</a>
        </div>
      </form>
    </div>

  </body>
</html>
