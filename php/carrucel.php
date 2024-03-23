<?php
function CargarImagenes(){
    $cant_img = 6; // que las imagenes esten enumeradas y SEAN DEL MISMO TIPO .JPEG
    $src; // varusada en el for para almacenar temporalmente la direc de las imagenes

    for ($i = 1; $i < $cant_img+1; $i++) { 
        $src = "img/carrusel/$i.jpeg"; ?>

        <div class="carousel-item h-100 <?php if($i == 1) echo 'active';?>">
            <img src="<?php echo $src; ?>" class="d-block w-100 h-100" alt="..." />
        </div>
    <?php } 
 } ?>






