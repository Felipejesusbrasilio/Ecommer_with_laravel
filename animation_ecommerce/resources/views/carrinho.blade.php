<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/carrinho.css">
	<title>Carrinho de compras</title>
</head>
<body>

<header>
    <a href="/" class="btn btn-light">Voltar</a>
</header>

<div class="container bg-primary">

@if(session('result'))
    
    <div class="alert alert-danger" role="alert" id="alerta">
        {{session('result')}}
    </div>

@endif

@if(session('clean'))
    
    <div class="alert alert-success" role="alert" id="alerta">
        {{session('clean')}}
    </div>

@endif

@if(session('manu'))
    
    <div class="alert alert-dark" role="alert" id="alerta">
        {{session('manu')}}
    </div>

@endif

@foreach($carrinhos as $index => $value)

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Nome do produto</th>
      <th scope="col">Descrição do produto</th>
      <th scope="col">Valor do produto</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{$carrinhos[$index]->image}}</th>
      <td scope="col"><p>{{$carrinhos[$index]->descricao_produto}}</p></td>
      <td scope="col"><p>{{$carrinhos[$index]->valor_produto}}</p></td>
    </tr>
    <tr>
      <th scope="row">Tamanho do produto</th>
      <td scope="col">
    @if(empty($tamanho[$index]->tamanhos))
    <p class="red">você não selecionou o tamanho por favor selecione o tamanho</p>
    <div class="tamanhos">
        <a href="tamanhos/1">38</a>
        <a href="tamanhos/2">39</a>
        <a href="tamanhos/3">40</a>
        <a href="tamanhos/4">41</a>
        <a href="tamanhos/5">42</a>
        <a href="tamanhos/6">43</a>
    </div> 
    @else 
    <p>{{$tamanho[$index]->tamanhos}}</p>     
    @endif
    </td>
    </tr>
    <tr>
        <th scope="col">Imagem</th>
        <th scope="col"><img src="/imagem/produtos/{{$carrinhos[$index]->image}}" width="100" class="img-fluid img-circle"></th>
    </tr>
  </tbody>
  <tfoot>
      <th scope="col">Deletar:</th>
      <td>
          <form method="post" action="deletar/{{$carrinhos[$index]->id}}">
              @csrf
              @method('DELETE')
              <input type="submit" class="btn btn-danger" value="deletar" name="excluri">
          </form>
      </td>
  </tfoot>
</table>

@endforeach


@php $count = 1; @endphp

@foreach ($carrinhos as $index => $value)

@if($count == 1)

<table class="table table-dark">

<thead>

<th scope="col">Valor total: {{$carrinhos[$index]->sum('valor_produto')}}</th>
<th scope="col">quantidade: {{$carrinhos[$index]->count('id')}}</th>

</thead>
</table>    

@php $count++;  @endphp

@endif

@endforeach

</div>

<div class="compras">
    <a href="/pagamento">Finalizar compra</a>
</div>	


<script type="text/javascript">
    
let alerta = document.querySelector('#alerta');

if (alerta){

window.setTimeout(()=>{
   alerta.style.display = 'none';
},3000)

}else{
    console.log('não existe');
}


</script>


</body>
</html>