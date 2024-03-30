let userTheme = localStorage.getItem("theme"); // obtengo el valor del item "theme" del localStorage
let darkQuery = window.matchMedia("(prefers-color-scheme: dark)"); // creo una query para consultar si el tema elegido en el nav del usuario es dark
let themeIcon = document.querySelector("#themeIcon");

// Consulta el tema del navegador/OS y lo retorna
function ConsultarTemaOS() {
  let theme;
  darkQuery.matches ? (theme = "dark") : (theme = "light");

  return theme;
}

// cambia el iconoTema del nav
function changeIcon(theme) {
  let clase;
  switch (theme) {
    case "light":
      clase = "bi bi-brightness-high-fill";
      break;
    case "dark":
      clase = "bi bi-moon-fill";
      break;
    case "auto":
      clase = "bi bi-circle-half";
      break;
  }

  themeIcon.className = clase + " ps-2";
}

// Le quitamos el "active" al modo seleccionado anterior y se lo agregamos al nuevo
function toggleActive(theme) {
  let liNewActive = document.getElementById(theme); // busco el li de la ul

  let liOldActive = document.querySelector(".dropdown-item.active");

  //Ahora le quitamos el active al viejo
  liOldActive.classList.remove("active");
  liNewActive.classList.add("active");
}

// Establece el tema indicado directamente
function setTheme(theme) {
  document.documentElement.setAttribute("data-theme", theme);
}

// Guarda el tema que se le menvio
function save(theme) {
  localStorage.setItem("theme", theme); // lo gaurdo en el localStroge
  userTheme = theme; // lo actualizo en la var global
}

// Cambiar el tema. Sera invocada SOLO por los botones html
function changeTheme(theme) {
  if (userTheme != theme) {
    // Si el tema del usuario el tema elegido son diferentes
    theme == "auto" ? setTheme(ConsultarTemaOS()) : setTheme(theme);
    //Si el tema es auto, entonces consultamos el tema del OS antes de darselo a setTheme().

    // cambiar icono changIcon()
    changeIcon(theme);
    toggleActive(theme);

    save(theme); // Guardamos el tema elegido
  }
}

//------------ codigo main --------------------------//

// si es la 1ra vez q el usuario abre la pag
if (userTheme == null) save("dark"); // establezco el tema en dark

// Debido a que "dark" es el defautl, solo debo consultar por los otros dos y
// SI se cumplen hacer cambios

if (userTheme != "dark") {
  userTheme == "auto" ? setTheme(ConsultarTemaOS()) : setTheme(userTheme);
  changeIcon(userTheme);
  toggleActive(userTheme);
}

// evento de si el navegador cambia el tema estando en al pagina
darkQuery.addEventListener("change", () => {
  if (userTheme == "auto") setTheme(ConsultarTemaOS()); // false para q no guarde el tema sino solo lo establezca
});
