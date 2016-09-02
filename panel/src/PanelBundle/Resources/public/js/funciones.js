

$(document).ready(function($) {
    /*var ventana_ancho = $(window).width();
    var ventana_alto = $(window).height();
    alert(ventana_ancho);
    alert(ventana_alto);*/
    $(".cargar-button-home").click(function(event) {
        event.preventDefault();
        ////////////////////////
        if($("#form_Archivo").val()!=""){///////////Validador file
            if (confirm('¿Seguro que quieres cargar el archivo '+$("#form_Archivo").val()+' a la base de datos?')) {
                 $(this).css("display", "none");
                 $("body").append('<div class"cargando conte90">Subiendo excel espere..<img class="img-cargando-gif" src="../bundles/panel/images/cargando.gif" /></div>');
                     setTimeout(function(){
                        $("#form-seleccionar").submit();
                     },1000);
            }
        }else{
            alert("Cargue un archivo");
        }//end if validador file
        ////////////////////////
       
    });

    $(window).scroll(function(){
        if ($(window).scrollTop() > 400) {
            
        }
        
        if ($(window).scrollTop() < 400) {
            
        
        }
    });

    $(document).scroll(function() {
        console.log($(document).scrollTop());
    })

    //MENU HEADER 
    var cambio = false;
    $('.menu li a').each(function(index) {
        if(this.href.trim() == window.location){
            $(this).addClass("menu_activo");
            cambio = true;
        }
    });
    if(!cambio){
        $('.menu li:first').addClass("menu_activo");
    }

    //SUBMENU 
    var cambio = false;
    $('.submenu li a').each(function(index) {
        if(this.href.trim() == window.location){
            $(this).addClass("submenu_menu_activo");
            cambio = true;
        }
    });

    $('.conteMenu').on('click', function(e){
        $('.menuLateral').css({
            top: 0
        })
    })
    $('.cerrarMenu').on('click', function(e){
        $('.menuLateral').css({
            top: '-100%'
        })
    })
    $('body').on('click', function(e){
       
    })

    //VALIDA CONTACTO
    $('#submitFooter').click(function(e){
        $("#formFooter").validate({
            rules: {
                nombre: { required: true, minlength: 3 },
                correo: { required: true, minlength: 3 },
                telefono: { required: true, minlength: 3 },
                interes: { required: true },
                mensaje: { required: true, minlength: 3 }
            },
            submitHandler: function(form){
                $('#submitFooter').attr('disabled','disabled');
                setTimeout(function(e){
                    $.ajax({
                        type: "POST",
                        url:"valida_contacto.php",
                        data: $("#formFooter").serialize(),
                        success: function(data){
                            if(data == 'mensaje_enviado'){
                                alert('Mensaje enviado Correctamente!!');
                                $("#formFooter")[0].reset();
                            }else{
                                alert('Error de envio!!');
                            }

                            $('#submitFooter').removeAttr('disabled');
                        }
                    });
                },1300)
            }
        })
    });

    
});


function initialize() {
    var mapOptions = {
        streetViewControl: false,
        zoom: 16,
        scrollwheel: false,
        disableDefaultUI: false,
        center: new google.maps.LatLng(33.866990, -118.100559),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(document.getElementById('mapita'), mapOptions);

    //var image = 'img/contacto/pin.png';
    var myLatLng = new google.maps.LatLng(33.866990, -118.100559);
    var beachMarker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        //icon: image,
        title: 'KIA'
    });
}
    