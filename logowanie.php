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
    <title>Fabularium - logowanie</title>
</head>

<body class="gradient-bg">

    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-5">Logowanie</h2>
                        <form>
                            <div class="mb-3">
                                <label for="username" class="form-label">Nazwa użytkownika</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Wprowadź nazwę" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Hasło</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Wprowadź hasło" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark accent btn-block border-0 mt-3 w-100">Zaloguj się</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center pt-2">
                        <p class="mb-0">Nie masz konta? <a href="rejestracja.php" class="btn btn-link">Zarejestruj się</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>