
<div id="new_post_div">
	<iframe src="" frameborder="0" id="editor" name="editor" width="750" height="600" style="border:1px solid #ccc;"></iframe>
</div>

<script type="text/javascript">
    function set_post_default_value(obj)
    {
        //set the default title for the post
        $("#me_article_title_text").val("<?php echo get_post_title(); ?>");

        //set the default content for the post
        $("#editor").mini_editor.doc.body.innerHTML = "<?php echo get_post_content(); ?>";
    }

    function add_form_action_param(form_obj)
    {
        var post_addr = form_obj.attr("action");

        post_addr = post_addr + "<?php echo get_post_edit_param(); ?>";

        form_obj.attr("action", post_addr);
    }

    $("#editor").mini_editor_create({lang:"en", 
                                base_url:"mini-editor",
                                image_page:"index.php?page=image",
                                text_page:"index.php?page=post",
                                load_callback:set_post_default_value,
                                submit_callback:add_form_action_param});
</script>

