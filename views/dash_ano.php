<?php

session_start();

if(!isset($_SESSION['admin_name']) && !isset($_SESSION['password'])) {
    header("Location:../../index.php");
}


$id = $_POST['ano'];

$_SESSION['ano'] = $id;



	?> 





<!DOCTYPE html>
<html lang="pt_br">
<head>
    <script type="text/javascript" src="js/canvasjs.min.js"></script>
    <script type="text/javascript" src="js/Chart.bundle.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Projeto PI4</title>

    <!-- Bootstrap -->
    <link href="../../resource/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../resource/css/font-awesome.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../resource/css/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../resource/css/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../../resource/css/bootstrap-progressbar-3.3.4.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../../resource/css/jqvmap.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../../resource/css/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../../resource/css/custom.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        <!-- side and top bar include -->
        <?php include '../partPage/sideAndTopBarMenu.html' ?>
        <!-- /side and top bar include -->

        <!-- page content -->
        <div class="right_col" role="main">
            <!-- top tiles -->
            <div class="row tile_count">
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Casos para o Ano de <?php echo $_SESSION['ano']; ?></span>
                    
	    
		    
                    
    <?php	        
    include('conect.php');       
    $result = $db->prepare("SELECT COUNT(id) TOTAL  FROM recife where notificacao_ano = $id "); 
    $result->bindParam(':SUM(status)', $res);
    $result->execute();
     $perguntas = 63160;
    
    
   for($i=0; $row = $result->fetch(); $i++){
    $acertos = $row['TOTAL'];
    $valor = number_format((($acertos / $perguntas) * 100), 2, '.', '') . "%" ;
    {
    ?> 
    <div class="count"><?php echo $row['TOTAL']; ?></div>
              
    <span class="count_bottom"><i class="red"><i class="fa fa-sort-asc"></i><?php echo $valor ?> </i>= Período <?php echo $_SESSION['ano']; ?></span>
               
    <form action="dash_ano.php" method="post">
      <select name="ano" id="ano">
        <option value="" disabled selected>Por Ano</option>
        
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
         <option value="2020">2020</option>
    </select>
    <input type="submit" name="submit" value="Pesquisar">
    </form>
    <?php
    }}
    ?>
                    
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Casos do Sexo Feminino</span>
		    
		            
    <?php
    include('conect.php');
    $result = $db->prepare("SELECT COUNT(id) TOTAL FROM recife WHERE notificacao_ano = $id and tp_sexo = 'F' ");
	
    $result->bindParam(':TOTAL', $res);
    $result->execute();
    $perguntas = 63160;

    for($i=0; $row = $result->fetch(); $i++){
    $acertos = $row['TOTAL'];
    $valor = number_format((($acertos / $perguntas) * 100), 2, '.', '') . "%" ;
    {
    ?> 
    <div class="count blue"><?php echo $row['TOTAL']; ?> </div>
    <span class="count_bottom"><i class="red"><i class="fa fa-sort-asc"></i><?php echo $valor ?> </i>= Período <?php echo $_SESSION['ano']; ?></span>
    <?php
    }}
    ?>
    </div>
                
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Casos do Sexo Masculino</span>	            
   
    <?php        
    include('conect.php'); 
    $result = $db->prepare("SELECT COUNT(id) TOTAL FROM recife WHERE notificacao_ano = $id and tp_sexo = 'M' ");
	
    $result->bindParam(':TOTAL', $res);
    $result->execute();
    $perguntas = 63160;

    for($i=0; $row = $result->fetch(); $i++){
    $acertos = $row['TOTAL'];
    $valor = number_format((($acertos / $perguntas) * 100), 2, '.', '') . "%" ;
    {
    ?>    
    <div class="count blue"><?php echo $row['TOTAL']; ?> </div>
    <span class="count_bottom"><i class="red"><i class="fa fa-sort-asc"></i><?php echo $valor ?> </i>= Período <?php echo $_SESSION['ano']; ?></span>
    <?php
    }}
    ?>
    </div>
                
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Casos abaixo dos 18 Anos</span>

	    
    <?php
    include('conect.php');
	
	
        
	$result = $db->prepare("SELECT COUNT(id) TOTAL FROM recife WHERE notificacao_ano = $id and nu_idade < '4018' ");
	
		$result->bindParam(':TOTAL', $res);
		$result->execute();
                 $perguntas = 63160;
                
                 
	       
    
		for($i=0; $row = $result->fetch(); $i++){
		     $acertos = $row['TOTAL'];
		     $valor = number_format((($acertos / $perguntas) * 100), 2, '.', '') . "%" ;
		     
		    

                 
                    {
	?> 
		    
                  <div class="count green"><?php echo $row['TOTAL']; ?> </div>
                    
                    
                    
                    <span class="count_bottom"><i class="red"><i class="fa fa-sort-asc"></i><?php echo $valor ?> </i>= Período <?php echo $_SESSION['ano']; ?></span>
	<?php
	}}
	?>
            </div>
                          
                
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Casos entre 18 a 45 Anos</span>
		    
		            
   <?php
	        
	include('conect.php');
	
	
        
	$result = $db->prepare("SELECT COUNT(id) TOTAL FROM recife WHERE notificacao_ano = $id and nu_idade > '4018' and  nu_idade < '4045'");
	
		$result->bindParam(':TOTAL', $res);
		$result->execute();
                 $perguntas = 63160;
                
                 
	       
    
		for($i=0; $row = $result->fetch(); $i++){
		     $acertos = $row['TOTAL'];
		     $valor = number_format((($acertos / $perguntas) * 100), 2, '.', '') . "%" ;
		     
		    

                 
                    {
	?> 
		    
                  <div class="count green"><?php echo $row['TOTAL']; ?> </div>
                    
                    
                    
                    <span class="count_bottom"><i class="red"><i class="fa fa-sort-asc"></i><?php echo $valor ?> </i>= Período <?php echo $_SESSION['ano']; ?></span>
	<?php
	}}
	?>
            </div>
                            
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Casos acima dos 45 Anos</span>
		    
		            
   <?php
	        
	include('conect.php');
	
	
        
	$result = $db->prepare("SELECT COUNT(id) TOTAL FROM recife WHERE notificacao_ano = $id and nu_idade > '4045'");
	
		$result->bindParam(':TOTAL', $res);
		$result->execute();
                 $perguntas = 63160;
                
                 
	       
    
    for($i=0; $row = $result->fetch(); $i++){
    $acertos = $row['TOTAL'];
    $valor = number_format((($acertos / $perguntas) * 100), 2, '.', '') . "%" ;
           
    {
    ?> 
		    
    <div class="count green"><?php echo $row['TOTAL']; ?> </div>
          
    <span class="count_bottom"><i class="red"><i class="fa fa-sort-asc"></i><?php echo $valor ?> </i>= Período <?php echo $_SESSION['ano']; ?></span>
    <?php
    }}
    ?>
    </div></div>
            
            
    <!-- /top tiles -->
    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="dashboard_graph">
    <div class="row x_title">
    <div class="col-md-6">
    <h3>Casos de Dengue referente ao Ano de <?php echo $_SESSION['ano']; ?><small></small></h3>
    </div></div>

    <?php
    /* Database connection settings */
    include_once 'db.php';
	$data1 = '';
	$data2 = '';
	$data3 = '';
	$data4 = '';
	$data5 = '';
	$data6 = '';
	$data7 = '';
	$data8 = '';
	$data9 = '';
	$data10 = '';
	$data11 = '';
	$data12 = '';
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao, COUNT(id)as TOTAL FROM recife WHERE  year(dt_notificacao) = $id and month(dt_notificacao) = 01 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data1 = $data1 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data1 = trim($data1,",");
    $data2 = trim($data2,",");
    $buildingName = trim($buildingName,",");	
