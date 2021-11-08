$(document).ready(function () {
  $("#table").DataTable({
    columnDefs: [
      { orderable: false, targets: 3 },
      { orderable: false, targets: 4 },
      { orderable: false, targets: 5 },
    ],
  });
  $("#tree").jstree();
});
