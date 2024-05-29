<?php
include("Connections.php");

   $Email = $Password = "";
   $EmailErr = $PasswordErr = "";
         if ($_SERVER ["REQUEST_METHOD"] == "POST"){
            if (empty($_POST['email'])){
                $EmailErr = "Email is Required!";
            } else {
                $Email = $_POST['email'];
            }
            if (empty($_POST["password"])){
                $PasswordErr = "Password is Required!";
            } else {
                $Password = $_POST ['password'];
            }
            if ($Email && $Password) {
                $check_email_query = "SELECT * FROM mytbl WHERE email = '$Email'";
                $check_email_result = mysqli_query($connections, $check_email_query);
                $check_email_row = mysqli_num_rows($check_email_result);

                if ($check_email_row > 0) {
                    $row = mysqli_fetch_assoc($check_email_result);
                    $db_password = $row["Password"];
                    $db_Account_type = $row["Account_type"];
                    
                    if ($Password == $db_password) {
                    if ($db_Account_type == "1") {
                        
                        echo "<script>alert('Welcome ADMIN!'); window.location.href='Admin3/admin.php';</script>";
                    }else{
                        echo "<script>alert('Welcome USER!'); window.location.href='User2/user.html';</script>";
                }
            } else {
                $PasswordErr = "Password is you've entered is incorrect.";
            }
            } else {
                $EmailErr = "Email is not registered!";
            }
         }
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style1.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
 <body>
         
 <div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <h1>Login</h1>
                    <div class="inputbox">
                        <div class="input-box">
                            <input type="text" placeholder="Email" name="email" >
                            <i class='bx bxs-envelope' ></i>
                            <span class="error"><?php echo $EmailErr; ?></span> <br>
                        </div>
                        <div class="input-box">
                            <input type="password" placeholder="Password" name="password" >
                            <i class='bx bxs-lock-alt' ></i>
                            <span class="error"><?php echo $PasswordErr; ?></span> <br>
                        </div>
                        <div class="remember-forgot">
                            <label><input type="checkbox">Remember me</label>
                            <a href="#">Forgot password?</a>
                        </div>
                        <button type="submit" class="btn">Log in</button>

                        <div class="signup-link">
                            <p>Don't have an account? <a href="#">Register here</a></p>
                        </div>
                </form>
            </div>
</body>
</html>