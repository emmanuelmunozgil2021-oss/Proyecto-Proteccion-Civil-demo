document.addEventListener("DOMContentLoaded", function () {
    
    const formConversor = document.getElementById("form-conversor");
    const inputAnos     = document.getElementById("anos_servicio");
    const resultadoBox  = document.getElementById("resultado-box");
    const txtDias       = document.getElementById("txt-dias-calculados");
    const txtMensaje    = document.getElementById("txt-mensaje-resultado");

    formConversor.addEventListener("submit", function (event) {
        event.preventDefault();

        const anos = parseInt(inputAnos.value);
        let diasVacaciones = 0;

        if (anos === 0) {
            diasVacaciones = 0;
            txtMensaje.textContent = "Aún no cumple el primer año de servicio requerido.";
        } else if (anos === 1) {
            diasVacaciones = 15; 
            txtMensaje.textContent = "Días Hábiles (Primer Año Base Correspondiente)";
        } else if (anos > 1) {
            diasVacaciones = 15 + (anos - 1);
            txtMensaje.textContent = `Días Hábiles Correspondientes a ${anos} Años de Servicio`;
        }

        txtDias.textContent = diasVacaciones;
        resultadoBox.style.display = "flex"; 
    });
});