<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/stylee.css">
    <title>Sign In</title>
</head>
<body>
    <div class="container">
    <form action="login.php" class="form" method="post">
    <h1 class="form_title">Login</h1>
    <div class="input-icons">
                Email: <br><br>
                <input type="email" name="email" class="input-field"  placeholder="Enter your Email" required>
                Password: <br><br> 
                <input type="password" name="password" class="input-field" autofocus placeholder=" Enter your Password" required>
    </div>

            <button class="form_button" type="submit" name="submit">login</button>
            <p class="form_text"><a class="form_link"  href="register.php">Don't have an account? Create Account</a></p>
    </form>
    </div>
</body>
</html>

<?php
    session_start();
    include '../assets/db/db.php';
    if(isset($_POST['submit'])){

        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        
        $request = "SELECT id, email FROM user WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $request);
        if ( $result > 0 ) {
            $row = mysqli_fetch_assoc($result);

            if( ($email == "admin@admin.admin") && ($password == md5('admin')) ) {
                $_SESSION['id'] = $row['id'];
                header("location: admin_dashboard.php");
            } else {
                $_SESSION['id'] = $row['id'];
                header("location: user_dashboard.php");
            }
        } else {
            echo "Error: " . $request . "<br>" . $conn->error;
        }

        $conn->close();

    }
?>