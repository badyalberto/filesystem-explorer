<?php

function getIcon($type)
{
    
    switch ($type) {
        case 'doc':
            return "./assets/img/icons/doc.svg";
        case 'csv':
            return "./assets/img/icons/csv.svg";
        case 'jpg':
            return "./assets/img/icons/jpg.svg";
        case 'png':
            return "./assets/img/icons/png.svg";
        case 'txt':
            return "./assets/img/icons/txt.svg";
        case 'ppt':
            return "./assets/img/icons/ppt.svg";
        case 'odt':
            return "./assets/img/icons/odt.svg";
        case 'pdf':
            return "./assets/img/icons/pdf.svg";
        case 'zip':
            return "./assets/img/icons/zip.svg";
        case 'rar':
            return "./assets/img/icons/rar.svg";
        case 'exe':
            return "./assets/img/icons/exe.svg";
        case 'svg':
            return "./assets/img/icons/svg.svg";
        case 'mp3':
            return "./assets/img/icons/mp3.svg";
        case 'mp4':
            return "./assets/img/icons/mp4.svg";
        default:
            # code...
            break;
    }
}

function showFiles($path){
    $dir = opendir($path);
    $files = array();
    $html = '<ul>';

    while ($current = readdir($dir)){
        if( $current != "." && $current != "..") {
            echo $current;
            if(is_dir($path.$current)) {
                $cont = strlen(getcwd()."/modules/uploads/");
                $rest = substr($path.$current, $cont);
                $html = $html."<li>$rest</li>";
                showFiles($path.$current.'/',$html);
            }
            else {
                $cont = strlen(getcwd()."/modules/uploads/");
                $rest = substr($path.$current, $cont);
                $ext = substr($path.$current, -3,3);
                echo "./assets/img/icons/".$ext.".svg";
                $var = "./assets/img/icons/".$ext.".svg";
                //echo $rest;
                $html = $html."<li data-jstree='{\"icon\":\"$var\"}'>".$rest."</li>";
                $files[] = $current;
            }
        }
    }
    /* echo '<h6>'.$path.'</h6>';
    echo '<ul>';
    for($i=0; $i<count( $files ); $i++){
        echo '<li>'.$files[$i]."</li>";
    } */
    $html = $html.'</ul>';
    echo $html;
}
