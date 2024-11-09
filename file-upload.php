<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP File Upload</title>
</head>
<body>
  <form method="post" enctype="multipart/form-data" action="upload.php">
      Select File to upload: <input type="file" name="uploads[]" multiple>
      <section>
        <button type="submit">Upload</button>
        <button type="reset">Clear</button>
      </section>
  </form>
</body>
</html>