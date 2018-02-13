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
  <link rel="stylesheet" type="text/css" href="estilo/normalize.css">
  <link rel="stylesheet" type="text/css" href="estilo/estilo.css">
</head>
<body>
  <table>
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
        <td><input class="enter" type="text" size="" name="numero" maxlength="4" autofocus=""></td>
        <td><input class="enter" type="text" size="" name="tarefa"></td>
        <td><input class ="enter" type="date" name="prazo" placeholder="DD/MM/AAAA"></td>
        <td><input class="enter" type="text" size="" name="descricao"></td>
        <td><input type="radio" name="concluida" value="1"><b>Sim</b><br><input type="radio" name="concluida" value="2"><b>Não</b></td>
        <td><input class="btnn1" type="submit" value="Agendar" id="cadastrar"></td>
       </form> 
      </tr>
    
    <tr class="tr1">
      <td>0789</td>
      <td>Estudar Java</td>
      <td>05/03/2018</td>
      <td>Estudar Java para certificação Oracle</td>
      <td>Não</td>
      <td><input class="botoes" type="button" value="Editar"><input class="botoes" type="button" value="Excluir"></td>
    </tr>

    <?php $cont =0; foreach($vetor as $row): $cont++; ?>
    <?php  if($cont%2 ==0){ $class="tr1";}else{ $class = "tr2";} ?>


     <tr class="<?php echo $class;?>">
      <td><?php echo $row['numero']; ?></td>
      <td><?php echo $row['tarefa']; ?></td>
      <td><?php echo traduzData($row['prazo']); ?></td>
      <td><?php echo $row['descricao']; ?></td>
      <td><?php echo traduzConcluida($row['concluida']); ?></td>
      <td class="opcoes">

        <a href="editar.php?id=<?php echo $row['id'];?>"><input class="botoes btnn2" type="button" value="Editar"></a>
        <input class="botoes btnn3" type="button" value="Excluir">
      </td>
       
     </tr>    

    <?php endforeach; ?>




  </table>
</body>
</html>
