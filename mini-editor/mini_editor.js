/*
 * Create by weiganyi on 20131107
 */

var TOOLBAR_HTML = " \
<div id=\"me_toolbar\"> \
<a href=\"#\" title=\"Bold\" btn_action=\"Bold\" class=\"me_command\"> \
    <img src=\"images/bold.gif\"></img></a> \
<a href=\"#\" title=\"Italic\" btn_action=\"Italic\" class=\"me_command\"> \
    <img src=\"images/italic.gif\"></img></a> \
<a href=\"#\" title=\"Underline\" btn_action=\"Underline\" class=\"me_command\"> \
    <img src=\"images/underline.gif\"></img></a> \
<a href=\"#\" title=\"StrikeThrough\" btn_action=\"StrikeThrough\" class=\"me_command\"> \
    <img src=\"images/strikethrough.gif\"></img></a> \
<span id=\"me_font_menu\"> \
<a href=\"#\" class=\"me_command\" id=\"me_font_menu_head\"> \
    <img src=\"images/font.gif\"></img></a> \
<ul id=\"me_font_menu_list\"> \
    <li class=\"me_font_menu_item\"> \
        <a href=\"#\" menu_action=\"FontSize\" font_size=\"7\" class=\"me_font_menu_link\">Title 1</a> \
    </li> \
    <li class=\"me_font_menu_item\"> \
        <a href=\"#\" menu_action=\"FontSize\" font_size=\"6\" class=\"me_font_menu_link\">Title 2</a> \
    </li> \
    <li class=\"me_font_menu_item\"> \
        <a href=\"#\" menu_action=\"FontSize\" font_size=\"5\" class=\"me_font_menu_link\">Title 3</a> \
    </li> \
    <li class=\"me_font_menu_item\"> \
        <a href=\"#\" menu_action=\"FontSize\" font_size=\"4\" class=\"me_font_menu_link\">Title 4</a> \
    </li> \
    <li class=\"me_font_menu_item\"> \
        <a href=\"#\" menu_action=\"FontSize\" font_size=\"3\" class=\"me_font_menu_link\">Text</a> \
    </li> \
</ul> \
</span> \
<a href=\"#\" title=\"InsertOrderedList\" btn_action=\"InsertOrderedList\" class=\"me_command\"> \
    <img src=\"images/orderedlist.gif\"></img></a> \
<a href=\"#\" title=\"InsertUnorderedList\" btn_action=\"InsertUnorderedList\" class=\"me_command\"> \
    <img src=\"images/unorderedlist.gif\"></img></a> \
<a href=\"#\" title=\"Indent\" btn_action=\"Indent\" class=\"me_command\"> \
    <img src=\"images/indent.gif\"></img></a> \
<a href=\"#\" title=\"Outdent\" btn_action=\"Outdent\" class=\"me_command\"> \
    <img src=\"images/outdent.gif\"></img></a> \
<a href=\"#\" title=\"InsertHorizontalRule\" btn_action=\"InsertHorizontalRule\" class=\"me_command\"> \
    <img src=\"images/horizontalrule.gif\"></img></a> \
<a href=\"#\" title=\"CreateLink\" btn_action=\"CreateLink\" class=\"me_command\"> \
    <img src=\"images/link.gif\"></img></a> \
<a href=\"#\" title=\"Unlink\" btn_action=\"Unlink\" class=\"me_command\"> \
    <img src=\"images/unlink.gif\"></img></a> \
<span id=\"me_nwk_image_menu\"> \
<a href=\"#\" class=\"me_command\" id=\"me_nwk_image_menu_head\"> \
    <img src=\"images/nwkimage.gif\"></img></a> \
<table id=\"me_nwk_image_menu_table\"> \
    <tr class=\"me_nwk_image_menu_row\"> \
        <td class=\"me_nwk_image_menu_cell_left\">picture address: </td> \
        <td class=\"me_nwk_image_menu_cell_right\"> \
            <input type=\"text\" id=\"me_nwk_image_menu_address\" style=\"width:300px;\"/></td> \
    </tr> \
    <tr class=\"me_nwk_image_menu_row\"> \
        <td class=\"me_nwk_image_menu_cell_left\"> \
            <input type=\"button\" id=\"me_nwk_image_menu_insert\"/ value=\"InsertImage\"></td> \
        <td class=\"me_nwk_image_menu_cell_right\"> \
            <input type=\"button\" id=\"me_nwk_image_menu_clear\"/ value=\"Clear\"></td> \
    </tr> \
</table> \
</span> \
<span id=\"me_host_image_menu\"> \
<a href=\"#\" class=\"me_command\" id=\"me_host_image_menu_head\"> \
    <img src=\"images/hostimage.gif\"></img></a> \
<table id=\"me_host_image_menu_table\"> \
    <tr class=\"me_host_image_menu_row\"> \
        <td> \
            <iframe id=\"me_host_image_menu_frame\" name=\"me_host_image_menu_frame\"></iframe> \
            <form method=\"post\" id=\"me_host_image_menu_form\" name=\"me_host_image_menu_form\" target=\"me_host_image_menu_frame\" enctype=\"multipart/form-data\" action=\"image.php\"> \
                <input type=\"file\" id=\"me_host_image_menu_file\" name=\"me_host_image_menu_file\"> \
                <input type=\"button\" id=\"me_host_image_menu_upload\" name=\"me_host_image_menu_upload\" value=\"Upload\"> \
            </form> \
        </td> \
    </tr> \
</table> \
</span> \
<a href=\"#\" title=\"RemoveFormat\" btn_action=\"RemoveFormat\" class=\"me_command\"> \
    <img src=\"images/removeformat.gif\"></img></a> \
<span id=\"me_emoticon_menu\"> \
<a href=\"#\" class=\"me_command\" id=\"me_emoticon_menu_head\"> \
    <img src=\"images/emoticon.gif\"></img></a> \
<table id=\"me_emoticon_menu_table\"> \
    <tr class=\"me_emoticon_menu_row\"> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/1.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/2.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/3.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/4.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/5.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/6.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/7.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/8.gif\"></img></a> \
        </td> \
    </tr> \
    <tr class=\"me_emoticon_menu_row\"> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/9.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/10.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/11.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/12.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/13.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/14.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/15.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/16.gif\"></img></a> \
        </td> \
    </tr> \
    <tr class=\"me_emoticon_menu_row\"> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/17.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/18.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/19.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/20.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/21.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/22.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/23.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/24.gif\"></img></a> \
        </td> \
    </tr> \
    <tr class=\"me_emoticon_menu_row\"> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/25.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/26.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/27.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/28.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/29.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/30.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/31.gif\"></img></a> \
        </td> \
        <td class=\"me_emoticon_menu_cell\"> \
            <a href=\"#\" menu_action=\"InsertImage\" class=\"me_emoticon_menu_link\"> \
                <img src=\"images/emoticons/32.gif\"></img></a> \
        </td> \
    </tr> \
</table> \
</span> \
<span id=\"me_table_menu\"> \
<a href=\"#\" class=\"me_command\" id=\"me_table_menu_head\"> \
    <img src=\"images/table.gif\"></img></a> \
<table id=\"me_table_menu_table\"> \
    <tr class=\"me_table_menu_row\"> \
        <td class=\"me_table_menu_cell_left\">row number: </td> \
        <td class=\"me_table_menu_cell_right\"><input type=\"text\" id=\"me_table_menu_row\" style=\"width:100px;\"/></td> \
    </tr> \
    <tr class=\"me_table_menu_row\"> \
        <td class=\"me_table_menu_cell_left\">column number: </td> \
        <td class=\"me_table_menu_cell_right\"><input type=\"text\" id=\"me_table_menu_column\" style=\"width:100px;\"/></td> \
    </tr> \
    <tr class=\"me_table_menu_row\"> \
        <td class=\"me_table_menu_cell_left\">width: </td> \
        <td class=\"me_table_menu_cell_right\"><input type=\"text\" id=\"me_table_menu_width\" style=\"width:100px;\"/></td> \
    </tr> \
    <tr class=\"me_table_menu_row\"> \
        <td class=\"me_table_menu_cell_left\">height: </td> \
        <td class=\"me_table_menu_cell_right\"><input type=\"text\" id=\"me_table_menu_height\" style=\"width:100px;\"/></td> \
    </tr> \
    <tr class=\"me_table_menu_row\"> \
        <td class=\"me_table_menu_cell_left\">border: </td> \
        <td class=\"me_table_menu_cell_right\"><input type=\"text\" id=\"me_table_menu_border\" style=\"width:100px;\"/></td> \
    </tr> \
    <tr class=\"me_table_menu_row\"> \
        <td class=\"me_table_menu_cell_left\"><input type=\"button\" id=\"me_table_menu_insert\"/ value=\"InsertTable\"></td> \
        <td class=\"me_table_menu_cell_right\"><input type=\"button\" id=\"me_table_menu_clear\"/ value=\"Clear\"></td> \
    </tr> \
</table> \
</span> \
</div> \
";

