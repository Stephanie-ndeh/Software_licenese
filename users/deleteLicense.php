<?php
    session_start();
    include '../assets/db/db.php';

    if (isset($_GET['id'])){
        $deleteItem = $_GET['id'];

        $sql= "DELETE FROM license WHERE id = '$deleteItem'";

        if (mysqli_query($conn, $sql) ){
            if($_SESSION['id'] == 29) {
                echo 'License deleted';
                header("Location: admin_dashboard.php");
            } else {
                echo 'License deleted';
                header("Location: user.php");
            }
            
        }else{
            echo 'failed to delete the contact : $sql. ' .mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>