<?php 

if ($_REQUEST["action"])
{
    if ($_REQUEST["action"] == "add")
    {
        echo save_uploaded_image();
    }
    elseif ($_REQUEST["action"] == "delete")
    {
        del_uploaded_image();
    }
}

?>