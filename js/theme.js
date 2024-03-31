//let userTheme = localStorage.getItem("theme"); // obtengo el valor del item "theme" del localStorage
let userTheme = localStorage.getItem("theme") || "dark"; // obtengo la opcion elegida por el usuario o establezco la default "dark"
const darkQuery = window.matchMedia("(prefers-color-scheme: dark)"); // creo una query para consultar si el tema elegido en el nav del usuario es dark
const themeIcon = document.querySelector("#themeIcon"); //icono de temas princ en el nav

// Consulta el tema del navegador/OS y lo retorna
function ConsultarTemaOS() {
  //Si la darkQuery hace match dark sino light
  return darkQuery.matches ? "dark" : "light";
}

// cambia el iconoTema del nav
function changeIcon(theme) {
  const iconClasses = {
    light: "bi bi-brightness-high-fill",
    dark: "bi bi-moon-fill",
    auto: "bi bi-circle-half",
  };

  // lo busco por atributo
  themeIcon.className = iconClasses[theme] + " ps-2";
}

// Le quitamos el "active" al modo seleccionado anterior y se lo agregamos al nuevo
function toggleActive(theme) {
  // busco los li de la ul
  const liNewActive = document.getElementById(theme);
  const liOldActive = document.querySelector(".dropdown-item.active");

  //Ahora le quitamos el active al viejo
  liOldActive.classList.remove("active");
  liNewActive.classList.add("active");
}

// Establece el tema indicado directamente
function setTheme(theme) {
  document.documentElement.setAttribute("data-theme", theme);
}

// Guarda el tema que se le envio
function save(theme) {
  localStorage.setItem("theme", theme); // lo guardo en el localStroge
  userTheme = theme; // lo actualizo en la var global
}

// Cambiar el tema. Sera invocada SOLO por los botones html
function changeTheme(theme) {
  // Si el tema del usuario yel tema elegido son diferentes
  if (userTheme != theme) {
    //Si el tema elegido es auto, entonces consultamos el tema del OS antes de darselo a setTheme().
    setTheme(theme === "auto" ? ConsultarTemaOS() : theme);

    // cambiar icono changIcon()
    changeIcon(theme);
    toggleActive(theme);
    save(theme); // Guardamos el tema elegido
  }
}

//------------ codigo main --------------------------//

// Debido a que "dark" es el defautl, solo debo consultar por los otros dos y
// SI se cumplen hacer cambios

if (userTheme != "dark") {
  setTheme(userTheme === "auto" ? ConsultarTemaOS() : userTheme);
  changeIcon(userTheme);
  toggleActive(userTheme);
}

// evento de si el navegador cambia el tema estando en al pagina
darkQuery.addEventListener("change", () => {
  if (userTheme == "auto") setTheme(ConsultarTemaOS()); // false para q no guarde el tema sino solo lo establezca
});
