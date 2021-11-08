<?php

function createFolder()
{
    if (isset($_POST["create-folder-btn"])) {
        $path = getcwd();
        $folderName = $_POST["folder-name"];

        if (isset($_GET['folder'])) {
            $currentFolder = $_REQUEST["folder"];
            mkdir("$path/uploads$currentFolder/$folderName", 0777);
        } else {
            mkdir("$path/uploads/$folderName", 0777);
        }

    }
    $redirect = '../index.php?folder='.$currentFolder;
    header("Location: $redirect");
}

createFolder();
