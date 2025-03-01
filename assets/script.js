document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".media-picker").forEach(button => {
        button.addEventListener("click", function () {
            let instanceId = this.getAttribute("data-instance");
            let inputId = this.getAttribute("data-input");

            let modal = new bootstrap.Modal(document.getElementById("mediaModal"));
            modal.show();

            document.getElementById("select-media").onclick = function () {
                let selectedFile = document.getElementById("preview-url").value;
                document.getElementById(inputId).value = selectedFile;
                modal.hide();
            };
        });
    });

    document.getElementById("upload-btn").addEventListener("click", function () {
        let fileInput = document.getElementById("file-upload");
        if (fileInput.files.length === 0) return;

        let formData = new FormData();
        formData.append("file", fileInput.files[0]);

        fetch("/libs/media-joymind/upload.php", {
            method: "POST",
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("File uploaded successfully!");
            } else {
                alert("Error: " + data.error);
            }
        });
    });
});
