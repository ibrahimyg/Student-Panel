<?php
 
include "connection.php";
 
if(isset($_POST['edit'])){
 
    $sql = "UPDATE `student` 
        SET `student_name` = ?, 
            `student_srname` = ?, 
            `borndate` = ?, 
            `class` = ? WHERE `student`.`student_no` = ?";
    $row=[
        $_POST['name'],
        $_POST['surname'],
        $_POST['brndate'],
        $_POST['class'],
        $_POST['studentno']
    ];
    $query = $connect->prepare($sql);
    $query->execute($row);
 
    header("Location:index.php");
}
 
$sql ="SELECT * FROM student WHERE student_no = ?";
$query = $connect->prepare($sql);
$query->execute([
    $_GET['student_no']
]);
$line = $query->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info Edit</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    
    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-1 text-center">Student Info Edit</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="btn-group">
                        <a href="index.php" class="btn btn-outline-primary">All Students</a>
                        <a href="ekle.php" class="btn btn-outline-primary">Add Students</a>
                    </div>
                </div>
            </div>
        </div>
    
    </header>
    <main>
    <div class="container">
        <form action="" method="post" class="row mt-4 g-3">
            <input type="hidden" name="studentno" value="<?=$line['student_no']?>">
            <div class="col-6">
                <label for="name" class="form-label">Student Name</label>
                <input type="text" class="form-control" name="name" value="<?=$line['student_name']?>">
            </div>
            <div class="col-6">
                <label for="surname" class="form-label">Student Surname</label>
                <input type="text" class="form-control" name="surname" value="<?=$line['student_srname']?>">
            </div>
            <div class="col-6">
                <label for="class" class="form-label">Class</label>
                <input type="text" class="form-control" name="class" value="<?=$line['class']?>">
            </div>
            <div class="col-6">
                <label for="brndate" class="form-label">Born Date</label>
                <input type="date" class="form-control" name="brndate" value="<?=$line['borndate']?>">
            </div>
            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
        </form>
    </div>
    </main>
    <footer></footer>
</body>
</html>
 