<?php
 
include "connection.php";
 
if(isset($_GET['delete'])){
    $deletesql="DELETE FROM `student` WHERE `student`.`student_no` = ?";
    $deletequery=$connect->prepare($deletesql);
    $deletequery->execute([
        $_GET['delete']
    ]);
 
    header('Location:index.php');
 
}
$sql ="SELECT * FROM student";
$query = $connect->prepare($sql);
$query->execute();
 
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Page</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    
    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-1 text-center">Student List</h1>
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
            <div class="row mt-4">
                <div class="col">
                    <table class="table table-hover table-dark table-striped">
                        <thead>
                            <tr>
                                <th>Student No</th>
                                <th>Student Name</th>
                                <th>Student Surname</th>
                                <th>Class</th>
                                <th>Born Date</th>
                                <th>Processes</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($line = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?=$line['student_no']?></td>
                                <td><?=$line['student_name']?></td>
                                <td><?=$line['student_srname']?></td>
                                <td><?=$line['class']?></td>
                                <td><?=$line['borndate']?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="detail.php?student_no=<?=$line['student_no']?>" class="btn btn-success">Detail</a>
                                        <a href="edit.php?student_no=<?=$line['student_no']?>" class="btn btn-secondary">Edit</a>
                                        <a href="?delete=<?=$line['student_no']?>" onclick="return confirm('Do you really want to delete?')" class="btn btn-danger">Remove</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </main>
    <footer></footer>
</body>
</html>