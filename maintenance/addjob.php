<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <?php 
        include_once("../oopbackend.php");
       
        
        $crud = new Crud();
        
        
        if(isset($_POST['Submit'])) {  
            $faculty = $crud->escape_string($_POST['faculty']);
            $department = $crud->escape_string($_POST['dept']);
            $date = $crud->escape_string(date($_POST['date']));
            $venue = $crud->escape_string($_POST['venue']);
            $description = $crud->escape_string($_POST['description']);
        
           

            
            $result = $crud->execute("INSERT INTO add_task (date,faculty,department,venue,description) VALUES('$date','$faculty','$department',$venue,'$description')");
          }
        }
        
        
        ?>
</body>
</html>
