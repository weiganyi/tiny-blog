<?php
/*
    create by weiganyi on 20131203
*/

function get_blog_name()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_blog_name() necessary params is null.";
        exit;
    }

    $name = "";

    $result = $g_db->get_tb_options_by_option_name("blog_name");
    if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
    {
        $rows = $result["rows"];
        //the column 2 is option_value
        $name = $rows[0][2];
    }

    return $name;
}

function make_new_post_menu()
{
    global $g_login;
    global $g_lang_text;

    if (empty($g_login) || empty($g_lang_text))
    {
        echo "Error: make_new_post_menu() necessary params is null.";
        exit;
    }

    $menu_html = "";

    //display different menu by login status
    if ($g_login->is_logined())
    {
        $menu_html = 
            "<li>
                <a href='index.php?page=new_post'>" .
                    $g_lang_text["menu_new_post"] .
                "</a>
            </li>";
    }

    return $menu_html;
}

function make_management_menu()
{
    global $g_login;
    global $g_lang_text;

    if (empty($g_login) || empty($g_lang_text))
    {
        echo "Error: make_management_menu() necessary params is null.";
        exit;
    }

    $menu_html = "";

    //display different menu by login status
    if ($g_login->is_logined())
    {
        //display different menu by login account if admin
        if ($g_login->is_admin_logined())
        {
            $menu_html = 
                "<li id='menu_management_li'>
                    <a href='#'>" . $g_lang_text["menu_managment"] . "</a>
                    <span id='menu_management_left_span'>
                        <ul id='menu_submenu_ul'>
                            <li>
                                <a href='index.php?page=admin_post'>" . $g_lang_text["menu_admin_post"] . "</a>
                            </li>
                            <li>
                                <a href='index.php?page=admin_category'>" . $g_lang_text["menu_admin_category"] . "</a>
                            </li>
                            <li>
                                <a href='index.php?page=admin_comment'>" . $g_lang_text["menu_admin_comment"] . "</a>
                            </li>
                            <li>
                                <a href='index.php?page=admin_config'>" . $g_lang_text["menu_admin_config"] . "</a>
                            </li>
                        </ul>
                    </span>
                </li>";
        }
        else
        {
            $menu_html = 
                "<li id='menu_management_li'>
                    <a href='#'>" . $g_lang_text["menu_managment"] . "</a>
                    <ul id='menu_submenu_ul'>
                        <li>
                            <a href='index.php?page=admin_post'>" . $g_lang_text["menu_admin_post"] . "</a>
                        </li>
                        <li>
                            <a href='index.php?page=admin_comment'>" . $g_lang_text["menu_admin_comment"] . "</a>
                        </li>
                        <li>
                            <a href='index.php?page=admin_config'>" . $g_lang_text["menu_admin_config"] . "</a>
                        </li>
                    </ul>
                </li>";
        }
    }

    return $menu_html;
}

function make_system_menu()
{
    global $g_login;
    global $g_lang_text;

    if (empty($g_login) || empty($g_lang_text))
    {
        echo "Error: make_system_menu() necessary params is null.";
        exit;
    }

    $menu_html = "";

    //display different menu by login status
    if ($g_login->is_logined())
    {
        $menu_html = 
            "<li>
                <a href='index.php?action=logout'>" . $g_lang_text["menu_admin_logout"] . "</a>
            </li>
            <li>
                <a href='index.php?page=register'>" . $g_lang_text["menu_admin_register"] . "</a>
            </li>";
    }
    else
    {
        $menu_html = 
            "<li>
                <a href='index.php?page=register'>" . $g_lang_text["menu_admin_register"] . "</a>
            </li>
            <li>
                <a href='index.php?page=login'>" . $g_lang_text["menu_admin_login"] . "</a>
            </li>";
    }

    return $menu_html;
}

function get_blog_notice()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_blog_notice() necessary params is null.";
        exit;
    }

    $notice = "";

    $result = $g_db->get_tb_options_by_option_name("blog_notice");
    if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
    {
        $rows = $result["rows"];
        //the column 2 is option_value
        $notice = $rows[0][2];
    }

    return $notice;
}

function get_bloger_name()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_bloger_name() necessary params is null.";
        exit;
    }

    $name = "";

    $result = $g_db->get_tb_options_by_option_name("bloger_name");
    if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
    {
        $rows = $result["rows"];
        //the column 2 is option_value
        $name = $rows[0][2];
    }

    return $name;
}

function get_user_registered()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_user_registered() necessary params is null.";
        exit;
    }

    $user_registered = "";

    $result = $g_db->get_tb_users_by_user_level("admin");
    if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
    {
        $num = $result["num"];
        $rows = $result["rows"];

        $user = $rows[0];

        //the column 3 is user_registered
        $user_registered = $user[3];
        $user_registered = substr($user_registered, 0, 10);
    }

    return $user_registered;
}

function get_posts_number()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_posts_number() necessary params is null.";
        exit;
    }

    $posts_number = "0";

    $result = $g_db->get_tb_posts();
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        $num = $result["num"];
        $posts_number = (String)$num;
    }

    return $posts_number;
}

function get_read_number()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_read_number() necessary params is null.";
        exit;
    }

    $read_number = "0";

    $result = $g_db->get_tb_posts();
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        $num = $result["num"];
        $rows = $result["rows"];

        $read_number = 0;
        //calculate the read number for all posts
        for ($idx=0; $idx<$num; $idx++)
        {
            $post = $rows[$idx];
            //the column 6 is read_number
            $read_number = $read_number + $post[6];
        }

        $read_number = (String)$read_number;
    }

    return $read_number;
}

function get_comment_number()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_comment_number() necessary params is null.";
        exit;
    }

    $comment_number = "0";

    $result = $g_db->get_tb_comments();
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        $num = $result["num"];
        $rows = $result["rows"];

        $comment_number = (String)$num;
    }

    return $comment_number;
}

function get_admin_email()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_admin_email() necessary params is null.";
        exit;
    }

    $user_email = "";

    $result = $g_db->get_tb_users_by_user_level("admin");
    if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
    {
        $num = $result["num"];
        $rows = $result["rows"];

        $user = $rows[0];

        //the column 4 is user_email
        $user_email = $user[4];
    }

    return $user_email;
}

function make_category_list()
{
    global $g_db;
    global $g_lang_text;

    if (empty($g_db) || empty($g_lang_text))
    {
        echo "Error: make_category_list() necessary params is null.";
        exit;
    }

    $category_list_html = "";

    $result = $g_db->get_tb_categories();
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        $num = $result["num"];
        $rows = $result["rows"];

        for ($idx=0; $idx<$num; $idx++)
        {
            $category = $rows[$idx];
            //the column 0 is category_id
            $category_id = $category[0];
            //the column 1 is category_name
            $category_name = $category[1];
            if ($category_id)
            {
                $result2 = $g_db->get_tb_posts_num_by_cat_id($category_id);
                if (!empty($result2["num"]) && !empty($result2["rows"]) && $result2["num"]==1)
                {
                    $rows2 = $result2["rows"];
                    $post_number = $rows2[0][0];

                    $category_list_html = $category_list_html . 
                                    "<a href='index.php?cat=$category_name'>$category[1]</a>" .
                                    " ($post_number)" . 
                                    "</br>";
                }
            }
        }
    }

    //add the post number of the uncategorized
    $result3 = $g_db->get_tb_posts_num_by_cat_id("0");
    if (!empty($result3["num"]) && !empty($result3["rows"]) && $result3["num"]==1)
    {
        $rows3 = $result3["rows"];
        $post_number = $rows3[0][0];

        $category_list_html = $category_list_html . 
                        "<a href='index.php?cat=uncategorized'>". $g_lang_text["tb_func_uncategorized"] . "</a>" .
                        " ($post_number)" . 
                        "</br>";
    }

    return $category_list_html;
}

