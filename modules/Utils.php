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