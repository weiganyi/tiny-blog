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

function get_new_post_menu()
{
    global $g_login;
    global $g_lang_text;

    if (empty($g_login) || empty($g_lang_text))
    {
        echo "Error: get_new_post_menu() necessary params is null.";
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

function get_management_menu()
{
    global $g_login;
    global $g_lang_text;

    if (empty($g_login) || empty($g_lang_text))
    {
        echo "Error: get_management_menu() necessary params is null.";
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
                            <a href='index.php?page=admin_config'>" . $g_lang_text["menu_admin_config"] . "</a>
                        </li>
                    </ul>
                </li>";
        }
    }

    return $menu_html;
}

function get_system_menu()
{
    global $g_login;
    global $g_lang_text;

    if (empty($g_login) || empty($g_lang_text))
    {
        echo "Error: get_system_menu() necessary params is null.";
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

    $name_html = "<span class='sidebar_content_right_span'>$name</span>";

    return $name_html;
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

    $user_registered_html = "<span class='sidebar_content_right_span'>$user_registered</span>";

    return $user_registered_html;
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

    $posts_number_html = "<span class='sidebar_content_right_span'>$posts_number</span>";

    return $posts_number_html;
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
            //the column 7 is read_number
            $read_number = $read_number + $post[7];
        }

        $read_number = (String)$read_number;
    }

    $read_number_html = "<span class='sidebar_content_right_span'>$read_number</span>";

    return $read_number_html;
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

    $result = $g_db->get_tb_posts();
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        $num = $result["num"];
        $rows = $result["rows"];

        $comment_number = 0;
        //calculate the number for all posts
        for ($idx=0; $idx<$num; $idx++)
        {
            $post = $rows[$idx];
            //the column 8 is comment_number
            $comment_number = $comment_number + $post[8];
        }

        $comment_number = (String)$comment_number;
    }

    $comment_number_html = "<span class='sidebar_content_right_span'>$comment_number</span>";

    return $comment_number_html;
}

function get_user_email()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_user_email() necessary params is null.";
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

    $user_email_html = "<span class='sidebar_content_right_span'>$user_email</span>";

    return $user_email_html;
}

function get_category_list()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_category_list() necessary params is null.";
        exit;
    }

    $category_list = "";

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

                    $category_list = $category_list . 
                                    "<a href='index.php?cat=$category_name'>$category[1]</a>" .
                                    " ($post_number)" . 
                                    "</br>";
                }
            }
        }
    }

    return $category_list;
}

function get_archive_list()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_archive_list() necessary params is null.";
        exit;
    }

    $archive_list = "";

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
            $archive_list = $archive_list . 
                            "<a href='index.php?archive=$post_date'>$post_date</a>" .
                            " ($post_number)" . 
                            "</br>";
        }
    }

    return $archive_list;
}

function get_reading_list()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_reading_list() necessary params is null.";
        exit;
    }

    $reading_list = "";

    $result = $g_db->get_tb_posts_by_order("read_number");
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        $num = $result["num"];
        $rows = $result["rows"];

        //only list the top 10 posts
        if ($num > 10)
            $num = 10;

        for ($idx=0; $idx<$num; $idx++)
        {
            $post = $rows[$idx];

            //the column 0 is post_id
            $post_id = $post[0];
            //the column 5 is post_title
            $post_title = $post[5];
            //the column 7 is read_number
            $read_number = $post[7];

            $post_title = substr($post_title, 0, 20);

            $reading_list = $reading_list . 
                            "<a href='index.php?post=$post_id'>$post_title</a>" .
                            "<span class='sidebar_content_right_span'>($read_number)</span>" . 
                            "</br>";
        }
    }

    return $reading_list;
}

function get_comment_list()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_comment_list() necessary params is null.";
        exit;
    }

    $comment_list = "";

    $result = $g_db->get_tb_comments_by_order("comment_date");
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        $num = $result["num"];
        $rows = $result["rows"];

        //only list the top 10 comments
        if ($num > 10)
            $num = 10;

        for ($idx=0; $idx<$num; $idx++)
        {
            $comment = $rows[$idx];

            //the column 0 is comment_id
            $comment_id = $comment[0];
            //the column 1 is post_id
            $post_id = $comment[1];
            //the column 2 is user_id
            $user_id = $comment[2];
            //the column 5 is comment_content
            $comment_content = $comment[5];

            $result2 = $g_db->get_tb_posts_by_post_id($post_id);
            if (!empty($result2["num"]) && !empty($result2["rows"]) && $result2["num"]==1)
            {
                $num2 = $result2["num"];
                $rows2 = $result2["rows"];
                $post = $rows2[0];

                //the column 5 is post_title
                $post_title = $post[5];

                $result3 = $g_db->get_tb_users_by_user_id($user_id);
                if (!empty($result3["num"]) && !empty($result3["rows"]) && $result3["num"]==1)
                {
                    $num3 = $result3["num"];
                    $rows3 = $result3["rows"];
                    $user = $rows3[0];

                    //the column 1 is user_name
                    $user_name = $user[1];

                    $post_title = substr($post_title, 0, 20);
                    $comment_content = $user_name. ": " . $comment_content;
                    $comment_content = substr($comment_content, 0, 20);

                    $comment_list = $comment_list . 
                                    "<a href='index.php?post=$post_id'>$post_title</a>" .
                                    "</br>" .
                                    "<span id='sidebar_comment_span'>$comment_content</span>" . 
                                    "</br>";
                }
            }
        }
    }

    return $comment_list;
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

