/*
    create by weiganyi on 20131203
*/

function tb_add_event(node, name, handler)
{
    //IE
    if (node.attachEvent)
    {
        node.attachEvent("on" + name, handler);
    }
    //chrome, firefox
    else if (node.addEventListener)
    {
        node.addEventListener(name, handler, false);
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

function tb_get_text_content(node)
{
    var broswer = navigator.userAgent;

    //IE
    if (broswer.search(/msie/gi) != -1)
    {
        return node.innerText;
    }
    //chrome, firefox
    else
    {
        return node.textContent;
    }
}

function tb_set_text_content(node, text)
{
    var broswer = navigator.userAgent;

    //IE
    if (broswer.search(/msie/gi) != -1)
    {
        node.innerText = text;
    }
    //chrome, firefox
    else
    {
        node.textContent = text;
    }

    return;
}

