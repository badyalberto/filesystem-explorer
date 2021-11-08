<?php
require_once './modules/Utils.php';
require_once './modules/showFoldersFile.php';
require_once './modules/breadcrumbs.php';

if (!isset($_GET['folder'])) {
    $tree = showFoldersFile();
} else {
    $tree = showFoldersFile($_GET['folder']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>File System PHP</title>
  <link rel="stylesheet" href="./assets/css/style.css" />
  <link rel="stylesheet" href="./node_modules/jstree/dist/themes/default/style.min.css" />
  <script src="./node_modules/jquery/dist/jquery.min.js"></script>
  <script src="./node_modules/jstree/dist/jstree.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous" defer></script>
  <script src="./assets/js/functions.js" defer></script>
  <script src="./assets/js/deleteFile.js" defer></script>
  <script src="./assets/js/editFile.js" defer></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/rr-1.2.8/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/rr-1.2.8/datatables.min.js"></script>
  <script src="./assets/js/datatable.js" defer></script>
</head>

<body>
  <header class="d-flex py-4">
    <div class="w-25">
      <img src="./assets/img/icons/logo.svg" alt="" class="w-25"> <span class="text-logo">File System</span>
    </div>
    <div>
      <form method="GET" action="./modules/search.php">
      <label>Search</label>
          <input type="text" name="search"/>
          <input type="submit" value="Search">
        </form>

    </div>
  </header>
    <main class="d-flex">
      <aside class="w-25" id="tree">
        <?php ListFolder(getcwd() . "/modules/uploads/");?>
      </aside>
      <article class="w-75">
        <div class="d-flex justify-content-between">
          <nav aria-label="breadcrumb">
            <?php breadcrumbs();?>
          </nav>
          <div class="me-3 d-flex justify-content-around general-button-container">
            <button class="general-button" data-bs-toggle="modal" data-bs-target="#myModal" ><img class="general-button-img" src="./assets/img/icons/create.svg" alt="" srcset="" /></button>
            <!-- <button class="general-button" ><img class="general-button-img" src="./assets/img/icons/upload.svg" alt="" srcset="" /></button> -->
            <form method="post" action="modules/uploadFile.php?folder=<?=isset($_GET['folder']) ? $_GET['folder'] : ""?>" enctype="multipart/form-data">
            <input type ="file" name="file" class="general-button" onchange="form.submit()"><img class="general-button-img" src="./assets/img/icons/upload.svg" alt="" srcset="" /></input>
            <input type ="submit" value="Upload" class="d-none"></input>
            </form>
          </div>
        </div>
        <table class="w-100 text-center" id="table">
          <thead>
            <tr>
              <th class="th-width">File name</th>
              <th>Creation</th>
              <th>Last modification</th>
              <th>Extension</th>
              <th>Size</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php echo printFolders($tree) ?>
          </tbody>
        </table>
      </article>
    </main>
  </body>
</html>

<!-- CREATE NEW FOLDER -->
<div class="modal" tabindex="-1" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create a new folder</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="modules/createFolder.php?<?=isset($_GET['folder']) ? 'folder=' . $_GET['folder'] : ""?>">
          <div class="mb-3">
            <label for="folder-name" class="col-form-label">Name for your new folder:</label>
            <input type="text" class="form-control" name="folder-name" id="folder-name">
          </div>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" value="Create folder" name="create-folder-btn" class="btn btn-primary">
        </form>
      </div>
      <?php
/* if (isset($_POST["create-folder-btn"])) {
$path = getcwd();
$folderName = $_POST["folder-name"];
mkdir("$path/modules/uploads/$folderName", 0777);
} */
;
?>
    </div>
  </div>
</div>
<!-- FIN CREATE NEW FOLDER -->

<!-- RENAME FOLDER OR FILE -->
<div class="modal" id="renameModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Rename File</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="modules/editFile.php">
        <div class="modal-body">
          <input id="oldNameInput" name="oldNameInput" hidden></input>
          <input id="newName" name="newName" placeholder="input your desired name here"></input>
        </div>
        <div class="modal-footer">
          <button id="save-btn" type="submit" class="btn btn-primary">Save changes</button>
      </form>
    </div>
  </div>
</div>
</div>
<!-- FIN RENAME FOLDER OR FILE -->