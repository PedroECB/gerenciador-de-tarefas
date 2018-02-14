<?php

include_once "servidor.php"; 
if(!empty($_GET['id'])){
$id = $_GET['id'];

$vetor = consulta2(intval($_GET['id']));
foreach ($vetor as $row) {
  $nome = $row['tarefa'];
  $descricao = $row['descricao'];
  $concluida = $row['concluida'];
}

}



?>
<!DOCTYPE html>
<html>
<head>
  <title>Editar</title>
  <meta name=viewport content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="estilo/normalize.css">
  <link rel="stylesheet" href="estilo/estilo2.css">
</head>

</div>
<body>
  <div class="col-md-4">
    
  </div>
    <form>
      <fieldset>
        <h2>Editar</h2>
         <b>Tarefa:</b><br>
         <input type="text" name="nome" class="nome form-control" value="<?php echo $nome;?>"><br>

         <br><b>Descrição</b><br>
         <textarea name="descricao" cols="25" rows="2" maxlength="75" class="nome form-control"><?php echo $descricao; ?></textarea><br>

         <br><b>Prazo</b><br>
         <input type="date" name="prazo" value="" class="form-control"><br>

         <br><b>Prioridade</b>

         <select name="prioridade" class="form-control">
           <option value="1">Baixa</option>
           <option value="2">Média</option>
           <option value="3">Alta</option>  
         </select>
          
          <br>
         <br><b>Concluída</b>
         <input type="checkbox" name="concluida" value="2" placeholder=""<?php if($concluida == 1){ echo "checked";}?>>
         <br>
         <br>
         <input type="submit" value="Salvar" class="btn btn-primary">

      </fieldset>


    </form>
</body>
</html>
