<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config/database.php";

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    $sql = "SELECT file_path FROM documents WHERE id = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_GET["id"]);
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result);
                $file_path = $row['file_path'];
                
                // Delete the file from the server
                if(file_exists($file_path)){
                    unlink($file_path);
                }
                
                // Delete the record from the database
                $sql = "DELETE FROM documents WHERE id = ?";
                if($stmt = mysqli_prepare($conn, $sql)){
                    mysqli_stmt_bind_param($stmt, "i", $param_id);
                    if(mysqli_stmt_execute($stmt)){
                        header("location: dashboard.php");
                        exit();
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
            } else{
                header("location: error.php");
                exit();
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else{
    if(empty(trim($_GET["id"]))){
        header("location: error.php");
        exit();
    }
}
?> 