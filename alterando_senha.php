
 <!-- //////// -->
<?php
    session_start();
        // Chamando conexão com banco de dados;
        include_once("conexao.php");

        // Verificando  o method POST esta sendo iniciado;
        if(isset($_POST["txt_email"], $_POST['txt_senha'], $_POST['txt_confirmar_senha'])) {
            
        // Method Post;
        $email = mysqli_real_escape_string($conn, $_POST['txt_email']);
        $senha = mysqli_real_escape_string($conn, $_POST['txt_senha']);
        $confirmarSenha = mysqli_real_escape_string($conn, $_POST['txt_confirmar_senha']);
        $senhaEncript = md5($confirmarSenha);
        
        // Verificando se os POST's estão vazios;
        if(empty($_POST['txt_email']) || empty($_POST['txt_senha']) || empty($_POST['txt_confirmar_senha'])) {
            header("Location: index.php");
                $_SESSION['erroVazio'] = "msg";
        }

        // Verificando se senha digitada contém pelo menos 6 digitos;
        if(strlen($_POST['txt_senha']) < 6 && strlen($_POST['txt_confirmar_senha']) <6 ) {
            $_SESSION['erroSenha'] = "msg";
        }

        // Verificando se E-mail digitado tem no banco de dados;
        if($row["email"] != $_POST['txt_email']) {
            $_SESSION['erroEmail'] = "msg";
        }   

        // verificando se há um email válido;
        $sql = "SELECT email FROM usuarios WHERE email = '$email'";
        // consultando email válido;
        $result = mysqli_query($conn, $sql);
        // verificando se a linha do bando de dados foi afetada;
        $row = mysqli_num_rows($result);
        // linha do banco de dados para objeto;
        $row = mysqli_fetch_assoc($result);

        // Caso o email informado pelo usuario seja igual ao email cadastrado no banco de dados. Posso alterar a senha;
        if($row["email"] == $email) {
            $alterarPw = mysqli_query($conn, "UPDATE usuarios SET senha = '$senhaEncript' WHERE email = '$email'");
            echo "<script> alert('Senha Alterada com Sucesso!'); window.location='index.php';</script>";                     
        } else {
        // Caso email informado não estiver cadastrado retorna mensagem de erro;
            echo "Erro: Email não cadastrado no banco de dados";
        }
    }    
        mysqli_close($conn);       
?>


