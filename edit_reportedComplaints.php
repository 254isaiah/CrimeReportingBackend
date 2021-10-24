<?php
include('includes/header.php');
?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h4>
                        Edit & Update Reported Complaints
                        <a href="reportedComplaints.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                        include('dbconfig.php');
                        if (isset($_GET['id']))
                        {
                            $key_child = $_GET['id'];

                            $ref_table = 'Report_Complain';
                            $getdata = $database->getReference($ref_table)->getChild($key_child)->getValue();

                            if ($getdata > 0)
                            {
                                ?>
                         

                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="key" value="<?= $key_child; ?>">

                                    <div class="form-group mb-3">
                                        <label for="">Full Name</label>
                                        <input type="text" name="full_name" value="<?=$getdata['names']; ?>" class="form-control">                            
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Age</label>
                                        <input type="number" name="age" value="<?=$getdata['age']; ?>" class="form-control">                            
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Gender</label>
                                        <input type="text" name="gender" value="<?=$getdata['gender']; ?>" class="form-control">                            
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">ID Number</label>
                                        <input type="number" name="idNo" value="<?=$getdata['iDNo']; ?>" class="form-control">                            
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Date</label>
                                        <input type="date" name="date" value="<?=$getdata['date']; ?>" class="form-control">                            
                                    </div>
                                    <div class="form-floating">
                                        <textarea class="form-control" name="complain" value="<?=$getdata['complain']; ?>" style="height: 100px"></textarea>
                                        <label for="floatingTextarea2">Complaint</label>
                                    </div> 
                                    <div class="form-group mb-3">
                                        <label for="">Contact</label>
                                        <input type="number" name="contact" value="<?=$getdata['contact']; ?>" class="form-control">                            
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Residence</label>
                                        <input type="text" name="residence" value="<?=$getdata['residence']; ?>" class="form-control">                            
                                    </div> 
                                    <!--
                                    <div class="form-group bordered mb-3">
                                        <img src="" class="w-100" alt="User Profile">                           
                                    </div>
                                        
                                    <div class="form-group">
                                        <input type="file" id="image" class="custom-file">
                                    </div>  -->               
                                    
                                    <div class="form-group mb-3">
                                        <button type="submit" name="update_complaint" class="btn btn-success">Update Complaint</button>
                                    </div>
                                </form>

                                <?php
                            }
                            else
                            {
                                $_SESSION['status'] = "Invalid id";
                                header('location: index.php');
                                exit();
                            }
                        }
                        else
                        {
                            $_SESSION['status'] = "Not found";
                            header('location: index.php');
                            exit();
                        }
                                ?>
                    
                </div>
            </div>
        </div>
    </div>

<?php
include('includes/footer.php');
?>