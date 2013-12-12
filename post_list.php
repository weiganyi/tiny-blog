
<script type="text/javascript">
    function fn_page_link_click(responseText)
    {
        var post_list_page_link_div = document.getElementById("post_list_page_link_div");
        post_list_page_link_div.innerHTML = responseText;
    }

    function page_link_click(page_num)
    {
        var post_list_url = "index.php?page=post_list_ajax&ajax=1&" + page_num;
        tb_ajax(post_list_url, fn_page_link_click);

        return;
    }
</script>

<?php do_post_list_action(); ?>

<div id="post_list_page_link_div">
<div id='post_list_div'>
    <?php echo make_post_list(); ?>
</div>

<div id='page_link_div'>
    <?php echo make_page_link(); ?>
</div>
</div>

