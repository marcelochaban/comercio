function validarFormulario() {
    var campos = document.querySelectorAll(".form-control"); // Selecciona todos los campos de entrada
    var passwordInput = document.getElementById("inputPassword"); // Selecciona el campo de contraseña
    var confirmPasswordInput = document.getElementById("inputPasswordConfirm"); // Selecciona el campo de confirmación de contraseña

    for (var i = 0; i < campos.length; i++) {
        var campo = campos[i];
        var valor = campo.value.trim(); // Obtén el valor del campo eliminando espacios en blanco

        if (valor === "") {
            var label = campo.previousElementSibling; // Obtén el elemento de la etiqueta <label>
            var labelText = label.textContent; // Obtén el texto de la etiqueta

            alert("Por favor, completa el campo: " + labelText);
            return false; // Evita el envío del formulario si algún campo está vacío
        }
    }

    // Verifica la longitud de la contraseña
    var passwordValue = passwordInput.value.trim();
    if (passwordValue.length < 8) {
        alert("La contraseña debe tener al menos 8 caracteres.");
        return false; // Evita el envío del formulario si la contraseña no cumple con la longitud mínima
    }

    // Verifica que las contraseñas coincidan
    if (passwordInput.value.trim() !== confirmPasswordInput.value.trim()) {
        alert("Las contraseñas no coinciden. Por favor, verifica.");
        return false; // Evita el envío del formulario si las contraseñas no coinciden
    }

    return true; // El formulario se enviará si todos los campos están completos, la contraseña es válida y las contraseñas coinciden
}