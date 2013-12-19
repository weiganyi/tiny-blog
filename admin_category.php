
<?php do_admin_action(); ?>

<div id='cat_list_div'>
    <?php echo make_category_edit_list(); ?>
</div>

<script type="text/javascript">
    function category_edit(node)
    {
        var cat_list_cat_op_td_node = node.parentNode;
        if (cat_list_cat_op_td_node)
        {
            var cat_list_cat_edit_td = cat_list_cat_op_td_node.previousSibling;
            if (cat_list_cat_edit_td)
            {
                var category_name_input_node = cat_list_cat_edit_td.firstChild;
                if (category_name_input_node)
                {
                    if (category_name_input_node.style.display == "none")
                    {
                        category_name_input_node.style.display = "block";
                    }
                    else if (category_name_input_node.style.display == "block")
                    {
                        category_name_input_node.style.display = "none";
                    }
                }
            }
        }

        return;
    }
</script>

