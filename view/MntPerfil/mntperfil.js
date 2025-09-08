var usu_id = $('#USU_IDx').val();

$(document).on("submit", "#formPerfil", function (e) {
    e.preventDefault(); // evita que el form recargue la página

    var pass = $("#txtpass").val().trim();
    var newpass = $("#txtpassconfirm").val().trim();

    // Validar campos vacíos
    if (pass.length === 0 || newpass.length === 0) {
        Swal.fire({
            title: 'Error',
            text: 'Los campos de contraseña no pueden estar vacíos',
            icon: 'error'
        });
        return;
    }

    // Validar confirmación
    if (pass !== newpass) {
        Swal.fire({
            title: 'Error',
            text: 'Las contraseñas no coinciden',
            icon: 'error'
        });
        return;
    }

    // Enviar por AJAX
    $.post("../../controller/usuario.php?op=actualizar", { usu_id: usu_id, usu_pass: newpass }, function (data) {
        Swal.fire({
            title: 'Correcto!',
            text: 'Contraseña actualizada correctamente',
            icon: 'success'
        });

        // limpiar campos
        $("#txtpass").val("");
        $("#txtpassconfirm").val("");
    }).fail(function () {
        Swal.fire({
            title: 'Error',
            text: 'No se pudo actualizar la contraseña',
            icon: 'error'
        });
    });
});
