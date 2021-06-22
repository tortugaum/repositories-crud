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
        <div class="row">
            <?php    
            include '../conexao.php';

            $ideiaTitulo = $_POST['ideiaTitulo'];
            $ideiaDescricao = $_POST['ideiaDescricao'];
            $ideiaId = $_POST['ideiaId'];

            $sql = "UPDATE ideia  SET ideiaTitulo='$ideiaTitulo', ideiaDescricao = '$ideiaDescricao' WHERE ideiaId = $ideiaId";

            if(mysqli_query($conn, $sql)){
                echo "Registro alterado com sucesso";                
            }else{
                echo "Erro ao alterar registro";
            }
            header('Location: ../crud.php');
            ?>
        </div>
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