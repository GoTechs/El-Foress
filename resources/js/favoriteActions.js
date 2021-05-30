/* ******************************   Add post to favorits *************************************** */

$("#MyID").click(function () {
    var StateName = $(this).text();
    showState(StateName);
});

$("#pass-status").click(function () {
    var passwordInput = document.getElementById("password-field");
    var passStatus = document.getElementById("pass-status");

    if (passwordInput.type == "password") {
        passwordInput.type = "text";
        passStatus.className = "fa fa-eye-slash field-icon toggle-password";
    } else {
        passwordInput.type = "password";
        passStatus.className = "fa fa-eye field-icon toggle-password";
    }
});
