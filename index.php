<?php
   
    require_once 'servidor.php';
     valida();

     $vetor = consulta();
  

?>

<!DOCTYPE html>
<html>
<head>
  <title>Agenda</title>
  <meta charset="utf-8">
  <meta name=viewport content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="estilo/normalize.css">
  <link rel="stylesheet" type="text/css" href="estilo/estilo.css">
</head>
<div class="page-header">
  
</div>
<body>
  <div class="container">
  <table class="table table-condensed table-bordered table-responsive">
    <thead class="cabeca">
      <tr>
        <th>Número</th>
        <th>Tarefa</th>
        <th>Prazo</th>
        <th>Descrição</th>
        <th>Concluída</th>
        <th>Opções</th>
      </tr>
</thead>
      <tr class="enter2">
        <form action="index.php">
        <td><input class="enter form-control" type="text" size="" name="numero" maxlength="4" autofocus=""></td>
        <td><input class="enter form-control" type="text" size="" name="tarefa"></td>
        <td><input class ="enter form-control" type="date" name="prazo" placeholder="DD/MM/AAAA"></td>
        <td><input class="enter form-control" type="text" size="" name="descricao"></td>
        <td><input type="radio" name="concluida" value="1"><b>Sim</b><br><input type="radio" name="concluida" value="2"><b>Não</b></td>
        <td><input class="btn btn-warning btn-block" type="submit" value="Agendar" id="cadastrar"></td>
       </form> 
      </tr>
   
   <!-- 
    <tr class="tr1">
      <td><b>0789</b></td>
      <td>Estudar Java</td>
      <td>05/03/2018</td>
      <td>Estudar Java para certificação Oracle</td>
      <td>Não</td>
      <td><input class="button btn btn-info btn-sm" type="button" value="Editar"><input class="button btn btn-danger btn-sm" type="button" value="Excluir"></td>
    </tr>
  -->

    <?php $cont =0; foreach($vetor as $row): $cont++; ?>
    <?php  if($cont%2 ==0){ $class="tr1";}else{ $class = "tr2";} ?>


     <tr class="<?php echo $class;?>">
      <td><b><?php echo $row['numero']; ?></b></td>
      <td><?php echo $row['tarefa']; ?></td>
      <td><?php if(traduzData($row['prazo']) == "1970-01-01"){ echo " ";}else{ echo traduzData($row['prazo']); }; ?></td>
      <td><?php echo $row['descricao']; ?></td>
      <td><?php echo traduzConcluida($row['concluida']); ?></td>
      <td class="opcoes">

        <a href="editar.php?id=<?php echo $row['id'];?>"><input class="button btn btn-info btn-sm" type="button" value="Editar"></a>
        <input class="button btn btn-danger btn-sm" type="button" value="Excluir">
      </td>
       
     </tr>    

    <?php endforeach; ?>




    </table>
 </div> 

</body>
</html>
