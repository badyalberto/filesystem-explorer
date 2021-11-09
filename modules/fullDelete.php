<?php
function fullDelete()
{
    if (isset($_POST['currentNameInput'])) {
        $trashPath = getcwd();
        $filename = $trashPath.'/trash/'.$_POST['currentNameInput']; 
        unlink($filename);
    }
    
    header("Location: ../index.php?trash");
}

fullDelete();
