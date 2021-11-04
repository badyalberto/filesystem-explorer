<?php

function showFoldersFile($path = '/')
{
    $arrayTree = [];
    $server_root = $_SERVER['DOCUMENT_ROOT'] . '/filesystem-explorer/modules/uploads' . $path;

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

        $json = json_encode(array('url' => $server_root.$name,'type' => $type, 'name' => $name, 'creationDate' => $cretionDate, 'editDate' => $editDate, 'icon' => "./assets/img/icons/" . $type . ".svg", ));
        array_push($arrayTree, $json);
    }

    return $arrayTree;

}

function printFolders($tree)
{
    /* echo "<pre>";
    echo print_r($tree); */

    $html = '';
    for ($i = 0; $i < count($tree); $i++) {
        $html = $html . '<tr>';

        $file = json_decode($tree[$i]);
        foreach ($file as $key => $value) {
            $url = '';
            if($key === 'url'){
                //echo  $value."<br>";
                $url = $value;
                //echo $url."<br>";
            }
            if ($key === 'icon') {
                $html = $html . "<td><img class='type-icon' src='$value' /></td>";
            } else {
                if ($key !== 'url') {
                    if ($key === 'name') {
                        //echo  $value."<br>";
                        $html = $html . "<td><a href='$url'>$value</a></td>";
                    } else {
                        $html = $html . "<td>$value</td>";
                    }

                }

            }
        }
        $html = $html . "<td>
           <span><img class='actions-button' src='./assets/img/icons/edit.svg'  /></span>
           <span><img class='actions-button' src='./assets/img/icons/delete.svg'  /></span>
         </td></tr>";
    }

    return $html;
}
