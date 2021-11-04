<?php

function showFoldersFile($path = '/')
{
    $arrayTree = [];
    
    $server_root = getcwd(). '/modules/uploads' . $path;

    $tree = scandir($server_root);

    for ($i = 2; $i < count($tree); $i++) {
        $infoFile = pathinfo($tree[$i]);
        $cretionDate = date("d/m/Y", filectime($server_root . $tree[$i]));
        $editDate = date("d/m/Y", filemtime($server_root . $tree[$i]));
        $name = $infoFile['basename'];
        $type = 'folder';

        if (count($infoFile) === 4) {
            $type = $infoFile['extension'];
        }

        $json = json_encode(array('url' => $path,'type' => $type, 'name' => $name, 'creationDate' => $cretionDate, 'editDate' => $editDate, 'icon' => "./assets/img/icons/" . $type . ".svg", ));
        array_push($arrayTree, $json);
    }

    return $arrayTree;

}

