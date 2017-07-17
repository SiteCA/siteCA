<?php include 'header.php'; ?>
	<div id="pgCalendario">

<?
//ini_set("display_errors", 1);


$mysqli = new mysqli("localhost", "root","adiante@123","calendario");



$meses=array('','Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');

$mes=(int)$_GET['mes'];
$ano=(int)$_GET['ano'];

if($mes==0){
	$mes=(int)date('m');
}
if($ano==0){
	$ano=(int)date('Y');
}



$diasMes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
$diaSemana=date('w',mktime(0,0,0,$mes,1,$ano));
$diaSemana=(int)$diaSemana;




#navegação

$pxMes=$mes+1;
$pxAno=$ano;

if($pxMes>12){
	$pxMes=1;
	$pxAno++;
}

$atMes=$mes-1;
$atAno=$ano;

if($atMes<1){
	$atMes=12;
	$atAno--;
}





?>


		<tr>
		<td>
<br />
<br />
<br />
<br />
      <div class="calendario">
<div class="cab"><? echo $meses[$mes].' / '.$ano?><p class="setas"><a href="?mes=<? echo $atMes.'&ano='.$atAno;?>"><img src="assets/images/voltar.png" width="32" height="32" border="0" /></a><a href="?mes=<? echo $pxMes.'&ano='.$pxAno;?>"><img src="assets/images/avancar.png" width="32" height="32" border="0" /></a></p>
</div>
<ul>
<li class="top">D</li>
<li class="top">S</li>
<li class="top">T</li>
<li class="top">Q</li>
<li class="top">Q</li>
<li class="top">S</li>
<li class="top">S</li>

<? if($diaSemana>0){
	for($x=0;$x<$diaSemana;$x++){
	?>
    
    <li class="null">&nbsp;</li>
    
<? 	}
}?>

<? 

$eventos=array();

for($x=1;$x<=$diasMes;$x++){


	$d=date('Y-m-d',mktime(0,0,0,$mes,$x,$ano));
	$sql=$mysqli->query("SELECT *, date_format(data, '%d/%m/%Y') as data1 FROM tbeventos WHERE data='".$d."'");
	
	if($sql->num_rows){
		$cl=' class="date"';
		
			$eventos[]=$sql->fetch_all(MYSQLI_ASSOC);
		
	}else{
		$cl='';
	}
	?>
    
    <li<? echo $cl;?>><? echo $x;?></li>
    
<? 	}
?>

<? 
$difereca=$diasMes+$diaSemana;
$resto=$difereca%7;
$resto=7-$resto;

if($resto>0 && $resto<7){
	for($x=0;$x<$resto;$x++){
	?>
    
    <li class="null">&nbsp;</li>
    
<? 	}
}?>
</ul>
</div>

<?php 


	if(count($eventos)){

	
		echo '<h2 class="fontCalibri">Eventos o mês de '.$meses[$mes].'</h2>';

		$x=0;
		foreach ($eventos as $evento) {$x++;

		?>

		<div class="eventos">
			<p><strong>Título</strong>:<?=$evento[0]['titulo']?></p>
			<p><strong>Data</strong>:<?=$evento[0]['data1']?></p>
			<p><strong>Detalhes</strong>:<?=$evento[0]['descricao']?></p>
		</div>

<?
	if($x>0) echo '<hr>';
		}
?>





<? }?>






	</div>



<?php include 'footer.php'; ?>