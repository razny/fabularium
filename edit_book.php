<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabularium - Edytuj książkę</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/media-sizes.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.svg">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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
</head>

<body class="gradient-bg">
    <?php include("includes/conn.php");
    session_start();

    $book = null;
    $error_message = '';

    if (isset($_POST['submit_id'])) {
        $id = $_POST['book_id'];
        $result = mysqli_query($conn, "SELECT * FROM books WHERE id=$id");
        $book = mysqli_fetch_assoc($result);

        if (!$book) {
            $error_message = "Książka nie została znaleziona.";
        }
    }

    if (isset($_POST['submit_edit'])) {
        $id = $_POST["book_id"];
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

        $sql = "UPDATE books SET Tytul='$tytul', Wydawnictwo='$wydawnictwo', Autor='$autor', Kategoria='$kategoria', Data_premiery='$data_premiery', Liczba_stron=$liczba_stron, ISBN='$isbn', Okladka='$okladka', Opis='$opis', Cena=$cena WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {
            $success_message = "Rekord został pomyślnie zaktualizowany.";
        } else {
            $error_message = "Błąd: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    ?>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <?php
                        if (!$book) : ?>
                            <div class="p-2">
                                <h2 class="text-center mt-2 mb-4">Wprowadź ID książki</h2>
                                <form action="edit_book.php" method="POST">
                                    <?php
                                    $count_query = "SELECT COUNT(*) as count FROM books";
                                    $result = mysqli_query($conn, $count_query);
                                    $row = mysqli_fetch_assoc($result);
                                    $count = $row['count'];
                                    ?>

                                    <div class="mb-3 row">
                                        <label for="book_id" class="col-sm-3 col-form-label">ID książki:</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="book_id" name="book_id" placeholder="Wprowadź ID" required max="<?php echo $count; ?>">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="submit_id" class="btn btn-dark accent btn-block border-0 mt-3 w-100">Przejdź do edycji rekordu</button>
                                    </div>
                                    <div class="text-center">
                                        <a href="index.php" class="btn btn-dark accent btn-block border-0 mt-3 w-100">Wróć na stronę główną</a>
                                    </div>
                                </form>
                            </div>
                        <?php else : ?>
                            <h2 class="text-center mt-2 mb-4">Edytuj dane</h2>
                            <form action="edit_book.php" method="POST">

                                <?php echo "<input type='hidden' name='book_id' value='$id' readonly>" ?>
                                <div class="mb-3 row">
                                    <label for="tytul" class="col-sm-3 col-form-label">Tytuł:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tytul" name="tytul" value="<?php echo $book['Tytul']; ?>" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="wydawnictwo" class="col-sm-3 col-form-label">Wydawnictwo:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="wydawnictwo" name="wydawnictwo" value="<?php echo $book['Wydawnictwo']; ?>" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="autor" class="col-sm-3 col-form-label">Autor:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="autor" name="autor" value="<?php echo $book['Autor']; ?>" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="kategoria" class="col-sm-3 col-form-label">Kategoria:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="kategoria" name="kategoria" value="<?php echo $book['Kategoria']; ?>" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="data_premiery" class="col-sm-3 col-form-label">Data premiery:</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="data_premiery" name="data_premiery" value="<?php echo $book['Data_premiery']; ?>" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="liczba_stron" class="col-sm-3 col-form-label">Liczba stron:</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="liczba_stron" name="liczba_stron" value="<?php echo $book['Liczba_stron']; ?>" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="isbn" class="col-sm-3 col-form-label">ISBN:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo $book['ISBN']; ?>" required pattern="\d{13}" title="ISBN musi mieć 13 cyfr">
                                        <div class="invalid-feedback">ISBN musi składać się z dokładnie 13 cyfr.</div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="okladka" class="col-sm-3 col-form-label">Okładka:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="okladka" name="okladka" value="<?php echo $book['Okladka']; ?>" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="opis" class="col-sm-3 col-form-label">Opis:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control  id=" opis" name="opis" required><?php echo $book['Opis']; ?></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="cena" class="col-sm-3 col-form-label">Cena:</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="cena" name="cena" step="any" value="<?php echo $book['Cena']; ?>" required>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" name="submit_edit" class="btn btn-dark accent btn-block border-0 mt-3 w-100" onclick="editDetails()">Zaktualizuj książkę</button>
                                </div>

                                <script>
                                    function editDetails() {
                                        var form = document.querySelector('form');
                                        if (form.checkValidity()) {
                                            alert("Pomyślnie edytowano rekord!");
                                        }
                                    }
                                </script>

                                <div class="text-center">
                                    <a href="index.php" class="btn btn-dark accent btn-block border-0 mt-3 w-100">Wróć na stronę główną</a>
                                </div>
                            </form>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
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