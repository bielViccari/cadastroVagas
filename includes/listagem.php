<?php
 $resultados = '';

 foreach($vagas as $vaga){
   $resultados .= '<tr>
                   <td>'.$vaga->id.'</td>
                   <td>'.$vaga->titulo.'</td>
                   <td>'.$vaga->descricao.'</td>
                   <td>'.($vaga->ativo == 's' ? 'Ativo' : 'Inativo').'</td>
                   <td>'.date('d/m/Y',strtotime($vaga->data)).'</td>
                   <td><a href="editar.php?id='.$vaga->id.'"><button type="button" class="btn btn-primary">Editar</button>
                   </a>
                   
                   <a href="excluir.php?id='.$vaga->id.'"><button type="button" class="btn btn-danger">Editar</button>
                   </a>
                   </td>
                   </tr>';
 }
?>
<main>

<section>
  <a href="cadastrar.php" style="margin-left:95px;">
    <button type="submit" class="btn btn-success">Criar nova vaga</button>
  </a>
</section>

<div class="container">
<section>

  <table class="table bg-light mt-3">

  <thead>
    <tr>
      <th>ID</th>
      <th>Título</th>
      <th>Descrição</th>
      <th>Status</th>
      <th>Data</th>
      <th>Ações</th>
    </tr>
  </thead>
   <tbody>
     <?=$resultados?>
   </tbody>
  </table>

</section>
</div>
</main>