?>
    <?php
    /* Database connection settings */
    include_once 'db.php';

	$data2 = '';
	
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao, COUNT(id)as TOTAL FROM recife WHERE  year(dt_notificacao) = $id and month(dt_notificacao) = 02 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data2 = $data2 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data2 = trim($data2,",");
    $buildingName = trim($buildingName,",");	
?>


   <?php
    /* Database connection settings */
    include_once 'db.php';

	$data3 = '';
	
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao, COUNT(id)as TOTAL FROM recife WHERE  year(dt_notificacao) = $id and month(dt_notificacao) = 03 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data3 = $data3 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data3 = trim($data3,",");
    $buildingName = trim($buildingName,",");	
?>

   <?php
    /* Database connection settings */
    include_once 'db.php';

	$data4 = '';
	
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao, COUNT(id)as TOTAL FROM recife WHERE  year(dt_notificacao) = $id and month(dt_notificacao) = 04 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data4 = $data4 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data4 = trim($data4,",");
    $buildingName = trim($buildingName,",");	
?>

 <?php
    /* Database connection settings */
    include_once 'db.php';

	$data5 = '';
	
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao, COUNT(id)as TOTAL FROM recife WHERE  year(dt_notificacao) = $id and month(dt_notificacao) = 05 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data5 = $data5 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data5 = trim($data5,",");
    $buildingName = trim($buildingName,",");	
?>

 <?php
    /* Database connection settings */
    include_once 'db.php';

	$data6 = '';
	
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao, COUNT(id)as TOTAL FROM recife WHERE  year(dt_notificacao) = $id and month(dt_notificacao) = 06 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data6 = $data6 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data6 = trim($data6,",");
    $buildingName = trim($buildingName,",");	
?>

 <?php
    /* Database connection settings */
    include_once 'db.php';

	$data7 = '';
	
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao, COUNT(id)as TOTAL FROM recife WHERE  year(dt_notificacao) = $id and month(dt_notificacao) = 07 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data7 = $data7 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data7 = trim($data7,",");
    $buildingName = trim($buildingName,",");	
?>


 <?php
    /* Database connection settings */
    include_once 'db.php';

	$data8 = '';
	
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao, COUNT(id)as TOTAL FROM recife WHERE  year(dt_notificacao) = $id and month(dt_notificacao) = 08 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data8 = $data8 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data8 = trim($data8,",");
    $buildingName = trim($buildingName,",");	
?>

 <?php
    /* Database connection settings */
    include_once 'db.php';

	$data9 = '';
	
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao, COUNT(id)as TOTAL FROM recife WHERE  year(dt_notificacao) = $id and month(dt_notificacao) = 09 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data9 = $data9 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data9 = trim($data9,",");
    $buildingName = trim($buildingName,",");	
?>

<?php
    /* Database connection settings */
    include_once 'db.php';

	$data10 = '';
	
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao, COUNT(id)as TOTAL FROM recife WHERE  year(dt_notificacao) = $id and month(dt_notificacao) = 10 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data10 = $data10 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data10 = trim($data10,",");
    $buildingName = trim($buildingName,",");	
?>


<?php
    /* Database connection settings */
    include_once 'db.php';

	$data11 = '';
	
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao, COUNT(id)as TOTAL FROM recife WHERE  year(dt_notificacao) = $id and month(dt_notificacao) = 11 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data11 = $data11 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data11 = trim($data11,",");
    $buildingName = trim($buildingName,",");	
?>