function tb_options_page_posts()
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

    //delete the comment belong to this post
    $g_db->delete_tb_comments_by_post_id($post_id);

    return;
}

function get_posts_by_param()
{
    global $g_db;
    global $g_login;

    //search by category name
    if (isset($_REQUEST["cat"]))
    {
        $cat_name = $_REQUEST["cat"];
        $result = $g_db->get_tb_categories_by_cat_name($cat_name);
        if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
        {
            $rows = $result["rows"];
            $category = $rows[0];
            //the column 0 is category_id
            $category_id = $category[0];

            $result = $g_db->get_tb_posts_by_cat_id($category_id);
            if (!empty($result["num"]) && !empty($result["rows"]))
            {
                return $result;
            }
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
    //delete the post
    elseif (isset($_REQUEST["id"]) && isset($_REQUEST["action"]))
    {
        if ($_REQUEST["action"]=="delete")
        {
            $post_id = $_REQUEST["id"];

            do_post_delete($post_id);
        }

        $result = $g_db->get_tb_posts_by_order("post_date");
        if (!empty($result["num"]) && !empty($result["rows"]))
        {
            return $result;
        }
    }
    else
    {
        $result = $g_db->get_tb_posts_by_order("post_date");
        if (!empty($result["num"]) && !empty($result["rows"]))
        {
            return $result;
        }
    }

    return array();;
}

function get_posts_list()
{
    global $g_lang_text;
    global $g_login;
    global $g_cache;
    global $g_db;

    if (empty($g_cache) || empty($g_lang_text) || empty($g_login) || empty($g_db))
    {
        echo "Error: get_posts_list() necessary params is null.";
        exit;
    }

    $page_posts = $g_cache->get_cache("tb_options_page_posts", "tb_options_page_posts");

    $post_list = "";

    $result = get_posts_by_param();
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
            //the column 3 is post_date
            $post_date = $post[3];
            //the column 5 is post_title
            $post_title = $post[5];
            //the column 7 is read_number
            $read_number = $post[7];
            //the column 8 is comment_number
            $comment_number = $post[8];

            $result2 = $g_db->get_tb_users_by_user_id($user_id);
            if (!empty($result2["num"]) && !empty($result2["rows"]) && $result2["num"]==1)
            {
                $num2 = $result2["num"];
                $rows2 = $result2["rows"];
                $user2 = $rows2[0];

                //the column 1 is user_name
                $user_name = $user2[1];

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
                        $user_level = $user3[5];

                        if ($logined_user==$user_name || $user_level=='admin')
                        {
                            $can_edit = true;
                        }
                    }
                }

                $post_list = $post_list . 
                    "<div class='post_div'>" . 
                    "<div class='post_div_left'><a href='index.php?page=post&id=$post_id'>$post_title</a></div>";

                if ($can_edit == true)
                {
                    $post_list = $post_list . 
                        "<div class='post_div_right'>$post_date $user_name " . 
                        $g_lang_text["post_read"]. "($read_number) " . 
                        $g_lang_text["post_comment"]. "($comment_number) " . 
                        "<a href='index.php?page=new_post&id=$post_id&action=edit'>" . $g_lang_text["post_edit"] . " </a>" . 
                        "<a href='index.php?id=$post_id&action=delete'>" . $g_lang_text["post_delete"] . " </a>" . 
                        "</div>";
                }
                else
                {
                    $post_list = $post_list . 
                        "<div class='post_div_right'>$post_date $user_name " . 
                        $g_lang_text["post_read"]. "($read_number) " . 
                        $g_lang_text["post_comment"]. "($comment_number)" . 
                        "</div>";
                }

                $post_list = $post_list . 
                    "</div>";
            }
        }
    }

    return $post_list;
}

function get_page_link()
{
    global $g_cache;
    global $g_lang_text;

    if (empty($g_lang_text))
    {
        echo "Error: get_page_link() necessary params is null.";
        exit;
    }

    $page_posts = $g_cache->get_cache("tb_options_page_posts", "tb_options_page_posts");

    $page_link_html = "";

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
                "<a href='index.php?pn=1'><< </a>";

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
                        "<a href='index.php?pn=$idx'>$idx </a>";
                }
            }

            $page_link_html = $page_link_html . 
                "<a href='index.php?pn=$page_num'>>></a>" . 
                "</div>";
        }
    }

    return $page_link_html;
}

?>
