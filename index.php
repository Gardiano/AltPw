<?php
    session_start();
?>

<!DOCTYPE html>
    <html class="no-js">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title> Recuperação De Senha </title>
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="css/styles.css">
        </head>

        <body>

            <form method="POST" action="alterando_senha.php" class="mt-5">
                <h6 class="mt-auto d-block text-center"> Alteração de Senha </h6>

                        <!-- Confirmação de Alteração De Senha -->
                        <?php if(isset($_SESSION['AlteracaoComSucesso'])): ?>
                            <span>
                                <p class="mt-3" style="color:green; text-align:center; font-size: 10px; ">
                                    SENHA foi alterada com sucesso!
                                </p> 
                            </span>
                        <?php endif; unset($_SESSION['AlteracaoComSucesso']); ?>

                <label class="mt-auto d-block text-center"> Email </label>
                    <input type="email" name="txt_email" class="mx-auto d-block"  />
                        <!-- Verificando se email é diferente ao do banco de dados -->
                        <?php if(isset($_SESSION['emailDif'])): ?>
                            <span>
                                <p class="mt-3" style="color:red; text-align:center; font-size: 10px; ">
                                    Email Diferente ao cadastrado;
                                </p> 
                            </span>
                        <?php endif; unset($_SESSION['emailDif']); ?>

                        <!-- Verificando se email é valido; -->
                        <?php if(isset($_SESSION['erroEmail'])): ?>
                            <span>
                                <p class="mt-3" style="color:red; text-align:center; font-size: 10px; ">
                                    Informe um E-mail valido
                                </p> 
                            </span>
                        <?php endif; unset($_SESSION['erroEmail']); ?>
                
                <label class="mt-auto d-block text-center"> Nova Senha </label>
                    <input type="password" name="txt_senha" class="mx-auto d-block"  />
                        
                    <!-- // Verificação de senha com no minimo 6 digitos; -->
                        <?php if(isset($_SESSION['lenSenha'])): ?>
                            <span>
                                <p class="mt-3" style="color:red; text-align:center; font-size: 10px; ">
                                    Informe uma senha com no minimo 6 digitos
                                </p> 
                            </span>
                        <?php endif; unset($_SESSION['lenSenha']); ?>
                
                    <label class="mt-auto d-block text-center"> Confirmar Senha </label>
                        <input type="password" name="txt_confirmar_senha" class="mx-auto d-block"  />

                        <!-- Verificação de Senhas Diferentes -->
                        <?php if(isset($_SESSION['senhaDif'])): ?>
                            <span>
                                <p class="mt-3" style="color:red; text-align:center; font-size: 10px; ">
                                    Senhas digitadas são diferentes;
                                </p> 
                            </span>
                        <?php endif; unset($_SESSION['senhaDif']); ?>

                        <!-- Verificando se a senha tem no minimo 6 digitos (verifica ao clicar apenas no botão 'Alterar'); -->
                        <?php if(isset($_SESSION['erroSenha'])): ?>
                            <span>
                                <p class="mt-3" style="color:red; text-align:center; font-size: 10px; ">
                                    Informe uma senha com no minimo 6 digitos
                                </p> 
                            </span>
                        <?php endif; unset($_SESSION['erroSenha']); ?> 

                        <input type="submit" value="Alterar" class="mx-auto d-block mt-3" />
                                            
                        <!-- Verificando se tem campos vazios no form; -->
                        <?php if(isset($_SESSION['erroVazio'])): ?>
                            <span>
                                <p class="mt-3" style="color:red; text-align:center; font-size: 10px; ">
                                    Algum campo obrigatorio ficou vazio... Favor preencher.
                                </p> 
                            </span>
                        <?php endif; unset($_SESSION['erroVazio']); ?>                                                            
            </form>            
                                <script src="js/scripts.js"></script>
        </body>
    </html>


    
                                    
                                           