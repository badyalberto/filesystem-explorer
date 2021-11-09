<?php

function moveToTrash()
{

    if (isset($_POST['currentNameInput'])) {
        $filePath = $_POST['filePath'];
        $trashPath = getcwd() . "/trash";
        rename($filePath, $trashPath . "/" . $_POST['currentNameInput']);

        // header("Location: ../index.php");
    }
};

moveToTrash();

// $oldName = $_POST['oldNameInput'];
// $splitOldName = explode("/", $oldName);
// $newName = $_POST['newName'];
// array_pop($splitOldName);
// $newName = implode("/", $splitOldName) . "/" . $newName;
