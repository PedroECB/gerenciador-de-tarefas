<?php



        $server = 'localhost';
        $user = 'root';
        $pass = '123';
        $dbname = 'banco';

        $con = mysqli_connect($server,$user,$pass,$dbname );
               mysqli_set_charset($con,"UTF8");
        if(!$con){
          mysqli_error($con);
          echo "<br> Falha na conexão cabaço";
        }else{
          echo "";
        }

               // Inserindo dados no banco

function insere($numero,$tarefa,$concluida,$prazo,$descricao){
  global $con;
  $query = "INSERT INTO tarefas(numero,tarefa,descricao,concluida, prazo) VALUES ('$numero','$tarefa','$descricao','$concluida','$prazo');";

 $insert = mysqli_query($con,$query);
  if(!$insert){
    echo "erro na consulta";
  }else{
    echo "Inserido com sucesso";
    header("Location:index.php");
  }


}


                     // Validando as informações do formulário


function valida(){

  $aviso = 'xxxxx';
  if(!empty($_GET['numero']) && !empty($_GET['tarefa']) && !empty($_GET['descricao']) && !empty($_GET['concluida']) ){

    $aviso = " ";
    $numero = $_GET['numero'];
    $tarefa = $_GET['tarefa'];
    $descricao = $_GET['descricao'];
    $concluida = $_GET['concluida'];
    $prazo = $_GET['prazo'];

    insere($numero,$tarefa,$concluida,$prazo,$descricao);

  }else{ $aviso = "errado desgraçaaaaa";}
}


function consulta(){
  global $con;
  $query = "SELECT * FROM tarefas;";

  $consulta = mysqli_query($con,$query);
  if(!$consulta){
    echo "Falha na segunda query";
  }else{
    return $consulta;
    }
  }

function consulta2($id){
  global $con;
  $query = "SELECT * FROM tarefas WHERE id='$id'";

  $consulta = mysqli_query($con,$query);
  if(!$consulta){
    echo "Falha na segunda query";
  }else{
    return $consulta;
    }
  }

  function atualiza($id){
  
if(empty($_GET['conc'])){ $concluida = 0;}
if(!empty($_GET['conc'])){ $concluida = $_GET['conc']; }
if(!empty($_GET['prazo'])){$prazo= $_GET['prazo'];}
if(empty($_GET['prazo'])){ $prazo = "1970-01-01";}

  $nome= $_GET['nome'];
  $descricao= $_GET['descricao'];
  $prioridade = $_GET['prioridade'];
 




  global $con;
  $query = "UPDATE tarefas set tarefa='$nome', descricao='$descricao', prazo='$prazo', prioridade=$prioridade, concluida=$concluida WHERE id=$id";
  $consulta = mysqli_query($con,$query);
  
  if(!$consulta){
    echo "Falha na query de atualização";
  }else{
    header("Location:index.php");
    die();
    }
  }

  



function traduzData($campo){

 if($campo =="0000-00-00" or $campo == "" or $campo == "1970-01-01"){
    $campo == " ";
  return $campo;
 }

$novo = explode("-",$campo);
$novocampo = $novo[2]."/".$novo[1]."/".$novo[0];

return $novocampo;


}

function traduzConcluida($concluida){

  if($concluida == 1){
    return "Sim";
  }else{
    return "Não";
  }

}
