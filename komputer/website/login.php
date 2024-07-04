<?php
$path = '../koneksi.php'; // Menggunakan ../ untuk naik satu level dari folder home.php

// Memanggil koneksi.php
require_once $path;
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE email='$email'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $row['name'];

            // Set cookie for user name
            setcookie('user_name', $row['name'], time() + (86400 * 30), "/"); // Cookie berlaku selama 30 hari (disesuaikan dengan kebutuhan)

            // Redirect to home page after successful login
            header("Location: home.php");
            exit();
        } else {
            echo "<script>showErrorModal('Invalid password');</script>";
        }
    } else {
        echo "<script>showErrorModal('No user found with this email');</script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="gaya.css">
    <script>
        function showErrorModal(message) {
            var modal = document.getElementById('errorModal');
            var modalContent = document.getElementById('modalContent');
            modalContent.textContent = message;
            modal.style.display = 'block';
            setTimeout(function() {
                modal.style.display = 'none';
            }, 3000); // Hide modal after 3 seconds
        }
    </script>
    <style>
        body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    background-color: #f5f5f5;
}

.modal-background {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* semi-transparent black background */
    z-index: 9999;
}

.modal-content {
    position: relative;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    max-width: 400px;
    margin: 0 auto;
    text-align: center;
}
    </style>
</head>
<body>
    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-4">
                    <h2 class="title">Admin Login</h2>
                    <form action="login.php" method="post">
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input class="input" type="email" name="email" placeholder="Enter your email" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control">
                                <input class="input" type="password" name="password" placeholder="Enter your password" required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="button is-primary" type="submit">Login</button>
                            </div>
                        </div>
                        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="errorModal" class="modal-background">
        <div class="modal-content">
            <p id="modalContent"></p>
        </div>
    </div>
</body>
</html>
