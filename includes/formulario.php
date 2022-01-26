<main>

<section>
  <a href="index.php" style="margin-left:95px;">
    <button type="submit" class="btn btn-success">Voltar</button>
  </a>
</section>
<div class="container">
<h2 class="mt-3">Cadastrar Vaga</h2>

<form action="" method="post">

<div class="form-group mt-2">
    <label>Titulo</label>
    <input type="text" class="form-control" name="titulo">
  </div><!--form-group-->

  <div class="form-group mt-2">
    <label>Descrição</label>
    <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="10"></textarea>
  </div><!--form-group-->

  <div class="form-group mt-2 mb-2">
    <label>Status</label>
</div>

<div class="form-group">
    
        <div class="form-check form-check-inline">
   <label class="form-control">
        <input type="radio" name="ativo" value="s"> Ativo
    </label>
         </div><!--form-check-->
    
  

  
  

    
        <div class="form-check form-check-inline">
   <label class="form-control">
        <input type="radio" name="ativo" value="n"> Inativo
    </label>
         </div><!--form-check-->
    
  </div><!--form-group-->
  
  <div class="form-group mt-3">
    <button type="submit" class="btn btn-success">Enviar</button>
  </div>

</form>
</div><!--container-->
</main>