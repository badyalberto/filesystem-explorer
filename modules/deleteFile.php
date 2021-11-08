<?php

function deleteFile()
{
    if (isset($_POST['filePath'])) {

        if (!is_dir($_POST["filePath"])) {
            unlink($_POST["filePath"]);
        } else {
            rmdir($_POST["filePath"]);
        }
        // echo $_POST["filePath"];
        // header("Location: ../index.php");
        $person = array(
            "url" => $_POST["filePath"],
            "name" => "hello"
        );
        $json = json_encode($person);
        return $json;
    }
}

deleteFile();
