<?php
    session_start();    
    include 'conecta.php';

    $nome = $conexao->real_escape_string(strtolower($_POST['nome'])); 
    $email = $conexao->real_escape_string(strtolower($_POST['email'])); 
    $cpf = $conexao->real_escape_string(strtolower($_POST['cpf'])); 
    $senha = md5($conexao->real_escape_string($_POST['senha']));
    $senha2 = md5($conexao->real_escape_string($_POST['senha2']));
    $tipo= 2;

    
    // echo "Recebi nome => $nome <br>";
    // echo "Recebi email => $email <br>";
    // echo "Recebi cpf => $cpf <br>";
    // echo "Recebi senha => $senha <br>";
    // echo "Recebi senha2 => $senha2 <br>";

    if($senha == $senha2){
        // echo "SENHAS OK";
        $sql = "INSERT INTO usuario (nome,email,tipo,cpf, senha) VALUES ('$nome','$email','$tipo','$cpf', '$senha')";
        if(mysqli_query($conexao, $sql)){
            ?>
            <script type="text/javascript">
            alert("tudo ok, faça login");
            window.location.href = "login.php";
            
        </script> 
        <?php
        }
        else{
            ?>
            <script type="text/javascript">
            alert("cadastro falhou, tente novamente mais tarde :(");
            window.location.href = "login.php";
            
        </script> 
        <?php
        }
       
    }
    else{
        ?>
        <script type="text/javascript">
        alert("sENHAS NÃO CONFEREM. tENTE NOVAMENTE");
        window.location.href = "register.php";
        
    </script> 
    <?php
    }

?>