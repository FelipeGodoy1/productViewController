<?php include("funcoes.php");?>


<div class="container">

    
        <form class=" p-2 d-flex mb-3" action="#" method="GET" role="search" >
            <div class="me-auto p-2">
                <label for="staticEmail2" class="visually-hidden">Email</label>
                <h3 class="titulo">Lista Contatos</h3>
            </div>
            <div class="p-2 col-5">
                <label for="inputPassword2" class="visually-hidden" name="pesquisa">Digite um nome</label>
                <input type="search" class="form-control" type="search" placeholder="Search" name="pesquisa" aria-label="Search">
            </div>
            <div class="p-2">
                <button type="submit" class="btn btn-primary mb-3">pesquisar</button>
            </div>
        </form>

    <table class="table table-striped  table-sm">
        <thead>
            <tr class="table-active" >
                <th scope="col">ID</th>
                <th scope="col" class="none">nome</th>
                <th scope="col" style="@media(max-width: 1000px){ th{ display: none;}}">idade</th>
                <th scope="col">telefone</th>
                <th scope="col" class="text-center">cidade</th>
                <th scope="col">email</th>
            </tr>
        </thead>

        <tbody>

            <?php
                if(ISSET($_GET["pesquisa"])){
                    $contato = $conexao->prepare("SELECT * FROM contato where nome like :nome");
                    $nome = "%".$_GET["pesquisa"]."%";
                    $contato->bindParam(':nome',$nome, PDO::PARAM_STR);
                }
                else{
                    if(ISSET($_GET["cliente"]) || ISSET ($_GET["prestador"])){
                        $contato = $conexao->prepare("SELECT * FROM contato WHERE cliente = :cliente AND prestador = :prestador"); 
                        $contato->bindParam(':cliente', $_GET["cliente"], PDO::PARAM_STR);
                        $contato->bindParam(':prestador', $_GET["prestador"], PDO::PARAM_STR);
                    }
                    else {
                        $contato = $conexao->prepare("SELECT * FROM contato");
                    }
                }
                $executa = $contato->execute();

                while($r_contato = $contato->fetch(PDO::FETCH_ASSOC))
                {
                    $contato_id = $r_contato["id"];

                          
                ?>

            <tr>

                <!--ID--> 
                <th scope="row">
                    <div class ="mt-2">
                        <a href="contato.php?id=<?php echo $r_contato["id"];?>" class="principal">
                            #<?php echo $r_contato["id"];?>
                        </a>
                    </div>
                </th>



                   

                <!--Nome-->    
                <td>
                    <a type="button" class="btn btn-link principal" data-bs-toggle="modal" data-bs-target="#contato_<?php echo $r_contato["id"];?>">
                        <?php echo $r_contato["nome"];?>
                    </a>
                    <br>

                    <!-- Modal -->

                    <div class="modal fade " id="contato_<?php echo $r_contato["id"];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" style="text-decoration: color: black;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"  id="exampleModalLabel">Nome</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <form action="#" method="POST" class="row g-3">
                                        <input type="hidden" name="id" value="<?php echo $r_contato["id"];?>">
                                        <div class="col-7">
                                            <label for="nome" class="visually-hidden">Nome</label>
                                            <input type="text" class="form-control" id="nome" name="nome" pattern="^[A-ZÀ-Ÿ][A-zÀ-ÿ']+\s([A-zÀ-ÿ']\s?)*[A-ZÀ-Ÿ][A-zÀ-ÿ']+$" value ="<?php echo $r_contato["nome"];?>" placeholder="nome completo" maxlength="45">
                                        </div>

                                        <div class="col-3">
                                            <label for="idade" class="visually-hidden">Idade</label>
                                            <input type="number" class="form-control" id="idade" name="idade" value="<?php echo $r_contato["idade"];?>" placeholder="idade">
                                        </div>

                                        <div class="col-2">
                                            <button type="submit" name="contato_atualizar" class="btn btn-primary mb-3">salvar</button>
                                        </div>
                                    </form>
                                </div>

                                <!--
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
                                </div>
                                -->
                            </div>
                        </div>
                    </div>
                    <!--Fim Modal-->
                </td>





                <!--Idade-->
                <td class="principal">
                    <div class="mt-2">
                        <?php echo $r_contato["idade"];?>
                    </div>
                </td>







                <!-- Telefone-->
                <td>

                <div class="container-telefone d-flex">

                    <div class="tell">
                        <?php 
                        
                        $telefone = $conexao -> prepare("SELECT * FROM telefone WHERE contato_id = :contato_id");
                        $telefone->bindParam(':contato_id', $contato_id, PDO::PARAM_STR);
                        $executa = $telefone -> execute();
                        while ($r_telefone = $telefone ->fetch(PDO::FETCH_ASSOC))
                        {   
                            
                        ?>
                            <a type="button" class="btn btn-link secundario" data-bs-toggle="modal" data-bs-target="#telefone_<?php echo $r_telefone["id"];?>">
                                <?php echo $r_telefone["telefone"];?>
                            </a>
                            <br>
                            
                            <!-- Modal -->
                                <div class="modal fade " id="telefone_<?php echo $r_telefone["id"];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" style="text-decoration: color: black;">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"  id="exampleModalLabel">Telefone</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="#" method="POST" class="row g-3">
                                                <input type="hidden" name="id" value="<?php echo $r_telefone["id"];?>">
                                                <div class="col-9">
                                                    <label for="telefone" class="visually-hidden">telefone</label>
                                                    <input type="tel" class="form-control" id="telefone" name="telefone"  pattern="^[0-9]{2} ([0-9]{5}|[0-9]{4})-([0-9]{4})" value ="<?php echo $r_telefone["telefone"];?>" placeholder="Telefone" maxlength="15">
                                                </div>

                                                <div class="col-2">
                                                    <button type="submit" name="telefone_atualizar" class="btn btn-primary mb-3">Atualizar</button>
                                                </div>
                                                <div class="d-grid gap-2">
                                                    <button type="submit" name="telefone_deletar" class="btn btn-danger ">Excluir</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- 
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        -->
                                        </div>
                                    </div>
                                </div>
                        <?php } ?>
                    </div> 



                    <div class="add-telefone">

                        <button type="button" name="btnadd" class="btn btn-outline-primary btn-sm  mt-1"  style ="border-radius: 25px; color: #000; padding: 5px 10px" data-bs-toggle="modal" data-bs-target="#add_<?php echo $contato_id ?>">+</button>

                        <div class="modal fade " id="add_<?php echo $contato_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered " style="text-decoration: color: black;">
                                <div class="modal-content">
                                        
                                        <div class="modal-header">
                                            <h5 class="modal-title"  id="exampleModalLabel">Adicionar Telefone</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="#" method="POST" class="row g-3">
                                                <input type="hidden" name="contato_id" value="<?php echo $r_contato["id"];?>">
                                                <div class="col-5">
                                                    <label for="telefone" class="visually-hidden">telefone</label>
                                                    <input type="tel" class="form-control" id="telefone" name="telefone" pattern="^[0-9]{2} ([0-9]{5}|[0-9]{4})-([0-9]{4})" placeholder="00 00000-0000" maxlength="15">
                                                </div>
                                                <div class="col-4">
                                                    <label for="perfil" class="visually-hidden">Perfil</label>
                                                    
                                                    <select class="form-select" aria-label="Default select example" id="perfil" name="perfil">
                                                        <option selected>perfil</option>
                                                        <option value="pessoal">pessoal</option>
                                                        <option value="profissional">profissional</option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-2">
                                                    <button type="submit" name="telefone_adicionar" class="btn btn-primary mb-3">Adicionar</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!--
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                                        </div>
                                        -->
                                </div>
                            </div>
                        </div>
                    </div>
                     <!--Fim modal-->   
                </div>
                </td>






                <!--Cidade-->            
                <td class="text-center">
                    <?php 
                        $endereco = $conexao->prepare("SELECT id, cidade FROM endereco  where contato_id = :contato_id");
                        $endereco->bindParam(':contato_id', $contato_id , PDO::PARAM_STR);
                        $executa = $endereco->execute();
                        while($r_endereco = $endereco->fetch(PDO::FETCH_ASSOC))
                        { 
                        ?>

                            <a type="button" class="btn btn-link principal" data-bs-toggle="modal" data-bs-target="#cidade_<?php echo $r_endereco["id"];?>" >
                                <?php echo $r_endereco["cidade"];?>
                            </a>
                            
                            <!-- Modal -->

                            <div class="modal fade" id="cidade_<?php echo $r_endereco["id"];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" style="text-decoration: color: black;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"  id="exampleModalLabel">Cidade</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="#" method="POST" class="row g-3">
                                                <input type="hidden" name="id" value="<?php echo $r_contato["id"];?>">
                                                <div class="col-9">
                                                    <label for="nome" class="visually-hidden">Nome</label>
                                                    <input type="text" class="form-control" id="cidade" name="cidade" pattern="^[A-Za-záàâãéèêíïóôõöúçñ ]+$" value ="<?php echo $r_endereco["cidade"];?>" placeholder="nome da Cidade" maxlength="45">
                                                </div>

                                                <div class="col-2">
                                                    <button type="submit" name="cidade_atualizar" class="btn btn-primary mb-3">Atualizar</button>
                                                </div>
                                            </form>
                                        </div>

                                        <!--
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                                        </div>
                                        -->
                                    </div>
                                </div>
                            </div>
                            <!-- fim modal-->
                    <?php } ?>
                </td>







                <!--Email-->        
                <td class="secundario" style="position: relative">

                    <div class="container-email d-flex mb-2">

                        <div class="email p-2">
                            <?php 
                                $email = $conexao->prepare("SELECT id, email FROM email WHERE  contato_id = :contato_id");
                                $email->bindParam(':contato_id', $contato_id , PDO::PARAM_STR);
                                $executa = $email->execute();
                                while($r_email = $email->fetch(PDO::FETCH_ASSOC))
                                {
                                ?>
                            
                                    <a type="button" class="btn btn-link secundario email_color"  style="font-weight: 700; color: #364161;" data-bs-toggle="modal" data-bs-target="#email_<?php echo $r_email["id"];?>">
                                        <?php echo $r_email["email"];?>
                                    </a>
                                    <br>

                                    <!-- Modal -->
                                    <div class="modal fade " id="email_<?php echo $r_email["id"];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" style="text-decoration: color: black;">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"  id="exampleModalLabel"></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#" method="POST" class="row g-3">
                                                    <input type="hidden" name="id" value="<?php echo $r_email["id"];?>">
                                                    <div class="col-9">
                                                        <label for="email" class="visually-hidden">email</label>
                                                        <input type="email" class="form-control" id="email" name="email" value ="<?php echo $r_email["email"];?>" placeholder="Email">
                                                    </div>

                                                    <div class="col-2">
                                                        <button type="submit" name="email_atualizar" class="btn btn-primary mb-3">Atualizar</button>
                                                    </div>
                                                    <div class="d-grid gap-2">
                                                        <button type="submit" name="email_deletar" class="btn btn-danger ">Excluir</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- 
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                            -->
                                            </div>
                                        </div>
                                    </div>                               
                                    <!--fim modal-->
                            <?php } ?>
                        </div>



                        <div class="add-email ms-auto p-2">
                            
                            <button type="button" name="btn-add-email" class="btn btn-outline-primary btn-sm  mt-1"  style ="border-radius: 25px; color: #000; padding: 5px 10px" data-bs-toggle="modal" data-bs-target="#add_email<?php echo $contato_id ?>">+</button>

                            <div class="modal fade " id="add_email<?php echo $contato_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered " style="text-decoration: color: black;">
                                    <div class="modal-content">
                                            
                                            <div class="modal-header">
                                                <h5 class="modal-title"  id="exampleModalLabel">Adicionar Email</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#" method="POST" class="row g-3">
                                                    <input type="hidden" name="contato_id" value="<?php echo $r_contato["id"];?>">
                                                    <div class="col-5">
                                                        <label for="email" class="visually-hidden">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="perfil" class="visually-hidden">Perfil</label>
                                                        
                                                        <select class="form-select" aria-label="Default select example" id="perfil" name="perfil">
                                                            <option selected>perfil</option>
                                                            <option value="pessoal">pessoal</option>
                                                            <option value="profissional">profissional</option>
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="col-2">
                                                        <button type="submit" name="email_adicionar" class="btn btn-primary mb-3">Adicionar</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                            </div>
                                            -->
                                    </div>
                                </div>
                            </div>
                            </div>
                            <!--Fim modal-->   
                        </div>

                    </div>
                </td>




            </tr>
            <?php }?>
        </tbody>
    </table>  
</div>
   
<?php include("rodape.php");?>


