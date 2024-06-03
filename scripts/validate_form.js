function validateForm() {
    var typeName = document.getElementById("typeName").value;
    var typeExp = document.getElementById("typeExp").value;
    var typeText = document.getElementById("typeText").value;
    var typeCvv = document.getElementById("typeCvv").value;

    if (typeName == "" || typeExp == "" || typeText == "" || typeCvv == "") {
        alert("Proszę wypełnić wszystkie pola.");
        return false;
    }

    if (!/\s/.test(typeName)) {
        alert("Proszę podać pełne imię i nazwisko oddzielone spacją.");
        return false;
    }

    if (!/^\d{16}$/.test(typeText)) {
        alert("Numer karty musi składać się z 16 cyfr.");
        return false;
    }

    if (!/^(0[1-9]|1[0-2])\/\d{2}$/.test(typeExp)) {
        alert("Nieprawidłowy format daty ważności. Wprowadź datę w formacie MM/RR.");
        return false;
    }

    if (!/^\d+$/.test(typeCvv)) {
        alert("CVV musi składać się tylko z cyfr.");
        return false;
    }

    if (typeCvv.length !== 3) {
        alert("CVV musi składać się z 3 cyfr.");
        return false;
    }

}