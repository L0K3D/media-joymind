<div id="mediaModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-full-width modal-dialog-top">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Media Library</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <ul class="nav nav-tabs px-3 pt-3" id="mediaTabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="upload-tab" data-bs-toggle="tab" href="#upload">Upload</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="library-tab" data-bs-toggle="tab" href="#library">Current Media</a>
                    </li>
                </ul>
                <div class="tab-content" style="height: 700px;">
                    <div id="upload" class="tab-pane fade show active p-3 h-100 overflow-auto">
                        <input type="file" id="file-upload" class="form-control my-3">
                        <button id="upload-btn" class="btn btn-success">Upload</button>
                        <div class="progress mt-3 d-none" id="upload-progress">
                            <div id="upload-progress-bar" class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 0%"></div>
                        </div>
                    </div>
                    <div id="library" class="tab-pane fade p-0 h-100 overflow-auto">
                        <div class="row m-0 h-100">
                            <div class="col-10 h-100 overflow-auto">
                                <div id="media-gallery" class="media-grid p-3">
                                    <!-- Files will be loaded here via AJAX -->
                                </div>
                            </div>
                            <div class="col-2 p-2 border-start h-100 overflow-auto">
                                <button id="select-media" class="btn btn-sm btn-primary" disabled>Select</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
