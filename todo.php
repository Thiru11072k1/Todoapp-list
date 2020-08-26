<?php
  include "addtodo.php";
  include "addtodoforuser.php";
 
session_start();


  $username=$_SESSION['uname'];
  
  $userquery=mysqli_query($con,"SELECT * FROM usertable WHERE username='$username'");
  $userrow=mysqli_fetch_array($userquery);
  
  $usernameid=$userrow["id"];

  $query= "SELECT * FROM todo WHERE user_id='$usernameid'";
  $result=mysqli_query($connection,$query);


  $queryed=mysqli_query($connection,"SELECT * FROM todo WHERE id='$usernameid'");
  $rowcount=mysqli_num_rows($queryed);
  


  if($_SERVER['REQUEST_METHOD']=='POST'){
     $todo=$_POST['todo'];
     echo $todo;
     $date=date('l dS F\, Y h:i:s A');
     $sql="INSERT INTO todo(name,date,user_id)VALUES('$todo','$date','$usernameid');";
     $res='';
     $res=mysqli_query($connection,$sql);

     if(!res){
       die("failed");
     }else
       header("Location:todo.php?todo-added");
      
    } 


   if(isset($_GET['deletetodo'])){
      $dtltodo=$_GET['deletetodo'];
      $sqli="DELETE FROM todo WHERE id= $dtltodo";
      $output=mysqli_query($connection,$sqli);
     if(!output){
       die("failed");
     }else{
       header("Location:todo.php?todo-deleted");
     }
  }
 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="todopage.css" class="css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>todopage</title>
    <style> 
input[type=text] {
  width: 130px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
  width: 100%;
}
</style>
  </head>
  <body>
  <div class="header">
    <h1><i class="fa fa-check-circle"style="font-size:50px;" ></i>TODO</h1>
    <h3>Welcome   <?php echo $_SESSION['uname'];?></h3>
  </div>
  <div class="container">
      <div class="todo">
          <h3>Add a New Todo</h3>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="todo"placeholder="Enter a New Todo" required> 
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Add a New Todo task list">
                </div>
            </form>
      </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
          
                    <th>Todo</th>
                    <th>Date added</th>
                    <th>Edit Todo</th>
                    <th>Delete Todo</th>
                </thead>
                <tbody>
                   <?php
                       
                        while($row=mysqli_fetch_assoc($result)){
                        
                            
                          $id= $row['id'];
                          $name= $row['name'];
                          $date=$row['date'];
                    ?>
                   <tr>
                       
                        <td><?php echo $name;?></td>
                        <td><?php echo $date;?></td>
                        <td><a href="edittodo.php?edit-todo=<?php echo $id;?>" class="btn btn-primary">Edit todo</a></td>
                        <td><a href="todo.php?deletetodo=<?php echo $id;?>" class="btn btn-danger">Delete todo</a></td>
                        
                    </tr>
                <?php    
                          };
                ?>
                  
                
                  <?php
                       
                       while($rows=mysqli_fetch_array($userquery)){
                       
                           
                         $id= $rows['id'];
                         $name= $rows['name'];
                         $date=$rows['date'];
                   ?>
                  <tr>
                       <td><?php echo $id;?></td>
                       <td><?php echo $name;?></td>
                       <td><?php echo $date;?></td>
                       <td><a href="edittodo.php?edit-todo=<?php echo $id;?>" class="btn btn-primary">Edit todo</a></td>
                       <td><a href="todo.php?deletetodo=<?php echo $id;?>" class="btn btn-danger">Delete todo</a></td>
                       
                   </tr>
               <?php    
                         };
               ?>



                </tbody>
            </table>
        </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>