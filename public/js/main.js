/* BEGIN public/js/main.js */

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

mkgnaoNs.loadTw = function () {
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

mkgnaoNs.hideTopMenu = function () {
    var e = document.getElementById("maintopnavDiv");
    if (!e)
        return;

    e.className = "maintopnavDiv-hidden";
};

mkgnaoNs.toggleTopMenu = function () {
    var e = document.getElementById("maintopnavDiv");

    if (!e)
        return;

    if (e.className == "maintopnavDiv-hidden")
        e.className = "maintopnavDiv-shown";
    else
        e.className = "maintopnavDiv-hidden";
};

mkgnaoNs.hideTopMenuLogoutBodyClick = function (e) {
    mkgnaoNs.hideTopMenu();
};


/*



 */

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
        mkgnaoNs.hideModalLogout();
    }
};


mkgnaoNs.loadMain = function () {
    var logoutLink = document.getElementById("logoutClick");
    if (logoutLink)
        logoutLink.addEventListener('click', mkgnaoNs.toggleModalLogout);

    var logoutModalStay = document.getElementById("logoutModalStay");
    if (logoutModalStay)
        logoutModalStay.addEventListener('click', mkgnaoNs.hideModalLogout);

    document.onkeydown = function (evt) {
        evt = evt || window.event;
        if (evt.keyCode == 27) {
            mkgnaoNs.hideModalLogout();
            mkgnaoNs.hideTopMenu();
        }
    };

    var bodyTop = document.getElementById("bodyTop");
    if (bodyTop)
        bodyTop.addEventListener('click', mkgnaoNs.hideModalLogoutBodyClick);

    var topMenu = document.getElementById("topMenu");
    if (topMenu)
        topMenu.addEventListener('click', mkgnaoNs.toggleTopMenu);
};


function motherFucker()
{

    $(".center-tagline .center-tagline-content:hidden:first").fadeIn(3000), function() {
        $(this).appendTo($(this).parent());
    });

    //$(".center-tagline .center-tagline-content:hidden:first").fadeIn(3000).delay(10000).fadeOut(1000, function() {
    //    $(this).appendTo($(this).parent());
        //motherFucker();
    //});
}

mkgnaoNs.addLoadEvent(motherFucker);

/* END public/js/main.js */