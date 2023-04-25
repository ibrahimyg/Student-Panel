<?php
 
include "connection.php";
 
$sql ="SELECT * FROM student WHERE student_no = ?";
$query = $connect->prepare($sql);
$query->execute([
    $_GET['student_no']
]);
$line = $query->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Informations</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    
    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-1 text-center">Student Information</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="btn-group">
                        <a href="index.php" class="btn btn-outline-primary">All Students</a>
                        <a href="add.php" class="btn btn-outline-primary">Add Students</a>
                    </div>
                </div>
            </div>
        </div>
    
    </header>
    <main>    
    <div class="container">
        <div class="row">
            <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                    <?=$line["student_name"]?> <?=$line["student_srname"]?>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?=$line["class"]?> ( <?=$line["gender"]?>)</h6>
                    <p class="card-text"><?=$line["borndate"]?></p>
 
                </div>
                </div>
            </div>
        </div>
    </div>
    </main>
    <footer></footer>
</body>
</html>