function validarFormulario() {
    console.log("entro");
    var correo = document.getElementById("inputEmail").value;
    var clave = document.getElementById("inputPassword").value;

    if (correo === "" || clave === "") {
        alert("Por favor, complete todos los campos.");
        return false; // Evita que el formulario se envíe
    }

    return true; // Envía el formulario si los campos están completos
}