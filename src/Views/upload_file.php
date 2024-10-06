<!-- View: file_upload.php
<form action="/upload" method="POST" enctype="multipart/form-data">
    <label for="file">Choose a file to upload:</label>
    <input type="file" name="file" id="file" required>
    <input type="submit" value="Upload File">
</form> -->
<?php use src\Helpers\UrlHelper; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
     <!-- Link to the CSS file 
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">-->
    <!-- app/Views/users/index.php -->

<link rel="stylesheet" href="<?php echo UrlHelper::asset('css/style.css'); ?>">
<link rel="stylesheet" href="<?php echo UrlHelper::asset('css/bootstrap.min.css'); ?>">

</head>
<body>

<!-- Display status message 

<div class="col-xs-12 p-3">
    <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
</div>-->


<div class="row p-3">
    <!-- Import link -->
    <div class="col-md-12 head">
        <div class="float-end">
            <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import Excel</a>
        </div>
    </div>
    <!-- Excel file upload form -->
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

    <!-- Data list table --> 
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
        
            <tr>
                <td><?php echo 'id'; ?></td>
                <td><?php echo 'first_name'; ?></td>
                <td><?php echo 'last_name'; ?></td>
                <td><?php echo 'email'; ?></td>
                <td><?php echo 'phone'; ?></td>
                <td><?php echo 'status'; ?></td>
                <td><?php echo 'created'; ?></td>
            </tr>
         <!-- Link to the JS file
    <script src="/js/app.js"></script> -->
     <script src="<?php echo UrlHelper::asset('js/app.js'); ?>"></script>   
        </tbody>
    </table>
</div>

</body>
</html>    