/**********************************
 * 
 *      checkCode.js
 * 
 * ********************************
 * 
 *  The file is used to supply the function of checkCode for login and enroll html page,
 *  S
 * 
 */


var code; // checkCode

// Create a string for code-check
function createCode() {
    code = new Array();
    var codeLength = 4; // length of checkCode
    var checkCode = document.getElementById("checkCode");
    checkCode.value = "";
    var selectChar = new Array(2, 3, 4, 5, 6, 7, 8, 9, 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    for (var i = 0; i < codeLength; i++) {
        var charIndex = Math.floor(Math.random() * 32);
        code += selectChar[charIndex];
    }
    if (code.length != codeLength) {
        createCode();
    }
    var eleCode = document.getElementById("codeReturn").innerHTML = code;
    //checkCode.value = code;
}

// Check the code posted by client is valid or not
function validate() {
    var inputCode = document.getElementById("checkCode").value.toUpperCase();
    if (inputCode.length <= 0) {
        alert("请输入验证码！");
        return false;
    } else if (inputCode != code) {
        alert("验证码输入错误！");
        createCode();
        return false;
    }
}

/*
// Input cannot be empty
function InputCheck(RegForm) {
    if (RegForm.username.value == "") {
        alert("用户名不可为空!");
        RegForm.username.focus();
        return (false);
    }
    if (RegForm.password.value == "") {
        alert("必须设定登录密码!");
        RegForm.password.focus();
        return (false);
    }
    if (RegForm.repass.value != RegForm.password.value) {
        alert("两次密码不一致!");
        RegForm.repass.focus();
        return (false);
    }
    if (RegForm.email.value == "") {
        alert("电子邮箱不可为空!");
        RegForm.email.focus();
        return (false);
    }
}
*/