function make_archive_list()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: make_archive_list() necessary params is null.";
        exit;
    }

    $archive_list_html = "";

    $result = $g_db->get_tb_posts_by_order("post_date");
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        $num = $result["num"];
        $rows = $result["rows"];

        //the first row is the lastest post
        $lastest_post = $rows[0];
        //the column 3 is post_date
        $lastest_post_date = $lastest_post[3];
        $lastest_post_year = substr($lastest_post_date, 0, 4);
        $lastest_post_month = substr($lastest_post_date, 5, 2);
        $lastest_post_date = $lastest_post_year . "-" . $lastest_post_month;
        $post_archive = array($lastest_post_date=>1);

        $last_post_year = $lastest_post_year;
        $last_post_month = $lastest_post_month;

        //calculate the post number accroding to the archive date
        for ($idx=1; $idx<$num; $idx++)
        {
            $post = $rows[$idx];

            //the column 3 is post_date
            $post_date = $post[3];
            $post_year = substr($post_date, 0, 4);
            $post_month = substr($post_date, 5, 2);
            $post_date = $post_year . "-" . $post_month;

            //calculate the posts number every months for the lastest year,
            //and calculate the posts number every years for old year
            if ((int)$post_year < (int)$lastest_post_year)
            {
                if ((int)$post_year < (int)$last_post_year)
                {
                    $post_archive[$post_date] = 1;

                    $last_post_year = $post_year;
                    $last_post_month = $post_month;
                }
                else
                {
                    $post_archive[$post_date] = $post_archive[$post_date] + 1;

                    $last_post_month = $post_month;
                }
            }
            else
            {
                if ((int)$post_month < (int)$last_post_month)
                {
                    $post_archive[$post_date] = 1;

                    $last_post_month = $post_month;
                }
                else
                {
                    $post_archive[$post_date] = $post_archive[$post_date] + 1;
                }
            }
        }

        //split join the archive list
        foreach ($post_archive as $post_date=>$post_number)
        {
            $archive_list_html = $archive_list_html . 
                            "<a href='index.php?archive=$post_date'>$post_date</a>" .
                            " ($post_number)" . 
                            "</br>";
        }
    }

    return $archive_list_html;
}

function make_reading_list()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: make_reading_list() necessary params is null.";
        exit;
    }

    $reading_list_html = "";

    $result = $g_db->get_tb_posts_by_order("read_number");
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        $num = $result["num"];
        $rows = $result["rows"];

        //only list the top 5 posts
        if ($num > 5)
            $num = 5;

        for ($idx=0; $idx<$num; $idx++)
        {
            $post = $rows[$idx];

            //the column 0 is post_id
            $post_id = $post[0];
            //the column 4 is post_title
            $post_title = $post[4];
            //the column 6 is read_number
            $read_number = $post[6];

            $post_title = substr($post_title, 0, 20);

            $reading_list_html = $reading_list_html . 
                            "<span class='sidebar_content_left_span'><a href='index.php?page=post&post_id=$post_id'>$post_title</a></span>" .
                            "<span class='sidebar_content_right_span'>($read_number)</span>" . 
                            "</br>";
        }
    }

    return $reading_list_html;
}

function make_comment_list()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: make_comment_list() necessary params is null.";
        exit;
    }

    $comment_list_html = "";

    $result = $g_db->get_tb_comments_by_order("comment_date");
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        $num = $result["num"];
        $rows = $result["rows"];

        //only list the top 5 comments
        if ($num > 5)
            $num = 5;

        for ($idx=0; $idx<$num; $idx++)
        {
            $comment = $rows[$idx];

            //the column 0 is comment_id
            $comment_id = $comment[0];
            //the column 1 is post_id
            $post_id = $comment[1];
            //the column 2 is user_id
            $user_id = $comment[2];
            //the column 4 is comment_content
            $comment_content = $comment[4];

            $result2 = $g_db->get_tb_posts_by_post_id($post_id);
            if (!empty($result2["num"]) && !empty($result2["rows"]) && $result2["num"]==1)
            {
                $num2 = $result2["num"];
                $rows2 = $result2["rows"];
                $post = $rows2[0];

                //the column 4 is post_title
                $post_title = $post[4];

                $result3 = $g_db->get_tb_users_by_user_id($user_id);
                if (!empty($result3["num"]) && !empty($result3["rows"]) && $result3["num"]==1)
                {
                    $num3 = $result3["num"];
                    $rows3 = $result3["rows"];
                    $user = $rows3[0];

                    //the column 1 is user_name
                    $user_name = $user[1];

                    $post_title = substr($post_title, 0, 20);
                    $comment_content = $user_name . ": " . $comment_content;
                    $comment_content = substr($comment_content, 0, 20);

                    $comment_list_html = $comment_list_html . 
                                    "<a href='index.php?page=post&post_id=$post_id'>$post_title</a>" .
                                    "</br>" .
                                    "<span id='sidebar_comment_span'>$comment_content</span>" . 
                                    "</br>";
                }
            }
        }
    }

    return $comment_list_html;
}

