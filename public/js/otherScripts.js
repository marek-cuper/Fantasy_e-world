function checkBoxfunc() {
    var x = document.getElementById("password");
    var y = document.getElementById("password-confirm");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    if (y.type === "password") {
        y.type = "text";
    } else {
        y.type = "password";
    }
}

function myFunction() {
    var x = document.getElementById("middleNav");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}
