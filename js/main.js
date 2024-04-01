const commentsCountToShow = 3;
let actualPage = 1; // Indica en q pagina me encuentro
let pageCount;

// Establece la cant de paginas de comentarios a mostrar
function calculatePageCount(commentsCount) {
  // Math.ceil: Si de la div queda un resto, aumenta el cociente en una unidad
  pageCount = Math.ceil(commentsCount / commentsCountToShow);
}

// Se activa si el usuario quiere ver comentarios previos o siguentes
function pageNextPrev(next) {
  // recibe un bool de param q indica si se presiono prev o next

  // Pagina next y pag es < al LIMITE SUPERIOR(cant pag), no estamos en la ult pagina x ende hay una mas
  if (next && actualPage < pageCount) {
    actualPage++; // aumento la pag en 1
    requestComments();
  }
  // pagina anterior y pag es > 1(LIMITE INFERIOR), no estamos en la 1er pagina x ende hay una previa
  else if (!next && actualPage > 1) {
    actualPage--; // disminuyo 1 pagina
    requestComments();
  }
}

// realiza la peticion post a selectComments.php para solicitar comentarios
function requestComments() {
  const url = "php/funciones/selectComments.php";

  // Objeto donde guardo los datos a enviar a php
  const data = { page: actualPage };

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
      updateComments(data);
    })
    .catch((error) => {
      //En este bloque catch manejamos el error si es q se produce con "throw new Error"
      console.error("Ocurrió un error " + error);
    });
}

// actualizamos los comentarios de la pag
function updateComments(comments) {
  let e; // var temporal para almacenar el elemento html de cada comentario

  // LLenamos los div p con los nuevos comentarios
  for (let i = 0; i < commentsCountToShow; i++) {
    e = document.getElementById("comment" + (i + 1));
    e.innerHTML = comments[i] || "";
  }
}

// ----- MAIN -------
calculatePageCount(commentsCountJS);

// HUB: objetivo final: mostrar en la pagina los comentarios del array

//Evento de click
document.getElementById("prev").addEventListener("click", () => {
  pageNextPrev(false);
});

document.getElementById("sig").addEventListener("click", () => {
  pageNextPrev(true);
});
