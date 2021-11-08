$(document).ready(function () {
    $(".deleteFile").click(function (e) {
        let fileUrl = e.target.dataset.file;
        let splitUrl = fileUrl.split("/");
        console.log(fileUrl);
        document.querySelector("#currentNameInput").value = splitUrl[splitUrl.length - 1];
        document.querySelector("#filePath").value = fileUrl;
        console.log(fileUrl);
    })
});