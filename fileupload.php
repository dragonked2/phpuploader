<!DOCTYPE html>
<html>
<head>
    <title>Simple File Uploader</title>
</head>
<body>

<?php
$uploadDirectory = 'uploads/'; // Directory where uploaded files will be stored

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];

        // File properties
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        // Check for errors
        if ($fileError === UPLOAD_ERR_OK) {
            // Move the uploaded file to the desired location
            if (move_uploaded_file($fileTmpName, $uploadDirectory . $fileName)) {
                echo "File uploaded successfully!";
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Error: " . $fileError;
        }
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file" />
    <input type="submit" value="Upload" />
</form>

</body>
</html>
