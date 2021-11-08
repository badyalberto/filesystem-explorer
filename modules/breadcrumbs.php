<?php

function breadcrumbs()
{
    $html = '<ol class="breadcrumb">';
    $html = $html.'<li class="breadcrumb-item"><a href="/filesystem-explorer/">root</a></li>';
    if (isset($_GET['folder'])) {
        $folders = explode('/', $_GET['folder']);
        $adUrlFolder = "/filesystem-explorer/index.php?folder=";
        for ($i=1; $i < count($folders); $i++) {
            $adUrlFolder = $adUrlFolder."/".$folders[$i];
            $html = $html.'<li class="breadcrumb-item"><a href="'.$adUrlFolder.'">'.$folders[$i].'</a></li>';
        }
    }
    $html = $html.'</ol>';
    echo $html;
}
