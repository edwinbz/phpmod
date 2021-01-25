$("#form-login").on('submit', function (e) {
    e.preventDefault();
    var data = { user: $('#user').val().trim(), pass: $('#pass').val().trim() };

    _ajax('autentificacion/login', data, true).done((resp) => {
        if (resp.success) {
            location.replace(_host + resp.data);
        } else {
            alert(resp.msg);
        }
    });
});

$("#form-recover").on('submit', function (e) {
    e.preventDefault();
    var data = { user: $('#user').val().trim() };

    _ajax('autentificacion/recover', data, true).done((resp) => {
        if (resp.success) {
            $("#form").hide();
            $(".alert-success").show();
        } else {
            alert(resp.msg);
        }
    });
});

$("#form-reasing").on('submit', function (e) {
    e.preventDefault();

    var token = $('#token').val().trim();
    var pass1 = $("#pass1").val().trim();
    var pass2 = $("#pass2").val().trim();

    if (pass1 == pass2) {
        var data = { token: token, pass: pass1 };
        _ajax('autentificacion/reasign', data, true).done((resp) => {
            if (resp.success) {
                $("#form").hide();
                $(".alert-success").show();
            } else {
                alert(resp.msg);
            }
        });
    } else {
        alert('Las contraseñas no coinciden. Verifique e intente nuevamente');
    }
});
