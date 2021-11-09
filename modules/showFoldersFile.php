<?php

// function showTrashFolder()
// {
//     $trashPath = getcwd() . "/trash";
//     $trashContent = scandir($trashPath);
//     for ($i = 2; $i < count($trashContent); $i++) {
//         $infoFile = pathinfo($trashContent[$i]);
//         $creationDate = date("d/m/Y", filectime($trashPath . "/" . $trashContent[$i]));
//         $editDate = date("d/m/Y", filemtime($trashPath . "/" . $trashContent[$i]));
//         $name = $infoFile['basename'];
//         $type = 'folder';
//         $sizebytes = filesize($trashPath . "/" . $trashContent[$i]);
//         $size = formatBytes($sizebytes, 2);
//     }

//     if (count($infoFile) === 4) {
//         $type = $infoFile['extension'];
//     }

//     $json = json_encode(array('url' => $server_root . $name, 'name' => $name, 'creationDate' => $cretionDate, 'editDate' => $editDate, 'icon' => "./assets/img/icons/" . $type . ".svg", 'size' => $size));
//     array_push($arrayTree, $json);
// }

// return $arrayTree;

// }

function showFoldersFile($path = '/')
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
}

function printFolders($tree)
{
    $html = '';
    for ($i = 0; $i < count($tree); $i++) {
        $html = $html . '<tr>'; 
        $file = json_decode($tree[$i]);
        foreach ($file as $key => $value) {
            if ($key === 'url') {
                $url = $value;
            }
            if ($key === 'icon') {
                $html = $html . "<td><img class='type-icon' src='$value' /></td>";
            } else {
                if ($key !== 'url') {
                    if ($key === 'name') {
                        //$value . "<br>";
                        $explodeUrl = explode(".", $value);
                        $path = '/';

                        if (isset($_GET['folder'])) {
                            $path = $_GET['folder'] . '/' . $value;
                        } else {
                            $path = $path . $value;
                        }

                        if (isset($explodeUrl[1])) {
                            $html = $html . "<td><a href='/filesystem-explorer/modules/uploads$path'>$value</a></td>";
                        } else {
                            $html = $html . "<td><a href='/filesystem-explorer/index.php?folder=$path'>$value</a></td>";
                        }

                        $oldName = $value;
                    } else {
                        $html = $html . "<td>$value</td>";
                    }
                }
            }
        }

        $html = $html . "<td>
           <span data-file='$url' data-bs-toggle='modal' data-bs-target='#renameModal' data-oldname='{$oldName}'><img data-file='{$url}' class='actions-button editFile' src='./assets/img/icons/edit.svg'/></span>
           <span data-file='$url' data-bs-toggle='modal' data-bs-target='#deleteModal' data-oldname='{$oldName}'><img class='actions-button deleteFile' data-file='{$url}' src='./assets/img/icons/delete.svg'/></span>
         </td></tr>";
    }

    return $html;
}

function formatBytes($size, $precision = 2)
{
    $base = log($size, 1024);
    $suffixes = array('b', 'Kb', 'Mb', 'Gb', 'Tb');
    $result = round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];

    if (!is_nan(round(pow(1024, $base - floor($base)), $precision))) {
        return $result;
    } else {
        return "";
    }
}
