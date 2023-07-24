<?php
include("config.php");
// define("con", "config.php");

if(isset($_POST['input'])){
    $input=$_POST['input'];
    
    $query="SELECT * FROM active WHERE company LIKE '{$input}%'";

    // $query="SELECT * FROM active WHERE company LIKE '{$input}%'";

    
    $result=mysqli_query($con,$query);
    
    if(mysqli_num_rows($result)>0){?>


<div>
        <div class="container">
            <div class="row mt-5">
                <div class="col">
    
    <table class="table table-bordered text-center">
        <thead class="table table-bordered text-center">
            <tr class="bg-dark text-white">
                <th>Id</th>
                <th>Company</th>
                <th>Student Name</th>
                <th>End Date</th>
                <th>Year of Study</th>
                <th>Branch</th>
                <!-- <td>Delete</td> -->



            </tr>
        </thead>
        <tbody>
            <?php
           
                while($row=mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $company = $row['company'];
                    $sname = $row['student_name'];
                    $date = $row['end_date'];
                    $yr = $row['year'];
                    $dept = $row['branch'];
                
                    ?>
                    <tr>
                        <td><?php echo $id;?></td>
                        <td> <a href=""style="color:black;text-decoration:none;"><?php echo $row['company']; ?></a></td>
                        <td><?php echo $sname;?></td>
                        <td><?php echo $date;?></td>
                        <td><?php echo $yr;?></td>
                        <td><?php echo $dept;?></td>
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