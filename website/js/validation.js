// Validation functions for the sing up form 
function validatePassword() {
    let pass = document.getElementById("oldPassword").value;
    let newpass1 = document.getElementById("newPassword1").value;
    let newpass2 = document.getElementById("newPassword2").value;

    let pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/;

    if (!pattern.test(newpass1) || !pattern.test(newpass2)) {
        alert("Your password must be between 8 and 15 characters and contain at least one uppercase letter, one lowercase letter, one number, and one special character.");
        return false;
    }
    if (newpass1 !== newpass2) {
        alert("New passwords do not match.");
        return false;
    }
    return true;
}

function validateEmptyName() {
    let name = document.forms["signupForm"]["name"].value;

    if (name == "") {
        alert("Name cannot be empty");
    }
}

function validateEmptySurname() {
    let surname = document.forms["signupForm"]["surname"].value;

    if (surname == "") {
        alert("Surname cannot be empty");
    }
}

function validateEmptyBirthdate() {
    let birthdate = document.forms["signupForm"]["birthdate"].value;

    if (birthdate == "") {
        alert("Name cannot be empty");
    }
}



/*
Validation de Nistal
*/

function balidatu() {
    const formularioa = ["izena", "email", "helbidea", "telefonoa", "herrialdea", "iruzkinak"];
    for (var i = 0; i < formularioa.length; i++) {
        var x = document.forms["formularioa"][formularioa[i]].value;
        if (x == "") {
            document.getElementById("abisua").innerHTML = "Mesedez bete '" + formularioa[i] + "' eremua";
            document.getElementById("abisua").style.color = "grey";
            document.getElementById("abisua").style.fontSize = "50px";
            document.getElementById("abisua").style.textAlign = "center";

            return false;
        }
    }
    var em = document.forms["formularioa"]["email"].value;
    if ((em.includes("@")) == false) {
        document.getElementById("abisua").innerHTML = "Emailak @ ikurra eduki behar du.";
        document.getElementById("abisua").style.color = "grey";
        document.getElementById("abisua").style.fontSize = "50px";
        document.getElementById("abisua").style.textAlign = "center";
        return false;
    }
    var tlf = document.forms["formularioa"]["telefonoa"].value;
    if ((tlf.match(/(\+34|0034|34)?[ -]*(6|7|9|8)[ -]*([0-9][ -]*){8}/)) == null) {
        document.getElementById("abisua").innerHTML = "Telefonoak 9 zenbaki izan behar ditu.";
        document.getElementById("abisua").style.color = "grey";
        document.getElementById("abisua").style.fontSize = "50px";
        document.getElementById("abisua").style.textAlign = "center";
        return false;
    }
}

function garbitu() {
    document.getElementById("abisua").innerHTML = "";
}

function TDate() {
    var UserDate = document.getElementById("reservationDate").value;
    var ToDate = new Date();

    if (new Date(UserDate).getTime() <= ToDate.getTime()) {
        alert("The Date must be Bigger or Equal to today date");
        return false;
    }
    return true;
}