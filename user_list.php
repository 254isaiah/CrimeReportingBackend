<?php
include('includes/header.php');

?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4>Total No of Users:
                        <?php
                            include('dbconfig.php');
                            $ref_table = 'Users';
                            $total_count = $reference = $database->getReference($ref_table)->getSnapshot()->numChildren();
                            echo $total_count;
                        ?>
                    </h4>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Registered User List
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email Address</th>
                                    <th>Phone Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include('dbconfig.php');

                                    $ref_table = "Users";
                                    $fetchdata = $database->getReference($ref_table)->getValue();

                                    if ($fetchdata > 0) 
                                    {
                                        $i=1;
                                        foreach($fetchdata as $key => $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $row['fullName']; ?></td>
                                                <td><?= $row['email']; ?></td>
                                                <td><?= $row['phone']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr>
                                            <td colspan="5">No record found</td>
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

