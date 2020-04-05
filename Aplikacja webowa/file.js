// pobranie elementu modalnego
var modal = document.getElementById('modalElement');
var modal2 = document.getElementById('modalElement2');

window.onload = function () {

    document.getElementById("modalElement").style.display = "none";
    document.getElementById("modalElement2").style.display = "none";

};


function myFunction() {
    if (modal.style.display == "none") {
        modal.style.display = "block";
    } else {
        modal.style.display = "none";
    }
}

function myFunction2() {
    if (modal2.style.display === "none") {
        modal2.style.display = "block";
        modal.style.display = "none";
    } else {
        modal2.style.display = "none";
    }
}

//biblioteka do animacji przy scrollowaniu
AOS.init({
    duration: 1200,
});
