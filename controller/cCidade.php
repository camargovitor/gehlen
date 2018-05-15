<?php
    require "cAutoload.php";
    $estado = $_GET['estado'];
    $cidade = New Cidade;
?>

<label>Cidade</label> 
<select class="form-control" id="cidade" name="cidade" required name=cidade>
	<?php 
		//$estado->setState($stateSelected);
		$resultCidade = $cidade->getCityList($estado);
		while($dadoCidade = $resultCidade->fetch(PDO::FETCH_OBJ)) { 
	?>
	<option value="<?php echo $dadoCidade->ID ?>"><?php echo $dadoCidade->NOME ?></option>
	<?php } ?>
</select>