<?php
    /* Database connection settings */
    include_once 'db.php';

	$data12 = '';
	
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao, COUNT(id)as TOTAL FROM recife WHERE  year(dt_notificacao) = $id and month(dt_notificacao) = 12 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data12 = $data12 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data12 = trim($data12,",");
    $buildingName = trim($buildingName,",");	
?>
			
    <div class="col-md-9 col-sm-9 col-xs-12">
    <canvas id="chart" style="height: 30vh;width: 100%;""></canvas></div>
 <script>
    
    var ctx = document.getElementById("chart").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
    labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
    datasets: 
    [{
    label              : 'Caso Confirmados por Mês',
    fillColor           : 'rgba(210, 214, 222, 1)',
    strokeColor         : 'rgba(210, 214, 222, 1)',
    pointColor          : 'rgba(210, 214, 222, 1)',
    pointStrokeColor    : '#c1c7d1',
    pointHighlightFill  : '#fff',
    pointHighlightStroke: 'rgba(220,220,220,1)',
    data: [<?php echo $data1; ?>,<?php echo $data2; ?>,
    <?php echo $data3; ?>,
    <?php echo $data4; ?>,
    <?php echo $data5; ?>,
    <?php echo $data6; ?>,
    <?php echo $data7; ?>,
    <?php echo $data8; ?>,
    <?php echo $data9; ?>,
    <?php echo $data10; ?>,
    <?php echo $data11; ?>,   
    <?php echo $data12; ?>],
    
    
    
    
    backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
				    'rgba(176,196,222)',
				    'rgba(139,0,139)',
				    'rgba(255,99,71)',
				    'rgba(238,232,170)',
				    'rgba((255,228,225)',
				    'rgba(216,191,216)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
				    'rgba(0,0,255)',
				    'rgba(139,69,19)',
				    'rgba(75,0,130)',
				    'rgba(255,255,0)',
				    'rgba(139,0,0)',
				    'rgba(139,0,0)',
                                    'rgba(255, 159, 64, 1)'
                                ],
    borderWidth: 2
    },
    ]
    },
		     
    options: {
    scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 12}]}},
    tooltips:{mode: 'index'},
    legend:{display: true, position: 'top', labels: {fontColor: 'rgb(0, 0, 0)', fontSize: 16}}
    }
    });
    </script>
 
 
 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

    
    <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
    <div class="x_panel tile fixed_height_320">
    <div class="x_title">
    <h2>Bairros com Maior Indice no Ano de  <?php echo $_SESSION['ano']; ?></h2>
    <ul class="nav navbar-right panel_toolbox">
    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
    <ul class="dropdown-menu" role="menu">
    <li><a href="#">Settings 1</a></li>
    <li><a href="#">Settings 2</a></li></ul></li>
    <li><a class="close-link"><i class="fa fa-close"></i></a></li></ul>
    <div class="clearfix">
     </div></div>
 
 
    
                            
    <?php
    /* Database connection settings */
    include_once 'db.php';
    $data4 = '';
    $buildingName4 = '';
    $query = "SELECT id,bairro, COUNT(id)as TOTAL FROM recife where notificacao_ano = $id GROUP BY bairro ORDER BY TOTAL DESC LIMIT 5 ";
    $runQuery = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($runQuery)) {
    $data4 = $data4 . '"'. $row['TOTAL'].'",';	
    $buildingName4 = $buildingName4 . '"'. ucwords($row['bairro']) .'",';
    }
    $data4 = trim($data4,",");
    $buildingName4 = trim($buildingName4,",");	
    ?>                      
    <canvas id="horizontal-bar-chart"></canvas> 
    <script
    src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
    <script>
    new Chart(document.getElementById("horizontal-bar-chart"), {
    type: 'bar',
    data: {
    labels: [<?php echo $buildingName4; ?>],
    datasets: [{
    label: "Percentual de Casos",
    backgroundColor: ["#581845", "#900c3F","#C70039", "#FF5733", "#FFc300", "#E97777"],
    data: [<?php echo $data4; ?>],}]},
    options: {
    indexAxis: 'y',
    legend: {
    display: false},title: {
    display: true,
    text: 'Bairros da Região'}}});
    </script>    
    </div>
    </div>
    </div>
    
    
    
    
    <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="x_panel tile fixed_height_320">
    <div class="x_title">
    <h2>Comparativo por Raça/Cor para o período de <?php echo $_SESSION['ano']; ?></h2>
    <ul class="nav navbar-right panel_toolbox">
    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
    <ul class="dropdown-menu" role="menu">
    <li><a href="#">Configurações 1</a></li>
    <li><a href="#">Configurações 2</a></li></ul></li>
    <li><a class="close-link"><i class="fa fa-close"></i></a></li></ul>
    <div class="clearfix"></div></div>
    <div class="x_content">
        
      <?php
    /* Database connection settings */
    include_once 'db.php';

	$data51 = '';
	$buildingName51 = '';
 
   $query = "SELECT id,notificacao_ano, COUNT(id)as TOTAL FROM recife where notificacao_ano = $id and tp_raca_cor = '4'  group by  tp_raca_cor  ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {

    $data51 = $data51 . '"'. $row['TOTAL'].'",';
		
    $buildingName51 = $buildingName51 . '"'. ucwords($row['notificacao_ano']) .'",';
    }

    $data51 = trim($data51,",");
    $data51 = trim($data51,",");
    $buildingName51 = trim($buildingName51,",");
        
        
     ?>    
        
                          
    <?php
    /* Database connection settings */
    include_once 'db.php';

	$data41 = '';
	$buildingName41 = '';
 
   $query = "SELECT id,notificacao_ano, COUNT(id)as TOTAL FROM recife where notificacao_ano = $id and tp_raca_cor = '5'  group by  tp_raca_cor  ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {

    $data41 = $data41 . '"'. $row['TOTAL'].'",';
		
    $buildingName41 = $buildingName41 . '"'. ucwords($row['notificacao_ano']) .'",';
    }

    $data41 = trim($data41,",");
    $data41 = trim($data41,",");
    $buildingName41 = trim($buildingName41,",");
    
   ?> 
    
    
  <?php
  
    /* Database connection settings */
    include_once 'db.php';
    $data31 = '';
    $buildingName31 = '';
    $query = "SELECT id,notificacao_ano, COUNT(id)as TOTAL FROM recife where notificacao_ano = $id and tp_raca_cor = '3'  group by  tp_raca_cor  ";
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {

    $data31 = $data31 . '"'. $row['TOTAL'].'",';
		
    $buildingName31 = $buildingName31 . '"'. ucwords($row['notificacao_ano']) .'",';
    }
    $data31 = trim($data31,",");
    $buildingName31 = trim($buildingName31,",");
    ?>




    <?php
    /* Database connection settings */
    include_once 'db.php';
    $data11 = '';
    $buildingName11 = '';
    $query = "SELECT id,notificacao_ano, COUNT(id)as TOTAL FROM recife where notificacao_ano = $id and tp_raca_cor = '2'  group by  tp_raca_cor  ";
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {

    $data11 = $data11 . '"'. $row['TOTAL'].'",';
		
    $buildingName11 = $buildingName11 . '"'. ucwords($row['notificacao_ano']) .'",';
    }
    $data11 = trim($data11,",");
    $buildingName11 = trim($buildingName11,",");
    ?>
    
   <?php
    /* Database connection settings */
    include_once 'db.php';
    $data21 = '';
    $buildingName21 = '';
    $query = "SELECT id,notificacao_ano, COUNT(id)as TOTAL FROM recife where notificacao_ano = $id and tp_raca_cor = '1'  group by  tp_raca_cor  ";
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {

    $data21 = $data21 . '"'. $row['TOTAL'].'",';
		
    $buildingName21 = $buildingName21 . '"'. ucwords($row['notificacao_ano']) .'",';
    }
    $data21 = trim($data21,",");
    $buildingName21 = trim($buildingName21,",");
    ?> 
    
    
   
                                
    <canvas id="horizontal-bar-chart1"></canvas>
    
    <script
    src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
    <script>
    new Chart(document.getElementById("horizontal-bar-chart1"), {
    type: 'line',
    data: {
    labels: ['Preta', 'Branca', 'Amarela', 'Indígena', 'Parda'],
    datasets: 
    [{
    label               : 'Indíce por Raça ou Cor',
    fillColor           : 'rgba(210, 214, 222, 1)',
    strokeColor         : 'rgba(210, 214, 222, 1)',
    pointColor          : 'rgba(210, 214, 222, 1)',
    pointStrokeColor    : '#c1c7d1',
    pointHighlightFill  : '#fff',
    pointHighlightStroke: 'rgba(220,220,220,1)',
    data: [<?php echo $data1; ?>,<?php echo $data2; ?>,
    <?php echo $data11; ?>,
    <?php echo $data21; ?>,
    <?php echo $data31; ?>,
    <?php echo $data41; ?>,   
    <?php echo $data51; ?>],
    
    
    
    
    backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
				    'rgba(176,196,222)',
				    'rgba(139,0,139)',
				    'rgba(255,99,71)',
				    'rgba(238,232,170)',
				    'rgba((255,228,225)',
				    'rgba(216,191,216)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
				    'rgba(0,0,255)',
				    'rgba(139,69,19)',
				    'rgba(75,0,130)',
				    'rgba(255,255,0)',
				    'rgba(139,0,0)',
				    'rgba(139,0,0)',
                                    'rgba(255, 159, 64, 1)'
                                ],
    borderWidth: 2
    },

    ]
    },
    options: {
    indexAxis: 'y',
    legend: {
    display: false
    },
    title: {
    display: true,
    text: 'Indice por Raça'
    }
    }
    });
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    </script>
    </div></div></div>

                
                
                
                
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="x_panel tile fixed_height_320 overflow_hidden">
                        <div class="x_title">
                            <h2>Proporção por Bairro para o Ano de  <?php echo $_SESSION['ano']; ?></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Configurações 1</a>
                                        </li>
                                        <li><a href="#">Configurações 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                   
                             
                                    
                                  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<div class="">
  <canvas id="chDonut1"></canvas>
