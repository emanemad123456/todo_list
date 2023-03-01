<?php
$todos=[];
if(file_exists('todo.json')){
$json = file_get_contents('todo.json');
$todos=json_decode($json);
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="newtodo.php" method="POST">
    <input type="text" name="todo_name" placeholder="Enter your todo">
    <button type="submit">New todo</button>
</form>
<br>
<?php
foreach( $todos as $todoname => $todo){ ?>

<div style="margin-bottom: 20px;">
<form style="display: inline-block;" action="change.php" method="POST">
<input type="hidden" name="todo_name" value="<?php echo $todoname ?>">
<input type="checkbox" <?php ?> $todo['complete']? 'checked' : '' >
</form>
    
    
    <?php echo $todoname?>
   <form style="display: inline-block;" action="delete.php" method="POST">
    <input type="hidden" name="todo_name" value="<?php echo $todoname ?>">
   <button>Delete</button>
   </form>
    
    

</div>
 <?php }?>
 <script>
    const checkboxes=document.querySelectorAll('input[type=checkbox][name=todo_name]')
    checkboxes.forEach(ch => {
ch.onclick=function(){
    this.parentNode.submit();
}
    });
 </script>
</body>
</html>