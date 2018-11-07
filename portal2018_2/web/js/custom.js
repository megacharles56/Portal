/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function menuAbre(obj) {
    $('.n2').css('display', 'none');
    $("ul", obj).toggle();
}

document.addEventListener('DOMContentLoaded', function () {
    $('#btnCambiaClave').click(
            function () {
                var paginaPass = 'index.php?r=empleados/pass';
                var d = $('#usuarios-usuar_clave').serialize();
                jQuery.ajax({
                    'type': 'POST', 'url': paginaPass,
                    'cache': false,
                    'data': d,
                    'success': function (json) {
                        alert('Se ha actualizado el password');
                    },
                    'error': function () {
                        alert('No se pudo Cambiar el password');
                    }
                })
            }
    );

    $('#btnPideClaveCorreo').click(
            function () {
                var paginaPass = 'index.php?r=usuarios/pass2mail';
                var d = $('#usuarios-usuar_usuario_mail').serialize();
                jQuery.ajax({
                    'type': 'POST', 'url': paginaPass,
                    'cache': false,
                    'data': d,
                    'success': function (json) {
                        res = $.parseJSON(json);
                        if (res['esta'] === 'si') {
                            alert('Se ha enviado correo');
                        } else {
                            alert('No se pudo enviar el correo, verifique su usuario');
                        }
                    },
                    'error': function () {
                        alert('No se pudo enviar el correo, verifique su usuario');
                    }
                })
            }
    );

    $('#btnModificaCorreoExt').click( 
            function () {
                var paginaPass = 'index.php?r=empleados/extmail';
                var d = $('#usuarios-usuar_ext_1,#usuarios-usuar_correo_1,#usuarios-usuar_id').serialize();
                //var d = $('#usuarios-usuar_ext_1,#usuarios-perso_email,#usuarios-usuar_id').serialize();
                console.log(d);
                jQuery.ajax({
                    'type': 'POST', 'url': paginaPass,
                    'cache': false,
                    'data': d,
                    'success': function (json) {
                        res = $.parseJSON(json);
                        console.log(res);
                        if (res['guardado'] === 'si') {
                            alert('Datos Modificados');

                        } else {
                            alert('Datos NO modificados ' + res['guardado']);

                        }
                    },
                    'error': function () {
                        alert('Datos NO modificados ******  ');
                    }
                })
            }
    );
}
);

document.addEventListener('DOMContentLoaded', function () {

}
);


document.addEventListener('DOMContentLoaded', function () {

}
);



