<?php

function showFoldersFile($path = '/')
{
    $arrayTree = [];
    $server_root = getcwd() . '/modules/uploads' . $path;

    $tree = scandir($server_root);
    // var_dump($tree);
    for ($i = 2; $i < count($tree); $i++) {
        $infoFile = pathinfo($tree[$i]);
        $cretionDate = date("d/m/Y", filectime($server_root . $tree[$i]));
        $editDate = date("d/m/Y", filemtime($server_root . $tree[$i]));
        $name = $infoFile['basename'];
        $type = 'folder';

        if (count($infoFile) === 4) {
            $type = $infoFile['extension'];
        }

        //$json = json_encode(array('url' => $path,'type' => $type, 'name' => $name, 'creationDate' => $cretionDate, 'editDate' => $editDate, 'icon' => "./assets/img/icons/" . $type . ".svg", ));
        $json = json_encode(array('url' => $server_root . $name, 'type' => $type, 'name' => $name, 'creationDate' => $cretionDate, 'editDate' => $editDate, 'icon' => "./assets/img/icons/" . $type . ".svg",));
        array_push($arrayTree, $json);
    }

    return $arrayTree;
}

function printFolders($tree)
{
    // echo "<pre>";
    // echo print_r($tree);

    $html = '';
    for ($i = 0; $i < count($tree); $i++) {
        $html = $html . '<tr>';
        $file = json_decode($tree[$i]);
        foreach ($file as $key => $value) {
            //$url = '';
            if ($key === 'url') {
                //echo  $value."<br>";
                $url = $value;
                //echo $url."<br>";
            }
            if ($key === 'icon') {
                $html = $html . "<td><img class='type-icon' src='$value' /></td>";
            } else {
                if ($key !== 'url') {
                    if ($key === 'name') {
                        //$value . "<br>";
                        // $explodeUrl=explode($url);
                        $html = $html . "<td><a href='$url'>$value</a></td>";
                        $oldName = $value;
                    } else {
                        $html = $html . "<td>$value</td>";
                    }
                }
            }
        }
        $html = $html . "<td>
           <span data-file='{$url}' data-bs-toggle='modal' data-bs-target='#renameModal' data-oldname='{$oldName}'><img data-file='{$url}' class='actions-button editFile' src='./assets/img/icons/edit.svg'/></span>
           <span data-file='{$url}'><img class='actions-button deleteFile' data-file='{$url}' src='./assets/img/icons/delete.svg'/></span>
         </td></tr>";
    }

    return $html;
}
