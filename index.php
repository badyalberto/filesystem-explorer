<?php
//require_once './modules/Utils.php';
require_once './modules/showFoldersFile.php';
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous" defer></script>
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
    <aside class="w-25">
      <ul>
        <li>Root</li>
        <li>Folder 1</li>
        <li>Folder 2</li>
      </ul>
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
          <button class="general-button" data-bs-toggle="modal" data-bs-target="#myModal"><img class="general-button-img" src="./assets/img/icons/create.svg" alt="" srcset="" /></button>
          <button class="general-button"><img class="general-button-img" src="./assets/img/icons/upload.svg" alt="" srcset="" /></button>
        </div>
      </div>
      <table class="w-100 text-center">
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
            <?php echo printFolders($tree)?>
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
            $folderName = $_POST["folder-name"]; ;
            mkdir("$path/modules/uploads/$folderName", 0777);
          };
        ?>

    </div>
  </div>
</div>