function has_page($page)
{
    if (empty($page))
    {
        echo "Error: has_page() necessary params is null.";
        exit;
    }

    if (isset($_REQUEST["page"]) && $_REQUEST["page"]==$page)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function get_page()
{
    if (isset($_REQUEST["page"]))
    {
        return $_REQUEST["page"];
    }
    else
    {
        return NULL;
    }
}

function is_ajax()
{
    if (isset($_REQUEST["ajax"]) && $_REQUEST["ajax"]==1)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function get_page_posts()
{
    global $g_db;

    $page_posts = 15;

    $result = $g_db->get_tb_options_by_option_name("page_posts");
    if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
    {
        $rows = $result["rows"];
        //the column 2 is option_value
        $page_posts = $rows[0][2];
    }

    return $page_posts;
}

function do_post_category_change($post_id, $cat_name)
{
    global $g_db;

    if (empty($post_id) || empty($cat_name) || empty($g_db))
    {
        echo "Error: do_post_category_change() necessary params is null.";
        exit;
    }

    $result = $g_db->get_tb_posts_by_post_id($post_id);
    if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
    {
        $num = $result["num"];
        $rows = $result["rows"];

        $post = $rows[0];

        //the column 0 is post_id
        $post_id = $post[0];
        //the column 1 is user_id
        $user_id = $post[1];
        //the column 3 is post_date
        $post_date = $post[3];
        //the column 4 is post_title
        $post_title = $post[4];
        //the column 5 is post_content
        $post_content = $post[5];
        //the column 6 is read_number
        $read_number = $post[6];

        $result2 = $g_db->get_tb_categories_by_cat_name($cat_name);
        if (!empty($result2["num"]) && !empty($result2["rows"]) && $result2["num"]==1)
        {
            $num2 = $result2["num"];
            $rows2 = $result2["rows"];

            $category = $rows2[0];

            //the column 0 is category_id
            $category_id = $category[0];
        }
        else
        {
            $category_id = 0;
        }

        $post_array = array("post_id"=>"$post_id", 
                            "user_id"=>"$user_id", 
                            "category_id"=>"$category_id", 
                            "post_date"=>"$post_date", 
                            "post_title"=>"$post_title", 
                            "post_content"=>"$post_content", 
                            "read_number"=>"$read_number");

        //update the post
        $g_db->insert_tb_posts($post_array);
    }

    return;
}

function do_post_delete($post_id)
{
    global $g_db;

    if (empty($post_id) || empty($g_db))
    {
        echo "Error: do_post_delete() necessary params is null.";
        exit;
    }

    //delete the post
    $g_db->delete_tb_posts($post_id);

    //delete the comments belong to this post
    $g_db->delete_tb_comments_by_post_id($post_id);

    return;
}

function do_post_list_action()
{
    //change the category
    if (isset($_REQUEST["action"]) && 
        $_REQUEST["action"] == "change_cat" && 
        isset($_REQUEST["post_id"]) && 
        isset($_REQUEST["cat_name"]))
    {
        $post_id = $_REQUEST["post_id"];
        $cat_name = $_REQUEST["cat_name"];

        do_post_category_change($post_id, $cat_name);
    }
    //delete the post
    elseif (isset($_REQUEST["action"]) && 
        $_REQUEST["action"] == "del_post" && 
        isset($_REQUEST["post_id"]))
    {
        $post_id = $_REQUEST["post_id"];

        do_post_delete($post_id);
    }

    return;
}

function get_post_list_by_param()
{
    global $g_db;
    global $g_login;

    if (empty($g_db) || empty($g_login))
    {
        echo "Error: get_post_list_by_param() necessary params is null.";
        exit;
    }

    //search by page admin_post.php 
    if (isset($_REQUEST["page"]) && 
        ($_REQUEST["page"]=="admin_post" || 
        $_REQUEST["page"] == "admin_post_ajax"))
    {
        $logined_user = $g_login->get_logined_user();
        if (!empty($logined_user))
        {
            $result = $g_db->get_tb_users_by_user_name($logined_user);
            if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
            {
                $num = $result["num"];
                $rows = $result["rows"];

                $user = $rows[0];
                //the column 0 is user_id
                $user_id = $user[0];
                //the column 5 is user_level
                $user_level = $user[5];

                //if user_level is admin, get all posts list
                if ($user_level != "admin")
                {
                    $result2 = $g_db->get_tb_posts_by_user_id_order($user_id, "post_date");
                    if (!empty($result2["num"]) && !empty($result2["rows"]))
                    {
                        return $result2;
                    }
                }
            }
        }
    }
    //search by category name
    elseif (isset($_REQUEST["cat"]))
    {
        $cat_name = $_REQUEST["cat"];
        $category_id = "0";
        //if $cat_name is uncategorized, $category_id is 0
        if ($cat_name == "uncategorized ")
        {
            $category_id = "0";
        }
        else
        {
            $result = $g_db->get_tb_categories_by_cat_name($cat_name);
            if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
            {
                $num = $result["num"];
                $rows = $result["rows"];
                $category = $rows[0];
                //the column 0 is category_id
                $category_id = $category[0];
            }
        }

        $result = $g_db->get_tb_posts_by_cat_id($category_id);
        if (!empty($result["num"]) && !empty($result["rows"]))
        {
            return $result;
        }
    }
    //search by archive date
    elseif (isset($_REQUEST["archive"]))
    {
        $archive_date = $_REQUEST["archive"];
        $archive_year = substr($archive_date, 0, 4);
        $archive_month = substr($archive_date, 5, 2);

        $result = $g_db->get_tb_posts();
        if (!empty($result["num"]) && !empty($result["rows"]))
        {
            $num = $result["num"];
            $rows = $result["rows"];

            $row2 = array();
            $idx2 = 0;

            for ($idx=0; $idx<$num; $idx++)
            {
                $post = $rows[$idx];

                //the column 3 is post_date
                $post_date = $post[3];
                $post_year = substr($post_date, 0, 4);
                $post_month = substr($post_date, 5, 2);

                if ($post_year == $archive_year)
                {
                    if ($archive_month && $archive_month == $post_month)
                    {
                        //exactly match
                        $row2[$idx2] = $post;
                        $idx2 = $idx2 + 1;
                    }
                }
            }

            $result2["num"] = $idx2;
            $result2["rows"] = $row2;
            return $result2;
        }
    }

    //get posts list
    $result = $g_db->get_tb_posts_by_order("post_date");
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        return $result;
    }

    return array();;
}

function make_post_info($user_name, $post_date, $read_number, $comment_number, $post_id, $cat_id)
{
    global $g_lang_text;
    global $g_login;
    global $g_db;

    if (empty($g_lang_text) || empty($g_login) || empty($g_db))
    {
        echo "Error: make_post_info() necessary params is null.";
        exit;
    }

    $post_info_html = "";

    //if the logined user is the user of this post, or is the admin
    //it should add edit or delete link for this post
    $can_edit = false;
    $logined_user = $g_login->get_logined_user();
    if (!empty($logined_user))
    {
        $result = $g_db->get_tb_users_by_user_name($logined_user);
        if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
        {
            $num = $result["num"];
            $rows = $result["rows"];
            $user = $rows[0];

            //the column 5 is user_level
            $user_level = $user[5];

            if ($logined_user==$user_name || $user_level=='admin')
            {
                $can_edit = true;
            }
        }
    }

    //if visit posts through the page admin_post, the posts that will be displayed should 
    //belong to the logined_user, so we can add category setting for this post directly.
    $can_set_cat = false;
    if (isset($_REQUEST["page"]) && 
        ($_REQUEST["page"]=="admin_post" || 
        $_REQUEST["page"] == "admin_post_ajax"))
    {
        $can_set_cat = true;
        $result2 = $g_db->get_tb_categories();
        if (!empty($result2["num"]) && !empty($result2["rows"]))
        {
            $num2 = $result2["num"];
            $rows2 = $result2["rows"];
        }
    }

    if ($can_edit == true)
    {
        if ($can_set_cat == true)
        {
            $post_info_html = $post_info_html . 
                "$post_date $user_name " . 
                $g_lang_text["tb_func_post_read"]. "($read_number) " . 
                $g_lang_text["tb_func_post_comment"]. "($comment_number) " . 
                "<a href='index.php?action=edit_post&page=new_post&post_id=$post_id'>" . $g_lang_text["tb_func_post_edit"] . " </a>" . 
                "<a href='index.php?action=del_post&post_id=$post_id'>" . $g_lang_text["tb_func_post_delete"] . " </a>";

            //add categories setting
            $post_info_html = $post_info_html . 
                "<select onchange='category_change(this, \"post_id=$post_id\");'>" .
                "<option value='uncategorized'>" . $g_lang_text['tb_func_uncategorized'] . "</option>";

            for ($idx=0; $idx<$num2; $idx++)
            {
                $cat = $rows2[$idx];

                //the column 0 is category_id
                $category_id = $cat[0];
                //the column 1 is category_name
                $category_name = $cat[1];

                if ($cat_id == $category_id)
                {
                    $post_info_html = $post_info_html . 
                        "<option value='$category_name' selected='selected'>$category_name</option>";
                }
                else
                {
                    $post_info_html = $post_info_html . 
                        "<option value='$category_name'>$category_name</option>";
                }
            }

            $post_info_html = $post_info_html . 
                "</select>";
        }
        else
        {
            $post_info_html = $post_info_html . 
                "$post_date $user_name " . 
                $g_lang_text["tb_func_post_read"]. "($read_number) " . 
                $g_lang_text["tb_func_post_comment"]. "($comment_number) " . 
                "<a href='index.php?action=edit_post&page=new_post&post_id=$post_id'>" . $g_lang_text["tb_func_post_edit"] . " </a>" . 
                "<a href='index.php?action=del_post&post_id=$post_id'>" . $g_lang_text["tb_func_post_delete"] . " </a>";
        }
    }
    else
    {
        $post_info_html = $post_info_html . 
            "$post_date $user_name " . 
            $g_lang_text["tb_func_post_read"]. "($read_number) " . 
            $g_lang_text["tb_func_post_comment"]. "($comment_number)";
    }

    return $post_info_html;
}

function make_post_list()
{
    global $g_login;
    global $g_cache;
    global $g_db;

    if (empty($g_cache) || empty($g_login) || empty($g_db))
    {
        echo "Error: make_post_list() necessary params is null.";
        exit;
    }

    //get the post number can be displayed in one page
    $page_posts = $g_cache->get_cache("tb_options_page_posts", "get_page_posts");

    $post_list_html = "";

    $result = get_post_list_by_param();
    if (!empty($result["num"]) && !empty($result["rows"]) && !empty($page_posts))
    {
        $num = $result["num"];
        $rows = $result["rows"];

        //store the number of posts
        $g_cache->set_cache("post_list_num", $num);

        //calculate the start of the post number that should be displayed
        $start = 0;
        if (isset($_REQUEST["pn"]))
        {
            $start = ($_REQUEST["pn"]-1) * $page_posts;
        }

        //calculate the end of the post number that should be displayed
        $end = $start + $page_posts;
        if ($end > $num)
        {
            $end = $num;
        }

        for ($idx=$start; $idx<$end; $idx++)
        {
            $post = $rows[$idx];

            //the column 0 is post_id
            $post_id = $post[0];
            //the column 1 is user_id
            $user_id = $post[1];
            //the column 2 is category_id
            $category_id = $post[2];
            //the column 3 is post_date
            $post_date = $post[3];
            //the column 4 is post_title
            $post_title = $post[4];
            //the column 6 is read_number
            $read_number = $post[6];

            $comment_number = "0";
            $result2 = $g_db->get_tb_comments_by_post_id($post_id);
            if (!empty($result2["num"]) && !empty($result2["rows"]))
            {
                $num2 = $result2["num"];
                $rows2 = $result2["rows"];

                $comment_number = (String)$num2;
            }

            $result3 = $g_db->get_tb_users_by_user_id($user_id);
            if (!empty($result3["num"]) && !empty($result3["rows"]) && $result3["num"]==1)
            {
                $num3 = $result3["num"];
                $rows3 = $result3["rows"];
                $user3 = $rows3[0];

                //the column 1 is user_name
                $user_name = $user3[1];

                $post_list_html = $post_list_html . 
                    "<div class='post_list_item_div'>" . 
                    "<div class='post_list_item_div_left'><a href='index.php?page=post&post_id=$post_id'>$post_title</a></div>";

                $post_list_html = $post_list_html . "<div class='post_list_item_div_right'>";

                $post_list_html = $post_list_html . 
                    make_post_info($user_name, $post_date, $read_number, $comment_number, $post_id, $category_id);

                $post_list_html = $post_list_html . 
                    "</div>" . 
                    "</div>";
            }
        }
    }

    return $post_list_html;
}

function make_page_link()
{
    global $g_cache;

    if (empty($g_cache))
    {
        echo "Error: make_page_link() necessary params is null.";
        exit;
    }

    //get the post number can be displayed in one page
    $page_posts = $g_cache->get_cache("tb_options_page_posts", "get_page_posts");

    $page_link_html = "";

    //get the number of posts
    $num = $g_cache->get_cache("post_list_num", NULL);
    if (!empty($num) && !empty($page_posts))
    {
        $page_curr = 1;
        if (isset($_REQUEST["pn"]))
        {
            $page_curr = $_REQUEST["pn"];
        }

        //the page number need to display for all post
        $page_num = floor($num/$page_posts);
        if ($page_num*$page_posts < $num)
        {
            $page_num = $page_num + 1;
        }
        //the page number can be displayed
        $page_display_num = 9;

        if ($page_num > 1)
        {
            $page_link_html = $page_link_html . 
                "<div id='page_num_div'>" . 
                "<a href='#' onclick='page_link_click(\"pn=1\");'><< </a>";

            //calculate the start page number will be displayed
            $start = 1;
            if ($page_curr >= floor($page_display_num/2))
            {
                $start = $page_curr - floor($page_display_num/2);
            }

            //calculate the end page number will be displayed
            $end = $start + ($page_display_num - 1);
            if ($end > $page_num)
            {
                $end = $page_num;
            }

            for ($idx=$start; $idx<=$end; $idx++)
            {
                //current page should not be displayed as a link
                if ($page_curr == $idx)
                {
                    $page_link_html = $page_link_html . 
                        "$idx ";
                }
                else
                {
                    $page_link_html = $page_link_html . 
                        "<a href='#' onclick='page_link_click(\"pn=$idx\");'>$idx </a>";
                }
            }

            $page_link_html = $page_link_html . 
                "<a href='#' onclick='page_link_click(\"pn=$page_num\");'>>></a>" . 
                "</div>";
        }
    }

    return $page_link_html;
}

function add_post_list_param()
{
    $post_list_param = "";

    if (isset($_REQUEST["cat"]))
    {
        $post_list_param = $post_list_param . "&cat=" . $_REQUEST["cat"];
    }

    if (isset($_REQUEST["archive"]))
    {
        $post_list_param = $post_list_param . "&archive=" . $_REQUEST["archive"];
    }

    return $post_list_param;
}

function get_foot_text()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_foot_text() necessary params is null.";
        exit;
    }

    $foot_text = "";

    $result = $g_db->get_tb_options_by_option_name("foot_text");
    if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
    {
        $rows = $result["rows"];
        //the column 2 is option_value
        $foot_text = $rows[0][2];
    }

    return $foot_text;
}

