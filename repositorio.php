<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repositories-crud</title>
    <link rel="stylesheet" href="style.css">


    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="text-center">
    <div class="cover-container d-flex h-100 p-3 flex-column" style="margin-right:13vw;">
        <header class="masthead mb-auto">
            <div class="inner">
            <h4 class="masthead-brand">Pagina Exemplo</h4>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link " href="crud.php">CRUD</a>
                <a class="nav-link active" href="repositorio.php">Repositórios</a>
            </nav>
            </div>
        </header>

        <main role="main" class="inner cover">
            <div class="row">
                <div class="col-sm-12" style="margin-bottom: 2em;text-align:justify;"><h2 style="color:#FFFFFF;">Lista de Respositórios</h2></div>

            </div>
             <div class="row">
                    <div class="col-md">
                        <form action="" class="form-inline">
                            <input type="search" class="form-control mr-sm-2" name="github-user" id="github-user" placeholder="Usuario Github">
                            <button class="btn btn-info add-new mr-sm-2" type="button" id="listarGithub" >Listar</button>
                        </form> 
                    </div>
                </div>
            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-striped table-inverse table-responsive" id="github-repos">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Link</th>
                        </tr>
                        </thead>
                </table>
            </div>
        </main> 

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>Página de teste</p>
            </div>
        </footer>

    </div>

    <script>
        function getDados(id, titulo){
            document.getElementById("ideia_titulo").innerHTML = "Titulo: " + titulo;
            document.getElementById("ideia_id").value = id;
         }

         function getGithubRepos(api){
            var listrepos = document.createElement('tbody');
            document.getElementById('github-repos').appendChild(listrepos);

            $.getJSON(api, function(data){
                data.forEach(v =>{
                    listItem = document.createElement('tr');
                    listrepos.appendChild(listItem);
                    rname = document.createElement('td');
                    rdesc = document.createElement('td');
                    rlink = document.createElement('td');
                    listItem.appendChild(rname);
                    listItem.appendChild(rdesc);
                    listItem.appendChild(rlink);
                    rname.textContent = `${v.name}`;
                    rdesc.textContent = `${v.description}`;
                    rlink.textContent = `${v.url}`;
                });
            });
         }

        $(document).ready(function(){
            var user = '';
            var api = ``;

            $('#listarGithub').on("click",function(){
                user = $('#github-user').val();
                if(user == '')
                user = 'tortugaum';
                
                api = `https://api.github.com/users/${user}/repos`;
                $('#github-repos tbody').empty();
                getGithubRepos(api);
                console.log(api);
            });
            if(user == '')
                    user = 'tortugaum';
            api = `https://api.github.com/users/${user}/repos`;
            
            getGithubRepos(api);

        });
    </script>

    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
</body>
</html>