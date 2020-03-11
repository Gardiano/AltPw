
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

        if( $senha != $confirmarSenha) {
            $_SESSION['senhaDif'] = "msg";
        }   

        // verificando se há um email válido;
        $sql = "SELECT email FROM usuarios WHERE email = '$email'";
        // consultando email válido;
        $result = mysqli_query($conn, $sql);
        // verificando se a linha do bando de dados foi afetada;
        $row = mysqli_num_rows($result);
        // linha do banco de dados para objeto;
        $row = mysqli_fetch_assoc($result);

                                // VERIFICAÇÕES DE FORM //

        // Verificação de senha com no minimo 6 digitos;
        if($row["email"] == $email && strlen($senha) <6 && strlen($confirmarSenha) <6 ) {
            $_SESSION["lenSenha"] = "msg";
                header("Location: index.php");
        }

        // Caso o email informado pelo usuario seja igual ao email cadastrado no banco de dados. Posso alterar a senha;
        elseif($row["email"] == $email && $senha == $confirmarSenha ) {
            $alterarPw = mysqli_query($conn, "UPDATE usuarios SET senha = '$senhaEncript' WHERE email = '$email'");            
                $_SESSION["AlteracaoComSucesso"] = "msg";
                    header("Location: index.php");                  
        }

        // Email diferente ao do banco de dados;
        elseif ($row["email"] != $email) {            
            $_SESSION['emailDif'] = "msg";
                header("Location: index.php");
        }

        // Senhas digitadas diferentes;
        elseif ( $senha !== $confirmarSenha ) {
            $_SESSION['senhaDif'] = "msg";
                header("Location: index.php");
        }
    }  
        mysqli_close($conn);       
?>


