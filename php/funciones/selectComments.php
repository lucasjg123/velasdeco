<?php 
require_once "conexion.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $dataJS = json_decode(file_get_contents("php://input"), true); 
    /*
        file_get_contents("php://input"), true) Lee el cuerpo de la solicitud, es decir los datos q le enviamos dsd el fetch
        json_decode() transforma el formato json en el cual esta el obj q mandamos con fetch a arrayPHP
    */
    $page = $dataJS["page"];
    $conexion = ConexionBD(); // busco la conexion

    $lista = selectComments($conexion, $page);

    echo json_encode($lista);
}

function selectComments($vConexion, $page=1){
    $limite = ($page - 1) * 3; // calculamos el limite para la consulta sql
    $Listado = array();

    // generar consulta
    $SQL= "SELECT * from comentarios order by id desc limit $limite,3"; // el 0 debe ser una variable

    // ejecuto la consulta y guardo el resultado en la var $rs
    $rs = mysqli_query($vConexion, $SQL);

    // recorro el array con los resultados
    $i = 0;
    while ($data = mysqli_fetch_array($rs)) { // itera las filas retonadas
        $Listado[$i] = $data["texto"];
        $i++;
    }

    return $Listado;
        
}

?>