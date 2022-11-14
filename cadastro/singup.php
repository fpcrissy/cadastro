<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastro | Faci's Parfun</title>
</head>
<body>
    <?php
        require('./conection.php');
        if(isset ($_POST['submit'])){
            $nome=$_POST['nome'];
            $email=$_POST['email'];
            $telefone=$_POST['telefone'];
            $senha=$_POST['senha'];
            $confirmSenha=$_POST['confirmSenha'];
            if (!empty($_POST['nome'])&& !empty($_POST['email'])&& !empty($_POST['telefone'])&& !empty($_POST['senha'])){
                if($senha==$confirmSenha){
                    $p=cdst::conect()->prepare('INSERT INTO cdstrotable(nome, email, telefone, senha) VALUES(:n, :e, :t, :s)');
                    $p->bindValue(':n', $nome);
                    $p->bindValue(':e', $email);
                    $p->bindValue(':t', $telefone);
                    $p->bindValue(':s', $senha);
                    $p->execute();
                    echo 'cliente registrado';
                }else{
                    echo 'senha não são iguais';
                }
            }
        }
    
    
    
    
    ?>





    <form action="./singup.php" method="POST">
    <div class="container">
        <div class="card">
            <h1>Cadastrar</h1>

            <div class="label-float">
                <input type="text" name="nome" id="nome" required>
                <label for="name">Nome</label>
            </div>

            <div class="label-float">
                <input type="text" name="email" id="email" required>
                <label for="email">E-mail</label>
            </div>

            <div class="label-float">
                <input type="tel" name="telefone" id="telefone" required>
                <label for="phone">Telefone</label>
            </div>

            <div class="label-float">
                <input type="password" name="senha" id="senha" required>
                <label for="senha">Senha</label>
            </div>

            <div class="label-float">
                <input type="password" name="confirmSenha" id="senha" required>
                <label for="confirmSenha">Confirme a Senha</label>
            </div>

            <div class="justify-center">
               <input class="btn" type="submit" name="submit" id="submit">
            </div>

        </div>
    </div>
    </form>
</body>
</html>