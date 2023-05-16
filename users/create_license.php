<?php
    session_start();
    include '../assets/db/db.php';

    if(isset($_POST['submit'])){
        $label = $_POST['label'];
        $token = $_POST['token'];
        $dueDate = $_POST['dueDate'];
        $daysBefore = $_POST['daysBefore'];
        
        $sql = "INSERT INTO license (user_id, label, token, dateCreated, dueDate, daysBefore) VALUES ('".$_SESSION['id']."', '$label', '$token', NOW(), '$dueDate', '$daysBefore')";
        $submit = $conn->query($sql);

        if($submit){
            echo "<script> if(confirm('New license add')) window.location.href='user_dashboard.php'</script>";
        }else{
            echo "<script> if(confirm('Failed to add license')) window.location.href='create_license.php'</script>";
        }    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/stylee.css">
    <title>Create License form</title>
</head>
<body>
    <div class="container">
        <form action="create_license.php" class="form" method="POST" >
            <h1 class="form_title">Create license</h1>
            <div class="input-icons">
                Label
                <input type="text" name="label" class="input-field"  placeholder="Enter the label " required><br/>
                Token
                <input type="text" name="token" class="input-field"  value="<?php echo md5(time() .mt_rand()); ?>" readonly required><br/>
                Due Date 
                <input type="date" name="dueDate" class="input-field"  placeholder="enter the Expiry Date" required><br/>
                Notification (number) days before expriration
                <input type="number" name="daysBefore" class="input-field" min="1" max="10"  placeholder="Notification before expiration (1-10)" required><br/>
            </div>
            <br/>
            <button class="form_button" name="submit" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>