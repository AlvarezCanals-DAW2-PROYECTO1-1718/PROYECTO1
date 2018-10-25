<div>
    <?php

       
            header("Content-Type: text/html;charset=utf-8");
            /*
            if (isset($_REQUEST['cat_id'])) {
                $padre=$_REQUEST['cat_id'];
            }else{
            $padre=0;
            }
            */
            //Filtro
            $q="SELECT * FROM `tbl_recurso` ORDER BY `tbl_recurso`.`disponibilidad_recurso` ASC";
            $q_filtros=mysqli_query($link, $q);
            echo "Categoría: <select name='categoria'>"; 
            echo "<option value='todos'>Todos</option>";
            echo "<option value='si'>Disponible</option>";
            echo "<option value='no'>No disponible</option>";
            echo "<option value='incidencia'>Incidencia</option>";
            echo "</select><br/><br/>";
            
            //SQLS
            $disp=mysqli_query($link, "SELECT * FROM tbl_recurso WHERE disponibilidad_recurso='si' ORDER BY id_recurso");
            $nodisponible=mysqli_query($link, "SELECT * FROM tbl_recurso WHERE disponibilidad_recurso='no' ORDER BY id_recurso");
            $tiempo=mysqli_query($link, "SELECT * FROM `tbl_reserva` ORDER BY `tbl_reserva`.`tiempoEstimado_reserva` DESC");
            $incidencia=mysqli_query($link, "SELECT * FROM tbl_recurso WHERE disponibilidad_recurso='incidencia' ORDER BY id_recurso");
            $motivo=mysqli_query($link, "SELECT * FROM `tbl_incidencia` ORDER BY `tbl_incidencia`.`descripcion_incidencia` ASC");
            //Consultas a mostrar
           echo "Recursos Disponibles<br>";
            if(mysqli_num_rows($disp)>0){
                while($disponible = mysqli_fetch_array($disp)){
                    echo "$disponible[nombre_recurso]. Tipo: [$disponible[tipo_recurso]] <br>";  
                }
            }
            echo "<br><br>Recursos Ocupados<br>";
            if(mysqli_num_rows($nodisponible)>0){
                while($disponible = mysqli_fetch_array($nodisponible)){
                    $tempo = mysqli_fetch_array($tiempo);
                    $nrecurso=$disponible['nombre_recurso'];
                    $tiempoaprox= $tempo['tiempoEstimado_reserva'];
                    echo "Recurso reservado: ".$nrecurso."<br>";
                    echo "Tiempo reserva (Aprox): ".$tiempoaprox."<br><br>";   
                }
            }
            echo "<br><br>Incidencias<br>";
            if(mysqli_num_rows($incidencia)>0){
                while($disponible = mysqli_fetch_array($incidencia)){
                    $mot = mysqli_fetch_array($motivo);
                    $nrecurso=$disponible['nombre_recurso'];
                    $motivo_recurso= $mot['descripcion_incidencia'];
                    echo "Nombre recurso: ".$nrecurso."<br>";
                     echo "Motivo Incidencia: ".$motivo_recurso."<br><br>"; 
                }
            }
?>
         <!--   <br>
            <a href="index.php?insertaRecurso=si">Insertar Recursos <i class="fas fa-plus-square"></i></a><br> -->
             
</div>