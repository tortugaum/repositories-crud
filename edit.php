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
    include 'conexao.php';
        $ideiaId = $_GET['ideiaId'] ?? '';
        $sql = "SELECT * FROM ideia WHERE ideiaId = $ideiaId";

        $consulta = mysqli_query($conn, $sql);

        if($dados_consulta = mysqli_fetch_assoc($consulta)){
            
        }else{
            header('Location: crud.php');
        }
    ?>

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h4 class="masthead-brand">Pagina Exemplo</h4>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="#">CRUD</a>
          </nav>
        </div>
      </header>


      <main role="main" class="inner cover">
            <form action="funcoes/edit_ideia.php" method="POST">
            <div class="col-md-10" style="color:#FFFFFF;padding-right:0;margin-bottom:3em;margin-left:1.5em;"><h2>Alteração de Registro</h2></div>
            <input type="hidden" name="ideiaId" value="<?= $dados_consulta['ideiaId']?>">
            <div class="row">

                <div class="form-group col">
                    <label for="">Titulo</label>
                    <input class="form-control" type="text" name="ideiaTitulo" id="ideiaTitulo" placeholder="Digite um título" value="<?= $dados_consulta['ideiaTitulo']?>">
                </div>
                <div class="form-group col">
                    <label for="">Descrição</label>
                    <input class="form-control" type="text" name="ideiaDescricao" id="ideiaDescricao" placeholder="Digite uma descrição" value="<?= $dados_consulta['ideiaDescricao']?>">
                </div>        
            </div>                
                <button class="btn btn-info add-new mr-sm-2" type="submit">Alterar</button>     
            </form>
    </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>Página de teste</p>
        </div>
      </footer>
    </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
</body>
</html>