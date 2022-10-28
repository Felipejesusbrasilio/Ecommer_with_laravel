<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/gestao.css">
	<title>ALL-HERE</title>
</head>
<body>

<header>
	<h1>GESTÃO DE PRODUTOS</h1>
</header>	

<div class="container">
	 <div class="quadros">
     <a href="/" class="btn btn-primary">Voltar</a>
   </br>
   </br>
  <form method="POST" action="post_gestao" enctype="multipart/form-data">
    @csrf
    <div class="image">
      <label><h4>Add image</h4></label>
      <input type="file" class="form-control" required name="image">
      <label>Nome do produto</label>
      <input type="text" class="form-control" required name="nome">
      <label>Descrição do produto</label>
      <input type="text" class="form-control" required name="descricao">
      <label>Valor do produto</label>
      <input type="text" class="form-control" required name="valor">
    </div>

    <div class="post_button">
      <br>
      <button type="submit" class="btn btn-success">Add produto</button>
    </div>
  </form>
   </div>
   <div class="quadros" id="quadro-two">
      
      @foreach($produtos as $show)
       
      <div class="div-central">
        <div class="divs">
          <form action="deletar_show_produtos/{{$show->id}}" method="post">
             @csrf
             @method('DELETE')
             <input type="submit" value="deletar" class="btn btn-danger" name="deletar">
          </form>
        </div>
        <div class="divs">
          <p>{{$show->nome_produto}}</p>
        </div>
      </div> 

      @endforeach  
        
   </div>
</div>

</body>
</html>