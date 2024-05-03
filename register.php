<?php
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // You should ideally perform validation and sanitation of user inputs here

    // Check if the email is already registered
    $check_query = "SELECT * FROM users WHERE email='$email'";
    $check_result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        $error = "Email sudah terdaftar!";
    } else {
        // Insert user into database
        $insert_query = "INSERT INTO users (username, email, password) VALUES ('$nama', '$email', '$password')";
        if (mysqli_query($conn, $insert_query)) {
            // Registration successful, redirect to login page
            header("Location: login.php");
            exit;
        } else {
            $error = "Terjadi kesalahan saat mendaftar. Silakan coba lagi.";
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h2>Register</h2>
            <?php if(isset($error)) { ?>
                <p class="error"><?php echo $error; ?></p>
            <?php } ?>
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
            <p>Sudah punya akun? <a href="login.php">Login disini</a></p>
        </form>
    </div>
</body>
</html>
