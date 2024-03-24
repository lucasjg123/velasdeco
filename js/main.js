let actualPage = 1; // Indica en q pagina me encuentro
let limite = 0;
const cantComent_mostrar = 3;

// Establece la cant de paginas de comentarios a mostrar
function CalcularCantPaginas(countComments) {
  // cantidad de paginas a mostrar
  let cantPaginas = parseInt(countComments / cantComent_mostrar);

  // si queda un resto de la div, agrego una pagina mas
  if (countComments % cantComent_mostrar != 0) cantPaginas++;

  console.log("Cantidad de comentarios:", countComments);
  console.log("Cantidad de paginas a mostrar:", cantPaginas);

  return cantPaginas;
}

// Se activa si el usuario quiere ver comentarios previos o siguentes
function HUB_EventoPagina(sig) {
  // recibe un bool de param q indica si se presiono prev o sig

  // Pagina sig
  if (sig) {
    // Si es sig y pag es < al LIMITE SUPERIOR(cant pag), no estamos en la ult pagina x ende hay una mas
    if (actualPage < cantPaginas) {
      actualPage++; // aumento la pag en 1
      limite += 3; // le sumo 4 al limite
      ConexionFetchPOST();
    }
  }
  // pagina anterior
  else if (actualPage > 1) {
    // si pag es > 1(LIMITE INFERIOR), no estamos en la 1er pagina x ende hay una previa
    actualPage--; // disminuyo 1 pagina
    limite -= 3; //le restamos 4 al limite
    ConexionFetchPOST();
  }

  console.log("Mostramos la actualPageina:", actualPage);
  console.log("Limite actual:", limite);
}

function ConexionFetchPOST() {
  const url = "php/funciones/selectComments.php";

  // Objeto donde guardo los datos a enviar a php
  const data = {
    limite: limite,
  };

  // Configuracion de la solicitud
  const requestOptions = {
    method: "POST",
    header: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  };

  fetch(url, requestOptions) // Aca va la direccion hacia donde haremos la peticion y la config de la solicitud
    .then((res) => {
      // - En este bloque manejamos la respuesta de la solicitud, que contiene los datos recibidos desde el script PHP
      if (!res.ok) throw new Error("Hubo un error en la respuesta"); // Si la solicitud no fue exitosa, lanzamos un error
      return res.json(); // Si fue exitosa transformamos la respuesta a .json
    })
    .then((data) => {
      // Aca recibimos el res.json(). Los datos recibimos en formato legible por JS
      console.log(data);
      actualizarHTML(data);
    })
    .catch((error) => {
      //En este bloque catch manejamos el error si es q se produce con "throw new Error"
      console.error("Ocurrió un error " + error);
    });
}

// actualizamos los comentarios de la pag
function actualizarHTML(array) {
  let e;

  // LLenamos los div p con los nuevos comentarios
  for (let i = 0; i < cantComent_mostrar; i++) {
    e = document.getElementById("comment" + (i + 1));

    array[i] != null ? (e.innerHTML = array[i]) : (e.innerHTML = "");
  }
}

// ----- MAIN -------
const cantPaginas = CalcularCantPaginas(countCommentsJS);
console.log("Cantidad de comentarios desde PHP:", countCommentsJS);

// HUB: objetivo final: mostrar en la pagina los comentarios del array

//Evento de click
document.getElementById("prev").addEventListener("click", () => {
  HUB_EventoPagina(false);
});

document.getElementById("sig").addEventListener("click", () => {
  HUB_EventoPagina(true);
});

// del codigo
// ctrl + k, ctrol + 0 minimizar
// ctrl + k, ctrl + j expand
// no se como hacerlo por bloque en el que estoy
