// Validation functions for the sing up form 
function validatePassword(){
    let pass = document.forms["signupForm"]["password"].value;
    let pattern = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$");

    if(!pattern.test(pass)){
        alert("Your password must be between 8 and 15 character and contain at least one uppercase, lowercase, number and special character.")
    }
}

function validateEmptyName(){
    let name = document.forms["signupForm"]["name"].value;

    if(name == ""){
        alert("Name cannot be empty");
    }
}

function validateEmptySurname(){
    let surname = document.forms["signupForm"]["surname"].value;

    if(surname == ""){
        alert("Surname cannot be empty");
    }
}

function validateEmptyBirthdate(){
    let birthdate = document.forms["signupForm"]["birthdate"].value;

    if(birthdate == ""){
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