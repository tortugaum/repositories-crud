<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repositories-crud</title>
    <link rel="stylesheet" href="style.css">

    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->

    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>
<body class="text-center">

    <?php

        $busca = $_POST['busca'] ?? '';        

        include 'conexao.php';

        if($busca != "")
            $sql = "SELECT * FROM ideia WHERE ideiaTitulo LIKE '%$busca%' OR ideiaDescricao LIKE '%$busca%'";
        else
            $sql = "SELECT * FROM ideia";
        $consulta = mysqli_query($conn, $sql);

        if($consulta->num_rows === 0)
    ?>

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h4 class="masthead-brand">Pagina Exemplo</h4>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="#">CRUD</a>
            <a class="nav-link" href="repositorio.php">Repositórios</a>
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover">
            <div class="container-lg">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-12" style="margin-bottom: 2em;"><h2>Ideias de Respositórios</h2></div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <form action="crud.php" method="POST" class="form-inline">
                                    <input type="search" class="form-control mr-sm-2" name="busca">
                                    <button class="btn btn-info add-new mr-sm-2" type="submit">Buscar</button>
                                    <a href="add.php" class="btn btn-primary add-new mr-sm-2"><i class="fa fa-plus"></i>Add</a>  
                                </form> 
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Descrição</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if($consulta->num_rows === 0)
                                echo '<tr>
                                        <td colspan="100%">Nenhum Registro encontrado</td>
                                    </tr>';
                            while($dados_consulta = mysqli_fetch_assoc($consulta)){
                                $ideiaId = $dados_consulta['ideiaId'];
                                $titulo = $dados_consulta['ideiaTitulo'];
                                $descricao = $dados_consulta['ideiaDescricao'];
                                echo "<tr>
                                        <td>$titulo</td>
                                        <td>$descricao</td>
                                        <td>
                                        <a href='edit.php?ideiaId=$ideiaId' class='btn btn-secondary'>Editar</a>
                                        <a href='remove.php?ideiaId=$ideiaId' onClick=" .'"'. "getDados($ideiaId, '$titulo')" .'"'.  "class='btn btn-danger' data-toggle='modal' data-target='#confirma'>Remover</a>
                                        </td>
                                    </tr>";
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>    
    </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>Página de teste</p>
        </div>
      </footer>
    </div>

    </div>

    <div id="confirma" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deseja realmente excluir?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="funcoes/delete_ideia.php" method="POST">
                <p>Tem certeza que deseja excluir esse registro?</p>
                <p id="ideia_titulo">Titulo</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                <input type="hidden" name="id" id="ideia_id" value="">
                <input type="submit" class="btn btn-primary" value="Sim">
                </form>
            </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function getDados(id, titulo){
            document.getElementById("ideia_titulo").innerHTML = "Titulo: " + titulo;
            document.getElementById("ideia_id").value = id;
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
</body>
</html>