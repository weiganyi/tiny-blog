<?php
/*
    create by weiganyi on 20131206
*/

class tb_cache
{
    var $cache_data = array();

    function set_cache($flag, $data)
    {
        if (empty($flag) || empty($data))
        {
            echo "Error: tb_cache->set_cache() necessary params is null.";
            exit;
        }

        $this->cache_data[$flag] = $data;
    }

    function get_cache($flag, $fn)
    {
        if (empty($flag))
        {
            echo "Error: tb_cache->get_cache() necessary params is null.";
            exit;
        }

        if (isset($this->cache_data[$flag]))
        {
            return $this->cache_data[$flag];
        }
        else
        {
            if (!empty($fn))
            {
                //invoke the callback function $fn
                $data = call_user_func_array($fn, array());
                if (!empty($data))
                {
                    //store the data into the cache
                    $this->set_cache($flag, $data);
                    return $data;
                }
            }

            return NULL;
        }
    }
}

?>
