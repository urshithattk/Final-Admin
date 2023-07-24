<?php
 include('config.php'); 
//  include 'display_cv.php';
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">

  <style>
    body {
      background-color: #f8f9fa;
    }

    .container {
      max-width: 600px;
      margin-top: 50px;
    }

    .card {
      border-radius: 0;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .card-header {
      background-color: black;
      color: white;
      text-align: center;
      font-weight: bold;
    }

    .btn-register {
      border-radius: 0;
    }

    .table {
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h4 class="mb-0">Fill UserName and Upload PDF</h4>
      </div>
      <div class="card-body">
        <form action="display_cv.php" method="post" enctype="multipart/form-data">
          <?php
          // If submit button is clicked
          if (isset($_POST['submit'])) {
            // get name from the form when submitted
            $name = $_POST['name'];

            if (isset($_FILES['pdf_file']['name'])) {
              // If the ‘pdf_file’ field has an attachment
              $file_name = $_FILES['pdf_file']['name'];
              $file_tmp = $_FILES['pdf_file']['tmp_name'];
              $file_path = "./pdf/" . $file_name; // Full path to the uploaded file

              // Move the uploaded pdf file into the pdf folder
              move_uploaded_file($file_tmp, $file_path);
              // Insert the submitted data from the form into the table
              
              $insertquery = "INSERT INTO pdf_data (username, filename, file_path) VALUES ('$name', '$file_name', '$file_path')";

              // Execute insert query
              $iquery = mysqli_query($con, $insertquery);

              if ($iquery) {
          ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> Data submitted successfully.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php
              } else {
              ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Failed!</strong> Try Again!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php
              }
            } else {
              ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed!</strong> File must be uploaded in PDF format!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            } // end if
          } // end if

            ?>

          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
          </div>

          <div class="mb-3">
            <label for="pdf_file" class="form-label">PDF File</label>
            <input type="file" class="form-control" id="pdf_file" name="pdf_file" accept=".pdf" required>
          </div>

          <button type="submit" class="btn btn-primary btn-register" name="submit">Submit</button>

        </form>

        

      </div>
    </div><br>
    <a href="display_cv.php"><button type="submit" class="btn btn-primary btn-register" name="submit">Download</button></a>

    
    <div class="table-responsive">
      <table class="table mt-4">
        <thead>
          <tr>
            <th>ID</th>
            <th>UserName</th>
            <th>FileName</th>
            <th>Download</th>

          </tr>
        </thead>
        <tbody>
          <?php
          $selectQuery = "SELECT * FROM pdf_data";
          $squery = mysqli_query($con, $selectQuery);

          while (($result = mysqli_fetch_assoc($squery))) {
          ?>
            <tr>
              <td><?php echo $result['id']; ?></td>
              <td><?php echo $result['username']; ?></td>
              <td><?php echo $result['filename']; ?></td>
              <td><a href="display_cv.php">Download</a></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>

    
  <!-- <?php
  if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    $sql = "SELECT * FROM pdf_data WHERE id=$id";

    $result = mysqli_query($con, $sql);

    $file = mysqli_fetch_assoc($result);

    $filepath = 'pdf/' . $file['filename']; // Use the correct column name 'filename' here

    if (file_exists($filepath)) {
      header('Content-Type: application/octet-stream');
      header('Content-Description: File Transfer');
      header('Content-Disposition: attachment; filename=' . basename($filepath)); // Fix 'Content-Disposition' spelling
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize('pdf/' . $file['filename'])); // Use the correct column name 'filename' here

      readfile('pdf/' . $file['filename']); // Use the correct column name 'filename' here
    }
  }
  ?> -->




   
    <?php 
    $sql = "SELECT * FROM pdf_data ";
    $result = $con->query($sql);
    $con->close();

    ?>




















<?php

if(isset($_GET['file_id'])){
  $id=$_GET['file_id'];

  $sql="SELECT * FROM pdf_data WHERE id=$id";

  $result=mysqli_query($con,$sql);

  $file = mysqli_fetch_assoc($result);

  $filepath='pdf/'. $file['name'];

  if(file_exists($filepath)){
    header('Content-Type: application/octet-stream');

    header('Content-Description: File Transfer');

    header('Content-Deposition: attachment; filename='.basename($filepath));

    header ('Expires: 0');

    header('Cache-Control: must-revalidate');
    header('Programa:public');

    header('Content-Length:' .filesize('pdf/'.$file['name']));

    readfile('pdf/'.$file['name']);
  }
}

?>


  </div>



















  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