</div>
    <?php
    /* Database connection settings */
    include_once 'db.php';
    $data4 = '';
    $buildingName4 = '';
    $query = "SELECT id,bairro, COUNT(id)as TOTAL FROM recife where notificacao_ano = $id GROUP BY bairro ORDER BY TOTAL DESC LIMIT 5 ";
    $runQuery = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($runQuery)) {
    $data4 = $data4 . '"'. $row['TOTAL'].'",';	
    $buildingName4 = $buildingName4 . '"'. ucwords($row['bairro']) .'",';
    }
    $data4 = trim($data4,",");
    $buildingName4 = trim($buildingName4,",");	
    ?>                      
  
       <script>
  var colors = ["#51EAEA", "#FCDDB0",
                        "#FF9D76", "#FB3569", "#82CD47"];
var donutOptions = {
  cutoutPercentage: 65,
  responsive: true,

  legend: {
    position: 'right',
    padding: 2,
    labels: {
      pointStyle: 'circle',
      usePointStyle: true,
    }
  }
};
// donut 1
var chDonutData1 = {
  labels: [<?php echo $buildingName4; ?>],
  datasets: [{
    backgroundColor: colors.slice(0, 4),
    borderWidth: 2,
    data: [<?php echo $data4; ?>],
  }],


};

