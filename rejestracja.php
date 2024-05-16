<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/media-sizes.css" />
    <link rel="icon" type="image/x-icon" href="images/favicon.svg">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Fabularium - rejestracja</title>
</head>

<body class="gradient-bg">
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-5">Rejestracja</h2>
                        <?php
                        // Connect to the database
                        $conn = mysqli_connect("localhost", "root", "", "blank");

                        // Process form submission
                        if (isset($_POST["submit"])) {
                            $username = $_POST["username"];
                            $password = $_POST["password"];

                            // Check if the username contains spaces
                            if (strpos($username, ' ') !== false) {
                                // Username contains spaces, display error message
                                echo "<div class='alert alert-danger text-center' role='alert'>Nazwa użytkownika nie może zawierać spacji!</div>";
                            } else {
                                // Check if the username already exists
                                $check_query = "SELECT * FROM users WHERE username='$username'";
                                $result = mysqli_query($conn, $check_query);
                                if (mysqli_num_rows($result) > 0) {
                                    // Username already exists, display error message
                                    echo "<div class='alert alert-danger text-center' role='alert'>Nazwa użytkownika już istnieje!</div>";
                                } else {
                                    // Username is unique, proceed with registration
                                    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
                                    if (mysqli_query($conn, $query)) {
                                        // Display success message
                                        echo "<div class='alert alert-success text-center' role='alert'>Konto zostało utworzone pomyślnie!</div>";
                                    } else {
                                        // Display error message if insertion fails
                                        echo "<div class='alert alert-danger text-center' role='alert'>Błąd podczas tworzenia konta.</div>";
                                    }
                                }
                            }
                        }
                        ?>

                        <form action="rejestracja.php" method="POST" onsubmit="return validatePassword()">
                            <div class="mb-3">
                                <label for="username" class="form-label">Nazwa użytkownika</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Wprowadź nazwę" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Hasło</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Wprowadź hasło" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm-password" class="form-label">Potwierdź hasło</label>
                                <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Potwierdź hasło" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-dark accent btn-block border-0 mt-3 w-100">Utwórz konto</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center pt-2">
                        <p class="mb-0">Masz już konto? <a href="logowanie.php" class="btn btn-link">Zaloguj się tutaj</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function validatePassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm-password").value;

        if (password != confirmPassword) {
            alert("Hasła nie są identyczne!");
            return false;
        }
        return true;
    }
</script>

</html>