<?php

/* function showFoldersFile($path = '/')
{
$arrayTree = [];
$server_root = getcwd() . '/modules/uploads' . $path;

$tree = scandir($server_root);
for ($i = 2; $i < count($tree); $i++) {
$infoFile = pathinfo($tree[$i]);
$cretionDate = date("d/m/Y", filectime($server_root . "/" . $tree[$i]));
$editDate = date("d/m/Y", filemtime($server_root . "/" . $tree[$i]));
$name = $infoFile['basename'];
$type = 'folder';
$sizebytes = filesize($server_root . "/" . $tree[$i]);
$size = formatBytes($sizebytes, 2);

if (count($infoFile) === 4) {
$type = $infoFile['extension'];
}

$json = json_encode(array('url' => $server_root . $name, 'name' => $name, 'creationDate' => $cretionDate, 'editDate' => $editDate, 'icon' => "./assets/img/icons/" . $type . ".svg", 'size' => $size));
array_push($arrayTree, $json);
}

return $arrayTree;
} */

function search($path = '/', $search = '')
{

    if (isset($_REQUEST['search'])) {
        $search = $_REQUEST['search'];
    }

    //using the opendir function
    $dir_handle = opendir($path) or die("Unable to open $path");

    //Leave only the lastest folder name
    $array = explode("/", $path);

    while (false !== ($file = readdir($dir_handle))) {
        if ($file != "." && $file != "..") {
            echo $file;
            if (is_dir($path . "/" . $file)) {
                //Display a list of sub folders.
                search($path . "/" . $file, $search);
            } else {

            }
        }
    }

    //closing the directory
    closedir($dir_handle);
}

search();