var chDonut1 = document.getElementById("chDonut1");
if (chDonut1) {
  new Chart(chDonut1, {
    type: 'pie',
    data: chDonutData1,
    options: donutOptions
  });
}     
	</script> 
                                        
 
        
                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="x_panel tile fixed_height_320">
                        <div class="x_title">
                            <h2>Precipitação referrente ao período de <?php echo $_SESSION['ano']; ?></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Menu</a>
                                        </li>
                                        <li><a href="#">Graficos</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            
                                         <canvas id="chart5" class="col-md-8 col-sm-12 col-xs-12" style="height:175px;"></canvas></div>
    </div>

    <?php
    /* Database connection settings */
    include_once 'db.php';
	$data1 = '';
	$data2 = '';
	$data3 = '';
	$data4 = '';
	$data5 = '';
	$data6 = '';
	$data7 = '';
	$data8 = '';
	$data9 = '';
	$data10 = '';
	$data11 = '';
	$data12 = '';
	$buildingName = '';
 
   $query = "SELECT *  FROM chuvas where Ano = $id and Posto = 'Alto da Brasileira'  group by Ano";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {

    $data1 = $data1 . '"'. $row['max'].'",';
    $buildingName = $buildingName . '"'. ucwords($row['Ano']) .'",';
    }

    $data1 = trim($data1,",");
    $buildingName = trim($buildingName,",");	
?>

    <?php
	/* Database connection settings */
    include_once 'db.php';

    $data2 = '';
    $buildingName2 = '';
 
    $query = "SELECT *  FROM chuvas where Ano = $id and Posto = 'Varzéa'  group by Ano";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {

    $data2 = $data2 . '"'. $row['max'].'",';
		
    $buildingName2 = $buildingName2 . '"'. ucwords($row['Ano']) .'",';
    }

    $data2 = trim($data2,",");
    $buildingName2 = trim($buildingName2,",");
	
	
?>




    <?php
    /* Database connection settings */
    include_once 'db.php';
    $data3 = '';
    $buildingName3 = '';
    $query = "SELECT *  FROM chuvas where Ano = $id and Posto = 'Santo Amaro'  group by Ano";
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {

    $data3 = $data3 . '"'. $row['max'].'",';
		
    $buildingName3 = $buildingName3 . '"Ano",';
    }
    $data3 = trim($data3,",");
    $buildingName3 = trim($buildingName3,",");
    ?>


	
     
   
    <script>
    var ctx = document.getElementById("chart5").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
    labels: [<?php echo $buildingName; ?>],
    datasets: 
    [{
    label: 'Região de Alto da Brasileira' ,
    data: [<?php echo $data1; ?>],
    bbackgroundColor: 'transparent',
    borderColor:'rgba(255,0,0)',
    borderWidth: 2
    },{
    label: 'Região da Várzea',
    data: [<?php echo $data2; ?>],
    bbackgroundColor: 'transparent',
    borderColor:'rgba(47,79,79)',
    borderWidth: 2
    },{
    label: 'Região de Santo Amaro',
    data: [<?php echo $data3; ?>],
    bbackgroundColor: 'transparent',
    borderColor:'rgba(0,206,209)',
    borderWidth: 2
    },
    ]
    },
		     
    options: {
    scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 12}]}},
    tooltips:{mode: 'index'},
    legend:{display: true, position: 'top', labels: {fontColor: 'rgb(0, 0, 0)', fontSize: 16}}
    }
    });
    </script>
                             
                      
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Postagens Recentes<small>Seção</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Configuração</a>
                                        </li>
                                        <li><a href="#">Menu</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="dashboard-widget-content">

                                <ul class="list-unstyled timeline widget">
                                    <li>
                                        <div class="block">
                                            <div class="block_content">
                                                <h2 class="title">
                                                    <a>A picada do mosquito é a única forma de transmissão da dengue?</a>
                                                </h2>
                                                <div class="byline">
                                                    <span>13 hours ago</span> by <a>Thiago Ribeiro</a>
                                                </div>
                                                <p class="excerpt">Sim, a dengue não é transmitida por pessoas, objetos ou outros animais… <a>Read&nbsp;More</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="block">
                                            <div class="block_content">
                                                <h2 class="title">
                                                    <a>Como a pessoa reconhece o mosquito Aedes aegypti?</a>
                                                </h2>
                                                <div class="byline">
                                                    <span>13 hours ago</span> by <a>José Saldanha</a>
                                                </div>
                                                <p class="excerpt">O Aedes é parecido com o pernilongo comum, e pode ser identificado por algumas características que o diferencia como: corpo escuro e rajado de branco e possui hábito de picar durante o dia… <a>Read&nbsp;More</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                 
                                 
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-8 col-sm-8 col-xs-12">



                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Comparativo dos Casos de Dengue por Idade para o Período de <?php echo $_SESSION['ano']; ?></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Configurações 1</a>
                                                </li>
                                                <li><a href="#">Configurações 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="dashboard-widget-content">
                                      
                                  
                                        </div>
                                        
                            
                                         <canvas id="chart2" class="col-md-8 col-sm-12 col-xs-12" style="height:175px;"></canvas></div>
    </div></div>

 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data1 = '';
	$data2 = '';
	$data3 = '';
	$data4 = '';
	$data5 = '';
	$data6 = '';
	$data7 = '';
	$data8 = '';
	$data9 = '';
	$data10 = '';
	$data11 = '';
	$data12 = '';
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade < '4018' and year(dt_notificacao) = $id and month(dt_notificacao) = 01 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data1 = $data1 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data1 = trim($data1,",");
    $data2 = trim($data2,",");
    $buildingName = trim($buildingName,",");	
