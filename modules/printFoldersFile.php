<?php

require_once './modules/showFoldersFile.php';
/* 
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
                       //echo $url . "<br>";
                        $html = $html . "<td><a href='showFoldersFile($url)'>$value</a></td>";
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
 */