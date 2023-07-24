<?php
include("config.php");
// define("con", "config.php");

if(isset($_POST['input'])){
    $input=$_POST['input'];
    
    $query="SELECT * FROM studentapplication WHERE company LIKE '{$input}%'";
    
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
            </tr>
        </thead>
        <tbody>
            <?php
           
                while($row=mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $company = $row['company'];
                    $applied_date = $row['applied_on'];
                    $start_date=$row['start_date'];
                    $end_date = $row['end_date'];
                    $type = $row['type'];
                    $class = $row['class'];

                
                    ?>
                    <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $company;?></td>
                        <td><?php echo $applied_date;?></td>
                        <td><?php echo $start_date;?></td>
                        <td><?php echo $end_date;?></td>
                        <td><?php echo $type;?></td>
                        <td><?php echo $class;?></td>

                        <!-- <td><a href="del.php" class="btn btn-danger">Delete</a></td> -->

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