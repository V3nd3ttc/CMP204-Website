<?php

function check_login($conn) {
    
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        $sql =  "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $data = $result->fetch_assoc();
            return $data;
        }
    } else {
        header("Location: login.php");
        die;
    }
}

function sanitizeInput($post) {
    $post = trim($post);
    $post = stripslashes($post);
    $post = htmlspecialchars($post);
    return $post;
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>