?>

 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data21 = '';
	$data22 = '';
	$data3 = '';
	$data4 = '';
	$data5 = '';
	$data6 = '';
	$data7 = '';
	$data8 = '';
	$data9 = '';
	$data10 = '';
	$data11 = '';
	$data12 = '';
	$buildingName21 = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4018' and  nu_idade < '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 01 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data21 = $data21 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data21 = trim($data21,",");
    $data22 = trim($data22,",");
    $buildingName21 = trim($buildingName21,",");	
?>

 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data61 = '';
	$buildingName61 = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 01 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data61 = $data61 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data61 = trim($data61,",");
   
    $buildingName61 = trim($buildingName61,",");	
?>










    <?php
    /* Database connection settings */
    include_once 'db.php';

	$data2 = '';
	
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade < '4018' and year(dt_notificacao) = $id and month(dt_notificacao) = 02 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data2 = $data2 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data2 = trim($data2,",");
    $buildingName = trim($buildingName,",");	
?>




 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data22 = '';
	$buildingName23 = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4018' and  nu_idade < '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 02 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data22 = $data22 . '"'. $row['TOTAL'].'",';
		
    $buildingName23 = $buildingName23 . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data22 = trim($data22,",");
    $buildingName23 = trim($buildingName23,",");	
?>

 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data62 = '';
	$buildingName63 = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 02 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data62 = $data62 . '"'. $row['TOTAL'].'",';
		
    $buildingName63 = $buildingName63 . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data62 = trim($data62,",");
   
    $buildingName63 = trim($buildingName63,",");	
?>


















   <?php
    /* Database connection settings */
    include_once 'db.php';

	$data3 = '';
	
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade < '4018' and year(dt_notificacao) = $id and month(dt_notificacao) = 03 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data3 = $data3 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data3 = trim($data3,",");
    $buildingName = trim($buildingName,",");	
?>



 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data24 = '';
	$buildingName25 = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4018' and  nu_idade < '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 03 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data24 = $data24 . '"'. $row['TOTAL'].'",';
		
    $buildingName25 = $buildingName25 . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data24 = trim($data24,",");
    $buildingName25 = trim($buildingName25,",");	
?>

 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data64 = '';
	$buildingName65 = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 03 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data64 = $data64 . '"'. $row['TOTAL'].'",';
		
    $buildingName65 = $buildingName65 . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data64 = trim($data64,",");
   
    $buildingName65 = trim($buildingName65,",");	
?>























   <?php
    /* Database connection settings */
    include_once 'db.php';

	$data4 = '';
	
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade < '4018' and year(dt_notificacao) = $id and month(dt_notificacao) = 04 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data4 = $data4 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data4 = trim($data4,",");
    $buildingName = trim($buildingName,",");	
?>






 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data26 = '';
	$buildingName27 = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4018' and  nu_idade < '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 04 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data26 = $data26 . '"'. $row['TOTAL'].'",';
		
    $buildingName27 = $buildingName27 . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data26 = trim($data26,",");
    $buildingName27 = trim($buildingName27,",");	
?>

 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data66 = '';
	$buildingName67 = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 04 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data66 = $data66 . '"'. $row['TOTAL'].'",';
		
    $buildingName67 = $buildingName67 . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data66 = trim($data66,",");
   
    $buildingName67 = trim($buildingName67,",");	
?>






















 <?php
    /* Database connection settings */
    include_once 'db.php';

	$data5 = '';
	
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade < '4018' and year(dt_notificacao) = $id and month(dt_notificacao) = 05 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data5 = $data5 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data5 = trim($data5,",");
    $buildingName = trim($buildingName,",");	
?>







 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data28 = '';
	$buildingName29 = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4018' and  nu_idade < '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 05 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data28 = $data28 . '"'. $row['TOTAL'].'",';
		
    $buildingName29 = $buildingName29 . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data28 = trim($data28,",");
    $buildingName29 = trim($buildingName29,",");	
?>

 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data68 = '';
	$buildingName69 = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 05 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data68 = $data68 . '"'. $row['TOTAL'].'",';
		
    $buildingName69 = $buildingName69 . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data68 = trim($data68,",");
   
    $buildingName69 = trim($buildingName69,",");	
?>


























 <?php
    /* Database connection settings */
    include_once 'db.php';

	$data6 = '';
	
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade < '4018' and year(dt_notificacao) = $id and month(dt_notificacao) = 06 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data6 = $data6 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data6 = trim($data6,",");
    $buildingName = trim($buildingName,",");	
?>






 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data40 = '';
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4018' and  nu_idade < '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 06 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data40 = $data40 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data40 = trim($data40,",");
    $buildingName = trim($buildingName,",");	
?>

 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data70 = '';
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 06 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data70 = $data70 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data70 = trim($data70,",");
   
    $buildingName = trim($buildingName,",");	
?>




















 <?php
    /* Database connection settings */
    include_once 'db.php';

	$data7 = '';
	
	$buildingName = '';
 
   $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade < '4018' and year(dt_notificacao) = $id and month(dt_notificacao) = 07 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data7 = $data7 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data7 = trim($data7,",");
    $buildingName = trim($buildingName,",");	
?>

 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data41 = '';
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4018' and  nu_idade < '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 07 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data41 = $data41 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data41 = trim($data41,",");
    $buildingName = trim($buildingName,",");	
?>

 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data71 = '';
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 07 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data71 = $data71 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data71 = trim($data71,",");
   
    $buildingName = trim($buildingName,",");	
?>


























 <?php
    /* Database connection settings */
    include_once 'db.php';

	$data8 = '';
	
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade < '4018' and year(dt_notificacao) = $id and month(dt_notificacao) = 08 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data8 = $data8 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data8 = trim($data8,",");
    $buildingName = trim($buildingName,",");	
