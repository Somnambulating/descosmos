/************************************
 * 
 *      cookieCheck.js
 * 
 * *********************************'
 * 
 *  Set, get and check cookie
 * 
 */

// set cookie
function setCookie(aId, aValue) {
    var expireHours = 1;
    var d = new Date();

    d.setTime(d.getTime() + (expireHours * 60 * 60)); // expireHours later, the cookie is unavailable
    var expires = "expires=" + d.toTimeString();
    document.cookie = aId + "=" + aValue + ";" + expires + ";path=/";
}

// get cookie
function getCookie(aId) {
    var id = aId + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.lastIndexOf(aId) == 0) {
            return c.substring(id.length, c.length);
        }
    }
    return " ";
}

// check cookie
function checkCookie() {
    var user = getCookie("aId");
    if (user != " ") {
        // the user has logged in
        var lo = document.getElementById('login').innerHTML = user.substring(4);
    } else {
        // the user isn't logged, jump to login_account page after 3s
        alert("未登录,3s后转向登录");
        window.location.href = "../login_account/login_account.html";
    }
}