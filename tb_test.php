<?php
/*
    create by weiganyi on 20131126
*/

define('ROOTPATH', dirname(__FILE__).'/');

require_once("./module/tb_db.php");

$g_db = new tb_db();

$user_id = 1;
$category_id = 1;
$post_date = date("Y-m-d h:i:s");
$post_modified = date("Y-m-d h:i:s");
$post_title = "test";
$post_content = "hello world";
$read_number = 5;
$comment_number = 3;
$post_array = array("user_id"=>"$user_id", 
                    "category_id"=>"$category_id", 
                    "post_date"=>"$post_date", 
                    "post_modified"=>"$post_modified", 
                    "post_title"=>"$post_title", 
                    "post_content"=>"$post_content", 
                    "read_number"=>"$read_number", 
                    "comment_number"=>"$comment_number");

$g_db->insert_tb_posts($post_array);

$g_db->get_tb_posts($user_id);

$g_db->delete_tb_posts($user_id);

?>
