<!DOCTYPE html>
<?php
include './Conecta.php';
include './core/lang/variables.php';
    function getRealIP()
{

    if (isset($_SERVER["HTTP_CLIENT_IP"]))
    {
        return $_SERVER["HTTP_CLIENT_IP"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
    {
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
    {
        return $_SERVER["HTTP_X_FORWARDED"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
    {
        return $_SERVER["HTTP_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED"]))
    {
        return $_SERVER["HTTP_FORWARDED"];
    }
    else
    {
        return $_SERVER["REMOTE_ADDR"];
    }

}
    $tuip= getRealIP();
    $nav = $_SERVER["HTTP_USER_AGENT"];
?>
<html>
    <head>
        <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title><?php echo $nomP; ?></title>
        
    </head>
    <body>
        <br/>
        <h1 class="modal-title text-center h1 btn-primary">Bienvenido a Control de Internet</h1><div id="config"><button class=" btn btn-primary">Configuracion</button></div>
        <br/>
        <div class="container" style="    padding-left: 15px; padding-right: 15px;">
            <table class="table table-responsive table-hover table-bordered">
            <tr>
                <th class="text-center h2"> Nombre </th> <th class="text-center h2" > Inicio </th> <th class="text-center h2"> Fin </th> <th class="text-center h2"> Estado </th>
            </tr>
            
            <?php
                try {
                        $exec = new Conecta();
                        $exec->setSql($sql);
                        $exec->Proceso();
                        $row=  mysqli_fetch_array($exec->getResultado());

                        while($row) {
                            echo $row[2]."";
                                echo '<tr>';
                               echo '<td class="text-center">'.$row[0].'</td><td class="text-center">'.$row[1].'</td><td class="text-center">'.$row[2].'</td><td class="text-center">'.$row[3].'</td><td class="text-center">'.$row[4].'</td>';
                               echo '</tr>';
                   } 

                   if($exec->rowCount()!=0){

                   }
                   else {
                       header("location:Error.php");
                   }
                   $exec->CerrarConexion();

               } catch (Exception $ex) {
                   header("location:Error.php");
               }
            ?>
            
            <?php
                   while ($row = mysqli_fetch_array($conexion->getPeticion())) {
                   echo '<tr>';
                   echo '<td class="text-center">'.$row[0].'</td><td class="text-center">'.$row[1].'</td><td class="text-center">'.$row[2].'</td><td class="text-center"><a>Eliminar</a><br><a>Modificar</a></td>';
                   echo '</tr>';
           }
           $conexion->CerrarConexion();        
           ?>
        </table>
        </div>
        <div id="add"><button>Agregar Contacto</button></div>
        
        
    </body>
</html>
