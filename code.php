<?php
session_start();
include('dbconfig.php');

if (isset($_POST['delete_btn'])) 
{
    $del_id = $_POST['delete_btn'];

    $ref_table = 'Report_Missing/'.$del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if ($deletequery_result) {
        $_SESSION['status'] = "Person deleted successfully";
        header('location: missingPeople.php');
    }
    else {
     $_SESSION['status'] = "Person not deleted";
     header('location: missingPeople.php');       
    }
}

if(isset($_POST['update_person']))
{
    $key = $_POST['key'];
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $birthCert = $_POST['birthCert'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $contact = $_POST['contact'];
    $residence = $_POST['residence'];
    
    $updateData = [
        'names'=>$full_name,
        'age'=>$age,
        'gender'=>$gender,
        'birthCertNo'=>$birthCert,
        'date'=>$date,
        'description'=>$description,
        'contact'=>$contact,
        'residence'=>$residence,
                
    ];

    $ref_table = 'Report_Missing/'.$key;
    $update_query= $database->getReference($ref_table)->update($updateData);

    if ($update_query)
    {
        $_SESSION['status'] = "Person updated successfully";
        header('location: missingPeople.php');
    }
    else 
    {
     $_SESSION['status'] = "Person not updated";
     header('location: missingPeople.php');       
    }

}






if (isset($_POST['save-person'])) 
{
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $birthCert = $_POST['birthCert'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $contact = $_POST['contact'];
    $residence = $_POST['residence'];
    $photo = $_FILES['image']['name'];
    $random_no = rand(1111,9999);

    $newImage = $random_no.$photo;
    $filename = "MissingPeople/".$photo;


    $postData = [
        'names'=>$full_name,
        'age'=>$age,
        'gender'=>$gender,
        'birthCertNo'=>$birthCert,
        'date'=>$date,
        'description'=>$description,
        'contact'=>$contact,
        'residence'=>$residence,
        'imageUrl'=>$filename,
        
    ];

    $ref_table = "Report_Missing";
    $postRef_result = $database->getReference($ref_table)->push($postData);

    if ($postRef_result)
    {
        $_SESSION['status'] = "Person added successfully";
        header('location: index.php');
    }
    else 
    {
     $_SESSION['status'] = "Person not added";
     header('location: index.php');       
    }
}
?>