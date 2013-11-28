/*
    create by weiganyi on 20131127
*/

function tb_ajax()
{
    this.get_post = function(url)
    {
        this.ajax_get(url, this.fn_get_post);
    };

    this.fn_get_post = function()
    {
    };
}

tb_ajax.prototype.ajax_get = function(url, callback_fn)
{
    var req = new XMLHttpRequest();

    req.open("GET", url);

    req.setRequestHeader("Content-Type", "text/plain;charset=UTF-8");

    req.onreadystatechange = function(){
        if (req.readyState == 4 && req.status == 200)
        {
            var type = req.getResponseHeader("Content-Type");
            if (type.indexOf("xml") != -1 && req.responseXML)
            {
                callback_fn(req.responseXML);
            }
        }
    };

    req.send(null);
};

