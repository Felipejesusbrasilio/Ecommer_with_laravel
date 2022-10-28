<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/cadastrar.css">
    <title>ALL-HERE</title>
</head>
<body>


<header>
    <a href="/" class="btn btn-light">Voltar</a>
</header>

<div class="container">

    @if(session('on'))
    
    <div class="alert alert-warning">
        {{session('on')}}
    </div>

    @endif

    @if(session('off'))
    
    <div class="alert alert-warning">
        {{session('off')}}
    </div>

    @endif

    
    <form action="cadastro_sucesso" method="post">
    
    @csrf

    <label class="col-form-label">Nome e sobre-nome</label>
    <input type="text" name="nome" class="form-control">
    <label class="col-form-label">Cpf</label>
    <input type="text" name="cpf" class="form-control">   
    <label class="col-form-label">Email</label>
    <input type="text" name="email" class="form-control">
    <label class="col-form-label">Endereço</label>
    <input type="text" name="endereco" class="form-control">
    <label class="col-form-label">Complemento</label>
    <input type="text" name="complemento" class="form-control">
    <label class="col-form-label">Cidade</label>
    <input type="text" name="cidade" class="form-control">
    <label class="col-form-label">Estado</label>
    <input type="text" name="estado" class="form-control">
    <label class="col-form-label">Cep</label>
    <input type="text" name="cep" class="form-control">
    <label class="col-form-label">Pais</label>
    <input type="text" name="pais" class="form-control">
    <label class="col-form-label">Numero</label>
    <input type="text" name="numero" class="form-control">
    </br>
    </br>
    <input type="submit" name="enviar" value="Cadastrar" class="btn btn-success">

    </form>
</div>

                        
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</body>

</html>