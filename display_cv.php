<?php
    if(isset($_POST['submit'])){
        $file_name = $_FILES['pdf_file']['name'];
        $file_tmp = $_FILES['pdf_file']['tmp_name'];
        if(move_uploaded_file($file_tmp,"pdf/" . $file_name)){
            echo "File uploaded successfully";
        }else{
            echo "Error in uploading file.";
        }
    }
?><br>
<a href="pdf/<?php echo $file_name; ?>">Click To Download</a>