function make_post_title()
{
    global $g_db;
    global $g_cache;

    if (empty($g_db) || empty($g_cache) || !isset($_REQUEST["post_id"]))
    {
        echo "Error: make_post_title() necessary params is null.";
        exit;
    }

    $post_title_html = "";

    $post_id = $_REQUEST["post_id"];
    //store the post id
    $g_cache->set_cache("post_id", $post_id);

    $result = $g_db->get_tb_posts_by_post_id($post_id);
    if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
    {
        $num = $result["num"];
        $rows = $result["rows"];

        $post = $rows[0];

        //the column 0 is post_id
        $post_id = $post[0];
        //the column 1 is user_id
        $user_id = $post[1];
        //the column 2 is category_id
        $category_id = $post[2];
        //the column 3 is post_date
        $post_date = $post[3];
        //the column 4 is post_title
        $post_title = $post[4];
        //the column 5 is post_content
        $post_content = $post[5];
        //the column 6 is read_number
        $read_number = $post[6];

        $comment_number = "0";
        $result2 = $g_db->get_tb_comments_by_post_id($post_id);
        if (!empty($result2["num"]) && !empty($result2["rows"]))
        {
            $num2 = $result2["num"];
            $rows2 = $result2["rows"];

            $comment_number = (String)$num2;
        }

        //store the content of the post
        $g_cache->set_cache("post_content", $post_content);

        $result3 = $g_db->get_tb_users_by_user_id($user_id);
        if (!empty($result3["num"]) && !empty($result3["rows"]) && $result3["num"]==1)
        {
            $num3 = $result3["num"];
            $rows3 = $result3["rows"];
            $user3 = $rows3[0];

            //the column 1 is user_name
            $user_name = $user3[1];

            $post_title_html = $post_title_html . 
                "<div id='post_title_div'>$post_title</div>";

            $post_title_html = $post_title_html . "<div id='post_info_div'>";

            $post_title_html = $post_title_html . 
                make_post_info($user_name, $post_date, $read_number, $comment_number, $post_id, $category_id);

            $post_title_html = $post_title_html . 
                "</div>";
        }
    }

    return $post_title_html;
}

function make_post_content()
{
    global $g_cache;

    if (empty($g_cache))
    {
        echo "Error: make_post_content() necessary params is null.";
        exit;
    }

    //get the content of the post cached
    $post_content = $g_cache->get_cache("post_content", NULL);

    return $post_content;
}

function do_comment_add($post_id, $user_id, $comment_content)
{
    global $g_db;

    if (empty($post_id) || empty($user_id) || empty($comment_content) || empty($g_db))
    {
        echo "Error: do_comment_add() necessary params is null.";
        exit;
    }

    $comment_date = date("Y-m-d h:i:s");

    $comment_array = array("post_id"=>"$post_id", 
                        "user_id"=>"$user_id", 
                        "comment_date"=>"$comment_date", 
                        "comment_content"=>"$comment_content");

    //add the comment
    $g_db->insert_tb_comments($comment_array);

    return;
}

