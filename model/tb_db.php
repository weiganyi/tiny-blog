<?php
/*
    create by weiganyi on 20131126
*/

class tb_db_mysql
{
    var $host;
    var $user;
    var $passwd;
    var $database;
    var $db_handler;

    function __construct()
    {
        $this->get_default_config();

        if (empty($this->host) || 
            empty($this->user) || 
            empty($this->passwd) || 
            empty($this->database))
        {
            echo "Error: tb_db_mysql->__construct() necessary params is null.";
            exit;
        }

        //connect the database host
        $this->db_handler = mysqli_connect($this->host, $this->user, $this->passwd, $this->database);
        if (mysqli_connect_errno())
        {
            echo "Error: tb_db_mysql->__construct() Could not connect the database, please try again later.";
            exit;
        }

        //select the database 
        mysqli_select_db($this->db_handler, $this->database);

        return;
    }

    function __destruct()
    {
        if ($this->db_handler)
        {
            //close the database
            mysqli_close($this->db_handler);
        }

        return;
    }

    function get_default_config()
    {
        //load the default config file
        $obj = simplexml_load_file(ROOTPATH . "config.xml");

        //translate the class object into array
        $arr = get_object_vars($obj);
        foreach ($arr as $key => $value)
        {
            switch ($key)
            {
                case "host":
                    $this->host = $value;
                    break;

                case "user":
                    $this->user = $value;
                    break;

                case "passwd":
                    $this->passwd = $value;
                    break;

                case "database":
                    $this->database = $value;
                    break;

                default:
                    break;
            }
        }

        return;
    }

    function do_sql_query($query)
    {
        if (empty($query ) || empty($this->db_handler))
        {
            echo "Error: tb_db_mysql->do_sql_query() necessary params is null.";
            exit;
        }

        $rows = array();

        //do the sql query
        $result = mysqli_query($this->db_handler, $query);

        //get the result
        $num_results = mysqli_num_rows($result);
        for ($idx=0; $idx<$num_results; $idx++)
        {
            $rows[$idx] = mysqli_fetch_row($result);
        }

        //construct a new array store the result
        $query_result = array("num"=>$num_results, "rows"=>$rows);

        //release the result
        mysqli_free_result($result);

        return $query_result;
    }

    function do_sql_query_without_result($query)
    {
        if (empty($query ) || empty($this->db_handler))
        {
            echo "Error: tb_db_mysql->do_sql_query_without_result() necessary params is null.";
            exit;
        }

        //do the sql query
        $result = mysqli_query($this->db_handler, $query);

        return $result;
    }
}


class tb_db
{
    var $db_control;

    function __construct()
    {
        $this->db_control = new tb_db_mysql();
 
        return;
    }

    function __destruct()
    {
        return;
    }

    function insert_tb_posts($post_attr)
    {
        if (empty($this->db_control) || empty($post_attr))
        {
            echo "Error: tb_db->insert_tb_posts() necessary params is null.";
            exit;
        }

        //load the array variable into the symbol table
        extract($post_attr);

        //if it is insert, post_id should be found, otherwise it is update
        if (empty($post_id))
        {
            $query = "insert into tb_posts 
                (post_id, user_id, category_id, post_date, post_title, 
                post_content, read_number) 
                values 
                ('0', '$user_id', '$category_id', '$post_date', 
                '$post_title', '$post_content', '$read_number')";
        }
        else
        {
            $query = "update tb_posts set
                user_id='$user_id', category_id='$category_id', post_date='$post_date', 
                post_title='$post_title', post_content='$post_content', 
                read_number='$read_number' where post_id='$post_id'";
        }

        $result = $this->db_control->do_sql_query_without_result($query);

        return $result;
    }

    function get_tb_posts()
    {
        if (empty($this->db_control))
        {
            echo "Error: tb_db->get_tb_posts() necessary params is null.";
            exit;
        }

        $query = "select * from tb_posts";

        $result = $this->db_control->do_sql_query($query);

        return $result;
    }

    function get_tb_posts_by_order($field)
    {
        if (empty($this->db_control) || empty($field))
        {
            echo "Error: tb_db->get_tb_posts_by_order() necessary params is null.";
            exit;
        }

        $query = "select * from tb_posts order by $field desc";

        $result = $this->db_control->do_sql_query($query);

        return $result;
    }

    function get_tb_posts_by_post_id($post_id)
    {
        if (empty($this->db_control) || empty($post_id))
        {
            echo "Error: tb_db->get_tb_posts_by_post_id() necessary params is null.";
            exit;
        }

        $query = "select * from tb_posts where post_id='$post_id'";

        $result = $this->db_control->do_sql_query($query);

        return $result;
    }

