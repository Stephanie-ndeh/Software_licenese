<?php
  include '../assets/db/db.php';

  if(isset($_POST['submit'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    
    $sql = "INSERT INTO user(firstName, lastName, email, registerDate, password) VALUES ('$firstName', '$lastName', '$email', NOW(), '$password')";
    $submit = $conn->query($sql);

    if($submit){
        echo "<script> if(confirm('New account created, You can now Log In!')) window.location.href='login.php'</script>";
    }else{
        echo "<script> if(confirm('Failed to create account')) window.location.href='register.php'</script>";
    }
    
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/stylee.css">
    <title>Sign Up form</title>
</head>
<body>
    <div class="container">
        <form action="register.php" class="form" method="POST" >
        <h1 class="form_title">Register</h1>
        <div class="input-icons">
                First Name: <br><br>
                <input type="text" name="firstName" class="input-field"  placeholder="Enter first Name " required>
                Last Name: <br><br>
                <input type="text" name="lastName" class="input-field"  placeholder="Enter last Name " required>
                Email: <br><br>
                <input type="text" name="email" class="input-field"  placeholder="Enter Email address" required>
                 Password: <br><br>
                <input type="password" name="password" class="input-field"  placeholder="enter password" required>
            </div>

            <button class="form_button" name="submit" type="submit">Submit</button>
            <p class="form_text"><a class="form_link"  href="login.php">Already have an account? login In here</a></p>
        </form>
    </div>
</body>
</html>