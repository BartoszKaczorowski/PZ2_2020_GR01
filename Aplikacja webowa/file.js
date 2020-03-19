// pobranie elementu modalnego
var modal = document.getElementById('modalElement');

// jeśli użytkownik kliknie gdziekolwiek to okno modalne zostanie zamknięte
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}