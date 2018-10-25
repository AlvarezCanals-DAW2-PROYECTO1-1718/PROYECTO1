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
            $disponible=mysqli_query($link, "SELECT * FROM tbl_recurso WHERE disponibilidad_recurso='si' ORDER BY id_recurso");
           // $nodisponible=mysqli_query($link, "SELECT * FROM categoria WHERE ver_cat=1 ORDER BY cat_id");
           // $incidencia=mysqli_query($link, "SELECT * FROM categoria WHERE ver_cat=1 ORDER BY cat_id");
            //$query = mysqli_query($link, "SELECT * FROM categoria ORDER BY cat_id");
           echo "Reqursos Disponibles<br>";
            if(mysqli_num_rows($disponible)>0){
                while($disponible = mysqli_fetch_array($disponible)){
                    echo "Categoria: $disponible[nombre_recurso] [$disponible[tipo_recurso]]: ";
                  /*  echo "<a href='modificar_categoria.php?cat_id=$categoria[cat_id]'><i class='fas fa-pencil-alt'></i></a>";
                    echo "<a href='ver.proc.php?cat_id=$categoria[cat_id]&ver_cat=$categoria[ver_cat]'><i class='far fa-eye-slash'></i></a>";
                    echo "<a href='eliminar.proc.php?cat_id=$categoria[cat_id]'><i class='fas fa-times'></i></a>";
                    echo "<br>";*/

                    
                    
                }
            } /*
             echo "<br>Recursos reservados<br>";
                if(mysqli_num_rows($nodisponible)>0){
                while($categoria = mysqli_fetch_array($nodisponible)){
                    echo "Categoria: $categoria[cat_id]  [$categoria[cat_nombre]]: ";
                    echo "<a href='modificar_categoria.php?cat_id=$categoria[cat_id]'><i class='fas fa-pencil-alt'></i></i></a>";
                    echo "<a href='ver.proc.php?cat_id=$categoria[cat_id]&ver_cat=$categoria[ver_cat]'><i class='far fa-eye'></i></i></a>";
                    echo "<a href='eliminar.proc.php?cat_id=$categoria[cat_id]'><i class='fas fa-times'></i></a>";
                    echo "<br>";

                    
                    
                }
            } 
            echo "<br>Recursos en servicio técnico<br>";
                if(mysqli_num_rows($incidencia)>0){
                while($categoria = mysqli_fetch_array($incidencia)){
                    echo "Incidencia: $categoria[cat_id]  [$categoria[cat_nombre]]: ";
                    echo "<a href='modificar_categoria.php?cat_id=$categoria[cat_id]'><i class='fas fa-pencil-alt'></i></i></a>";
                    echo "<a href='ver.proc.php?cat_id=$categoria[cat_id]&ver_cat=$categoria[ver_cat]'><i class='far fa-eye'></i></i></a>";
                    echo "<a href='eliminar.proc.php?cat_id=$categoria[cat_id]'><i class='fas fa-times'></i></a>";
                    echo "<br>";

                    
                    
                }
            }
*/
    ?>
         <!--   <br>
            <a href="index.php?insertaRecurso=si">Insertar Recursos <i class="fas fa-plus-square"></i></a><br> -->
             
</div>