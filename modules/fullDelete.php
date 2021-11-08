<?php
function fullDelete()
{
    if (isset($_POST['currentNameInput'])) {
        $trashPath = getcwd();
        $filename = $trashPath.'/trash/'.substr($_POST['currentNameInput'], 5); 
        unlink($filename );
    }
    
    header("Location: ../index.php?trash");
}

fullDelete();
