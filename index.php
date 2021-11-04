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
        <?php showFiles(getcwd() . "/modules/uploads/");?>
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
            <button class="general-button" ><img class="general-button-img" src="./assets/img/icons/upload.svg" alt="" srcset="" /></button>
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