function do_comment_delete($comment_id)
{
    global $g_db;

    if (empty($comment_id) || empty($g_db))
    {
        echo "Error: do_comment_delete() necessary params is null.";
        exit;
    }

    //delete the comment
    $g_db->delete_tb_comments($comment_id);

    return;
}

function do_post_add($post_title, $post_content)
{
    global $g_db;
    global $g_login;

    if (empty($post_title) || empty($post_content) || empty($g_db) || empty($g_login))
    {
        echo "Error: do_post_add() necessary params is null.";
        exit;
    }

    //find logined user id
    $logined_user = $g_login->get_logined_user();
    if (!empty($logined_user))
    {
        $result = $g_db->get_tb_users_by_user_name($logined_user);
        if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
        {
            $num = $result["num"];
            $rows = $result["rows"];
            $user = $rows[0];

            //the column 0 is user_id
            $user_id = $user[0];

            $post_id = 0;
            $category_id = 0;
            $post_date = date("Y-m-d h:i:s");
            $read_number = "0";

            $post_array = array("post_id"=>"$post_id", 
                                "user_id"=>"$user_id", 
                                "category_id"=>"$category_id", 
                                "post_date"=>"$post_date", 
                                "post_title"=>"$post_title", 
                                "post_content"=>"$post_content", 
                                "read_number"=>"$read_number");

            //add the post
            $g_db->insert_tb_posts($post_array);

            //get the post id that had been insert just
            $result2 = $g_db->get_tb_posts_by_order("post_id");
            if (!empty($result2["num"]) && !empty($result2["rows"]))
            {
                $num = $result2["num"];
                $rows = $result2["rows"];
                $post = $rows[0];

                //the column 0 is post_id
                $_REQUEST["post_id"] = $post[0];
            }
            else
            {
                echo "Error: do_post_add() save post failure.";
                exit;
            }
        }
    }

    return;
}

function do_post_edit($post_id, $post_title, $post_content)
{
    global $g_db;

    if (empty($g_db) || empty($post_id) || empty($post_title) || empty($post_content))
    {
        echo "Error: do_post_edit() necessary params is null.";
        exit;
    }

    $result = $g_db->get_tb_posts_by_post_id($post_id);
    if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
    {
        $num = $result["num"];
        $rows = $result["rows"];

        $post = $rows[0];

        //the column 0 is post_id
        $post_id = $post[0];
        //the column 1 is user_id
        $user_id = $post[1];
        //the column 2 is category_id
        $category_id = $post[2];
        //the column 3 is post_date
        $post_date = $post[3];
        //the column 6 is read_number
        $read_number = $post[6];

        $post_array = array("post_id"=>"$post_id", 
                            "user_id"=>"$user_id", 
                            "category_id"=>"$category_id", 
                            "post_date"=>"$post_date", 
                            "post_title"=>"$post_title", 
                            "post_content"=>"$post_content", 
                            "read_number"=>"$read_number");

        //update the post
        $g_db->insert_tb_posts($post_array);
    }

    return;
}

function do_post_action()
{
    //add the comment
    if (isset($_REQUEST["action"]) && 
            $_REQUEST["action"] == "add_comment" && 
            isset($_REQUEST["post_id"]) && 
            isset($_REQUEST["user_id"]) && 
            isset($_REQUEST["content"]))
    {
        $post_id = $_REQUEST["post_id"];
        $user_id = $_REQUEST["user_id"];
        $content = $_REQUEST["content"];

        do_comment_add($post_id, $user_id, $content);
    }
    //delete the comment
    elseif (isset($_REQUEST["action"]) && 
        $_REQUEST["action"] == "del_comment" && 
        isset($_REQUEST["comment_id"]))
    {
            $comment_id = $_REQUEST["comment_id"];

            do_comment_delete($comment_id);
    }
    //add the post
    elseif (isset($_REQUEST["action"]) && 
            $_REQUEST["action"] == "add_post" && 
            isset($_REQUEST["me_editor_title"]) && 
            isset($_REQUEST["me_editor_content"]))
    {
        $post_title = $_REQUEST["me_editor_title"];
        $post_content = $_REQUEST["me_editor_content"];

        do_post_add($post_title, $post_content);
    }
    //edit the post
    elseif (isset($_REQUEST["action"]) && 
            $_REQUEST["action"] == "edit_post" && 
            isset($_REQUEST["me_editor_title"]) && 
            isset($_REQUEST["me_editor_content"]) &&
            isset($_REQUEST["post_id"]))
    {
        $post_id = $_REQUEST["post_id"];
        $post_title = $_REQUEST["me_editor_title"];
        $post_content = $_REQUEST["me_editor_content"];

        do_post_edit($post_id, $post_title, $post_content);
    }

    return;
}

function do_post_read_inc($post_id)
{
    global $g_db;

    if (empty($post_id) || empty($g_db))
    {
        echo "Error: do_post_read_inc() necessary params is null.";
        exit;
    }

    $result = $g_db->get_tb_posts_by_post_id($post_id);
    if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
    {
        $num = $result["num"];
        $rows = $result["rows"];

        $post = $rows[0];

        //the column 0 is post_id
        $post_id = $post[0];
        //the column 1 is user_id
        $user_id = $post[1];
        //the column 2 is category_id
        $category_id = $post[2];
        //the column 3 is post_date
        $post_date = $post[3];
        //the column 4 is post_title
        $post_title = $post[4];
        //the column 5 is post_content
        $post_content = $post[5];
        //the column 6 is read_number
        $read_number = $post[6];

        //increase the read number
        $read_number = (String)((int)$read_number + 1);

        $post_array = array("post_id"=>"$post_id", 
                            "user_id"=>"$user_id", 
                            "category_id"=>"$category_id", 
                            "post_date"=>"$post_date", 
                            "post_title"=>"$post_title", 
                            "post_content"=>"$post_content", 
                            "read_number"=>"$read_number");

        //update the post
        $g_db->insert_tb_posts($post_array);
    }

    return;
}

function do_post_read_action()
{
    //calculate the read number for this page
    if (isset($_REQUEST["page"]) && 
        $_REQUEST["page"] == "post" && 
        isset($_REQUEST["post_id"]))
    {
        if (!isset($_COOKIE["visit_post"]))
        {
            $post_id = $_REQUEST["post_id"];

            //increase the read number of this post
            do_post_read_inc($post_id);

            //set the cookie
            $post_array = array();
            $post_array[0] = $post_id;
            $post_id_list = implode(".", $post_array);
            setcookie("visit_post", $post_id_list);
        }
        else
        {
            $visit_post = $_COOKIE["visit_post"];
            $post_id = $_REQUEST["post_id"];

            //check whether this post is already included
            $post_array = explode(".", $visit_post);
            foreach ($post_array as $i => $value)
            {
                if ($post_id == $value)
                {
                    //this post is already included, return
                    return;
                }
            }

            //increase the read number of this post
            do_post_read_inc($post_id);

            //modify the cookie
            $post_array_len = count($post_array);
            $post_array[$post_array_len] = $post_id;
            $post_id_list = implode(".", $post_array);
            setcookie("visit_post", $post_id_list);
        }
    }

    return;
}

