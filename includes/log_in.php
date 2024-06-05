<?php
include("includes/conn.php");

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT id, username, password FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if ($password === $row['password']) {
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Nieprawidłowe dane logowania";
        }
    } else {
        $error_message = "Nieprawidłowe dane logowania";
    }
}
mysqli_close($conn);
?>
