
<!DOCTYPE html>
<html>
<head>
    <title>Bug Report Submission</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <h1>Bug Report Submission</h1>
        <form method="post" action="./submit_report.php" onsubmit="return validateForm();" enctype="multipart/form-data">
            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>
            <label for="file">Choose a PDF file:</label>
            <input type="file" id="file" name="file" accept=".pdf" required>
            <input type="submit" value="Upload">
        </form>
        <div id="error-message" style="color: red;"></div>

    </div>
    <script>
        function validateForm() {
            var fileInput = document.getElementById('file');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.pdf)$/i;
            if (!allowedExtensions.exec(filePath)) {
                document.getElementById('error-message').innerHTML = 'Please select a PDF file';
                return false;
            } else {
                document.getElementById('error-message').innerHTML = '';
                return true;
            }
        }
    </script>
</body>
</html>
