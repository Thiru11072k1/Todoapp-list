<?php
  include "addtodo.php";

  
  if(isset($_GET['edit-todo'])){
    $e_id=$_GET['edit-todo'];
    }
   
   if(isset($_POST['edit_todo'])){
     $edit_todo= $_POST['todo'];
     $query="UPDATE todo SET name='$edit_todo' WHERE id= $e_id";
     $run=mysqli_query($connection,$query);

     if(!run){
       die("failed");
     }else{
       header("Location:todo.php?updated");
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
    <h1>Todo</h1>
  </div>
  <div class="container">
      <div class="todo">
          <h3>Add a New Todo</h3>
            <form action="" method="post">
                <?php
               
                  $sql="SELECT * FROM todo WHERE id= $e_id";
                  $result=mysqli_query($connection,$sql);
                  $data=mysqli_fetch_array($result);
                 
                
                ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="todo" value="<?php echo $data['name']; ?>"placeholder="Enter a New Todo"/><br>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" name="edit_todo"type="submit" value="Update Todo task list"/><br>
                </div>
            </form>
      </div>
        
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>