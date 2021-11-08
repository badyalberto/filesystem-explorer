<?php
require_once './modules/Utils.php';
require_once './modules/showFoldersFile.php';
require_once './modules/printFoldersFile.php';
$tree = showFoldersFile();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./node_modules/jstree/dist/themes/default/style.min.css" />
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/jstree/dist/jstree.min.js"></script>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script
      src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"
      defer
    ></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/rr-1.2.8/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/rr-1.2.8/datatables.min.js"></script>
<script src="./assets/js/datatable.js" defer></script>
  </head>
<body>
  <header class="d-flex justify-content-center py-4">
    <div class="header-logo">Logo</div>
    <div>
      <form>
        <label>Search</label>
        <input type="text" />
      </form>
    </div>
  </header>
    <main class="d-flex">
      <aside class="w-25" id="tree">
        <!-- <ul>
          <li>Root</li>
          <li>Folder 1</li>
          <li>Folder 2</li>
        </ul> -->
        <?php ListFolder(getcwd() . "/modules/uploads/");?>
      </aside>
      <article class="w-75">
        <div class="d-flex justify-content-between">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Library</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
          </nav>
          <div class="me-3 d-flex justify-content-around general-button-container">
            <button class="general-button" ><img class="general-button-img" src="./assets/img/icons/create.svg" alt="" srcset="" /></button>
            <!-- <button class="general-button" ><img class="general-button-img" src="./assets/img/icons/upload.svg" alt="" srcset="" /></button> --><form method="post" action="modules/uploadFile.php" enctype="multipart/form-data">
            <input type ="file" name="file" class="general-button" onchange="form.submit()"><img class="general-button-img" src="./assets/img/icons/upload.svg" alt="" srcset="" /></input>
            <input type ="submit" value="Upload" class="d-none"></input>
            </form>
          </div>
        </div>
        <table class="w-100 text-center" id="table">
          <thead>
            <tr>
              <th>File img</th>
              <th>File name</th>
              <th>Creation</th>
              <th>Last modification</th>
              <th>Extension</th>
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


<div class="modal" tabindex="-1" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create a new folder</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="mb-3">
            <label for="folder-name" class="col-form-label">Name for your new folder:</label>
            <input type="text" class="form-control" name="folder-name" id="folder-name">
          </div>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" value="Create folder" name="create-folder-btn" class="btn btn-primary">
        </form>
      </div>
      <?php
if (isset($_POST["create-folder-btn"])) {
    $path = getcwd();
    $folderName = $_POST["folder-name"];
    mkdir("$path/modules/uploads/$folderName", 0777);
}
;
?>
      </div>
  </div>
</div>