function make_comment_content()
{
    global $g_db;
    global $g_cache;
    global $g_login;
    global $g_lang_text;

    if (empty($g_db) || empty($g_cache) || empty($g_login) || empty($g_lang_text))
    {
        echo "Error: make_comment_content() necessary params is null.";
        exit;
    }

    $comment_html = "";

    $post_id = $g_cache->get_cache("post_id", NULL);
    if ($post_id == NULL)
    {
        echo "Error: make_comment_content() get_cache post_id is null.";
        exit;
    }

    $result = $g_db->get_tb_comments_by_post_id($post_id);
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        $num = $result["num"];
        $rows = $result["rows"];

        if ($num > 0)
        {
            $comment_html = $comment_html . "<div class='post_head_div'>" . 
                $g_lang_text['post_comment_view_head'] . 
                "</div>";
        }

        for ($idx=0; $idx<$num; $idx++)
        {
            $comment = $rows[$idx];

            //the column 0 is comment_id
            $comment_id = $comment[0];
            //the column 2 is user_id
            $user_id = $comment[2];
            //the column 3 is comment_date
            $comment_date = $comment[3];
            //the column 4 is comment_content
            $comment_content = $comment[4];

            $result2 = $g_db->get_tb_users_by_user_id($user_id);
            if (!empty($result2["num"]) && !empty($result2["rows"]) && $result2["num"]==1)
            {
                $num2 = $result2["num"];
                $rows2 = $result2["rows"];
                $user2 = $rows2[0];

                //the column 1 is user_name
                $user_name = $user2[1];
                //the column 5 is user_level
                $user_level = $user2[5];

                //if the logined user is the user of this post, or is the admin
                //it should add edit or delete link for this post
                $can_edit = false;
                $logined_user = $g_login->get_logined_user();
                if (!empty($logined_user))
                {
                    $result3 = $g_db->get_tb_users_by_user_name($logined_user);
                    if (!empty($result3["num"]) && !empty($result3["rows"]) && $result3["num"]==1)
                    {
                        $num3 = $result3["num"];
                        $rows3 = $result3["rows"];
                        $user3 = $rows3[0];

                        //the column 5 is user_level
                        $user_level2 = $user3[5];

                        if ($logined_user==$user_name || $user_level2=='admin')
                        {
                            $can_edit = true;
                        }
                    }
                }

                //add comment info
                $comment_html = $comment_html . "<div class='comment_info_div'>";

                if ($can_edit == true)
                {
                    $comment_html = $comment_html . 
                        "$user_name $comment_date " . 
                        "<a href='index.php?action=del_comment&page=post&post_id=$post_id&comment_id=$comment_id'>" . $g_lang_text["tb_func_comment_delete"] . " </a>";
                }
                else
                {
                    $comment_html = $comment_html . 
                        "$user_name $comment_date ";
                }

                $comment_html = $comment_html . 
                    "</div>";

                //add comment content
                $comment_html = $comment_html . "<div class='comment_content_div'>" . 
                    "$comment_content" . 
                    "</div>";
            }
        }
    }

    return $comment_html;
}

function make_comment_write()
{
    global $g_db;
    global $g_cache;
    global $g_login;
    global $g_lang_text;

    if (empty($g_db) || empty($g_cache) || empty($g_login) || empty($g_lang_text))
    {
        echo "Error: make_comment_write() necessary params is null.";
        exit;
    }

    $comment_html = "";

    $logined_user = $g_login->get_logined_user();
    if (!empty($logined_user))
    {
        $post_id = $g_cache->get_cache("post_id", NULL);
        if ($post_id == NULL)
        {
            echo "Error: make_comment_write() get_cache post_id is null.";
            exit;
        }

        $result = $g_db->get_tb_users_by_user_name($logined_user);
        if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
        {
            $num = $result["num"];
            $rows = $result["rows"];
            $user = $rows[0];

            //the column 0 is user_id
            $user_id = $user[0];
            //the column 1 is user_name
            $user_name = $user[1];
        }

        $comment_html = $comment_html . "<div class='post_head_div'>" . 
            $g_lang_text['post_comment_write_head'] . 
            "</div>";

        //add comment write form
        $comment_html = $comment_html . "<div class='comment_write_div'>";

        $comment_html = $comment_html . "<div class='comment_write_user_div'>" . 
            $g_lang_text["tb_func_comment_user"] . ": $user_name" . 
            "</div>";

        $comment_html = $comment_html . "<form method='post' name='comment_write_form' action='index.php?action=add_comment&page=post'>" . 
            "<input type='hidden' name='post_id' value='$post_id'>" . 
            "<input type='hidden' name='user_id' value='$user_id'>" . 
            "<textarea rows='10' cols='80' name='content'></textarea>" . 
            "</br>" . 
            "<input type='submit' value='" . $g_lang_text["tb_func_comment_submit"] . "'>" . 
            "</form>";

        $comment_html = $comment_html . 
            "</div>";
    }

    return $comment_html;
}

function get_post_title()
{
    global $g_cache;
    global $g_db;

    if (empty($g_db) || empty($g_cache))
    {
        echo "Error: get_post_title() necessary params is null.";
        exit;
    }

    $post_title = "";

    //edit the post
    if (isset($_REQUEST["action"]) && 
        $_REQUEST["action"]=="edit_post" && 
        isset($_REQUEST["post_id"]))
    {
        $post_id = $_REQUEST["post_id"];

        $result = $g_db->get_tb_posts_by_post_id($post_id);
        if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
        {
            $num = $result["num"];
            $rows = $result["rows"];
            $post = $rows[0];

            //the column 4 is post_title
            $post_title = $post[4];

        }
    }

    return $post_title;
}

function get_post_content()
{
    global $g_cache;
    global $g_db;

    if (empty($g_db) || empty($g_cache))
    {
        echo "Error: get_post_content() necessary params is null.";
        exit;
    }

    $post_content = "";

    //edit the post
    if (isset($_REQUEST["action"]) && 
        $_REQUEST["action"]=="edit_post" && 
        isset($_REQUEST["post_id"]))
    {
        $post_id = $_REQUEST["post_id"];

        $result = $g_db->get_tb_posts_by_post_id($post_id);
        if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
        {
            $num = $result["num"];
            $rows = $result["rows"];
            $post = $rows[0];

            //the column 5 is post_content
            $post_content = $post[5];

            //escape all char " to the char '
            $post_content = preg_replace("/\"/", "'", $post_content);
        }
    }

    return $post_content;
}

function add_post_edit_param()
{
    $post_edit_param = "";

    if (isset($_REQUEST["post_id"]))
    {
        $post_edit_param = $post_edit_param . "&" . "post_id=" . (String)$_REQUEST["post_id"];
    }

    //if current page has action, it should be edit post.
    if (isset($_REQUEST["action"]))
    {
        $post_edit_param = $post_edit_param . "&" . "action=" . (String)$_REQUEST["action"];
    }
    //if not, it should be add post.
    else
    {
        $post_edit_param = $post_edit_param . "&" . "action=add_post";
    }

    return $post_edit_param;
}

function do_uploaded_image_save()
{
    global $g_login;

    if (empty($g_login))
    {
        exit;
    }

    $image_link_html = "";

    $logined_user = $g_login->get_logined_user();
    if (!empty($logined_user))
    {
        $file = $_FILES['me_host_image_menu_file'];

        if (!$file ||
            $file['error'] > 0 ||
            !is_uploaded_file($file['tmp_name']))
        {
            exit;
        }

        //prepare the save path for the image
        $new_path = 'images';
        if (!file_exists($new_path))
        {
            @ mkdir($new_path);
        }

        $new_path = $new_path . '/' . (String)$logined_user;
        if (!file_exists($new_path))
        {
            @ mkdir($new_path);
        }

        //create the save name for the image
        $matches = preg_split('/\./', $file['name']);
        if (count($matches) == 2)
        {
            $new_name = (String)rand() . '.' . $matches[1];
        }
        else
        {
            $new_name = (String)rand();
        }

        //move the file from temp dir to the solute dir
        $new_file = $new_path . '/' . $new_name;
        if (!move_uploaded_file($file['tmp_name'], $new_file))
        {
            exit;
        }

        //change the permission for this file
    	$stat = stat(dirname($new_file));
    	$perms = $stat['mode'] & 0000777;
    	@ chmod($new_file, $perms);

    	$image_link_html = 'image_name=' . $file['name'] . '&image_src=' . $new_file;
    }

    return $image_link_html;
}

