$(document).ready(function () {

    $('#bloque_final').hide();
    $('#bloque_corte').hide();
    $('#bloque_cero').hide();

    $("#final_notes-1").prop("disabled", true);
    $("#final_notes-2").prop("disabled", true);
    
   

    $("#entrega_nota").on( 'change', function() {
        if( $(this).is(':checked') ) {
            // Hacer algo si el checkbox ha sido seleccionado
            $("#final_notes-1").prop("disabled", false);
            $("#final_notes-2").prop("disabled", false);
        } else {
            // Hacer algo si el checkbox ha sido deseleccionado
            $("#final_notes-1").prop("disabled", true);
            $("#final_notes-2").prop("disabled", true);
        }
    });

    // Bloqueamos el SELECT de las escuelas
    $("#slt-schools").prop('disabled', true);

    // Obtener url para identificar si es admin o no la ruta
    var pathname = window.location.pathname;
    var separa = pathname.split(".");

    if (separa[1] == 'admin') {
        var admin = '-admin';
    } else {
        var admin = '';
    }

    $(".test").change(function () {

        /* Referencia al option seleccionado */
        var mOption = this.options[this.selectedIndex];
        /* Referencia a los atributos data de la opción seleccionada */
        var mData = mOption.dataset;
        /* Referencia al option seleccionado */
        var nombreescue = document.getElementById('nombreescue');
        var cedulaescue = document.getElementById('cedulaescue');
        var correoescue = document.getElementById('correoescue');
        var telefonodeca = document.getElementById('telefonodeca');


        /* Asignamos cada dato a su input*/
        nombreescue.innerHTML  = mData.nombreescue;
        cedulaescue.innerHTML  = mData.cedulaescue;
        correoescue.innerHTML  = mData.correoescue;
        telefonoescue.innerHTML  = mData.telefonoescue;
    });

    // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
    $("#slt-decans").change(function () {

     /* Referencia al option seleccionado */
        var mOption = this.options[this.selectedIndex];
        /* Referencia a los atributos data de la opción seleccionada */
        var mData = mOption.dataset;

        /* Referencia a los input */
        var nombredeca = document.getElementById('nombredeca');
        var ceduladeca = document.getElementById('ceduladeca');
        var correodeca = document.getElementById('correodeca');
        var telefonodeca = document.getElementById('telefonodeca');


        /* Asignamos cada dato a su input*/
        nombredeca.innerHTML  = mData.nombredeca;
        ceduladeca.innerHTML  = mData.ceduladeca;
        correodeca.innerHTML  = mData.correodeca;
        telefonodeca.innerHTML  = mData.telefonodeca;
        
        // Guardamos el select de escuelas
        var schools = $("#slt-schools");

        // Guardamos el select de decanatos
        var decans = $(this);

        if ($(this).val() != '') {
            $.ajax({
                //data: { id: decans.val() },
                url: 'parameters-schools' + admin + '/' + decans.val(),
                type: 'GET',
                dataType: 'json',
                beforeSend: function () {
                    decans.prop('disabled', true);
                },
                success: function (r) {
                    decans.prop('disabled', false);

                    // Limpiamos el select
                    schools.find('option').remove();

                    schools.append('<option data-nombreescue="" data-cedulaescue="" data-correoescue="" data-telefonoescue="" disabled selected>Selecione una Escuela</option>');

                    $.each(r.schools, function (i, v) {
                        schools.append('<option data-nombreescue="' + v.school_name + '" data-cedulaescue="' + v.document + '" data-correoescue="' + v.email + '" data-telefonoescue="' + v.phone + '" value="' + v.id + '">' + v.name + '</option>');
                    });

                    schools.prop('disabled', false);
                },
                error: function () {
                    alert('Ocurrio un error en el servidor ..');
                    decans.prop('disabled', false);
                }
            });
        }
        else {
            schools.find('option').remove();
            schools.prop('disabled', true);
        }
    })

    // Bloqueamos el SELECT de las materias
    $("#slt-subjects").prop('disabled', true);

    // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
    $("#slt-users").change(function () {

        /* Referencia al option seleccionado */
        var mOption = this.options[this.selectedIndex];
        /* Referencia a los atributos data de la opción seleccionada */
        var mData = mOption.dataset;

        /* Referencia a los input */
        var nombredocen = document.getElementById('nombredocen');
        var ceduladocen = document.getElementById('ceduladocen');
        var correodocen = document.getElementById('correodocen');
        var telefonodocen = document.getElementById('telefonodocen');


        /* Asignamos cada dato a su input*/
        nombredocen.innerHTML  = mData.nombredocen;
        ceduladocen.innerHTML  = mData.ceduladocen;
        correodocen.innerHTML  = mData.correodocen;
        telefonodocen.innerHTML  = mData.telefonodocen;

        // Guardamos el select de materias
        var subjects = $("#slt-subjects");

        // Guardamos el select de usuarios
        var users = $(this);

        if ($(this).val() != '') {
            $.ajax({
                //data: { id: decans.val() },
                url: 'parameters-subjects' + admin + '/' + users.val(),
                type: 'GET',
                dataType: 'json',
                beforeSend: function () {

                    users.prop('disabled', true);
                },
                success: function (r) {
                    users.prop('disabled', false);

                    // Limpiamos el select
                    subjects.find('option').remove();

                    subjects.append('<option data-nombreescue="" data-cedulaescue="" data-correoescue="" data-telefonoescue="" disabled selected>Selecione una materia</option>');

                    $.each(r.subjects, function (i, v) {
                        subjects.append('<option value="' + v.id + '">' + v.code + '-' + v.name + '</option>');
                    });

                    subjects.prop('disabled', false);
                },
                error: function () {
                    alert('Ocurrio un error en el servidor ..');
                    users.prop('disabled', false);
                }
            });
        }
        else {
            subjects.find('option').remove();
            subjects.prop('disabled', true);
        }
    })

    // Bloqueamos el SELECT de los bloques
    $("#stage_id").prop('disabled', true);

    // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
    $("#slt-subjects").change(function () {

        // Guardamos el select de etapas
        var stages = $("#stage_id");

        // Guardamos el select de materias
        var users = $("#slt-users");

        // Guardamos el select de usuarios
        var subjets = $(this);

        if ($(this).val() != '') {

            $.ajax({
                url: 'parameters-stages' + admin + '/' + users.val() + '/' + subjets.val(),
                type: 'GET',
                dataType: 'json',
                beforeSend: function () {

                    users.prop('disabled', true);
                    subjets.prop('disabled', true);
                },
                success: function (r) {
                    users.prop('disabled', false);
                    subjets.prop('disabled', false);

                    // Limpiamos el select
                    stages.find('option').remove();

                    stages.append('<option disabled selected>Selecione un bloque</option>');

                    $.each(r.stages, function (i, v) {
                        stages.append('<option value="' + v.id + '">' + v.stage + '</option>');
                    });

                    stages.prop('disabled', false);
                },
                error: function () {
                    alert('Ocurrio un error en el servidor ..');
                    users.prop('disabled', false);
                    subjets.prop('disabled', false);
                }
            });
        }
        else {
            stages.find('option').remove();
            stages.prop('disabled', true);
        }
    })

    $("#stage_id").change( function() {

        var selectedOption = $('select[name="stage_id"] option:selected').text()
    
        
        

        switch (selectedOption) {
            case 'Bloque cero':
                $(".activate").prop("disabled", false);
                $(".activate2").prop("disabled", true);
                $(".activate3").prop("disabled", true);
                $('#bloque_final').hide();
                $('#bloque_corte').hide();
                $('#bloque_cero').show();
            break;

            case 'Corte I':
                $('#title_stage').text(selectedOption)
                $(".activate").prop("disabled", true);
                $(".activate2").prop("disabled", false);
                $(".activate3").prop("disabled", true)
                $('#bloque_final').hide();
                $('#bloque_cero').hide();
                $('#bloque_corte').show();
            break;

            case 'Corte II':
                $('#title_stage').text(selectedOption)
                $('#title_stage').text(selectedOption)
                $(".activate").prop("disabled", true);
                $(".activate2").prop("disabled", false);
                $(".activate3").prop("disabled", true)
                $('#bloque_final').hide();
                $('#bloque_cero').hide();
                $('#bloque_corte').show();
            break;

            case 'Corte III':
                $('#title_stage').text(selectedOption)
                $('#title_stage').text(selectedOption)
                $(".activate").prop("disabled", true);
                $(".activate2").prop("disabled", false);
                $(".activate3").prop("disabled", true)
                $('#bloque_final').hide();
                $('#bloque_cero').hide();
                $('#bloque_corte').show();
            break;

            case 'Final':
                $(".activate").prop("disabled", true)
                $(".activate2").prop("disabled", true)
                $(".activate3").prop("disabled", false)
                $('#bloque_cero').hide();
                $('#bloque_corte').hide();
                $('#bloque_final').show();
            break;
        
        }
    
    });
})