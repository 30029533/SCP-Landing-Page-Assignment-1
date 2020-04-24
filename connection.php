<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>SCP Landing Page</title>
    
    <style>
        .button {
        padding: 15px 25px;
        font-size: 24px;
        text-align: center;
        cursor: pointer;
        outline: none;
        color: #fff;
        background-color: #4CAF50;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
        }

        .button:hover {background-color: #3e8e41}

        .button:active {
        background-color: #3e8e41;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
        }
    </style>
  </head>
  <body>
<?php
    // Database Credentials
    $user = "a3002953_a30029533";
    $password = "Toiohomai1234";
    $dbname = "a3002953_scp";

    // Create connection object
    $connection = new mysqli('localhost',$user,$password,$dbname) or die(mysqli_error($connection));

    // Fetch data from db
    $result = $connection->query("select * from subject") or die($connection->error);

    // Insert data to db
    if(isset($_POST['ItemNo'])){
        $ItemNo = $_POST['ItemNo'];
        $ObjectClass = $_POST['ObjectClass'];
        $SubjectImage = $_POST['SubjectImage'];
        $pro1 = $_POST['pro1'];
        $Description = $_POST['Description'];
        $reference = $_POST['reference'];
        $ExtraField1 = $_POST['ExtraField1'];
        $ExtraField2 = $_POST['ExtraField2'];

        // Remove 's from data
        $ObjectClass = str_replace("'"," ", $ObjectClass);
        $pro1 = str_replace("'"," ", $pro1);
        $Description = str_replace("'"," ", $Description);
        $reference = str_replace("'"," ", $reference);
        $ExtraField1 = str_replace("'"," ", $ExtraField1);
        $ExtraField2 = str_replace("'"," ", $ExtraField2);
    
        // Create an insert command
        $sql = "insert into subject(item_no, object_class, subject_image, pro1, description, reference, extra_1, extra_2) values('$ItemNo', '$ObjectClass', '$SubjectImage', '$pro1', '$Description', '$reference','$ExtraField1', '$ExtraField2')";

        // Displaying success or error message
        if ($connection->query($sql) === TRUE) {
            include 'template/insert_header.php';
            echo "<div class='alert alert-success'><h1> <strong>Success !</strong> Record Created Successfully !!!</h1></div>
            <p><a href='index.php'> <button class='button btn btn-primary'> Back to SCP Main Page </button></a></p>";
            include 'template/footer.php';
        } 
        else {
            include 'template/insert_header.php';
            echo "<div class='alert alert-danger'><h1><strong>Error !</strong> Creating record !!! {$connection->error}</h1></div>
            <p><a href='index.php'><button class='button btn btn-warning'> Back to SCP Main Page </button></p></a>";
            include 'template/footer.php';
        }
    }
    // Delete data form 
    //(ItemNo, ObjectClass, SubjectImage, pro1, Description, ExtraField1, ExtraField2) 
?>
</body>
</html>