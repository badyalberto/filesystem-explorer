$(document).ready(function () {
    $(".deleteFile").click(function (e) {
        let fileUrl = e.target.dataset.file;

        $.ajax({

            url: "../../filesystem-explorer/modules/deleteFile.php",
            type: "post",
            data: {
                filePath: fileUrl
            },
            success: function (response) {
                console.log(response);
                //window.location.reload();
            },
            error: function () {
                alert('There was some error performing the AJAX call!');
            }
        });
    })
})