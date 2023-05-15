<?php

session_start();

if(!isset($_SESSION['admin_name']) && !isset($_SESSION['password'])) {
    header("Location:../../index.php");
}


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
                    <span class="count_top"><i class="fa fa-user"></i> Total Casos de 2015 à 2020</span>
                    
                    
    <?php	        
    include('conect.php');       
    $result = $db->prepare("SELECT COUNT(id) TOTAL FROM recife ");
    $result->bindParam(':SUM(status)', $res);
    $result->execute();

     $result->bindParam(':TOTAL', $res);
    $result->execute();
    $perguntas = 103160;

    for($i=0; $row = $result->fetch(); $i++){
    $acertos = $row['TOTAL'];
    $valor = number_format((($acertos / $perguntas) * 100), 2, '.', '') . "%" ;
    {
    ?> 
    <div class="count"><?php echo $row['TOTAL']; ?></div>
              
    <span class="count_bottom"><i class="red"><i class="fa fa-sort-asc"></i><?php echo $valor ?> </i>Porcentagem p/ o Período</span>
               
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
    $result = $db->prepare("SELECT COUNT(id) TOTAL FROM recife WHERE tp_sexo = 'F' ");
	
    $result->bindParam(':TOTAL', $res);
    $result->execute();
    $perguntas = 63160;

    for($i=0; $row = $result->fetch(); $i++){
    $acertos = $row['TOTAL'];
    $valor = number_format((($acertos / $perguntas) * 100), 2, '.', '') . "%" ;
    {
    ?> 
    <div class="count blue"><?php echo $row['TOTAL']; ?> </div>
    <span class="count_bottom"><i class="red"><i class="fa fa-sort-asc"></i><?php echo $valor ?> </i>Porcentagem p/ o Período</span>
    <?php
    }}
    ?>
    </div>
                
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Casos do Sexo Masculino</span>	            
   
    <?php        
    include('conect.php'); 
    $result = $db->prepare("SELECT COUNT(id) TOTAL FROM recife WHERE tp_sexo = 'M' ");
	
    $result->bindParam(':TOTAL', $res);
    $result->execute();
    $perguntas = 63160;

    for($i=0; $row = $result->fetch(); $i++){
    $acertos = $row['TOTAL'];
    $valor = number_format((($acertos / $perguntas) * 100), 2, '.', '') . "%" ;
    {
    ?>    
    <div class="count blue"><?php echo $row['TOTAL']; ?> </div>
    <span class="count_bottom"><i class="red"><i class="fa fa-sort-asc"></i><?php echo $valor ?> </i>Porcentagem p/ o Período</span>
    <?php
    }}
    ?>
    </div>
                
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Casos abaixo dos 18 Anos</span>

	    
    <?php
    include('conect.php');
	
	
        
	$result = $db->prepare("SELECT COUNT(id) TOTAL FROM recife WHERE nu_idade < '4018' ");
	
		$result->bindParam(':TOTAL', $res);
		$result->execute();
                 $perguntas = 63160;
                
                 
	       
    
		for($i=0; $row = $result->fetch(); $i++){
		     $acertos = $row['TOTAL'];
		     $valor = number_format((($acertos / $perguntas) * 100), 2, '.', '') . "%" ;
		     
		    

                 
                    {
	?> 
		    
                  <div class="count green"><?php echo $row['TOTAL']; ?> </div>
                    
                    
                    
                    <span class="count_bottom"><i class="red"><i class="fa fa-sort-asc"></i><?php echo $valor ?> </i>Porcentagem p/ o Período</span>
	<?php
	}}
	?>
            </div>
                          
                
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Casos entre 18 a 45 Anos</span>
		    
		            
   <?php
	        
	include('conect.php');
	
	
        
	$result = $db->prepare("SELECT COUNT(id) TOTAL FROM recife WHERE nu_idade > '4018' and  nu_idade < '4045'");
	
		$result->bindParam(':TOTAL', $res);
		$result->execute();
                 $perguntas = 63160;
                
                 
	       
    
		for($i=0; $row = $result->fetch(); $i++){
		     $acertos = $row['TOTAL'];
		     $valor = number_format((($acertos / $perguntas) * 100), 2, '.', '') . "%" ;
		     
		    

                 
                    {
	?> 
		    
                  <div class="count green"><?php echo $row['TOTAL']; ?> </div>
                    
                    
                    
                    <span class="count_bottom"><i class="red"><i class="fa fa-sort-asc"></i><?php echo $valor ?> </i>Porcentagem p/ o Período</span>
	<?php
	}}
	?>
            </div>
                            
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Casos acima dos 45 Anos</span>
		    
		            
   <?php
	        
	include('conect.php');
	
	
        
	$result = $db->prepare("SELECT COUNT(id) TOTAL FROM recife WHERE nu_idade > '4045'");
	
		$result->bindParam(':TOTAL', $res);
		$result->execute();
                 $perguntas = 63160;
                
                 
	       
    
    for($i=0; $row = $result->fetch(); $i++){
    $acertos = $row['TOTAL'];
    $valor = number_format((($acertos / $perguntas) * 100), 2, '.', '') . "%" ;
           
    {
    ?> 
		    
    <div class="count green"><?php echo $row['TOTAL']; ?> </div>
          
    <span class="count_bottom"><i class="red"><i class="fa fa-sort-asc"></i><?php echo $valor ?> </i>Porcentagem p/ o Período</span>
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
    <h3>Caso de Dengue referente ao período de 2015 à 2020<small></small></h3>
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
 
    $query = "SELECT id,notificacao_ano, COUNT(id)as TOTAL FROM recife group by notificacao_ano ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {

    $data1 = $data1 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['notificacao_ano']) .'",';
    }

    $data1 = trim($data1,",");
    $data2 = trim($data2,",");
    $buildingName = trim($buildingName,",");	
?>

    <?php
	/* Database connection settings */
    include_once 'db.php';

    $data2 = '';
    $buildingName2 = '';
 
    $query = "SELECT id,notificacao_ano, COUNT(id)as TOTAL FROM recife where tp_sexo = 'F'  group by notificacao_ano  ";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {

    $data2 = $data2 . '"'. $row['TOTAL'].'",';
		
    $buildingName2 = $buildingName2 . '"'. ucwords($row['notificacao_ano']) .'",';
    }

    $data2 = trim($data2,",");
    $buildingName2 = trim($buildingName2,",");
	
	
?>




    <?php
    /* Database connection settings */
    include_once 'db.php';
    $data3 = '';
    $buildingName3 = '';
    $query = "SELECT id,notificacao_ano, COUNT(id)as TOTAL FROM recife where tp_sexo = 'M'  group by notificacao_ano  ";
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {

    $data3 = $data3 . '"'. $row['TOTAL'].'",';
		
    $buildingName3 = $buildingName3 . '"'. ucwords($row['notificacao_ano']) .'",';
    }
    $data3 = trim($data3,",");
    $buildingName3 = trim($buildingName3,",");
    ?>


			
    <div class="col-md-9 col-sm-9 col-xs-12">
    <canvas id="chart" style="height: 30vh;width: 100%;""></canvas></div>
    <script>
    var ctx = document.getElementById("chart").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
    labels: [<?php echo $buildingName; ?>],
    datasets: 
    [{
    label: 'Total de casos',
    data: [<?php echo $data1; ?>],
    bbackgroundColor: 'transparent',
    borderColor:'rgba(255, 0, 0)',
    borderWidth: 2
    },{
    label: 'Total de Casos p/ Sexo Feminino',
    data: [<?php echo $data2; ?>],
    bbackgroundColor: 'transparent',
    borderColor:'rgba(191, 0, 255)',
    borderWidth: 2
    },{
    label: 'Total de Casos p/ Sexo Masculino',
    data: [<?php echo $data3; ?>],
    bbackgroundColor: 'transparent',
    borderColor:'rgba(0,0,255)',
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
    <h2>Bairros com Maior Indice de Caso de Dengue</h2>
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
    $query = "SELECT id,bairro, COUNT(id)as TOTAL FROM recife GROUP BY bairro ORDER BY TOTAL DESC LIMIT 5 ";
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
    <h2>Comparativo por Raça/Cor para o período de 2015 a 2020</h2>
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
 
   $query = "SELECT id,notificacao_ano, COUNT(id)as TOTAL FROM recife where tp_raca_cor = '4'  group by notificacao_ano  ";
	
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
 
   $query = "SELECT id,notificacao_ano, COUNT(id)as TOTAL FROM recife where tp_raca_cor = '5'  group by notificacao_ano  ";
	
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
    $query = "SELECT id,notificacao_ano, COUNT(id)as TOTAL FROM recife where tp_raca_cor = '3'  group by notificacao_ano  ";
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
    $query = "SELECT id,notificacao_ano, COUNT(id)as TOTAL FROM recife where tp_raca_cor = '2'  group by notificacao_ano  ";
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
    $query = "SELECT id,notificacao_ano, COUNT(id)as TOTAL FROM recife where tp_raca_cor = '1'  group by notificacao_ano  ";
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
    labels: [<?php echo $buildingName11; ?>],
    datasets: [{
    label: 'Preta',
    data: [<?php echo $data11; ?>],
    backgroundColor: 'rgba(0,0,0)',
    },{
    label: 'Branca',
    data: [<?php echo $data21; ?>],
    bbackgroundColor: 'transparent',
    borderColor:'rgba(0,0,255)',
    borderWidth: 1
    },{
    label: 'Amarela',
    data: [<?php echo $data31; ?>],
    bbackgroundColor: 'transparent',
    borderColor:'rgba(255,255,0)',
    borderWidth: 1
    },{
    label: 'Indigena',
    data: [<?php echo $data41; ?>],
    bbackgroundColor: 'transparent',
    borderColor:'rgba(255,0,0)',
    borderWidth: 1
     },{
    label: 'Parda',
    data: [<?php echo $data51; ?>],
    bbackgroundColor: 'transparent',
    borderColor:'rgba(255,140,0)',
    borderWidth: 1
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
                            <h2>Proporção por Bairro</h2>
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
    $query = "SELECT id,bairro, COUNT(id)as TOTAL FROM recife GROUP BY bairro ORDER BY TOTAL DESC LIMIT 5 ";
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
                            <h2>Precipitação para o período de 2015 a 2020</h2>
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
 
   $query = "SELECT *  FROM chuvas where Posto = 'Alto da Brasileira'  group by Ano";
	
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
 
    $query = "SELECT *  FROM chuvas where Posto = 'Varzéa'  group by Ano";
	
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
    $query = "SELECT *  FROM chuvas where Posto = 'Santo Amaro'  group by Ano";
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
                            <h2>Atividade Recentes<small>Seção</small></h2>
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
                                    <h2>Comparativo dos Casos de Dengue por Idade para o Período de <small>2015 a 2020</small></h2>
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
 
   $query = "SELECT id,notificacao_ano,nu_idade, COUNT(id)as TOTAL FROM recife where nu_idade < '4018'  group by notificacao_ano";
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {

    $data1 = $data1 . '"'. $row['TOTAL'].'",';
		
    $buildingName = $buildingName . '"'. ucwords($row['notificacao_ano']) .'",';
    }

    $data1 = trim($data1,",");
    $data2 = trim($data2,",");
    $buildingName = trim($buildingName,",");	
?>

    <?php
	/* Database connection settings */
    include_once 'db.php';

    $data2 = '';
    $buildingName2 = '';
 
    $query = "SELECT id,notificacao_ano,nu_idade, COUNT(id)as TOTAL FROM recife where nu_idade > '4018' and  nu_idade < '4045'  group by notificacao_ano"; 
	
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {

    $data2 = $data2 . '"'. $row['TOTAL'].'",';
		
    $buildingName2 = $buildingName2 . '"'. ucwords($row['notificacao_ano']) .'",';
    }

    $data2 = trim($data2,",");
    $buildingName2 = trim($buildingName2,",");
	
	
?>




    <?php
    /* Database connection settings */
    include_once 'db.php';
    $data3 = '';
    $buildingName3 = '';
    $query = "SELECT id,notificacao_ano,nu_idade, COUNT(id)as TOTAL FROM recife where nu_idade > '4045'  group by notificacao_ano";
    $runQuery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($runQuery)) {

    $data3 = $data3 . '"'. $row['TOTAL'].'",';
		
    $buildingName3 = $buildingName3 . '"acima",';
    }
    $data3 = trim($data3,",");
    $buildingName3 = trim($buildingName3,",");
    ?>


	
     
   
    <script>
    var ctx = document.getElementById("chart2").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
    labels: [<?php echo $buildingName; ?>],
    datasets: 
    [{
    label: 'Casos abaixo dos 18 Anos',
    data: [<?php echo $data1; ?>],
    bbackgroundColor: 'transparent',
    borderColor:'rgba(0,255,0)',
    borderWidth: 2
    },{
    label: 'Casos de 18 a 45 Anos',
    data: [<?php echo $data2; ?>],
    bbackgroundColor: 'transparent',
    borderColor:'rgba(75,0,130)',
    borderWidth: 2
    },{
    label: 'Casos acima dos 45 Anos',
    data: [<?php echo $data3; ?>],
    bbackgroundColor: 'transparent',
    borderColor:'rgba(127,255,212)',
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
                        </div>

                    </div>
                    <div class="row">


                 
                        <!-- End to do list -->

      
                           
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end of weather widget -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content include -->
        <?php include '../partPage/footer.html' ?>
        <!-- /footer content include -->
    </div>
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