jQuery.fn.mini_editor = 
{
    //config options list
    options_list : {lang:"en", 
                    image_page:"image.php", 
                    text_page:"text.php", 
                    base_url:null, 
                    max_img:10,
                    load_callback:fn_load_callback,
                    submit_callback:fn_submit_callback},

    //jquery object
    editor : null,

    win : null,
    doc : null,

    is_msie: false,
    is_firefox: false,
    is_chrome: false,

    //current image number
    curr_img: 0,
    //the list of the src path for the inserted image
    img_src: [],

    save_options : function(options)
    {
        if (options)
        {
            for (var name in options)
            {
                this.options_list[name] = options[name];
            }
        }

        return this;
    },

    init_editor : function(editor)
    {
        this.editor = editor;

        //this pointer is the mini_editor object
        this.win = editor[0].contentWindow;
        this.doc = this.win.document;

        //set doc to editable
        this.doc.designMode = 'On';
        this.doc.contentEditor = true;

        this.doc.open();
        this.doc.close();
        this.win.focus();

        //check browser type
        var broswer = navigator.userAgent;
        if (broswer.search(/msie/gi) != -1)
        {
            this.is_msie = true;
        }
        else if (broswer.search(/firefox/gi) != -1)
        {
            this.is_firefox = true;
        }
        else if (broswer.search(/chrome/gi) != -1)
        {
            this.is_chrome = true;
        }

        //import the contury js
        var head = document.getElementsByTagName("head")[0];
        var script = document.createElement("script");
        if (this.options_list["base_url"])
        {
            script.src = this.options_list["base_url"] + "/";
        }
        script.src = script.src + "lang/"  + this.options_list["lang"] + ".js";
        script.charset = "UTF-8";
        script.type = "text/javascript";
        script.onload = script.onreadystatechange = function ()
        {
            if (!script.readyState || script.readyState === 'loaded' || script.readyState === 'complete')
            {
                //this change to "lang/en.js"
                var obj = $(this);
                obj.mini_editor.add_title();
                obj.mini_editor.add_content();
                obj.mini_editor.add_toolbar();
                obj.mini_editor.add_submit();
                script.onload = script.onreadystatechange = null;

                //exec the load callback function
                if (obj.mini_editor.options_list["load_callback"])
                {
                    obj.mini_editor.options_list["load_callback"](obj);
                }
            };
        };
        head.appendChild(script);

        return this;
    },

    add_title : function()
    {
        if (this.options_list["article_title"])
        {
            var title_html = "<div id=\"me_article_title\"><label>" + this.options_list["article_title"] + ": </label>";
        }
        else
        {
            var title_html = "<div id=\"me_article_title\"><label>" + contury_lang["article_title"] + ": </label>";
        }
        title_html = title_html + "<input type=\"text\" name=\"me_article_title_text\" id=\"me_article_title_text\"></div>";
        var title_obj = $(title_html);

        //add title_obj before the iframe
        this.editor.before(title_obj);
    },

    add_toolbar : function()
    {
        //apply the contury language configed for all toolbar display
        TOOLBAR_HTML = this.apply_contury_language(TOOLBAR_HTML);

        //create toolbar object
        var toolbar = $(TOOLBAR_HTML);

        //decorate the font menu link
        this.decorate_font_menu_link(toolbar);

        //fix the menu position for IE broswer
        this.fix_menu_position(toolbar);

        //fix the picture address
        this.fix_pic_addr(toolbar);

        //register event function
        //me_command event
        toolbar.find(".me_command").bind("mouseenter", this.command_mouseenter);
        toolbar.find(".me_command").bind("mouseleave", this.command_mouseleave);

        toolbar.find(".me_command").bind("click", this.command_click);

        //me_font_menu event
        toolbar.find("#me_font_menu").bind("mouseenter", this.font_menu_mouseenter);
        toolbar.find("#me_font_menu").bind("mouseleave", this.font_menu_mouseleave);

        toolbar.find(".me_font_menu_item").bind("mouseenter", this.font_menu_item_mouseenter);
        toolbar.find(".me_font_menu_item").bind("mouseleave", this.font_menu_item_mouseleave);

        toolbar.find(".me_font_menu_link").bind("click", this.font_menu_link_click);

        //me_nwk_image_menu event
        toolbar.find("#me_nwk_image_menu").bind("mouseenter", this.nwk_image_menu_mouseenter);
        toolbar.find("#me_nwk_image_menu").bind("mouseleave", this.nwk_image_menu_mouseleave);

        toolbar.find("#me_nwk_image_menu_insert").bind("click", this.nwk_image_menu_insert_click);
        toolbar.find("#me_nwk_image_menu_clear").bind("click", this.nwk_image_menu_clear_click);

        //me_host_image_menu event
        toolbar.find("#me_host_image_menu").bind("mouseenter", this.host_image_menu_mouseenter);
        toolbar.find("#me_host_image_menu").bind("mouseleave", this.host_image_menu_mouseleave);

        toolbar.find("#me_host_image_menu_frame").bind("load", this.host_image_menu_frame_load);
        toolbar.find("#me_host_image_menu_upload").bind("click", this.host_image_menu_upload_click);

        //me_emoticon_menu event
        toolbar.find("#me_emoticon_menu").bind("mouseenter", this.emoticon_menu_mouseenter);
        toolbar.find("#me_emoticon_menu").bind("mouseleave", this.emoticon_menu_mouseleave);

        toolbar.find(".me_emoticon_menu_cell").bind("mouseenter", this.emoticon_menu_cell_mouseenter);
        toolbar.find(".me_emoticon_menu_cell").bind("mouseleave", this.emoticon_menu_cell_mouseleave);

        toolbar.find(".me_emoticon_menu_link").bind("click", this.emoticon_menu_link_click);

        //me_table_menu event
        toolbar.find("#me_table_menu").bind("mouseenter", this.table_menu_mouseenter);
        toolbar.find("#me_table_menu").bind("mouseleave", this.table_menu_mouseleave);

        toolbar.find("#me_table_menu_insert").bind("click", this.table_menu_insert_click);
        toolbar.find("#me_table_menu_clear").bind("click", this.table_menu_clear_click);

        //add toolbar before the iframe
        this.editor.before(toolbar);
    },

    add_content : function()
    {
        if (this.options_list["article_content"])
        {
            var content_html = "<div id=\"me_article_content\"><label>" + this.options_list["article_content"] + ": </label></div>";
        }
        else
        {
            var content_html = "<div id=\"me_article_content\"><label>" + contury_lang["article_content"] + ": </label></div>";
        }
        var content_obj = $(content_html);

        //add content_obj before the iframe
        this.editor.before(content_obj);
    },

    add_submit : function()
    {
        if (this.options_list["submit_text"])
        {
            var submit_html = "<div id=\"me_submit_button\"><button type=\"button\">" + this.options_list["submit_text"] + "</button></div>";
        }
        else
        {
            var submit_html = "<div id=\"me_submit_button\"><button type=\"button\">" + contury_lang["submit_text"] + "</button></div>";
        }
        var submit_obj = $(submit_html);

        //add submit_obj after the iframe
        this.editor.after(submit_obj);

        //bind the click function
        $("#me_submit_button").children().bind("click", this.submit_click);
    },

    apply_contury_language : function(toolbar_html)
    {
        if (toolbar_html)
        {
            var replace_value = "";

            replace_value = "title=\"" + contury_lang["Bold"] + "\"";
            toolbar_html = toolbar_html.replace(/title="Bold"/g, replace_value);
            replace_value = "title=\"" + contury_lang["Italic"] + "\"";
            toolbar_html = toolbar_html.replace(/title="Italic"/g, replace_value);
            replace_value = "title=\"" + contury_lang["Underline"] + "\"";
            toolbar_html = toolbar_html.replace(/title="Underline"/g, replace_value);
            replace_value = "title=\"" + contury_lang["StrikeThrough"] + "\"";
            toolbar_html = toolbar_html.replace(/title="StrikeThrough"/g, replace_value);
            replace_value = "title=\"" + contury_lang["InsertOrderedList"] + "\"";
            toolbar_html = toolbar_html.replace(/title="InsertOrderedList"/g, replace_value);
            replace_value = "title=\"" + contury_lang["InsertUnorderedList"] + "\"";
            toolbar_html = toolbar_html.replace(/title="InsertUnorderedList"/g, replace_value);
            replace_value = "title=\"" + contury_lang["Indent"] + "\"";
            toolbar_html = toolbar_html.replace(/title="Indent"/g, replace_value);
            replace_value = "title=\"" + contury_lang["Outdent"] + "\"";
            toolbar_html = toolbar_html.replace(/title="Outdent"/g, replace_value);
            replace_value = "title=\"" + contury_lang["InsertHorizontalRule"] + "\"";
            toolbar_html = toolbar_html.replace(/title="InsertHorizontalRule"/g, replace_value);
            replace_value = "title=\"" + contury_lang["CreateLink"] + "\"";
            toolbar_html = toolbar_html.replace(/title="CreateLink"/g, replace_value);
            replace_value = "title=\"" + contury_lang["Unlink"] + "\"";
            toolbar_html = toolbar_html.replace(/title="Unlink"/g, replace_value);
            replace_value = "title=\"" + contury_lang["RemoveFormat"] + "\"";
            toolbar_html = toolbar_html.replace(/title="RemoveFormat"/g, replace_value);

            replace_value = contury_lang["Title"];
            toolbar_html = toolbar_html.replace(/Title/g, replace_value);
            replace_value = contury_lang["Text"];
            toolbar_html = toolbar_html.replace(/Text/g, replace_value);

            replace_value = contury_lang["picture address"];
            toolbar_html = toolbar_html.replace(/picture address/g, replace_value);
            replace_value = contury_lang["InsertImage"];
            toolbar_html = toolbar_html.replace(/InsertImage/g, replace_value);
            replace_value = contury_lang["Clear"];
            toolbar_html = toolbar_html.replace(/Clear/g, replace_value);

            replace_value = contury_lang["Upload"];
            toolbar_html = toolbar_html.replace(/Upload/g, replace_value);

            replace_value = contury_lang["row number"];
            toolbar_html = toolbar_html.replace(/row number/g, replace_value);
            replace_value = contury_lang["column number"];
            toolbar_html = toolbar_html.replace(/column number/g, replace_value);
            replace_value = contury_lang["width"] + ": ";
            toolbar_html = toolbar_html.replace(/width: /g, replace_value);
            replace_value = contury_lang["height"] + ": ";
            toolbar_html = toolbar_html.replace(/height: /g, replace_value);
            replace_value = contury_lang["border"] + ": ";
            toolbar_html = toolbar_html.replace(/border: /g, replace_value);
            replace_value = contury_lang["InsertTable"];
            toolbar_html = toolbar_html.replace(/InsertTable/g, replace_value);
        }

        return toolbar_html;
    },

    decorate_font_menu_link : function(toolbar)
    {
        if (toolbar)
        {
            var link_list = toolbar.find(".me_font_menu_link");
            var link_number = link_list.length;
            for (var idx=0; idx<link_number; idx++)
            {
                //convert html fragment to jquery object
                var obj = $(link_list[idx]);
                var font_size = obj.attr("font_size");
                //calculate the px of the font menu link text
                var str_size = String(Number(font_size)*2+10) + "px";
                obj.css("font-size", str_size);
            }
        }

        return this;
    },

    fix_menu_position : function(toolbar)
    {
        if (toolbar && this.is_msie == true)
        {
            var font_menu_link = toolbar.find("#me_font_menu_list");
            font_menu_link.css({left: "40px", top: "25px"});

            var font_menu_link = toolbar.find("#me_nwk_image_menu_table");
            font_menu_link.css({left: "300px", top: "25px"});

            var font_menu_link = toolbar.find("#me_host_image_menu_table");
            font_menu_link.css({left: "330px", top: "25px"});

            var font_menu_link = toolbar.find("#me_emoticon_menu_table");
            font_menu_link.css({left: "380px", top: "25px"});

            var font_menu_link = toolbar.find("#me_table_menu_table");
            font_menu_link.css({left: "400px", top: "25px"});
        }

        return this;
    },

    fix_pic_addr : function(toolbar)
    {
        if (toolbar && this.options_list["base_url"])
        {
            var img_list = toolbar.find("img");
            var img_number = img_list.length;
            for (var idx=0; idx<img_number; idx++)
            {
                //convert html fragment to jquery object
                var obj = $(img_list[idx]);
                var src = obj.attr("src");
                //add the base url into the src of the img
                src = src.replace(/images/gi, this.options_list["base_url"]+"/images");
                obj.attr("src", src);
            }
        }

        return this;
    },

    command_mouseenter : function()
    {
        var obj = $(this);
        obj.css("border-style", "solid");

        return this;
    },

    command_mouseleave : function()
    {
        obj = $(this);
        obj.css("border-style", "none");

        return this;
    },

    command_click : function()
    {
        //this pointer is the html fragment that been clicked
        var obj = $(this);
        var param = null;

        var btn_action = obj.attr("btn_action");

        //prompt user to input link address
        if (btn_action == "CreateLink")
        {
            param = obj.mini_editor.link_prompt();
        }

        var win = obj.mini_editor.win;
        var doc = obj.mini_editor.doc;

        win.focus();
        if (param)
        {
            doc.execCommand(btn_action, false, param);
        }
        else
        {
            doc.execCommand(btn_action, false, null);
        }
        win.focus();

        return this;
    },

    link_prompt : function()
    {
        var value = prompt("please input the link address:", "http://");

        return value;
    },

    font_menu_mouseenter : function()
    {
        $("#me_font_menu_list").css("display", "block");

        return this;
    },

    font_menu_mouseleave : function()
    {
        $("#me_font_menu_list").css("display", "none");

        return this;
    },

    font_menu_item_mouseenter : function()
    {
        var obj = $(this);
        obj.css("background-color", "gray");

        return this;
    },

    font_menu_item_mouseleave : function()
    {
        var obj = $(this);
        obj.css("background-color", "white");

        return this;
    },

    font_menu_link_click : function()
    {
        //this pointer is the html fragment that been clicked
        var obj = $(this);

        var menu_action = obj.attr("menu_action");
        var font_size = obj.attr("font_size");

        var win = obj.mini_editor.win;
        var doc = obj.mini_editor.doc;

        win.focus();
        doc.execCommand(menu_action, false, font_size);
        win.focus();

        //close the me_font_menu_list display
        $("#me_font_menu_list").css("display", "none");

        return this;
    },

    nwk_image_menu_mouseenter : function()
    {
        $("#me_nwk_image_menu_table").css("display", "block");

        return this;
    },

    nwk_image_menu_mouseleave : function()
    {
        $("#me_nwk_image_menu_table").css("display", "none");

        return this;
    },

    nwk_image_menu_insert_click : function()
    {
        var image_address = $("#me_nwk_image_menu_address").val();

        //translate char "\" to char "/"
        if (image_address.search(/\\/g) != -1)
        {
            image_address = image_address.replace(/\\/g, "/");
        }

        //append file:/// prefix before the absoulte path
        if (image_address.search(/(^[A-D]:)/g) != -1)
        {
            image_address = image_address.replace(/(^[A-D]:)/g, "file:///$1");
        }

        //this pointer is the html fragment that been clicked
        var obj = $(this);

        var win = obj.mini_editor.win;
        var doc = obj.mini_editor.doc;

        win.focus();
        doc.execCommand("InsertImage", false, image_address);
        win.focus();

        //close the me_nwk_image_menu_table display
        $("#me_nwk_image_menu_table").css("display", "none");

        return this;
    },

    nwk_image_menu_clear_click : function()
    {
        $("#me_nwk_image_menu_address").val("");

        //close the me_nwk_image_menu_table display
        $("#me_nwk_image_menu_table").css("display", "none");

        return this;
    },

    host_image_menu_mouseenter : function()
    {
        $("#me_host_image_menu_table").css("display", "block");

        return this;
    },

    host_image_menu_mouseleave : function()
    {
        $("#me_host_image_menu_table").css("display", "none");

        return this;
    },

    host_image_menu_frame_load : function()
    {
        //here return temporarily
        //return this;

        //because this is a iframe, so we need get the html through DOM but not jquery
        var doc = this.contentWindow.document;
        var html = doc.body.innerHTML;

        //save the image src that came from the server
        var image_name = html.match(/image_name=(.+)&/);
        if (image_name != null && image_name[1] != null)
        {
            var image_src = html.match(/image_src=(.+)/);
            if (image_src != null && image_src[1] != null)
            {
                if (!obj.mini_editor.img_src[image_name[1]])
                {
                    obj.mini_editor.img_src[image_name[1]] = image_src[1];
                }
            }
        }

        return this;
    },

    host_image_menu_upload_click : function()
    {
        //this pointer is the html fragment that been clicked
        var obj = $(this);

        //control the max number of the inserted image
        if (obj.mini_editor.curr_img >= obj.mini_editor.options_list["max_img"])
        {
            alert("the current inserted image number is exceed the maximum!");
            return this;
        }
        obj.mini_editor.curr_img++;

        //get the file name from the path
        var image_path = $("#me_host_image_menu_file").val();
        var last = image_path.lastIndexOf("\\");
        if (last)
        {
            var image_base_name = image_path.substring(last+1, image_path.length);
        }
        else
        {
            var image_base_name = image_path;
        }

        //check if there is a same image already inserted
        for (var idx in obj.mini_editor.img_src)
        {
            if (image_base_name == idx)
            {
                alert("there is a same image already inserted!");
                return this;
            }
        }

        //construct the action field into the post request
        var post_addr = $("#me_host_image_menu_form").attr("action");
        if (obj.mini_editor.options_list["image_page"] != null)
        {
            post_addr = obj.mini_editor.options_list["image_page"]
        }
        if (post_addr.search(/\?/g) != -1)
        {
            post_addr = post_addr + "&" + "image_name=" + image_base_name;
        }
        else
        {
            post_addr = post_addr + "?" + "image_name=" + image_base_name;
        }
        post_addr = post_addr + "&" + "action=" + "add_image";
        //add image name and timestamp to avoid submit repeadedly
        var now = new Date();
        post_addr = post_addr + "&" + "ts=" + now.getTime();
        $("#me_host_image_menu_form").attr("action", post_addr);

        //submit the form
        $("#me_host_image_menu_form").submit();

        //display the image into the list
        var image_tr = "<tr class=\"me_host_image_menu_row\"></tr>";
        var image_html = "<td class=\"me_host_image_menu_cell_left\"><a href=\"#\" class=\"me_host_image_menu_label_link\">" 
                    + image_base_name 
                    + "</a></td>";
        var image_delete = "<td class=\"me_host_image_menu_cell_right\"><a href=\"#\" class=\"me_host_image_menu_delete_link\">"
                    + contury_lang["Delete"]
                    + "</a></td>";
        $(image_tr).append($(image_html)).append($(image_delete)).appendTo($("#me_host_image_menu_table"));

        //bind the event for the new inserted object
        $(".me_host_image_menu_cell_left").bind("mouseenter", obj.mini_editor.host_image_menu_cell_left_mouseenter);
        $(".me_host_image_menu_cell_left").bind("mouseleave", obj.mini_editor.host_image_menu_cell_left_mouseleave);
        $(".me_host_image_menu_cell_right").bind("mouseenter", obj.mini_editor.host_image_menu_cell_right_mouseenter);
        $(".me_host_image_menu_cell_right").bind("mouseleave", obj.mini_editor.host_image_menu_cell_right_mouseleave);

        $(".me_host_image_menu_label_link").bind("click", obj.mini_editor.host_image_menu_label_link_click);
        $(".me_host_image_menu_delete_link").bind("click", obj.mini_editor.host_image_menu_delete_link_click);

        //add a image src item
        obj.mini_editor.img_src[image_base_name] = "";

        return this;
    },

    host_image_menu_cell_left_mouseenter : function()
    {
        var obj = $(this);
        obj.css("background-color", "gray");

        return this;
    },

    host_image_menu_cell_left_mouseleave : function()
    {
        var obj = $(this);
        obj.css("background-color", "white");

        return this;
    },

    host_image_menu_cell_right_mouseenter : function()
    {
        var obj = $(this);
        obj.css("background-color", "gray");

        return this;
    },

    host_image_menu_cell_right_mouseleave : function()
    {
        var obj = $(this);
        obj.css("background-color", "white");

        return this;
    },

    host_image_menu_label_link_click : function()
    {
        //this pointer is the html fragment that been clicked
        var obj = $(this);

        var win = obj.mini_editor.win;
        var doc = obj.mini_editor.doc;

        //get the image src and insert it into the document
        //obj.mini_editor.img_src["test.jpg"] = "http://192.168.1.120/test.jpg";

        var image_path = obj.text();
        var last = image_path.lastIndexOf("\\");
        if (last)
        {
            var image_base_name = image_path.substring(last+1, image_path.length);
        }
        else
        {
            var image_base_name = image_path;
        }

        if (obj.mini_editor.img_src[image_base_name])
        {
            win.focus();
            doc.execCommand("InsertImage", false, obj.mini_editor.img_src[image_base_name]);
            win.focus();
        }

        //close the me_host_image_menu_table display
        $("#me_host_image_menu_table").css("display", "none");

        return this;
    },

    host_image_menu_delete_link_click : function()
    {
        //this pointer is the html fragment that been clicked
        var obj = $(this);

        var win = obj.mini_editor.win;
        var doc = obj.mini_editor.doc;

        //get image row
        var image_delete_obj = obj.parent();
        if (image_delete_obj)
        {
            var image_tr_obj = image_delete_obj.parent();
            if (image_tr_obj)
            {
                //get the image path included in the label
                var image_label_obj = image_tr_obj.children(".me_host_image_menu_cell_left");
                if (image_label_obj)
                {
                    var image_name = image_label_obj.children("a").text();

                    //delete the image address item
                    if (image_name)
                    {
                        //record the background image name
                        var image_src = obj.mini_editor.img_src[image_name];
                        var last = image_src.lastIndexOf("/");
                        if (last)
                        {
                            var image_background_name = image_src.substring(last+1, image_src.length);
                        }
                        else
                        {
                            var image_background_name = image_src;
                        }

                        delete obj.mini_editor.img_src[image_name];
                        obj.mini_editor.curr_img--;
                    }
                }

                //delete the image item from the image list
                image_tr_obj.remove();

                //invoke ajax to delete the image at the background
                if (obj.mini_editor.options_list["image_page"] != null)
                {
                    var del_url = obj.mini_editor.options_list["image_page"]
                }
                if (del_url.search(/\?/g) != -1)
                {
                    del_url = del_url + "&" + "image_name=" + image_background_name;
                }
                else
                {
                    del_url = del_url + "?" + "image_name=" + image_background_name;
                }
                del_url = del_url + "&" + "action=" + "del_image";
                //add image name and timestamp to avoid submit repeadedly
                var now = new Date();
                del_url = del_url + "&" + "ts=" + now.getTime();

                jQuery.ajax({
                    type: "GET",
                    url: del_url,
                    data: null,
                    dateType: "html"
                });
            }
        }

        //close the me_host_image_menu_table display
        $("#me_host_image_menu_table").css("display", "none");

        return this;
    },

    emoticon_menu_mouseenter : function()
    {
        $("#me_emoticon_menu_table").css("display", "block");

        return this;
    },

    emoticon_menu_mouseleave : function()
    {
        $("#me_emoticon_menu_table").css("display", "none");

        return this;
    },

    emoticon_menu_cell_mouseenter : function()
    {
        var obj = $(this);
        obj.css("border-style", "solid");

        return this;
    },

    emoticon_menu_cell_mouseleave : function()
    {
        var obj = $(this);
        obj.css("border-style", "none");

        return this;
    },

    emoticon_menu_link_click : function()
    {
        //this pointer is the html fragment that been clicked
        var obj = $(this);

        var win = obj.mini_editor.win;
        var doc = obj.mini_editor.doc;

        var img = obj.find("img");
        if (img)
        {
            var image_address = img.attr("src");
        }

        win.focus();
        doc.execCommand("InsertImage", false, image_address);
        win.focus();

        //close the me_emoticon_menu_table display
        $("#me_emoticon_menu_table").css("display", "none");

        return this;
    },

    table_menu_mouseenter : function()
    {
        $("#me_table_menu_table").css("display", "block");

        return this;
    },

    table_menu_mouseleave : function()
    {
        $("#me_table_menu_table").css("display", "none");

        return this;
    },

    table_menu_insert_click : function()
    {
        //this pointer is the html fragment that been clicked
        var obj = $(this);

        var win = obj.mini_editor.win;
        var doc = obj.mini_editor.doc;

        var row = $("#me_table_menu_row").val();
        var column = $("#me_table_menu_column").val();
        var width = $("#me_table_menu_width").val();
        var height = $("#me_table_menu_height").val();
        var border = $("#me_table_menu_border").val();

        win.focus();
        //get the selected range object, because there isn't insert table command in the doc
        //object, so we need insert the table manually
        if (obj.mini_editor.is_firefox == true || (obj.mini_editor.is_chrome == true))
        {
            var range = obj.mini_editor.doc.getSelection().getRangeAt(0);
        }
        else
        {
            var range = obj.mini_editor.doc.selection.createRange();
        }

        //create the table object
        var table_object = $("<div><table></table></div>");
        for (idx=0; idx<row; idx++)
        {
            table_object.find("table").append("<tr></tr>");
        }
        for (idx=0; idx<column; idx++)
        {
            table_object.find("table").find("tr").append("<td></td>");
        }

        //set the table css
        table_object.find("table").css("border-collapse", "collapse");

        if (Number(width) >= 1)
        {
            var width_value = width+"px";
        }
        else
        {
            var width_value = width+"100px";
        }
        table_object.find("table").find("tr").find("td").css("width", width_value);

        if (Number(height) >= 1)
        {
            var height_value = height+"px";
        }
        else
        {
            var height_value = height+"20px";
        }
        table_object.find("table").find("tr").find("td").css("height", height_value);

        if (Number(border) >= 1)
        {
            var border_value = border+"px solid black";
        }
        else
        {
            var border_value = border+"1px solid black";
        }
        table_object.find("table").css("border", border_value);
        table_object.find("table").find("tr").css("border", border_value);
        table_object.find("table").find("tr").find("td").css("border", border_value);

        //insert the table object into the range
        if (obj.mini_editor.is_firefox == true || (obj.mini_editor.is_chrome == true))
        {
            range.deleteContents();
            range.insertNode(table_object.find("table")[0]);
        }
        else
        {
            range.pasteHTML(table_object.html());
        }
        win.focus();

        //close the me_table_menu_table display
        $("#me_table_menu_table").css("display", "none");

        return this;
    },

    table_menu_clear_click : function()
    {
        $("#me_table_menu_row").val("");
        $("#me_table_menu_column").val("");
        $("#me_table_menu_width").val("");
        $("#me_table_menu_height").val("");
        $("#me_table_menu_border").val("");
        $("#me_table_menu_title").val("");

        //close the me_table_menu_table display
        $("#me_table_menu_table").css("display", "none");

        return this;
    },

    submit_click : function()
    {
        //this pointer is the html fragment that been clicked
        var obj = $(this);

        if (obj.mini_editor.doc == null)
        {
            alert("submit_click() check obj.mini_editor.doc is null!");
            return this;
        }

        //because the editor is a iframe, so we need get the html through DOM but not jquery
        var editor_html = obj.mini_editor.doc.body.innerHTML;

        if (editor_html && obj.mini_editor.options_list["text_page"])
        {
            //construct the form object
            var form_html = "<form method=\"post\" target=\"_self\"></form>";
            var form_obj = $(form_html);
            var form_name = "me_" + obj.mini_editor.editor.attr("name") + "_form";
            form_obj.attr("name", form_name);
            //add timestamp to avoid submit repeadedly
            var now = new Date();
            var test_page = obj.mini_editor.options_list["text_page"];
            if (test_page.search(/\?/g) != -1)
            {
                var post_addr = test_page + "&" + "ts=" + now.getTime();
            }
            else
            {
                var post_addr = test_page + "?" + "ts=" + now.getTime();
            }
            form_obj.attr("action", post_addr);
            form_obj.attr("style", "display: none");

            //construct the input object
            var title_html = "<input>";
            var title_obj = $(title_html);
            var title_name = "me_" + obj.mini_editor.editor.attr("name") + "_title";
            title_obj.attr("name", title_name);
            var article_title = $("#me_article_title_text").val();
            title_obj.val(article_title);
            form_obj.append(title_obj);

            //construct the textarea object
            var text_html = "<textarea></textarea>";
            var text_obj = $(text_html);
            var text_name = "me_" + obj.mini_editor.editor.attr("name") + "_content";
            text_obj.attr("name", text_name);
            text_obj.val(editor_html);
            form_obj.append(text_obj);

            //add form_obj after the iframe
            obj.mini_editor.editor.after(form_obj);

            //exec the submit callback function
            if (obj.mini_editor.options_list["submit_callback"])
            {
                obj.mini_editor.options_list["submit_callback"](form_obj);
            }

            //submit the form jquery object
            form_obj.submit();
        }

        return true;
    },

    padding : null
};

jQuery.fn.mini_editor_create = function(options)
{
    //save options
    this.mini_editor.save_options(options);

    //initialize the iframe to editor
    this.mini_editor.init_editor(this);

    return this;
}

function fn_load_callback(obj)
{
    return true;
}

function fn_submit_callback(form_obj)
{
    return true;
}

