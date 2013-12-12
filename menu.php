
<div id="menu_div">
    <div id="menu_main_div">
        <ul id="menu_main_ul">
            <li>
                <a href="index.php"><?php echo $g_lang_text["menu_home"]; ?></a>
            </li>
            <?php echo make_new_post_menu(); ?>
            <?php echo make_management_menu(); ?>
        </ul>
        <div class="menu_border"></div>
    </div>

    <div id="menu_login_div">
        <ul id="menu_login_ul">
            <?php echo make_system_menu(); ?>
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

