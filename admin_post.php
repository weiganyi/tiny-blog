
<script type="text/javascript">
    function fn_category_change(responseText)
    {
        return;
    }

    function category_change(select_obj, post_id)
    {
        var select_idx = select_obj.selectedIndex;
        var cat_name = select_obj[select_idx].value;

        var post_list_url = 
            "index.php?action=change_cat&page=admin_post_ajax&ajax=1&" + post_id + "&cat_name=" + cat_name;

        tb_ajax(post_list_url, fn_category_change);
        return;
    }
</script>

<?php require_once(ROOTPATH . "post_list.php"); ?>

