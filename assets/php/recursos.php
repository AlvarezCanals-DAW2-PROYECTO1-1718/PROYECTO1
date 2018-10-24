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
            $ver=mysqli_query($link, "SELECT * FROM categoria WHERE ver_cat=0 ORDER BY cat_id");
            $nover=mysqli_query($link, "SELECT * FROM categoria WHERE ver_cat=1 ORDER BY cat_id");
            //$query = mysqli_query($link, "SELECT * FROM categoria ORDER BY cat_id");
           echo "Reqursos Disponibles<br>";
            if(mysqli_num_rows($ver)>0){
                while($categoria = mysqli_fetch_array($ver)){
                    echo "Categoria: $categoria[cat_id] [$categoria[cat_nombre]]: ";
                    echo "<a href='modificar_categoria.php?cat_id=$categoria[cat_id]'><i class='fas fa-pencil-alt'></i></a>";
                    echo "<a href='ver.proc.php?cat_id=$categoria[cat_id]&ver_cat=$categoria[ver_cat]'><i class='far fa-eye-slash'></i></a>";
                    echo "<a href='eliminar.proc.php?cat_id=$categoria[cat_id]'><i class='fas fa-times'></i></a>";
                    echo "<br>";

                    
                    
                }
            } 
             echo "<br>Recursos reservados<br>";
                if(mysqli_num_rows($nover)>0){
                while($categoria = mysqli_fetch_array($nover)){
                    echo "Categoria: $categoria[cat_id]  [$categoria[cat_nombre]]: ";
                    echo "<a href='modificar_categoria.php?cat_id=$categoria[cat_id]'><i class='fas fa-pencil-alt'></i></i></a>";
                    echo "<a href='ver.proc.php?cat_id=$categoria[cat_id]&ver_cat=$categoria[ver_cat]'><i class='far fa-eye'></i></i></a>";
                    echo "<a href='eliminar.proc.php?cat_id=$categoria[cat_id]'><i class='fas fa-times'></i></a>";
                    echo "<br>";

                    
                    
                }
            } 
            echo "<br>Recursos en servicio técnico<br>";
                if(mysqli_num_rows($nover)>0){
                while($categoria = mysqli_fetch_array($nover)){
                    echo "Categoria: $categoria[cat_id]  [$categoria[cat_nombre]]: ";
                    echo "<a href='modificar_categoria.php?cat_id=$categoria[cat_id]'><i class='fas fa-pencil-alt'></i></i></a>";
                    echo "<a href='ver.proc.php?cat_id=$categoria[cat_id]&ver_cat=$categoria[ver_cat]'><i class='far fa-eye'></i></i></a>";
                    echo "<a href='eliminar.proc.php?cat_id=$categoria[cat_id]'><i class='fas fa-times'></i></a>";
                    echo "<br>";

                    
                    
                }
            }

    ?>
            <br>
            <a href="index.php?insertaRecurso=si">Insertar Recursos <i class="fas fa-plus-square"></i></a><br>
             
</div>