    function get_tb_posts_by_cat_id($category_id)
    {
        if (empty($this->db_control))
        {
            echo "Error: tb_db->get_tb_posts_by_cat_id() necessary params is null.";
            exit;
        }

        $query = "select * from tb_posts where category_id='$category_id'";

        $result = $this->db_control->do_sql_query($query);

        return $result;
    }

    function get_tb_posts_by_user_id_order($user_id, $field)
    {
        if (empty($this->db_control) || empty($field))
        {
            echo "Error: tb_db->get_tb_posts_by_user_id_order() necessary params is null.";
            exit;
        }

        $query = "select * from tb_posts where user_id='$user_id' order by $field desc";

        $result = $this->db_control->do_sql_query($query);

        return $result;
    }

    function get_tb_posts_num_by_cat_id($category_id)
    {
        if (empty($this->db_control))
        {
            echo "Error: tb_db->get_tb_posts_num_by_cat_id() necessary params is null.";
            exit;
        }

        $query = "select count(post_id) from tb_posts where category_id='$category_id'";

        $result = $this->db_control->do_sql_query($query);

        return $result;
    }

    function delete_tb_posts($post_id)
    {
        if (empty($this->db_control) || empty($post_id))
        {
            echo "Error: tb_db->delete_tb_posts() necessary params is null.";
            exit;
        }

        $query = "delete from tb_posts where post_id='$post_id'";

        $result = $this->db_control->do_sql_query_without_result($query);

        return $result;
    }

    function insert_tb_categories($cat_attr)
    {
        if (empty($this->db_control) || empty($cat_attr))
        {
            echo "Error: tb_db->insert_tb_categories() necessary params is null.";
            exit;
        }

        //load the array variable into the symbol table
        extract($cat_attr);

        //if it is insert, category_id should be found, otherwise it is update
        if (empty($category_id))
        {
            $query = "insert into tb_categories 
                (category_id, category_name) 
                values 
                ('0', '$category_name')";
        }
        else
        {
            $query = "update tb_categories set
                category_id='$category_id', category_name='$category_name' 
                where category_id='$category_id'";
        }

        $result = $this->db_control->do_sql_query_without_result($query);

        return $result;
    }

    function get_tb_categories()
    {
        if (empty($this->db_control))
        {
            echo "Error: tb_db->get_tb_categories() necessary params is null.";
            exit;
        }

        $query = "select * from tb_categories";

        $result = $this->db_control->do_sql_query($query);

        return $result;
    }

    function get_tb_categories_by_cat_name($category_name)
    {
        if (empty($this->db_control) || empty($category_name))
        {
            echo "Error: tb_db->get_tb_categories_by_cat_name() necessary params is null.";
            exit;
        }

        $query = "select * from tb_categories where category_name='$category_name'";

        $result = $this->db_control->do_sql_query($query);

        return $result;
    }

    function delete_tb_categories($category_id)
    {
        if (empty($this->db_control) || empty($category_id))
        {
            echo "Error: tb_db->delete_tb_categories() necessary params is null.";
            exit;
        }

        $query = "delete from tb_categories where category_id='$category_id'";

        $result = $this->db_control->do_sql_query_without_result($query);

        return $result;
    }

    function insert_tb_comments($comment_attr)
    {
        if (empty($this->db_control) || empty($comment_attr))
        {
            echo "Error: tb_db->insert_tb_comments() necessary params is null.";
            exit;
        }

        //load the array variable into the symbol table
        extract($comment_attr);

        //if it is insert, comment_id should be found, otherwise it is update
        if (empty($comment_id))
        {
            $query = "insert into tb_comments 
                (comment_id, post_id, user_id, comment_date, comment_content) 
                values 
                ('0', '$post_id', '$user_id', '$comment_date', '$comment_content')";
        }
        else
        {
            $query = "update tb_comments set
                post_id='$post_id', user_id='$user_id', comment_date='$comment_date', 
                comment_content='$comment_content' where comment_id='$comment_id'";
        }

        $result = $this->db_control->do_sql_query_without_result($query);

        return $result;
    }

    function get_tb_comments()
    {
        if (empty($this->db_control))
        {
            echo "Error: tb_db->get_tb_comments() necessary params is null.";
            exit;
        }

        $query = "select * from tb_comments";

        $result = $this->db_control->do_sql_query($query);

        return $result;
    }

    function get_tb_comments_by_order($field)
    {
        if (empty($this->db_control) || empty($field))
        {
            echo "Error: tb_db->get_tb_comments_by_order() necessary params is null.";
            exit;
        }

        $query = "select * from tb_comments order by $field desc";

        $result = $this->db_control->do_sql_query($query);

        return $result;
    }

