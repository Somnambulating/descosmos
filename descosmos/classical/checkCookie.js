/************************************
 * 
 *      cookieCheck.js
 * 
 * *********************************'
 * 
 *  Check cookie is set or not.
 * 
 */

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
        // the user isn't logged, illustrating "未登录"
        var lo = document.getElementById('login').innerHTML = "未登录";
    }
}
