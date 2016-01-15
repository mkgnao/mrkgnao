var mkgnaoNs = mkgnaoNs || {};

const MAX_DEPTH = 6;
const ELEM_TD = 'td';
const ELEM_TR = 'tr';
const ELEM_TABLE = 'table';
const TYPE_OBJECT = 'object';

mkgnaoNs.traverse = function (obj, parentNode, depth) {
    if (depth === undefined)
        depth = 0;
    else if (depth >= MAX_DEPTH)
        return;

    for (var key in obj) {
        var value = obj[key];
        var tdKey = document.createElement(ELEM_TD);
        var tdValue = document.createElement(ELEM_TD);
        var tr = document.createElement(ELEM_TR);

        tdKey.innerHTML = key.toString();
        tr.appendChild(tdKey);

        if (typeof(value) == TYPE_OBJECT) {
            var table = document.createElement(ELEM_TABLE);
            var trChild = document.createElement(ELEM_TR);

            table.appendChild(trChild);
            tdValue.appendChild(table);
            tr.appendChild(tdValue);

            mkgnaoNs.traverse(value, trChild, depth + 1);
        } else {
            tdValue.innerHTML = value.toString();
            tr.appendChild(tdValue);
        }

        parentNode.appendChild(tr);
    }
};

mkgnaoNs.jsonToTable = function (jsonObj) {
    var table = document.createElement('table');
    table.className = "twTable";

    mkgnaoNs.traverse(jsonObj, table);

    return table;
};

mkgnaoNs.addLoadEvent = function (func) {
    var oldonload = window.onload;
    if (typeof window.onload != 'function') {
        window.onload = func;
    } else {
        window.onload = function () {
            if (oldonload) {
                oldonload();
            }
            func();
        }
    }
};

mkgnaoNs.twAddJson = function (jsonStr, containerId) {
    var jsonObj = JSON.parse(jsonStr);
    var tb = mkgnaoNs.jsonToTable(jsonObj);
    var container = document.getElementById(containerId);
    container.appendChild(tb);
};

mkgnaoNs.loadTw = function() {
    try {
        //console.log(mkgnaoNs);

        if (mkgnaoNs.tw_me) {
            mkgnaoNs.twAddJson(mkgnaoNs.tw_me, "twcontent");
        } else {
            var e = document.getElementById("twcontent");
            var n = document.createElement("div");
            n.id = "error";
            if (mkgnaoNs.tw_errors) {
                console.log(mkgnaoNs.tw_errors);
                n.innerHTML = mkgnaoNs.tw_errors;
            } else {
                n.innerHTML = "oops";
            }
            e.appendChild(n);
        }
    } catch (e) {
        console.log(e);

    }
};

mkgnaoNs.hideModalLogout = function () {
    var e = document.getElementById("Modal-flex-container-logout");
    if (!e)
        return;

    e.className = "Modal-flex-container-hidden";
};

mkgnaoNs.toggleModalLogout = function () {
    var e = document.getElementById("Modal-flex-container-logout");

    if (!e)
        return;

    if (e.className == "Modal-flex-container-hidden")
        e.className = "Modal-flex-container-shown";
    else
        e.className = "Modal-flex-container-hidden";
};

mkgnaoNs.hideModalLogoutBodyClick = function (e) {
    if (e.target != document.getElementById("logoutModalLogout") &&
        e.target != document.getElementById("logoutClick")) {
        hideModalLogout();
    }
};

mkgnaoNs.hideModalLogout = function () {
    var e = document.getElementById("Modal-flex-container-logout");
    if (!e)
        return;

    e.className = "Modal-flex-container-hidden";
};

mkgnaoNs.toggleModalLogout = function () {
    var e = document.getElementById("Modal-flex-container-logout");

    if (!e)
        return;

    if (e.className == "Modal-flex-container-hidden")
        e.className = "Modal-flex-container-shown";
    else
        e.className = "Modal-flex-container-hidden";
};

mkgnaoNs.hideModalLogoutBodyClick = function (e) {
    if (e.target != document.getElementById("logoutModalLogout") &&
        e.target != document.getElementById("logoutClick")) {
        hideModalLogout();
    }
};


mkgnaoNs.loadMain = function () {
    logoutLink = document.getElementById("logoutClick");
    if (logoutLink)
        logoutLink.addEventListener('click', toggleModalLogout);

    logoutModalStay = document.getElementById("logoutModalStay");
    if (logoutModalStay)
        logoutModalStay.addEventListener('click', hideModalLogout);

    loginLink = document.getElementById("loginClick");
    if (loginLink)
        loginLink.addEventListener('click', toggleModalLogin);

    loginModalStay = document.getElementById("loginModalStay");
    if (loginModalStay)
        logoutModalStay.addEventListener('click', hideModalLogin);

    document.onkeydown = function (evt) {
        evt = evt || window.event;
        if (evt.keyCode == 27) {
            hideModalLogout();
        }
    };

    bodyTop = document.getElementById("bodyTop");
    if (bodyTop)
        bodyTop.addEventListener('click', hideModalLogoutBodyClick);
};

mkgnaoNs.strPad = function (input, pad_length, pad_string, pad_type) {
    //  discuss at: http://phpjs.org/functions/str_pad/
    // original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // improved by: Michael White (http://getsprink.com)
    //    input by: Marco van Oort
    // bugfixed by: Brett Zamir (http://brett-zamir.me)
    //   example 1: str_pad('Kevin van Zonneveld', 30, '-=', 'STR_PAD_LEFT');
    //   returns 1: '-=-=-=-=-=-Kevin van Zonneveld'
    //   example 2: str_pad('Kevin van Zonneveld', 30, '-', 'STR_PAD_BOTH');
    //   returns 2: '------Kevin van Zonneveld-----'

    var half = '',
        pad_to_go;

    var str_pad_repeater = function (s, len) {
        var collect = '',
            i;

        while (collect.length < len) {
            collect += s;
        }
        collect = collect.substr(0, len);

        return collect;
    };

    input += '';
    pad_string = pad_string !== undefined ? pad_string : ' ';

    if (pad_type !== 'STR_PAD_LEFT' && pad_type !== 'STR_PAD_RIGHT' && pad_type !== 'STR_PAD_BOTH') {
        pad_type = 'STR_PAD_RIGHT';
    }
    if ((pad_to_go = pad_length - input.length) > 0) {
        if (pad_type === 'STR_PAD_LEFT') {
            input = str_pad_repeater(pad_string, pad_to_go) + input;
        } else if (pad_type === 'STR_PAD_RIGHT') {
            input = input + str_pad_repeater(pad_string, pad_to_go);
        } else if (pad_type === 'STR_PAD_BOTH') {
            half = str_pad_repeater(pad_string, Math.ceil(pad_to_go / 2));
            input = half + input + half;
            input = input.substr(0, pad_length);
        }
    }

    return input;
};