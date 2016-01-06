var mkgnaoNs = mkgnaoNs || {};

mkgnaoNs.twAddJson = function(what, where) {
    var j = JSON.parse(what);
    var n = mkgnaoNs.prettyPrint(j);
    var e = document.getElementById(where);
    e.appendChild(n);
};
