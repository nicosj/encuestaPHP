<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Resultados</title>
        <link rel="stylesheet" href="assets/css/materialize.css">
        <link rel="stylesheet" href="assets/css/estilo.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dynatable/0.3.1/jquery.dynatable.min.css" integrity="sha512-ncfzBC3w/wZ88yM5NrHU1DyU69ox/Ilj683J5Uk71o3zlYFaiAfD6i3fFo/5zCH4ZTpGCVWtzXRHjMdl8gQXtQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	</head>
	
	<body>
		<div class="container">
            <div class="row">
                <div class="col m6 s12">
                    <div class="card">
                    <?php
                    $ele = ["Ninguno","Deportes", "Musical", "Cocina", "Literario", "Manualidades", "Juegos", "Modelismo", "Baile", "Cine", "Otro"];
                    $sexo=["","Masculino","Femenino"];
                    $aarray=[];
                        for( $i=0; $i < count($data["nombre"]); $i++){
                            $aarray[$i]=["label"=>$data["nombre"][$i]->nombre, "symbol" => $i,"y"=>$data["nombre"][$i]->total];
                        }
                            $dataNombre=$aarray;
                    ?>
                        <div id="dataNombre" style="height: 370px; width: 100%;"></div>
                    </div>
                </div>
                <div class="col m6 s12">
                    <div class="card"> <?php
                        $dataSexo = array(
                           array("label"=>"Masculino", "symbol" => "M","y"=>isset($data["sexo"][0]->total)?:'0'),
                           array("label"=>"Femenino", "symbol" => "F","y"=>isset($data["sexo"][1]->total)?:'0'),
                       )?>
                        <div id="dataSexo" style="height: 370px; width: 100%;"></div>
                    </div>
                </div>
                <div class="col m6 s12">
                    <div class="card">
                        <?php

                        $aarray=[];
                        for( $i=0; $i < count($data["actividad"]); $i++){
                            $aarray[$i]=["label"=>$ele[$data["horas"][$i]->hobby], "symbol" => $i,"y"=>$data["actividad"][$i]->total];
                        }
                        $dataActividad=$aarray;
                        ?>
                        <div id="dataActividad" style="height: 370px; width: 100%;"></div>

                    </div>
                </div>
                <div class="col m6 s12">
                    <div class="card">

                            <div class="card">

                                <?php

                                $aarray=[];
                                for($i=0, $iMax = count($data["horas"]); $i < $iMax; $i++){

                                    $aarray[$i]=["label"=>$ele[$data["horas"][$i]->hobby], "symbol" => $i,"y"=>$data["horas"][$i]->total];
                                }
                                $dataHoras=$aarray;
                                ?>
                                <div id="dataHoras" style="height: 370px; width: 100%;"></div>

                            </div>

                    </div>
                </div>
            </div>
            <div class="row">
               <div class="col m12">
                   <table id="myTable" class="display">
                       <thead>
                       <tr>
                           <th>nombre</th>
                           <th>sexo</th>
                           <th>hobby</th>
                       </tr>
                       </thead>
                       <tbody>

                       <?php

                       foreach($data["persona"] as $pivot){ ?><tr>
                           <?php echo "<td>".$pivot->nombre."</td>"."<td>".$sexo[$pivot->sexo]."</td>";   ?>
                           <td>
                               <?php foreach($data["hobby"] as $dato){ ?>
                                   <?php if($dato->llave===$pivot->id){?>

                                       <?php echo $ele[$dato->hobby]." : ".$dato->horas." min";   ?>

                                       <?php
                                   }
                               }?>
                           </td>
                           <?php
                           }?>

                       </tbody>
                   </table>
               </div>
                <a href="index.php?c=excel&a=save" class="btn btn-primary right"> exportar datos a Excel </a>
            </div>
            <div class="row center">
                <div class="col m12">
            <a href="index.php" class="btn btn-primary"> volver a Encuestar</a>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="assets/js/materialize.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dynatable/0.3.1/jquery.dynatable.min.js" integrity="sha512-KJdW8vGZWsRYrhMlZ6d8dR/fbLBK/aPOI0xDTEnGysk8TiFffc0S6TLSeSg7Lzk84GhBu9wI+qQatBrnTAeEYQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       <!-- <script src="assets/js/script.js" ></script>-->



        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script>
            window.onload = function() {

                var dataNombre = new CanvasJS.Chart("dataNombre", {
                    theme: "light2",
                    animationEnabled: true,
                    title: {
                        text: "Personas con el mismo Nombre"
                    },
                    axisY: {
                        title: "Cantidad Personas"
                    },
                    data: [{
                        type: "column",
                        yValueFormatString: "#,##0.## Personas",
                        dataPoints: <?php echo json_encode($dataNombre, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                var dataSexo = new CanvasJS.Chart("dataSexo", {
                    theme: "light2",
                    animationEnabled: true,
                    title: {
                        text: "Encuestados por sexo"
                    },
                    data: [{
                        type: "doughnut",
                        indexLabel: "{symbol} - {y}",
                        yValueFormatString: "#,##0.0\"%\"",
                        showInLegend: true,
                        legendText: "{label} : {y}",
                        dataPoints: <?php echo json_encode($dataSexo, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                var dataActividad = new CanvasJS.Chart("dataActividad", {
                    theme: "light2",
                    animationEnabled: true,
                    title: {
                        text: "Actividad predominante"
                    },
                    data: [{
                        type: "doughnut",
                        indexLabel: "{symbol} - {y}",
                        yValueFormatString: "#,##0.0\"%\"",
                        showInLegend: true,
                        legendText: "{label} : {y}",
                        dataPoints: <?php echo json_encode($dataActividad, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                var dataHoras = new CanvasJS.Chart("dataHoras", {
                    theme: "light2",
                    animationEnabled: true,
                    title: {
                        text: "Min. dedicadas a hobby"
                    },
                    axisY: {
                        title: "Cantidad Min."
                    },
                    data: [{
                        type: "column",
                        yValueFormatString: "#,##0.## Min.",
                        dataPoints: <?php echo json_encode($dataHoras, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                dataNombre.render();
                dataSexo.render();
                dataActividad.render();
                dataHoras.render();

            }
        </script>


        <script>
            $('#myTable').dynatable({
                features: {
                    paginate: true,
                    sort: true,
                    pushState: true,
                    search: false,
                    recordCount: true,
                    perPageSelect: true
                },
            });

        </script>

    </body>
</html>