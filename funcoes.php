<?php include("cabecalho.php");?>



<?php
    if(ISSET($_POST["contato_atualizar"])){
        $atualizar = $conexao->prepare("UPDATE contato SET nome = :nome, idade = :idade where id = :id");
        $atualizar ->bindParam(':nome', $_POST["nome"] , PDO::PARAM_STR);
        $atualizar ->bindParam(':idade', $_POST["idade"] , PDO::PARAM_STR);
        $atualizar ->bindParam(':id', $_POST["id"] , PDO::PARAM_STR);
        $executa = $atualizar->execute();

        if($executa){

            ?>
            <div class="container alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>Sucesso!</strong> Nome Atualizado com Sucesso!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
        }else{
            ?>
            <div class="container alert danger alert-dismissible fade show mt-3" role="alert">
            <strong>Erro!</strong> NÃO foi possivel modificar o nome!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
        }
    }

?>






<?php
    if(ISSET($_POST["telefone_atualizar"])){
        $atualizar = $conexao->prepare("UPDATE telefone SET telefone = :telefone where id = :id");
        $atualizar ->bindParam(':telefone', $_POST["telefone"] , PDO::PARAM_STR);
        $atualizar ->bindParam(':id', $_POST["id"] , PDO::PARAM_STR);
        $executa = $atualizar->execute();

        if($executa){
        
            ?>
            <div class="container alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>Sucesso!</strong> Telefone Atualizado com Sucesso!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
        }else{
            ?>
            <div class="container alert danger alert-dismissible fade show mt-3" role="alert">
            <strong>Erro!</strong> NÃO foi possivel modificar o telefone !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
        }
    }

?>





<?php
    if(ISSET($_POST["telefone_adicionar"])){
        $adicionar = $conexao->prepare("INSERT INTO telefone (telefone, perfil,contato_id) VALUES (:telefone,:perfil,:contato_id);");
        $adicionar ->bindParam(':telefone', $_POST["telefone"] , PDO::PARAM_STR);
        $adicionar ->bindParam(':perfil', $_POST["perfil"] , PDO::PARAM_STR);
        $adicionar ->bindParam(':contato_id', $_POST["contato_id"] , PDO::PARAM_STR);
        $executa = $adicionar->execute();

        if($executa){

        
            ?>
            <div class="container alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>Sucesso!</strong> Numero Adicionado com Sucesso!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
        }else{
            ?>
            <div class="container alert danger alert-dismissible fade show mt-3" role="alert">
            <strong>Erro!</strong> NÃO foi possivel adicionar o numero!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
        }
    }

?>






<?php
    if(ISSET($_POST["telefone_deletar"])){
            $deletar = $conexao->prepare("DELETE FROM telefone WHERE id = :id");
            $deletar ->bindParam(':id', $_POST["id"] , PDO::PARAM_STR);
            $executa = $deletar->execute();

            if($executa){

                ?>
                <div class="container alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong>Sucesso!</strong> Telefone deletado!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <?php
            }else{
                ?>
                <div class="container alert danger alert-dismissible fade show mt-3" role="alert">
                <strong>Erro!</strong> NÃO foi possivel deletar o numero!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <?php
            }
        }

?>







<?php
    if(ISSET($_POST["cidade_atualizar"])){
        $atualizar = $conexao->prepare("UPDATE endereco SET cidade = :cidade where id = :id");
        $atualizar ->bindParam(':cidade', $_POST["cidade"] , PDO::PARAM_STR);
        $atualizar ->bindParam(':id', $_POST["id"] , PDO::PARAM_STR);
        $executa = $atualizar->execute();

        if($executa){
        
            ?>
            <div class="container alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>Sucesso!</strong> Cidade Atualizada com Sucesso!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
        }else{
            ?>
            <div class="container alert danger alert-dismissible fade show mt-3" role="alert">
            <strong>Erro!</strong> NÃO foi possivel modificar a cidade!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
        }
    }

?>






<?php
    if(ISSET($_POST["email_atualizar"])){
        $atualizar = $conexao->prepare("UPDATE email SET email = :email where id = :id");
        $atualizar ->bindParam(':email', $_POST["email"] , PDO::PARAM_STR);
        $atualizar ->bindParam(':id', $_POST["id"] , PDO::PARAM_STR);
        $executa = $atualizar->execute();

        if($executa){
        
            ?>
            <div class="container alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>Sucesso!</strong> Email Alterado com Sucesso!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
        }else{
            ?>
            <div class="container alert danger alert-dismissible fade show mt-3" role="alert">
            <strong>Erro!</strong> NÃO foi possivel modificar o email!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
        }
    }

?>






<?php
    if(ISSET($_POST["email_deletar"])){
            $deletar = $conexao->prepare("DELETE FROM email WHERE id = :id");
            $deletar ->bindParam(':id', $_POST["id"] , PDO::PARAM_STR);
            $executa = $deletar->execute();

            if($executa){

                ?>
                <div class="container alert alert-success alert-dismissible fade show mt-3" role="alert">
                    <strong>Sucesso!</strong> Email deletado!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <?php
            }else{
                ?>
                <div class="container alert danger alert-dismissible fade show mt-3" role="alert">
                    <strong>Erro!</strong>  NÃO foi possivel deletar o email!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <?php
            }
    }
?>






<?php
    if(ISSET($_POST["email_adicionar"])){
        $adicionar = $conexao->prepare("INSERT INTO email (email, perfil,contato_id) VALUES (:email,:perfil,:contato_id);");
        $adicionar ->bindParam(':email', $_POST["email"] , PDO::PARAM_STR);
        $adicionar ->bindParam(':perfil', $_POST["perfil"] , PDO::PARAM_STR);
        $adicionar ->bindParam(':contato_id', $_POST["contato_id"] , PDO::PARAM_STR);
        $executa = $adicionar->execute();

        if($executa){
            ?>
            <div class="container alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong>Sucesso!</strong> Email Adicionado com Sucesso!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php

        }else{
            ?>
            <div class="container alert danger alert-dismissible fade show mt-3" role="alert">
                <strong>Erro!</strong> NÃO foi possivel Adicionar o email
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        }
    }
?>