?>




 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data42 = '';
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4018' and  nu_idade < '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 08 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data42 = $data42 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data42 = trim($data42,",");
    $buildingName = trim($buildingName,",");	
?>

 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data72 = '';
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 08 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data72 = $data72 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data72 = trim($data72,",");
   
    $buildingName = trim($buildingName,",");	
?>
























 <?php
    /* Database connection settings */
    include_once 'db.php';

	$data9 = '';
	
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade < '4018' and year(dt_notificacao) = $id and month(dt_notificacao) = 09 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data9 = $data9 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data9 = trim($data9,",");
    $buildingName = trim($buildingName,",");	
?>

 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data43 = '';
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4018' and  nu_idade < '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 09 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data43 = $data43 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data43 = trim($data43,",");
    $buildingName = trim($buildingName,",");	
?>

 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data73 = '';
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 09 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data73 = $data73 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data73 = trim($data73,",");
   
    $buildingName = trim($buildingName,",");	
?>
















<?php
    /* Database connection settings */
    include_once 'db.php';

	$data10 = '';
	
	$buildingName = '';
 
   $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade < '4018' and year(dt_notificacao) = $id and month(dt_notificacao) = 10 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data10 = $data10 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data10 = trim($data10,",");
    $buildingName = trim($buildingName,",");	
?>




 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data44 = '';
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4018' and  nu_idade < '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 10 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data44 = $data44 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data44 = trim($data44,",");
    $buildingName = trim($buildingName,",");	
?>

 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data74 = '';
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 10 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data74 = $data74 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data74 = trim($data74,",");
   
    $buildingName = trim($buildingName,",");	
?>















<?php
    /* Database connection settings */
    include_once 'db.php';

	$data11 = '';
	
	$buildingName = '';
 
   $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade < '4018' and year(dt_notificacao) = $id and month(dt_notificacao) = 11 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data11 = $data11 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data11 = trim($data11,",");
    $buildingName = trim($buildingName,",");	
?>




 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data45 = '';
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4018' and  nu_idade < '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 11 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data45 = $data45 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data45 = trim($data45,",");
    $buildingName = trim($buildingName,",");	
?>

 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data75 = '';
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 11 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data75 = $data75 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data75 = trim($data75,",");
   
    $buildingName = trim($buildingName,",");	
?>












<?php
    /* Database connection settings */
    include_once 'db.php';

	$data12 = '';
	
	$buildingName = '';
 
   $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade < '4018' and year(dt_notificacao) = $id and month(dt_notificacao) = 12 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data12 = $data12 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    
    $data12 = trim($data12,",");
    $buildingName = trim($buildingName,",");	
?>

 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data46 = '';
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4018' and  nu_idade < '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 12 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data46 = $data46 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data46 = trim($data46,",");
    $buildingName = trim($buildingName,",");	
?>

 <?php
    /* Database connection settings */
    include_once 'db.php';
	$data76 = '';
	$buildingName = '';
 
    $query = "SELECT id,notificacao_ano,dt_notificacao,nu_idade, COUNT(nu_idade)as TOTAL FROM recife WHERE  nu_idade > '4045' and year(dt_notificacao) = $id and month(dt_notificacao) = 12 group by YEAR( `dt_notificacao` ), MONTH( `dt_notificacao` ) ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {
    
    $data76 = $data76 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['dt_notificacao']) .'",';
    }

    $data76 = trim($data76,",");
   
    $buildingName = trim($buildingName,",");	
