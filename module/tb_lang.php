<?php
/*
    create by weiganyi on 20131128
*/

function get_language()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_language() necessary params is null.";
        exit;
    }

    $result = $g_db->get_tb_options("language");
    if (!empty($result["num"]) && !empty($result["row"]) && $result["num"]==1)
    {
        $row = $result["row"];
        $lang = $row[2];
    }
    else
    {
        $lang = "en";
    }

    return $lang;
}

?>
