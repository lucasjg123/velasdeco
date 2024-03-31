<?php 
require_once "conexion.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $dataJS = json_decode(file_get_contents("php://input"), true); 
    /*
        file_get_contents("php://input"), true) Lee el cuerpo de la solicitud, es decir los datos q le enviamos dsd el fetch
        json_decode() transforma el formato json en el cual esta el obj q mandamos con fetch a arrayPHP
    */

    // Obteango el dato enviado
    $page = $dataJS["page"];

    // creo la conexion
    $conexion = ConexionBD(); 

    // busco los comentarios en la BD
    $lista = selectComments($conexion, $page);

    echo json_encode($lista);
}

function selectComments($vConexion, $page=1){
    $listado = array();
    // calculamos el limite para la consulta sql
    $limite = ($page - 1) * 3; 

    // generar consulta
    $SQL= "SELECT * from comentarios order by id desc limit $limite,3"; 

    // ejecuto la consulta y guardo el resultado en la var $rs
    $rs = mysqli_query($vConexion, $SQL);

    // Verificar si la consulta fue exitosa
    if (!$rs) die("Error al ejecutar la consulta: " . mysqli_error($vConexion));

    // recorro el array con los resultados
    while ($data = mysqli_fetch_assoc($rs)) {
        // listado[] agrega al final de la array. ( como un push() )
        $listado[] = $data["texto"]; 
    }

    return $listado;
}

?>