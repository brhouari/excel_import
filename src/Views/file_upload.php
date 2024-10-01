<!-- View: file_upload.php
<form action="/upload" method="POST" enctype="multipart/form-data">
    <label for="file">Choose a file to upload:</label>
    <input type="file" name="file" id="file" required>
    <input type="submit" value="Upload File">
</form> -->
<div class="col-md-12" id="importFrm" style="display: none;">
        <form class="row g-3" action="/upload" method="POST" enctype="multipart/form-data">
            <div class="col-auto">
                <label for="fileInput" class="visually-hidden">File</label>
                <input type="file" class="form-control" name="file" id="fileInput" />
            </div>
            <div class="col-auto">
                <input type="submit" class="btn btn-primary mb-3" name="importSubmit" value="Import">
            </div>
        </form>
    </div>