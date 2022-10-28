<?php

namespace App\Http\Controllers;
use App\Models\produtos;
use App\Models\tamanhos;
use App\Models\carrinhos;
use App\Models\result_car;
use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class Ecommerce extends Controller
{
    
    public function show_produtos()
    {
        $geral = produtos::all();

        return view('welcome',['produtos'=> $geral]);
    }


   public function show_view_gestao()
   {
      $show_produtos = produtos::all();

      return view('gestao',['produtos' => $show_produtos]);
   }

   public function gestao_produtos(Request $request)
   {
       $data = new produtos();

        if($request->file('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file-> move(public_path('public/imagem'), $filename);
            $data['image']= $filename;
        }

        $data->nome_produto = $request->nome;
        $data->valor_produto = $request->valor;
        $data->descricao_produto = $request->descricao;

        $data->save();
        
        $show_produtos = produtos::all();

        return view('gestao',['produtos' => $show_produtos]);
   }

   public function cadastro_valido(Request $request)
   {
        $usuarios = new usuarios();

        $usuarios->nome = $request->nome;
        $usuarios->cpf = $request->cpf;
        $usuarios->email = $request->email;
        $usuarios->endereco = $request->endereco;
        $usuarios->complemento = $request->complemento;
        $usuarios->cidade = $request->cidade;
        $usuarios->estado = $request->estado;
        $usuarios->cep = $request->cep;
        $usuarios->pais = $request->pais;
        $usuarios->numero = $request->numero;
        
        $usuarios->save();

        return redirect('/')->with('on','Cadastro realizado com sucesso');

   }

   public function deletando_gestao_produtos($id)
   {
      $produtos = produtos::findOrFail($id)->delete();

      return view('gestao',['produtos'=>$produtos]);
   }

   public function add_tamanho38()
   {
      
      tamanhos::insert(['tamanhos' => '38']);
      
      return redirect('/')->with('msg','tamanho 38 selecionado com sucesso');
  
   }

   public function add_tamanho39()
   {

      tamanhos::insert(['tamanhos' => '39']);
      
      return redirect('/')->with('msg','tamanho 39 selecionado com sucesso');

   }

   public function add_tamanho40()
   {
      
      tamanhos::insert(['tamanhos' => '40']);
      
      return redirect('/')->with('msg','tamanho 40 selecionado com sucesso');

   }

   public function add_tamanho41()
   {
      
      tamanhos::insert(['tamanhos' => '41']);
      
      return redirect('/')->with('msg','tamanho 41 selecionado com sucesso');

   }

   public function add_tamanho42()
   {
     
      tamanhos::insert(['tamanhos' => '42']);
      
      return redirect('/')->with('msg','tamanho 42 selecionado com sucesso');

   }

   public function add_tamanho43()
   {
 
      tamanhos::insert(['tamanhos' => '43']);
      
      return redirect('/')->with('msg','tamanho 43 selecionado com sucesso');

   }

   public function add_produts_for_car($id)
   {
      $produtos = produtos::findOrFail($id);
      
      $add_for_car = carrinhos::create([
      
      'image' => $produtos['image'],
      'nome_produto' => $produtos['nome_produto'],
      'descricao_produto' => $produtos['descricao_produto'],
      'valor_produto' => $produtos['valor_produto']

      ]);

      return redirect('/')->with('sucesso','produto adicionado ao carrinho');

   }

   public function page_car()
   {
   
    $carrinho = carrinhos::all();
    $tamanhos = tamanhos::all();
    $usuarios = usuarios::all();

    if (tamanhos::all()->where('id', 1)->count() == 1 && carrinhos::all()->where('id', 1)->count() == 0) {
       return redirect('/')->with('msg-t','tamanho ja esta selecionado agora selecione o produto');
    }else{
       return view('carrinho',['carrinhos' => $carrinho,'tamanho' => $tamanhos]);
    }

    

}


  public function deletando($id)
  {
   
   $carrinho = carrinhos::findOrFail($id)->delete();
   $tamanhos = tamanhos::find($id)->delete();

   if(carrinhos::all()->where('id')->count() == 16777215) {
    
    carrinhos::truncate();
    tamanhos::truncate();
    return redirect('/carrinho')->with('manu','houve uma manutenção no sistema all-here por favor adicione os produtos novamente');

   }else{
    return redirect('/carrinho')->with('clean','Item deletado do carrinho com sucesso');
   }
  
    
  }

  
  public function pagamento()
  {
      

   $tamanhos = tamanhos::all();
   $carrinho = carrinhos::all();   
   $usuarios = usuarios::all();
   

   if (usuarios::all()->where('id', 1)->count() == 0) {
    
   return redirect('/cadastrar')->with('on','Antes de finalizar a compra realize o cadastro');

   }elseif(carrinhos::all()->where('nome_produto') == null){
   
   
   return redirect('/carrinho')->with('result','Não é possivel finalizar a compra por que não tem nada no carrinho');


   }

   $result = carrinhos::sum('valor_produto');

   if ($result == 0) {
      return redirect('/carrinho')->with('result','Não é possivel finalizar a compra por que não tem nada no carrinho');
   }else{
      

   $preco = array([
      'preco_total' => $result,
      'usuario' => usuarios::all(['nome']),
      'email' => usuarios::all(['email']),
      'produtos' => carrinhos::all(['nome_produto']),
      'tamanhos' => tamanhos::all(['tamanhos'])
   ]);
   

   return $preco;

   }
   

}

  public function cadastrar()
  {
    return view('cadastra');
  }

  public function compra_logo($id)
  {
     $ids = produtos::findOrFail($id);
     
     if (usuarios::all()->where('id', 1)->count() == 0){
     
     return redirect('/cadastrar')->with('off','Antes de apertar no botão compre já realize o cadastro');

     }elseif(tamanhos::all()->where('id', 1)->count() == 0) {
        return redirect('/')->with('msg-tamanho','Antes de apertar no botão compre já selecione o tamanho');
     }else{
      
     $dados = array([
     
     'nome' => usuarios::all(['nome']),
     'email' => usuarios::all(['email']),
     'produto' => $ids['nome_produto'],
     'tamanho' => tamanhos::all(['tamanhos']),
     'valor' => $ids['valor_produto']

     ]);

     return $dados; 

     }

  }

  public function send_email()
   {
      return view('gestao_emails');
   }

}
