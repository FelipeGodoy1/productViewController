<?php include("cabecalho.php")?>

<?php
          
    $contato = $conexao->prepare("SELECT * FROM contato where id = :id ");
    $contato->bindParam(':id',$_GET["id"], PDO::PARAM_STR);
    $executa = $contato->execute();
    $r_contato = $contato->fetch(PDO::FETCH_ASSOC);
       
                    
?>

<div class="container">

    <form class=" p-2 d-flex mb-3" action="#" method="GET" role="search" >
        <div class="me-auto p-2">
            <label for="staticEmail2" class="visually-hidden">Email</label>
            <h3><?php echo $r_contato["nome"]?></h3>
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
          
            $servicos = $conexao->prepare("SELECT * FROM servico where contato_id = :id");
            $servicos->bindParam(':id',$_GET["id"], PDO::PARAM_STR);
            $executa = $servicos->execute();
            while($r_servicos = $servicos->fetch(PDO::FETCH_ASSOC))
            {
                $servicos_id = $r_servicos["id"];

                      
            ?>

        <tr>

            <!--ID--> 
            <th scope="row">
                <div class ="mt-2">
                    <a href="contato.php?id=<?php echo $r_servicos["id"];?>">
                        #<?php echo $r_servicos["id"];?>
                    </a>
                </div>
            </th>



               

            <!--Nome-->    
            <td>
                <a type="button" class="btn btn-link principal" data-bs-toggle="modal" data-bs-target="#servicos_<?php echo $r_servicos["id"];?>">
                    <?php echo $r_servicos["nome"];?>
                </a>
                <br>

                <!-- Modal -->

                <div class="modal fade " id="servicos_<?php echo $r_servicos["id"];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="text-decoration: color: black;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"  id="exampleModalLabel">Nome</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form action="#" method="POST" class="row g-3">
                                    <input type="hidden" name="id" value="<?php echo $r_servicos["id"];?>">
                                    <div class="col-7">
                                        <label for="nome" class="visually-hidden">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome"  value ="<?php echo $r_servicos["nome"];?>" placeholder="nome completo" maxlength="45">
                                    </div>
                            
                                    <div class="col-4">
                                        <button type="submit" name="servicos_atualizar" class="btn btn-primary mb-3">salvar</button>
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

            </td>







            <!-- Telefone-->
            <td>

            
            </td>






            <!--Cidade-->            
            <td class="text-center">
               
            </td>







            <!--Email-->        
            <td class="secundario" style="position: relative">

                
                   
            </td>




        </tr>
        <?php }?>
    </tbody>
</table>  
</div>
<?php include("rodape.php")?>