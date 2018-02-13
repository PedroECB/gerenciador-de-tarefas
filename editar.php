<?php

include_once "servidor.php"; 

$id = $_GET['id'];

$vetor = consulta2(intval($_GET['id']));

?>
<!DOCTYPE html>
<html>
<head>
  <title>Editar</title>
  <link rel="stylesheet" href="estilo/normalize.css">
  <link rel="stylesheet" href="estilo/estilo2.css">
</head>
<body>
    <form>
      <fieldset><legend>Editar</legend>
         <b>Tarefa:</b><br>
         <input type="text" name="nome" class="nome"><br>

         <br><b>Descrição</b><br>
         <textarea name="descricao" cols="25" rows="2" maxlength="75" class="nome"></textarea><br>

         <br><b>Prazo</b><br>
         <input type="date" name="prazo" value=""><br>

         <br><b>Prioridade</b>

         <select name="prioridade">
           <option value="1">Baixa</option>
           <option value="2">Média</option>
           <option value="3">Alta</option>  
         </select>
          
          <br>
         <br><b>Concluída</b>
         <input type="checkbox" name="concluida" value="1" placeholder="">
         <input type="button" value="Salvar">

      </fieldset>


    </form>
</body>
</html>
