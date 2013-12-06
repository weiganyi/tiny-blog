<?php
/*
    create by weiganyi on 20131203
*/

function get_language()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_language() necessary params is null.";
        exit;
    }

    $lang = "en";

    $result = $g_db->get_tb_options_by_option_name("language");
    if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
    {
        $rows = $result["rows"];
        //the column 2 is option_value
        $lang = $rows[0][2];
    }

    return $lang;
}

?>
