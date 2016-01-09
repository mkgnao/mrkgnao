var mkgnaoNs = mkgnaoNs || {};

mkgnaoNs.traverse = function (o, lvl, n) {
    for (var i in o) {
        if (o[i] == null)
            return;

        var tdk = document.createElement('td');
        var tdv = document.createElement('td');
        var tr = document.createElement('tr');

        tdk.innerHTML = i.toString().toLowerCase();

        tr.appendChild(tdk);

        if (typeof(o[i]) == "object") {
            var tb = document.createElement('table');
            var trc = document.createElement('tr');

            tb.appendChild(trc);
            tdv.appendChild(tb);
            tr.appendChild(tdv);

            mkgnaoNs.traverse(o[i], lvl + 1, trc);
        } else {
            tdv.innerHTML = o[i].toString().toLowerCase();
            tr.appendChild(tdv);
        }

        n.appendChild(tr);
    }
};

mkgnaoNs.jsonToTable = function(jsonObj) {
    var tb = document.createElement('table');
    tb.className = "twTable";

    mkgnaoNs.traverse(jsonObj, 0, tb);

    return tb;
};

mkgnaoNs.twAddJson = function (jsonStr, containerId) {
    var jsonObj = JSON.parse(jsonStr);
    var tb = mkgnaoNs.jsonToTable(jsonObj);
    var container = document.getElementById(containerId);
    container.appendChild(tb);
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