?>



















			
    <div class="col-md-9 col-sm-9 col-xs-12">
    <canvas id="chart" style="height: 30vh;width: 100%;""></canvas></div>
 <script>
    
    var ctx = document.getElementById("chart2").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
    labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
    datasets: 
    [{
    label              : 'Casos abaixo dos 18 Anos',
    fillColor           : 'rgba(210, 214, 222, 1)',
    strokeColor         : 'rgba(210, 214, 222, 1)',
    pointColor          : 'rgba(210, 214, 222, 1)',
    pointStrokeColor    : '#c1c7d1',
    pointHighlightFill  : '#fff',
    pointHighlightStroke: 'rgba(220,220,220,1)',
    data: [<?php echo $data1; ?>,<?php echo $data2; ?>,
    <?php echo $data3; ?>,
    <?php echo $data4; ?>,
    <?php echo $data5; ?>,
    <?php echo $data6; ?>,
    <?php echo $data7; ?>,
    <?php echo $data8; ?>,
    <?php echo $data9; ?>,
    <?php echo $data10; ?>,
    <?php echo $data11; ?>,   
    <?php echo $data12; ?>],
    
    
    
    
    backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                   'rgba(255, 99, 132, 0.2)',
                                   'rgba(255, 99, 132, 0.2)',
                                   'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
				    'rgba(255, 99, 132, 0.2)',
				   'rgba(255, 99, 132, 0.2)',
				   'rgba(255, 99, 132, 0.2)',
				    'rgba(255, 99, 132, 0.2)',
				    'rgba(255, 99, 132, 0.2)',
				    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                ],
                                borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(255,99,132,1)',
                                   'rgba(255,99,132,1)',
                                  'rgba(255,99,132,1)',
                                  'rgba(255,99,132,1)',
				  'rgba(255,99,132,1)',
				  'rgba(255,99,132,1)',
				   'rgba(255,99,132,1)',
				   'rgba(255,99,132,1)',
				    'rgba(255,99,132,1)',
				   'rgba(255,99,132,1)',
                                   'rgba(255,99,132,1)',
                                ],
    borderWidth: 2
    }, {
    
    
      label              : 'Casos entre os 18 aos 45 Anos',
    fillColor           : 'rgba(210, 214, 222, 1)',
    strokeColor         : 'rgba(210, 214, 222, 1)',
    pointColor          : 'rgba(210, 214, 222, 1)',
    pointStrokeColor    : '#c1c7d1',
    pointHighlightFill  : '#fff',
    pointHighlightStroke: 'rgba(220,220,220,1)',
    data: [<?php echo $data21; ?>,<?php echo $data22; ?>,
    <?php echo $data24; ?>,
    <?php echo $data26; ?>,
    <?php echo $data28; ?>,
    <?php echo $data40; ?>,
    <?php echo $data41; ?>,
    <?php echo $data42; ?>,
    <?php echo $data43; ?>,
    <?php echo $data44; ?>,
    <?php echo $data45; ?>,   
    <?php echo $data46; ?>],
    
    
    
    
    backgroundColor: [
                                     'rgba(54, 162, 235, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                     'rgba(54, 162, 235, 0.2)',
                                     'rgba(54, 162, 235, 0.2)',
                                     'rgba(54, 162, 235, 0.2)',
				     'rgba(54, 162, 235, 0.2)',
				    'rgba(54, 162, 235, 0.2)',
				    'rgba(54, 162, 235, 0.2)',
				    'rgba(54, 162, 235, 0.2)',
				     'rgba(54, 162, 235, 0.2)',
				     'rgba(54, 162, 235, 0.2)',
                                     'rgba(54, 162, 235, 0.2)',
                                ],
                                borderColor: [
                                     'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                     'rgba(54, 162, 235, 1)',
                                     'rgba(54, 162, 235, 1)',
                                     'rgba(54, 162, 235, 1)',
				    'rgba(54, 162, 235, 1)',
				     'rgba(54, 162, 235, 1)',
				    'rgba(54, 162, 235, 1)',
				     'rgba(54, 162, 235, 1)',
				    'rgba(54, 162, 235, 1)',
				     'rgba(54, 162, 235, 1)',
                                     'rgba(54, 162, 235, 1)',
                                ],
    borderWidth: 2
    
    
    }, {
    
    
      label              : 'Casos acima dos 45 Anos',
    fillColor           : 'rgba(210, 214, 222, 1)',
    strokeColor         : 'rgba(210, 214, 222, 1)',
    pointColor          : 'rgba(210, 214, 222, 1)',
    pointStrokeColor    : '#c1c7d1',
    pointHighlightFill  : '#fff',
    pointHighlightStroke: 'rgba(220,220,220,1)',
    data: [<?php echo $data61; ?>,<?php echo $data62; ?>,
    <?php echo $data64; ?>,
    <?php echo $data66; ?>,
    <?php echo $data68; ?>,
    <?php echo $data70; ?>,
    <?php echo $data71; ?>,
    <?php echo $data72; ?>,
    <?php echo $data73; ?>,
    <?php echo $data74; ?>,
    <?php echo $data75; ?>,   
    <?php echo $data76; ?>],
    
    
    
    
    backgroundColor: [
                                     'rgba(255, 206, 86, 0.2)',
                                   'rgba(255, 206, 86, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
				   'rgba(255, 206, 86, 0.2)',
				    'rgba(255, 206, 86, 0.2)',
				    'rgba(255, 206, 86, 0.2)',
				   'rgba(255, 206, 86, 0.2)',
				   'rgba(255, 206, 86, 0.2)',
				    'rgba(255, 206, 86, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                ],
                                borderColor: [
                                   'rgba(255, 159, 64, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(255, 159, 64, 1)',
				   'rgba(255, 159, 64, 1)',
				    'rgba(255, 159, 64, 1)',
				    'rgba(255, 159, 64, 1)',
				    'rgba(255, 159, 64, 1)',
				   'rgba(255, 159, 64, 1)',
				   'rgba(255, 159, 64, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
    borderWidth: 2
    },
    
    
    
    
    
    ]
    },
		     
    options: {
    scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 12}]}},
    tooltips:{mode: 'index'},
    legend:{display: true, position: 'top', labels: {fontColor: 'rgb(0, 0, 0)', fontSize: 16}}
    }
    });
    </script>
 
                                        
         </div>                           
        <!-- footer content include -->
        <?php include '../partPage/footer.html' ?>
        <!-- /footer content include -->
  
</div>






<!-- jQuery -->
<script src="../../resource/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../resource/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../resource/js/fastclick.js"></script>
<!-- NProgress -->
<script src="../../resource/js/nprogress.js"></script>
<!-- Chart.js -->
<script src="../../resource/js/Chart.min.js"></script>
<!-- gauge.js -->
<script src="../../resource/js/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="../../resource/js/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="../../resource/js/icheck.min.js"></script>
<!-- Skycons -->
<script src="../../resource/js/skycons.js"></script>
<!-- Flot -->
<script src="../../resource/js/jquery.flot.js"></script>
<script src="../../resource/js/jquery.flot.pie.js"></script>
<script src="../../resource/js/jquery.flot.time.js"></script>
<script src="../../resource/js/jquery.flot.stack.js"></script>
<script src="../../resource/js/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="../../resource/js/jquery.flot.orderBars.js"></script>
<script src="../../resource/js/jquery.flot.spline.min.js"></script>
<script src="../../resource/js/curvedLines.js"></script>
<!-- DateJS -->
<script src="../../resource/js/date.js"></script>
<!-- JQVMap -->
<script src="../../resource/js/jquery.vmap.min.js"></script>
<script src="../../resource/js/jquery.vmap.world.js"></script>
<script src="../../resource/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../../resource/js/moment.min.js"></script>
<script src="../../resource/js/daterangepicker.js"></script>
<!-- Custom Theme Scripts -->
<script src="../../resource/js/custom.min.js"></script>
</body>
</html>

