<?php
session_start();
if(isset($_GET['limpar'])){
   unset($_SESSION['buy']);//unset -> Destrói a variável especificada
}


$camisas = array(
   ['name' => 'Camisa chelsea', 'image' => 'uploads/camisa1.jpg', 'price' => 55.9],
   ['name' => 'Camisa arsenal', 'image' => 'uploads/camisa2.jpg', 'price' => 45.9],
   ['name' => 'Camisa polo', 'image' => 'uploads/camisa3.jpg', 'price' => 65]
);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>loja virtual</title>

   <!-- Link para o CSS do Bootstrap -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="/css/style.css">
</head>

<body>
   <nav class="navbar navbar-light bg-danger">
      <div class="container">
         <a class="navbar-brand" href="#">
            <img src="./images/logo.png" alt="" width="50" height="50" class="d-inline-block align-text-top">
         </a>
      </div>
   </nav>

   <div class="card-group text-center container">
      <?php foreach($camisas as $key => $value): ?>
         <div class="card">
         <img src="<?php echo $value['image']  ?>" class="card-img-top" alt="....">

            <div class="card-body">
               <h5 class="card-title"><?= $value['name']?></h5>
               <p class="card-text">R$<?= $value['price'] ?></p>
               <a href="?comprar=<?php echo $key ?>" class="btn btn-warning">COMPRAR</a>
            </div>
         </div>
      <?php endforeach; ?>
   </div>

   <div class="container">
         <?php
         if(isset($_GET['comprar'])){
            $idCamisa = (int) $_GET['comprar'];
            if(isset($camisas[$idCamisa])){
               
            }else{
               echo "O Produto não está mais no estoque";
            }
         }
         ?>
   </div>
 
   <?php
if (isset($_GET['comprar'])) {
   $idCamisa = (int) $_GET['comprar'];
   if (isset($camisas[$idCamisa])) {
      if (isset($_SESSION['buy'][$idCamisa])) {
         $_SESSION['buy'][$idCamisa]['quant']++;
      } else {
         $_SESSION['buy'][$idCamisa] = array('quant' => 1, 'name' => $camisas[$idCamisa]['name'], 'price' => $camisas[$idCamisa]['price']);
      }
      echo '<script>alert("Camisa adicionada no carrinho")</script>';
   } else {
      die("O Produto não está mais no estoque");
   }
}
?>


<!-- Carrinho-->

   <?php 
if(isset($_SESSION['buy'])){
   echo "<h2>Carrinho</h2>";
   foreach ($_SESSION['buy'] as $key => $value){
      echo '<p>Nome: '.$value['name'].'| Quant.:'.$value['quant'].' | Valor: R$'.$value['price']*$value['quant'].':';
      echo "<br>";
   }
}else{
   echo "O Carrinho está vazio!";
}
?>
<p><a href="?limpar" class="btn btn-secondary">LIMPAR CARRINHO</a></p>


<!-- fazer calculo das compras -->
<?php 
$total = [
   'quants' => 0,
   'prices' => 0
];
if(isset($_SESSION['buy'])){
   foreach ($_SESSION['buy'] as $key => $value){
      $total['quants'] += $value['quant']; 
      $total['prices'] += $value['price'] * $value['quant']; 
   }
}
echo $total['quants'].' produtos por R$'.$total['prices'];
?>



   
</body>
</html>