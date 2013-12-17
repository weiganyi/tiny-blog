/*
    create by weiganyi on 20131127
*/

function tb_ajax(url, callback_fn)
{
    var req = new XMLHttpRequest();

    req.open("GET", url);

    req.setRequestHeader("Content-Type", "text/plain;charset=UTF-8");

    req.onreadystatechange = function(){
        if (req.readyState == 4 && req.status == 200)
        {
            var type = req.getResponseHeader("Content-Type");
            if (type.indexOf("text/html") != -1 && req.responseText && callback_fn)
            {
                callback_fn(req.responseText);
            }
        }
    };

    req.send(null);
};

