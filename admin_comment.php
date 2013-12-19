
<?php do_admin_action(); ?>

<div id="comment_list_page_link_div">
<div id='comment_list_div'>
    <?php echo make_comment_edit_list(); ?>
</div>

<div id='page_link_div'>
    <?php echo make_page_link(); ?>
</div>
</div>

<script type="text/javascript">
    function fn_page_link_click(responseText)
    {
        var comment_list_page_link_div = document.getElementById("comment_list_page_link_div");
        comment_list_page_link_div.innerHTML = responseText;
    }

    function page_link_click(page_num)
    {
        var comment_list_url = "index.php?page=admin_comment_ajax&ajax=1&" + page_num;

        tb_ajax(comment_list_url, fn_page_link_click);

        return;
    }
</script>

