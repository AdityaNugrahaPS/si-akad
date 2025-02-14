<div id="uploadAlertContent" style="display: none;">
    <form id="uploadForm" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="fileInput" class="form-label">Upload file Excel Siswa</label>
            <input class="form-control" type="file" id="fileInput" name="fileInput">
        </div>
        <div class="mb-3">
            <a href="{{ asset('template/template-siswa.xlsx') }}" class="btn btn-info text-white" download>Template</a>
        </div>
    </form>
</div>
