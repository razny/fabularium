<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fabularium - dodaj książkę</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/media-sizes.css" />
    <link rel="icon" type="image/x-icon" href="images/favicon.svg">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
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

    .dark-mode input, .dark-mode input:focus {
        background: #1b1d1e;
        border-color: #2c292f;
        color: #e3e3e3;
    }

    .dark-mode .form-control,
    .dark-mode .form-control:hover,
    .dark-mode .form-control:focus {
        background-color: #1f1d21;
        color: #e3e3e3;
        border-color: #2c292f;
    }

    .dark-mode .form-control::placeholder {
        color: #717171;
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
<body class="gradient-bg">
<?php include("includes/conn.php");
    session_start();?>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <?php if (isset($error_message)) : ?>
                            <h2 class="text-center p-4"><?php echo $error_message; ?></h2>
                            <div class="text-center">
                                <a href="index.php" class="btn primary btn-dark btn-lg">Wróć na stronę główną</a>
                            </div>
                            <?php exit(); ?>
<?php else : ?>
                            <h2 class="text-center mt-2 mb-4">Dodaj książkę</h2>
                            <form action="add_book.php" method="POST">
                                <div class="mb-3 row">
                                    <label for="tytul" class="col-sm-3 col-form-label">Tytuł:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tytul" name="tytul" placeholder="Wprowadź tytuł" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="wydawnictwo" class="col-sm-3 col-form-label">Wydawnictwo:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="wydawnictwo" name="wydawnictwo" placeholder="Wprowadź wydawnictwo" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="autor" class="col-sm-3 col-form-label">Autor:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="autor" name="autor" placeholder="Wprowadź autora" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="kategoria" class="col-sm-3 col-form-label">Kategoria:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="kategoria" name="kategoria" placeholder="Wprowadź kategorię" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="data_premiery" class="col-sm-3 col-form-label">Data premiery:</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="data_premiery" name="data_premiery" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="liczba_stron" class="col-sm-3 col-form-label">Liczba stron:</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="liczba_stron" name="liczba_stron" placeholder="Ile stron ma książka?" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="isbn" class="col-sm-3 col-form-label">ISBN:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Wprowadź ISBN" required pattern="\d{13}" title="ISBN musi mieć 13 cyfr">
                                        <div class="invalid-feedback">ISBN musi składać się z dokładnie 13 cyfr.</div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="okladka" class="col-sm-3 col-form-label">Okładka:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="okladka" name="okladka" placeholder="Wprowadź URL okładki" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="opis" class="col-sm-3 col-form-label">Opis:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="opis" name="opis" placeholder="Wpisz opis" required></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="cena" class="col-sm-3 col-form-label">Cena:</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="cena" name="cena" step="any" placeholder="Wprowadź cenę" required>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-dark accent btn-block border-0 mt-3 w-100">Dodaj książkę</button>
                                </div>
                                <div class="text-center">
                                    <a href="index.php" class="btn btn-dark accent btn-block border-0 mt-3 w-100">Wróć na stronę główną</a>
                                </div>

                            </form>
                            <?php
                            if (isset($_POST["submit"])) {
                                $tytul = $_POST["tytul"];
                                $wydawnictwo = $_POST["wydawnictwo"];
                                $autor = $_POST["autor"];
                                $kategoria = $_POST["kategoria"];
                                $data_premiery = $_POST["data_premiery"];
                                $liczba_stron = $_POST["liczba_stron"];
                                $isbn = $_POST["isbn"];
                                $okladka = $_POST["okladka"];
                                $opis = $_POST["opis"];
                                $cena = $_POST["cena"];

                                $sql = "INSERT INTO books (`Tytul`, `Wydawnictwo`, `Autor`, `Kategoria`, `Data_premiery`, `Liczba_stron`, `ISBN`, `Okladka`, `Opis`, Cena)
                            VALUES ('$tytul', '$wydawnictwo', '$autor', '$kategoria', '$data_premiery', $liczba_stron, '$isbn', '$okladka', '$opis', $cena)";

                                if (mysqli_query($conn, $sql)) {
                                    echo "<br>Nowy rekord został pomyślnie dodany.";
                                } else {
                                    echo "Błąd: " . $sql . "<br>" . mysqli_error($conn);
                                }
                            }
                            ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function samePassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm-password").value;

        if (password != confirmPassword) {
            alert("Hasła nie są identyczne!");
            return false;
        }
        return true;
    }

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
</html>