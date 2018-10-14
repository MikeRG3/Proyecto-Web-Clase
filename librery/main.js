$(document).ready(function() {
    $("#provincia").change(function() {
        var id_provincia = $(this).val();

        $.ajax({
            type: 'POST',
            url: 'services/localidad.php',
            data: 'id_provincia=' + id_provincia,
            beforeSend: function() {
                $('#localidad').html("--Procensando--")
            },
            success: function(response) {
                $('#localidad').html(response)
            }
        });
    });

    $("#categoria").change(function() {
        var id_padre = $(this).val();

        $.ajax({
            type: 'POST',
            url: 'services/subcategoria.php',
            data: 'id_padre=' + id_padre,
            beforeSend: function() {
                $('#subCategoria').html("--Procensando--")
            },
            success: function(response) {
                $('#subCategoria').html(response)
            }
        });
    });




});