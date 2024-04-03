<?php 
require_once "php/funciones/selectComments.php";



function cargarComentarios($conexion){
    $comentarios = selectComments($conexion);
    $commentsToShow = 3;


    for ($i = 0; $i < $commentsToShow; $i++) { 
        $id = 'comment'.$i+1;
        ?>
        <div class="comentarios__card col-12 col-sm-8 col-md-7 col-lg-3 px-3 pt-3 border rounded-5 mt-2">
            <p class="comentarios__preloader placeholder-glow d-none">
              <span class="placeholder col-7"></span>
              <span class="placeholder col-4"></span>
              <span class="placeholder col-4"></span>
              <span class="placeholder col-6"></span>
              <span class="placeholder col-8"></span>
            </p>
            <p class="comentarios__p" id="<?php echo $id;  ?>"><?php if(!empty($comentarios[$i])) echo $comentarios[$i]?></p>
        </div>
    <?php } 
}



?>