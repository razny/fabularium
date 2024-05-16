<?php
// Rozpocznij lub wznow sesję
session_start();

// Usuń wszystkie zmienne sesyjne
session_unset();

// Zakończ sesję
session_destroy();

// Przekieruj użytkownika na stronę logowania lub inną stronę po wylogowaniu
header("Location: ../index.php");
exit;
?>