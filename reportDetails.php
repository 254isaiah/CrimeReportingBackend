<?php
session_start();
include('includes/header.php')
?>


<div class="container">
    
        <div class="row justify-content-center">
            
                <div class="card">
                    <h4>
                        Details of Reported Complaint
                        <a href="reportedComplaints.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
            <div class="col-md-6 mt-3 bg-dark p-4 rounded">
                
            <?php
                        include('dbconfig.php');
                        if (isset($_GET['details']))
                        {
                            $key_child = $_GET['details'];

                            $ref_table = 'Report_Complain';
                            $getdata = $database->getReference($ref_table)->getChild($key_child)->getValue();

                            if ($getdata > 0)
                            {
                                ?>

                <h2 class="bg-light p-2 rounded text-center text-dark">Name :<?=$getdata['names']; ?></h2>
                <div class="text-center">
                    <img src="<?=$getdata['imageUrl']; ?>" width="300" class="img-thumbnail">
                </div>
                <h4 class="text-light">Type of Crime :<?=$getdata['crime']; ?></h4>
                <h4 class="text-light">Complaint :<?=$getdata['complain']; ?></h4>
                <h4 class="text-light">ID Number :<?=$getdata['iDNo']; ?></h4>
                <h4 class="text-light">Contact :<?=$getdata['contact']; ?></h4>
                <h4 class="text-light">Residence :<?=$getdata['residence']; ?> </h4>
            </div>
            <?php
                            }
                            else
                            {
                                $_SESSION['status'] = "Invalid id";
                                header('location: reportedComplaints.php');
                                exit();
                            }
                        }
                        else
                        {
                            $_SESSION['status'] = "No record found";
                            header('location: reportedComplaints.php');
                            exit();
                        }
                        ?>
        </div>
    </div>
<?php
include('includes/footer.php');
?>