<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="veiwport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Change Profile</title>
          
</head>
<body>
    <div class="nav">
        <div class="logo">
        <p><a href="home.php"> Logo</a></p>
        </div>
   

    <div class="right-link">
        <a href="3">Change Profile</a>
        <a href="logout.php"><button clss="btn">Log Out</button></a>
      </div>
    </div>

<div class="container">
        <div class="box form-box">
        <header>Change Profile</header>

     <form action="" method="post">
            <div class="field input">
                <label for="username">Username</label>
                <input type="tel" name="username" id="username" autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="email">Email</label>
                <input type="tel" name="email" id="email" autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="age">Age</label>
                <input type="number" name="age" id="age" autocomplete="off" required>
            </div>

            <div class="field">
                
                <input type="submit" class="btn" name="submit" value="Update" required>
            </div>

            
     </form>
    </div>
    </div>


</body>
</html>