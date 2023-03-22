function validatePasswordChars(){
    let pass = document.forms["loginForm"]["password"].value;
    let pattern = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$");

    if(!pattern.test(pass)){
        alert("Your password must be between 8 and 15 character and contain at least one uppercase, lowercase, number and special character.")
    }
}