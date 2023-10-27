const openMenu = document.querySelector("#open-menu");
const closeMenu = document.querySelector("#close-menu");
const aside = document.querySelector("aside");

openMenu.addEventListener("click", () => {
    aside.classList.add("aside-visible");
})

closeMenu.addEventListener("click", () => {
    aside.classList.remove("aside-visible");
})

document.getElementById("login").addEventListener("click",()=>{
    // Agrega aquí la lógica que desees cuando se haga clic en el botón
    window.location.href = "login.php"; // Por ejemplo, redirigir a la página de inicio de sesión
});