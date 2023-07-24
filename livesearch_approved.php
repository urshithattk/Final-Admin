<?php
include("config.php");
// define("con", "config.php");

if(isset($_POST['input'])){
    $input=$_POST['input'];
    
    $query="SELECT * FROM approved_applications WHERE company LIKE '{$input}%'";
    
    $result=mysqli_query($con,$query);
    
    if(mysqli_num_rows($result)>0){?>


<div>
        <div class="container">
            <div class="row mt-5">
                <div class="col">
    
    <table class="table table-bordered text-center">
        <thead class="table table-bordered text-center">
            <tr class="bg-dark text-white">
                <td>ID</td>
                <td>Company Name</td>
                <td>Applied On</td>
                <td>Start Date</td>
                <td>End Date</td>
                <td>Type</td>
                <td>Class</td>
                <td>Approved On</td>
                <td>Comment</td>
                <td>Download</td>
            </tr>
        </thead>
        <tbody>
            <?php
           
                while($row=mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $company = $row['company'];
                    $applied_date = $row['applied_on'];
                    $start_date = $row['start_date'];
                    $end_date = $row['end_date'];
                    $type = $row['type'];
                    $class = $row['class'];
                    $approved_date = $row['approved_on'];
                    $comment = $row['comment'];
                
                    ?>
                    <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $company;?></td>
                        <td><?php echo $applied_date;?></td>
                        <td><?php echo $start_date;?></td>
                        <td><?php echo $end_date;?></td>
                        <td><?php echo $type;?></td>
                        <td><?php echo $class;?></td>
                        <td><?php echo $approved_date;?></td>
                        <td><?php echo $comment;?></td>
                        <td class="py-3 ">
                                    <div class="d-flex justify-content-center align-items-center">
                                    <a href="../../components/internshipLetter/index.php" class="btn btn-primary" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                    </svg></a>
                                    </div>
                        </td>
                        
                        <!--<td><a href="del.php" class="btn btn-danger">Delete</a></td> -->

                    </tr>
                   <?php
                }
            ?>
        </tbody>
    </table>
            </div>
            </div>
            </div>


<?php
    }else{
        echo "<h6 class='text-danger text-center mt-3'>No results found</h6>";
    }
}
?>