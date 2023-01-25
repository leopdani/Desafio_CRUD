<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Completo</title>
    <link rel="stylesheet" href="./signUP.css">
    <style>
        .form{
            width: 230px;
            height: 280px;
        }
    </style>


</head>
<body>
    <?php
    require('./conection.php');
    if(isset($_POST['login_button'])){
        $_SESSION['validate']=false;
        $name=$_POST['name'];
        $password=$_POST['password'];
        $p=crud::conect()->prepare('SELECT * FROM crudtable WHERE name=:n and pass=:p');
        $p->bindValue(':n', $name);
        $p->bindValue(':p', $password);
        $p->execute();
        $d=$p->fetchAll(PDO::FETCH_ASSOC);
        if ($p->rowCount()>0) {
            $_SESSION['name'] = $name;
            $_SESSION['pass'] = $password;
            $_SESSION['validate'] = true;
            echo 'logged sucessfully';
            header('location:home.php');
        }
        else{
            echo'Make sure that you are registere';
        }
    }
?>
    <div class="form">
        <div class="title">
            <p>Login</p>
        </div>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Nome">
            <input type="text" name="password" placeholder="Senha">
            <input type="submit" value="confiPassword" name="login_button">
        </form>
    </div>
    
</body>
</html>