function do_uploaded_image_del()
{
    global $g_login;

    if (empty($g_login))
    {
        exit;
    }

    $logined_user = $g_login->get_logined_user();
    if (!empty($logined_user))
    {
        if ($_REQUEST["image_name"])
        {
            $image_name = $_REQUEST["image_name"];
            $image_file = 'images' . '/' . (String)$logined_user. '/' . $image_name;
            $image_file = ROOTPATH . $image_file;
            if (file_exists($image_file))
            {
                //delete the image from the server
                unlink ($image_file);
            }
        }
    }

    return;
}

function do_image_action()
{
    //uploaded the image
    if (isset($_REQUEST["action"]) && 
        $_REQUEST["action"] == "add_image")
    {
        echo do_uploaded_image_save();
    }
    //delete the uploaded image
    elseif (isset($_REQUEST["action"]) && 
            $_REQUEST["action"] == "del_image")
    {
        do_uploaded_image_del();
    }

    return;
}

function do_category_add($new_category_name)
{
    global $g_db;

    if (empty($new_category_name) || empty($g_db))
    {
        echo "Error: do_category_add() necessary params is null.";
        exit;
    }

    $category_id = 0;
    $category_name = $new_category_name;
	
    $category_array = array("category_id"=>"$category_id", 
                        "category_name"=>"$category_name");
	
    //insert the category
    $g_db->insert_tb_categories($category_array);

    return;
}

function do_category_edit($old_category_name, $new_category_name)
{
    global $g_db;

    if (empty($old_category_name) || empty($new_category_name) || empty($g_db))
    {
        echo "Error: do_category_edit() necessary params is null.";
        exit;
    }

    //modify the category name
    $result = $g_db->get_tb_categories_by_cat_name($old_category_name);
    if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
    {
        $num = $result["num"];
        $rows = $result["rows"];

        $category = $rows[0];

        //the column 0 is category_id
        $category_id = $category[0];

        $category_name = $new_category_name;

        $category_array = array("category_id"=>"$category_id", 
                            "category_name"=>"$category_name");

        //update the category
        $g_db->insert_tb_categories($category_array);
    }

    return;
}

function do_category_del($category_id)
{
    global $g_db;

    if (empty($category_id) || empty($g_db))
    {
        echo "Error: do_category_del() necessary params is null.";
        exit;
    }

    //delete the category
    $g_db->delete_tb_categories($category_id);

    //modify all posts that belong to this category
    $result = $g_db->get_tb_posts_by_cat_id($category_id);
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        $num = $result["num"];
        $rows = $result["rows"];

        for ($idx=0; $idx<$num; $idx++)
        {
            $post = $rows[$idx];

            //the column 0 is post_id
            $post_id = $post[0];
            //the column 1 is user_id
            $user_id = $post[1];
            //the column 3 is post_date
            $post_date = $post[3];
            //the column 4 is post_title
            $post_title = $post[4];
            //the column 5 is post_content
            $post_content = $post[5];
            //the column 6 is read_number
            $read_number = $post[6];

            //set category_id to 0
            $category_id = 0;

            $post_array = array("post_id"=>"$post_id", 
                                "user_id"=>"$user_id", 
                                "category_id"=>"$category_id", 
                                "post_date"=>"$post_date", 
                                "post_title"=>"$post_title", 
                                "post_content"=>"$post_content", 
                                "read_number"=>"$read_number");

            //update the post
            $g_db->insert_tb_posts($post_array);
        }
    }

    return;
}

function do_commment_del($comment_id)
{
    global $g_db;

    if (empty($comment_id) || empty($g_db))
    {
        echo "Error: do_commment_del() necessary params is null.";
        exit;
    }

    //delete the comment
    $g_db->delete_tb_comments($comment_id);

    return;
}

function do_option_edit($option_name, $new_option_value)
{
    global $g_db;

    if (empty($option_name) || empty($g_db))
    {
        echo "Error: do_option_edit() necessary params is null.";
        exit;
    }

    //modify the option
    $result = $g_db->get_tb_options_by_option_name($option_name);
    if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
    {
        $num = $result["num"];
        $rows = $result["rows"];

        $config = $rows[0];

        //the column 0 is option_id
        $option_id = $config[0];
        //the column 2 is option_value
        $option_value = $config[2];
        if ($new_option_value != $option_value)
        {
            $option_value = $new_option_value;

            $option_array = array("option_id"=>"$option_id", 
                                "option_name"=>"$option_name",
                                "option_value"=>"$option_value");

            //update the option
            $g_db->insert_tb_options($option_array);
        }
    }

    return;
}

function do_user_edit($option_name, $new_option_value)
{
    global $g_db;
    global $g_login;

    if (empty($option_name) || empty($g_login) || empty($g_db))
    {
        echo "Error: do_user_edit() necessary params is null.";
        exit;
    }

    //modify the user
	$logined_user = $g_login->get_logined_user();
	if (!empty($logined_user))
	{
    	//modify the user
    	$result = $g_db->get_tb_users_by_user_name($logined_user);
    	if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
    	{
    		$num = $result["num"];
    		$rows = $result["rows"];
    	
    		$user = $rows[0];

    		//the column 0 is user_id
    		$user_id = $user[0];
    		//the column 1 is user_name
    		$user_name = $user[1];
    		//the column 2 is user_password
    		$user_password = $user[2];
    		//the column 3 is user_registered
    		$user_registered = $user[3];
    		//the column 4 is user_email
    		$user_email = $user[4];
    		//the column 5 is user_level
    		$user_level = $user[5];

            $changed = false;

            if ($option_name == "user_password")
            {
                $user_password = $new_option_value;
                $changed = true;
            }
            if ($option_name == "user_email")
            {
                $user_email = $new_option_value;
                $changed = true;
            }

    		if ($changed)
    		{
    			$user_array = array("user_id"=>"$user_id",
    					"user_name"=>"$user_name",
    					"user_password"=>"$user_password",
    					"user_registered"=>"$user_registered",
    					"user_email"=>"$user_email",
    					"user_level"=>"$user_level");

				//update the user
				$g_db->insert_tb_users($user_array);
    		}
    	}
   	}

    return;
}

function do_admin_action()
{
    //add or edit the categorys
    if (isset($_REQUEST["action"]) && 
        $_REQUEST["action"] == "edit_cat")
    {
        foreach ($_POST as $key => $value)
        {
            if ($key == "new_cat")
            {
            	if (!empty($value))
            	{
                	do_category_add($value);
            	}
            }
            else
            {
                if (!empty($value))
                {
                    do_category_edit($key, $value);
                }
            }
        }
    }
    //delete the category
    elseif (isset($_REQUEST["action"]) && 
        $_REQUEST["action"] == "del_cat" && 
        isset($_REQUEST["cat_id"]))
    {
        $category_id = $_REQUEST["cat_id"];

        do_category_del($category_id);
    }
    //delete the comment
    elseif (isset($_REQUEST["action"]) && 
        $_REQUEST["action"] == "del_comment" && 
        isset($_REQUEST["comment_id"]))
    {
        $comment_id = $_REQUEST["comment_id"];

        do_commment_del($comment_id);
    }
    //edit the option and user
    elseif (isset($_REQUEST["action"]) && 
        $_REQUEST["action"] == "edit_option")
    {
        foreach ($_POST as $key => $value)
        {
            if (($key == "user_password" ||$key == "user_email" ))
            {
                do_user_edit($key, $value);
            }
            else
            {
                do_option_edit($key, $value);
            }
        }
    }

    return;
}

