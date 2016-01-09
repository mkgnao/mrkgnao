var mkgnaoNs = mkgnaoNs || {};

const MAX_DEPTH = 6;

mkgnaoNs.traverse = function (obj, parentNode, depth) {
    if (depth === undefined)
        depth = 0;
    else if (depth >= MAX_DEPTH)
        return;

    for (var key in obj) {
        var value = obj[key];
        var tdKey = document.createElement('td');
        var tdValue = document.createElement('td');
        var tr = document.createElement('tr');

        tdKey.innerHTML = key.toString();
        tr.appendChild(tdKey);

        if (typeof(value) == "object") {
            var table = document.createElement('table');
            var trChild = document.createElement('tr');

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