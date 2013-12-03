/*
    create by weiganyi on 20131203
*/

function tb_add_event(obj, name, handler)
{
    //IE
    if (obj.attachEvent)
    {
        obj.attachEvent("on" + name, handler);
    }
    //chrome, firefox
    else if (obj.addEventListener)
    {
        obj.addEventListener(name, handler, false);
    }
}

function tb_cancel_event(event)
{
    var event = event || window.event;

    //chrome, firefox
    if (event.preventDefault)
    {
        event.preventDefault();
    }
    //IE
    else if (event.returnValue)
    {
        event.returnValue = false;
    }

    return false;
}

function tb_get_text_content(obj)
{
    var broswer = navigator.userAgent;

    //IE
    if (broswer.search(/msie/gi) != -1)
    {
        return obj.innerText;
    }
    //chrome, firefox
    else
    {
        return obj.textContent;
    }
}

function tb_set_text_content(obj, text)
{
    var broswer = navigator.userAgent;

    //IE
    if (broswer.search(/msie/gi) != -1)
    {
        obj.innerText = text;
    }
    //chrome, firefox
    else
    {
        obj.textContent = text;
    }

    return;
}