function make_category_edit_list()
{
    global $g_db;
    global $g_cache;
    global $g_login;
    global $g_lang_text;

    if (empty($g_db) || empty($g_cache) || empty($g_login) || empty($g_lang_text))
    {
        echo "Error: make_category_edit_list() necessary params is null.";
        exit;
    }

    $cat_list_html = "<form method='post' name='cat_list_form' target='_self' action='index.php?action=edit_cat&page=admin_category'>" . 
        "<table id='cat_list_table'>";

    //add table head
    $cat_list_html = $cat_list_html . 
        "<tr class='cat_list_tr'>" . 
            "<th id='cat_list_cat_name_th'>" . 
                $g_lang_text["admin_cat_head_cat"] . 
            "</th>" . 
            "<th id='cat_list_cat_edit_th'>" . 
                $g_lang_text["admin_cat_head_edit"] . 
            "</th>" . 
            "<th id='cat_list_cat_op_th'>" . 
                $g_lang_text["admin_cat_head_op"] . 
            "</th>" . 
        "</tr>";

    //add the category already existed into the table
    $result = $g_db->get_tb_categories();
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        $num = $result["num"];
        $rows = $result["rows"];

        for ($idx=0; $idx<$num; $idx++)
        {
            $category = $rows[$idx];

            //the column 0 is category_id
            $category_id = $category[0];
            //the column 1 is category_name
            $category_name = $category[1];

            $cat_list_html = $cat_list_html . 
                "<tr class='cat_list_tr'>" . 
                    "<td class='cat_list_cat_name_td'>" . 
                        $category_name . 
                    "</td>" . 
                    "<td class='cat_list_cat_edit_td'>" . 
                        "<input type='text' name='$category_name' style='width:80%;display:none;'>" . 
                    "</td>" . 
                    "<td class='cat_list_cat_op_td'>" . 
                        "<a href='#' onclick='category_edit(this);'>" . $g_lang_text["admin_cat_edit"] . " <a>" . 
                        "<a href='index.php?action=del_cat&page=admin_category&cat_id=$category_id'>" . $g_lang_text["admin_cat_delete"] . "<a>" . 
                    "</td>" . 
                "</tr>";
        }
    }

    //add the new category input
    $cat_list_html = $cat_list_html . 
        "</table>" . 
            "<div id='cat_list_new_cat_div'>" . 
                "<label>" . $g_lang_text["admin_cat_add_cat"] . "</label>" . 
                "<input type='text' name='new_cat' style='width:30%;'>" . 
            "</div>";

    //add the submit button
    $cat_list_html = $cat_list_html . 
            "<div id='cat_list_submit_div'>" . 
                "<input type='submit' value=" . $g_lang_text["admin_cat_submit"] . ">" . 
            "</div>" . 
        "</form>";

    return $cat_list_html;
}

function make_comment_edit_list()
{
    global $g_db;
    global $g_cache;
    global $g_login;
    global $g_lang_text;

    if (empty($g_db) || empty($g_cache) || empty($g_login) || empty($g_lang_text))
    {
        echo "Error: make_comment_edit_list() necessary params is null.";
        exit;
    }

    //get the comment number can be displayed in one page
    $page_comments = $g_cache->get_cache("tb_options_page_posts", "get_page_posts");

    $comment_list_html = "<table id='comment_list_table'>";

    //add table head
    $comment_list_html = $comment_list_html . 
        "<tr class='comment_list_tr'>" . 
            "<th id='comment_list_content_th'>" . 
                $g_lang_text["admin_comment_head_content"] . 
            "</th>" . 
            "<th id='comment_list_user_th'>" . 
                $g_lang_text["admin_comment_head_user"] . 
            "</th>" . 
            "<th id='comment_list_date_th'>" . 
                $g_lang_text["admin_comment_head_date"] . 
            "</th>" . 
            "<th id='comment_list_op_th'>" . 
                $g_lang_text["admin_comment_head_op"] . 
            "</th>" . 
        "</tr>";

    //add the comments already existed into the table
    $result = $g_db->get_tb_comments_by_order("comment_date");
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        $num = $result["num"];
        $rows = $result["rows"];

        //store the number of comments
        $g_cache->set_cache("post_list_num", $num);

        //calculate the start of the comment number that should be displayed
        $start = 0;
        if (isset($_REQUEST["pn"]))
        {
            $start = ($_REQUEST["pn"]-1) * $page_comments;
        }

        //calculate the end of the comment number that should be displayed
        $end = $start + $page_comments;
        if ($end > $num)
        {
            $end = $num;
        }

        for ($idx=$start; $idx<$end; $idx++)
        {
            $comment = $rows[$idx];

            //the column 0 is comment_id
            $comment_id = $comment[0];
            //the column 1 is post_id
            $post_id = $comment[1];
            //the column 2 is user_id
            $user_id = $comment[2];
            //the column 3 is comment_date
            $comment_date = $comment[3];
            //the column 4 is comment_content
            $comment_content = $comment[4];

            $result2 = $g_db->get_tb_posts_by_post_id($post_id);
            if (!empty($result2["num"]) && !empty($result2["rows"]) && $result2["num"]==1)
            {
                $num2 = $result2["num"];
                $rows2 = $result2["rows"];
                $post = $rows2[0];

                //the column 4 is post_title
                $post_title = $post[4];

                $result3 = $g_db->get_tb_users_by_user_id($user_id);
                if (!empty($result3["num"]) && !empty($result3["rows"]) && $result3["num"]==1)
                {
                    $num3 = $result3["num"];
                    $rows3 = $result3["rows"];
                    $user = $rows3[0];

                    //the column 1 is user_name
                    $user_name = $user[1];

                    $comment_list_html = $comment_list_html . 
                        "<tr class='comment_list_tr'>" . 
                            "<td class='comment_list_content_td'>" . 
                                "RE: <a href='index.php?page=post&post_id=$post_id'>$post_title</a>" .
                                "</br>" .
                                "<span class='comment_list_content_span'>$comment_content</span>" . 
                                "</br>" . 
                            "</td>" . 
                            "<td class='comment_list_user_td'>" . 
                                $user_name . 
                            "</td>" . 
                            "<td class='comment_list_date_th'>" . 
                                $comment_date . 
                            "</td>" . 
                            "<td class='comment_list_op_td'>" . 
                                "<a href='index.php?action=del_comment&page=admin_comment&comment_id=$comment_id'>" . $g_lang_text["admin_comment_delete"] . "<a>" . 
                            "</td>" . 
                        "</tr>";
                }
            }
        }
    }

    $comment_list_html = $comment_list_html . 
        "</table>";

    return $comment_list_html;
}

function get_user_passwd()
{
	global $g_db;
	global $g_login;

	if (empty($g_db) || empty($g_login))
	{
		echo "Error: get_user_passwd() necessary params is null.";
		exit;
	}

	$user_passwd = "";

    $logined_user = $g_login->get_logined_user();
    if (!empty($logined_user))
    {
		$result = $g_db->get_tb_users_by_user_name($logined_user);
		if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
		{
			$num = $result["num"];
			$rows = $result["rows"];

			$user = $rows[0];

			//the column 2 is user_password
			$user_passwd = $user[2];
		}
    }

	return $user_passwd;
}

function get_user_email()
{
	global $g_db;
	global $g_login;

	if (empty($g_db) || empty($g_login))
	{
		echo "Error: get_user_email() necessary params is null.";
		exit;
	}

	$user_email = "";

	$logined_user = $g_login->get_logined_user();
	if (!empty($logined_user))
	{
		$result = $g_db->get_tb_users_by_user_name($logined_user);
		if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
		{
			$num = $result["num"];
			$rows = $result["rows"];

			$user = $rows[0];

			//the column 4 is user_email
			$user_email = $user[4];
		}
	}

	return $user_email;
}

function check_browser()
{
	if (empty($_SERVER["HTTP_USER_AGENT"]))
	{
		echo "Error: check_browser() necessary params is null.";
		exit;
	}

    if (strops($_SERVER["HTTP_USER_AGENT"], "IE") != false)
    {
        return "IE";
    }

    if (strops($_SERVER["HTTP_USER_AGENT"], "Firefox") != false)
    {
        return "Firefox";
    }

    if (strops($_SERVER["HTTP_USER_AGENT"], "Chrome") != false)
    {
        return "Chrome";
    }

    return "IE";
}

?>
