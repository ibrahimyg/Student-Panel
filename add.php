<?php
 
if(isset($_POST["save"]))
{
    include "connection.php";
    $sql = "INSERT INTO `student` (`student_no`, `student_name`, `student_srname`, `gender`, `borndate`, `class`, `point`) VALUES (NULL, ?, ?, ?, ?, ?, '0');";
    $row =[
        $_POST["name"],
        $_POST["surname"],
        $_POST["gender"],
        $_POST["brndate"],
        $_POST["class"]
    ];
 
    $sth = $connect->prepare($sql);
   $result = $sth->execute($row);
   header("Location:index.php");
}
 
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    
    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-1 text-center">Add Student</h1>
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
        <form action="" method="post" class="row mt-4 g-3">
            <div class="col-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="col-6">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" class="form-control" name="surname">
            </div>
            <div class="col-6">
                <label for="class" class="form-label">Class</label>
                <input type="text" class="form-control" name="class">
            </div>
            <div class="col-6">
                <label for="brndate" class="form-label">Born Date</label>
                <input type="date" class="form-control" name="brndate">
            </div>
            <div class="col">
                <label for="" class="form-label">Female
                    <input type="radio" name="gender" value="F">
                </label>
                <label for="" class="form-label">Male
                    <input type="radio" name="gender" value="M">
                </label>
            </div>
            <button type="submit" name="save" class="btn btn-primary">Save</button>
        </form>
    </div>
    </main>
    <footer></footer>
</body>
</html>