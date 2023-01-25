<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Completo</title>
    <link rel="stylesheet" href="./signUP.css">
    
    

</head>
<body>
    <?php
    require('./conection.php');
    if (isset($_POST['signUP_button'])) {
        $name=$_POST['name'];
        $lastName=$_POST['lastName'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confPassword=$_POST['confiPassword'];

        if(!empty($_POST['name'])&& !empty($_POST['lastName'])&& !empty($_POST['email'])&&!empty($_POST['password'])){
            if($password== $confPassword){
                $p=crud::conect()->prepare('INSERT INTO crudtable(name,lastName,email,pass) VALUES(:n,:l,:e,:p)');
                $p->bindValue(':n', $name);
                $p->bindValue(':l', $lastName);
                $p->bindValue(':e', $email);
                $p->bindValue(':p', $password);
                $p->execute();
                echo 'sucessfully';
                header("Location: login.php");
                exit();
}       else{
            echo 'password does not mach';
}
}
}
?>
    <div class="form">
        <div class="title">
            <p>Sign up form.</p>
        </div>
        <form action="signUP.php" method="post">
            <input type="text" name="name" placeholder="Nome">
            <input type="text" name="lastName" placeholder="Sobrenome">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Senha">
            <input type="password" name="confiPassword" placeholder="Confirme a senha">
            <input type="submit" value="Sign UP" name="signUP_button">
        </form>
    </div>
    
</body>
</html>