    function get_tb_comments_by_post_id($post_id)
    {
        if (empty($this->db_control) || empty($post_id))
        {
            echo "Error: tb_db->get_tb_comments_by_post_id() necessary params is null.";
            exit;
        }

        $query = "select * from tb_comments where post_id=$post_id order by comment_date desc";

        $result = $this->db_control->do_sql_query($query);

        return $result;
    }

    function delete_tb_comments($comment_id)
    {
        if (empty($this->db_control) || empty($comment_id))
        {
            echo "Error: tb_db->delete_tb_comments() necessary params is null.";
            exit;
        }

        $query = "delete from tb_comments where comment_id='$comment_id'";

        $result = $this->db_control->do_sql_query_without_result($query);

        return $result;
    }

    function delete_tb_comments_by_post_id($post_id)
    {
        if (empty($this->db_control) || empty($post_id))
        {
            echo "Error: tb_db->delete_tb_comments_by_post_id() necessary params is null.";
            exit;
        }

        $query = "delete from tb_comments where post_id='$post_id'";

        $result = $this->db_control->do_sql_query_without_result($query);

        return $result;
    }

    function insert_tb_users($user_attr)
    {
        if (empty($this->db_control) || empty($user_attr))
        {
            echo "Error: tb_db->insert_tb_users() necessary params is null.";
            exit;
        }

        //load the array variable into the symbol table
        extract($user_attr);

        //if it is insert, $user_id should be found, otherwise it is update
        if (empty($user_id))
        {
            $query = "insert into tb_users 
                (user_id, user_name, user_password, user_registered, user_email, user_level) 
                values 
                ('0', '$user_name', '$user_password', '$user_registered', '$user_email', '$user_level')";
        }
        else
        {
            $query = "update tb_users set
                user_name='$user_name', user_password='$user_password', 
                user_registered='$user_registered', user_email='$user_email', 
                user_level='$user_level' where user_id='$user_id'";
        }

        $result = $this->db_control->do_sql_query_without_result($query);

        return $result;
    }

    function get_tb_users_by_user_level($user_level)
    {
        if (empty($this->db_control) || empty($user_level))
        {
            echo "Error: tb_db->get_tb_users_by_user_level() necessary params is null.";
            exit;
        }

        $query = "select * from tb_users where user_level='$user_level'";

        $result = $this->db_control->do_sql_query($query);

        return $result;
    }

    function get_tb_users_by_user_id($user_id)
    {
        if (empty($this->db_control) || empty($user_id))
        {
            echo "Error: tb_db->get_tb_users_by_user_id() necessary params is null.";
            exit;
        }

        $query = "select * from tb_users where user_id='$user_id'";

        $result = $this->db_control->do_sql_query($query);

        return $result;
    }

    function get_tb_users_by_user_name($user_name)
    {
        if (empty($this->db_control) || empty($user_name))
        {
            echo "Error: tb_db->get_tb_users_by_user_name() necessary params is null.";
            exit;
        }

        $query = "select * from tb_users where user_name='$user_name'";

        $result = $this->db_control->do_sql_query($query);

        return $result;
    }

    function delete_tb_users($user_id)
    {
        if (empty($this->db_control) || empty($user_id))
        {
            echo "Error: tb_db->delete_tb_users() necessary params is null.";
            exit;
        }

        $query = "delete from tb_users where user_id='$user_id'";

        $result = $this->db_control->do_sql_query_without_result($query);

        return $result;
    }

    function insert_tb_options($option_attr)
    {
        if (empty($this->db_control) || empty($option_attr))
        {
            echo "Error: tb_db->insert_tb_options() necessary params is null.";
            exit;
        }

        //load the array variable into the symbol table
        extract($option_attr);

        //if it is insert, category_id should be found, otherwise it is update
        if (empty($option_id))
        {
            $query = "insert into tb_options 
                (option_id, option_name, option_value) 
                values 
                ('0', '$option_name', '$option_value')";
        }
        else
        {
            $query = "update tb_options set
                option_name='$option_name', option_value='$option_value' where option_id='$option_id'";
        }

        $result = $this->db_control->do_sql_query_without_result($query);

        return $result;
    }

    function get_tb_options_by_option_name($option_name)
    {
        if (empty($this->db_control) || empty($option_name))
        {
            echo "Error: tb_db->get_tb_options_by_option_name() necessary params is null.";
            exit;
        }

        $query = "select * from tb_options where option_name='$option_name'";

        $result = $this->db_control->do_sql_query($query);

        return $result;
    }

    function delete_tb_options($option_id)
    {
        if (empty($this->db_control) || empty($option_id))
        {
            echo "Error: tb_db->delete_tb_options() necessary params is null.";
            exit;
        }

        $query = "delete from tb_options where option_id='$option_id'";

        $result = $this->db_control->do_sql_query_without_result($query);

        return $result;
    }
}

?>
