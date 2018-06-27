function setCookie(name, value, duration="") {
        // Caso duração não preenchida assume 30 dias
        if(duration == ""){
            var duration = new Date();
            duration.setDate(duration.getDate() + 30);
        }
        var cookie = name + "=" + escape(value) +
        ((duration) ? "; duration=" + duration.toGMTString() : "");
        document.cookie = cookie;
}

function getCookie(name) {
    var cookies = document.cookie;
    var prefix = name + "=";
    var begin = cookies.indexOf("; " + prefix);
 
    if (begin == -1) {
 
        begin = cookies.indexOf(prefix);
         
        if (begin != 0) {
            return null;
        }
 
    } else {
        begin += 2;
    }
 
    var end = cookies.indexOf(";", begin);
     
    if (end == -1) {
        end = cookies.length;                        
    }
 
    return unescape(cookies.substring(begin + prefix.length, end));
}

function deleteCookie(name) {
       if (getCookie(name)) {
              document.cookie = name + "=" + "; expires=Thu, 01-Jan-70 00:00:01 GMT";
       }
}

function deleteAllCookies() {
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}