<?php
	session_start();
	
	$conn = new mysqli('localhost','root','','acmlab');
	
	$unsuccessfulmsg = '';
    if(isset($_POST['submit'])){
        $users_email = $_POST['users_email'];
        $users_password = $_POST['users_password'];
        $passwordmd5 = md5($users_password);
    
        if(empty($users_email)){
            $emailmsg = 'Enter an email.';
        }else{
            $emailmsg = '';
        }
    
        if(empty($users_password)){
            $passmsg = 'Enter your password.';
        }else{
            $passmsg = '';
        }
    
        if(!empty($users_email) && !empty($users_password)){
            $sql = "SELECT * FROM user WHERE users_email='$users_email' AND users_password = '$passwordmd5'";
            $query = $conn->query($sql);
    
            if($query->num_rows > 0){
                $row = $query->fetch_assoc();
                $username = $row['username'];
    
                $_SESSION['username'] = $username;
                header('location:home2.php');
            }else{
                $unsuccessfulmsg = 'Wrong email or Password!';
            }
        }
    }
    ?>
    
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
        <div class="txt_field">
          <input type="text" name="users_email" required>
          <span></span>
          <label>Enter your email</label>
          <?php if(isset($emailmsg)) { ?>
          <p class="error"><?php echo $emailmsg; ?></p>
          <?php } ?>
        </div>
        <div class="txt_field">
          <input type="password" name="users_password" required>
          <span></span>
          <label>Password</label>
          <?php if(isset($passmsg)) { ?>
          <p class="error"><?php echo $passmsg; ?></p>
          <?php } ?>
        </div>
        <div class="form-outline mb-4">
                                <label for="user">Choose Your Type:</label>
                                <select name="type" id="" class="form-control"> 
                                    <option value="node" selected disabled hidden> Choose You Account Type</option>
                                    <option value="admin"> Teacher</option>
                                    <option value="owner"> Lab assistant</option>
                                    <option value="tenant"> Student</option>
                                </select>
                            </div>

        <div class="pass" style="margin-top: 1em;">Forgot Password?</div>
        <input type="submit" name="submit" value="Login">
        <?php if(isset($unsuccessfulmsg)) { ?>
        <p class="error"><?php echo $unsuccessfulmsg; ?></p>
        <?php } ?>
        <div class="signup_link">
         Don't have an account? <a href="loginsignup.php">Signup</a>
        </div>
      </form>
    </div>
  </body>
</html>
