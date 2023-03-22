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