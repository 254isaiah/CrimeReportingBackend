<?php
session_start();
include('includes/header.php');

?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h4>Missing People:
                        <?php
                            include('dbconfig.php');
                            $ref_table = 'Report_Missing';
                            $total_count = $reference = $database->getReference($ref_table)->getSnapshot()->numChildren();
                            echo $total_count;
                        ?>
                    </h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <?php
            if(isset($_SESSION['status']))
            {
                echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
                unset($_SESSION['status']);
            }
            ?>
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Missing Persons Dashboard
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="datatableid" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Image</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Reported</th>
                                    <th>BirthCert No</th>
                                    <th>Description</th>
                                    <th>Contact</th>
                                    <th>Residence</th>
                                    <th>Details</th>
                                    <th>Delete</th>
                                    <th>Edit</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include('dbconfig.php');

                                    $ref_table = "Report_Missing";
                                    $fetchdata = $database->getReference($ref_table)->getValue();

                                    if ($fetchdata > 0) 
                                    {
                                        $i=1;
                                        foreach($fetchdata as $key => $row)
                                        {
                                            ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $row['names']; ?></td>
                                    <td>
                                        <img src="<?= $row['imageUrl']; ?>" width="50" alt="image">

                                    </td>
                                    <td><?= $row['age']; ?></td>
                                    <td><?= $row['gender']; ?></td>
                                    <td><?= $row['date']; ?></td>
                                    <td><?= $row['birthCertNo']; ?></td>
                                    <td><?= $row['description']; ?></td>
                                    <td><?= $row['contact']; ?></td>
                                    <td><?= $row['residence']; ?></td>
                                    <td>
                                        <a href="details.php?details=<?=$key;?>"
                                            class="btn btn-primary btn-sm">Details</a>
                                        <!--<a href="delete_person.php" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this record?');">Delete</a>-->
                                    </td>
                                    <td>
                                        <form action="code.php" method="POST">
                                            <button type="submit" name="delete_btn" value="<?=$key;?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Do you want to delete this record?');">Delete</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="edit_person.php?id=<?=$key;?>" class="btn btn-success btn-sm">Edit</a>
                                    </td>


                                </tr>
                                <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                <tr>
                                    <td colspan="12">No record found</td>
                                </tr>
                                <?php
                                    }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
include('includes/footer.php')
?>