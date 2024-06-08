<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabularium - logowanie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/media-sizes.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.svg">
    <style>
        .dark-mode .card {
            background: #1f1d21;
        }

        .dark-mode .card-footer {
            background: #151718;
        }

        .dark-mode .card {
            color: #e3e3e3;
        }

        .dark-mode input,
        .dark-mode input:focus {
            background: #1b1d1e;
            border-color: #2c292f;
            color: #e3e3e3;
        }

        .dark-mode input::placeholder {
            color: #717171;
        }

        .dark-mode .alert-danger {
            background: #d65259;
            border-color: #b12a31;
            color: #78080e;
        }
    </style>
</head>

<body class="gradient-bg">

    <?php
    include("includes/conn.php");
    session_start();
    if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
        $user_id = $_SESSION['user_id'];
        $username = $_SESSION['username'];
    ?>
        <div class="container">
            <div class="row justify-content-center align-items-center vh-100">
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h4 class='text-center mb-3'>Zalogowany jako: <?php echo "$username" ?></h4>
                            <?php
                            if ($_SESSION['username'] == 'admin') {
                            ?>
                                <a href="edit_book.php" class="btn btn-dark accent btn-block border-0 mt-3 w-100">Edytuj bazę książek</a>
                            <?php
                            }
                            ?>
                            <a href="index.php">
                                <button class="btn btn-dark accent btn-block border-0 mt-3 w-100">Wróć na stronę główną</button>
                            </a>
                            <form action="includes/logout.php" method="POST">
                                <button type="submit" class="btn btn-dark accent btn-block border-0 mt-3 w-100">Wyloguj się</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else {
        include("includes/log_in.php");
    ?>

        <div class="container" id="login">
            <div class="row justify-content-center align-items-center vh-100">
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h2 class="text-center mb-5">Logowanie</h2>
                            <?php if (isset($error_message) && !empty($error_message)) : ?>
                                <div class="alert alert-danger mt-0" role="alert">
                                    <?php echo $error_message; ?>
                                </div>
                            <?php endif; ?>

                            <form action="logowanie.php" method="POST">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Nazwa użytkownika</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Wprowadź nazwę" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Hasło</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Wprowadź hasło" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark btn-block border-0 mt-3 w-100">Zaloguj się</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center pt-2">
                            <p class="mb-0">Nie masz konta? <a href="rejestracja.php" class="btn-link">Zarejestruj się</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function applyDarkMode() {
            const isLightMode = localStorage.getItem('mode') === 'light';
            if (!isLightMode) {
                document.body.classList.add('dark-mode');
            } else {
                document.body.classList.remove('dark-mode');
            }
        }

        applyDarkMode();
    </script>
</body>

</html>