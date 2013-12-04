<div id="menu_div">
    <div id="menu_main_div">
        <ul id="menu_main_ul">
            <li>
                <a href="index.php"><?php echo $lang_text["menu_home"]; ?></a>
            </li>
            <li>
                <a href="index.php?page=new_post"><?php echo $lang_text["menu_new_post"]; ?></a>
            </li>
            <li id="menu_management_li">
                <a href="#"><?php echo $lang_text["menu_managment"]; ?></a>
                <ul id="menu_submenu_ul">
                    <li>
                        <a href="index.php?page=admin_post"><?php echo $lang_text["menu_admin_post"]; ?></a>
                    </li>
                    <li>
                        <a href="index.php?page=admin_category"><?php echo $lang_text["menu_admin_category"]; ?></a>
                    </li>
                    <li>
                        <a href="index.php?page=admin_comment"><?php echo $lang_text["menu_admin_comment"]; ?></a>
                    </li>
                    <li>
                        <a href="index.php?page=admin_config"><?php echo $lang_text["menu_admin_config"]; ?></a>
                    </li>
                    <li>
                        <a href="index.php?page=admin_draft"><?php echo $lang_text["menu_admin_draft"]; ?></a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="menu_border"></div>
    </div>

    <div id="menu_login_div">
        <ul id="menu_login_ul">
            <li>
                <a href="index.php?action=logout"><?php echo $lang_text["menu_admin_logout"]; ?></a>
            </li>
            <li>
                <a href="index.php?page=register"><?php echo $lang_text["menu_admin_register"]; ?></a>
            </li>
            <li>
                <a href="index.php?page=login"><?php echo $lang_text["menu_admin_login"]; ?></a>
            </li>
        </ul>
        <div class="menu_border"></div>
    </div>
</div>

<script type="text/javascript">
    var menu_management_li = document.getElementById("menu_management_li");
    if (menu_management_li)
    {
        tb_add_event(menu_management_li, "mouseover", function(event){
            var submenu = document.getElementById("menu_submenu_ul");
            submenu.style.display = "block";
            return;
        });

        tb_add_event(menu_management_li, "mouseout", function(event){
            var submenu = document.getElementById("menu_submenu_ul");
            submenu.style.display = "none";
            return;
        });
    }
</script>

