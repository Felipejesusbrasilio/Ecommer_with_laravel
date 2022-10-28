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
    <link href="css/image-zoom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/animation_style_css.css">
    <title>ALL-HERE</title>
</head>
<body>

<header class="bg-primary position-fixed">
    <div class="col-lg-12 barra">
        <div class="menus">
            <img src="/imagem/menu.png" width="40" id="menu">
        </div>
        <div class="msg-here">
            @if(session('msg'))
      
            <p class="alert alert-success" id="alerta">{{session('msg')}}</p>

            @endif

            @if(session('sucesso'))
                                                              
            <p class="alert alert-success" id="alerta">{{session('sucesso')}}</p>

            @endif 

            @if(session('on'))

            <div class="alert alert-success" id="alerta">
                {{session('on')}}
            </div>

            @endif

            @if(session('msg-tamanho'))

            <div class="alert alert-danger" id="alerta">
                {{session('msg-tamanho')}}
            </div>

            @endif

            @if(session('msg-t'))

            <div class="alert alert-success" id="alerta">
                {{session('msg-t')}}
            </div>

            @endif
             
        </div>
        <div class="menus">
            
            <a href="/carrinho"><img src='/imagem/carrinho.png' width='40'></a>
            
        </div>
    </div>
</header>

<div class="pesquisa-frete bg-primary position-fixed">
    <div class="div-central-white">
        
    </div>
</div>

<div class="painel-manu-phone position-fixed" id="close-painel-menu-phone">
    
<div class="menu-phone position-fixed">
    <div class="div-close">
        <div class="logo">
            <p>ALL-HERE</p>
        </div>
        <div class="icon-close">
            <img src="imagem/fechar.png" id="fechar-menu-phone">
        </div>
    </div>
    <div class="div-buttons">
        <a href="/cadastrar">Cadastre-se</a>
    </div>
    <div class="div-icons">
        
    </div>
</div>

</div>

<div class="espacamento"></div>

    @foreach($produtos as $show_produtos)

    <div class="container">

    <div class="televisor bg-dark">
        <div class="tela bg-light">
            <div class="quadros">
                <div class="header">
                    <h3>{{$show_produtos->nome_produto}}</h3>
                </div>
                <div class="body">
                    <div class="conteudo" id="conteudo-centralizado">
                        <img src="/imagem/produtos/{{$show_produtos->image}}" class="img-fluid" width="50%" data-zoom-image>
                    </div>
                    <div class="conteudo">
                        <p>valor: {{$show_produtos->valor_produto}}</p>
                        

                        <p>{{$show_produtos->descricao_produto}}</p>
                         
                        
                    </div>
                </div>
                <div class="footer">
                    <button type="button" id="open-modal" data-bs-toggle="modal" data-bs-target="#myModal"><a href="/carrinho/{{$show_produtos->id}}">Adicionar no Carrinho</a></button>
                    <button type="button" id="open-modal" data-bs-toggle="modal" data-bs-target="#myModal"><a href="/compre_ja/{{$show_produtos->id}}">Compre já</a></button>    
                </div>
            </div>
            <div class="quadros">
                <div class="header">
                    <p>SELECIONE O TAMANHO</p>
                </div>
                <div class="body">
                    <div class="conteudo" id="conteudo02">

                        <div class="selecionar bg-primary">
                            <a href="tamanhos/1">38</a>
                            <a href="tamanhos/2">39</a>
                            <a href="tamanhos/3">40</a>
                            <a href="tamanhos/4">41</a>
                            <a href="tamanhos/5">42</a>
                            <a href="tamanhos/6">43</a>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="part-televisor-01">
       <div class="part-televisor-02">
           <div class="part-meio bg-dark"></div>
       </div>
       <div class="part-televisor-03 bg-dark">
           
       </div>     
    </div>
   
   <div class="central-anuncios">
        <div class="quadros-anuncios bg-light">
            <p>anuncios google ads</p>
        </div>
        <div class="quadros-anuncios bg-light">
            <p>anuncios google ads</p>
        </div>
</div> 

</div>

@endforeach

<div class="bg-primary central-footer">
    <div class="quadros-footer">
        
    </div>
    <div class="quadros-footer" id="footer-two">
        <h1>ALL-HERE</h1>
    </div>
</div>


                          

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>


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

<script type="text/javascript">

let button_fechar = document.querySelector('#fechar-menu-phone');

let div_black = document.querySelector('#close-painel-menu-phone');
let close_div_black = document.querySelector('#close-painel-menu-phone');

button_fechar.addEventListener('click',function(){
    close_div_black.style.display = 'none';
});    


let menu = document.querySelector('#menu');
menu.addEventListener('click',function(){
  div_black.style.display = 'block';
});

</script>


</html>