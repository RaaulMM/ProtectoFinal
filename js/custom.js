// Muevo caja error indez
$( document ).ready(function() {
    var fechaHoy = new Date();
    console.log(fechaHoy);
    $('.error').appendTo('.divcentral');
   
    


 //JavaScrip del Calendario
    $('#CalendarioWeb').fullCalendar({
    height: 473,
    weekends: false,
    dayCount: 5,
    minTime: "10:00:00",
    maxTime: "18:00:00",
    defaultView: 'agendaWeek',
    groupByResource: true,
    themeSystem: 'bootstrap4' ,
        header:{
            left:'today,prev,next',
            center:'title',
            right:'agendaWeek'
        },
        views: {
            agendaFiveDay: {
            type: 'agenda',
            duration: { days: 5 },
            firstDay: 1,
            slotDuration: '00:30:00',
            
            }
        },
        businessHours:[ 
        {
            dow: [ 1, 2, 3, 4, 5],
            start: '10:00',
            end : '14:00', 
        },
        {
            dow: [ 1, 2, 3, 4, 5],
            start: '16:00',
            end : '18:00',
        }
        ],
        eventRender: function (event, element) {
                    element.find(".fc-title").remove();
                    element.find(".fc-time").remove();
                    var new_description = '<div class="casillaOcupada">No disponible</div>';
                    element.append(new_description);
                },
        events:'/calendary/modelo/eventos.php', 
        dayClick:function(date,jsEvent,view){ 
        var fini = new Date(date.format());
        var ffin  = new Date(fini.getTime() + (30 * 60000)) ;
        //Fechas dia-mes-año---------------------------------------------
        var dia = ((fini.getDate() < 10)?"0":"") + fini.getDate() ;
        var mes = ((fini.getMonth() < 10)?"0":"") + (fini.getMonth() + (1)) ;
        var fechaI = fini.getFullYear() + "-" + mes + "-" + dia ;
        var fechaF = ffin.getFullYear()+ "-"+ mes + "-" + dia ;
        //Horas-----------------------------------------------------------
        var horaI = ((fini.getHours() < 10)?"0":"") + fini.getHours()+ ":" + ((fini.getMinutes() < 10)?"0":"") + fini.getMinutes() +":00";
        var horaF = ((ffin.getHours() < 10)?"0":"")+ffin.getHours() + ":" + ((ffin.getMinutes() < 10)?"0":"")+ffin.getMinutes()+":00";
        //FechaFinal que se manda a la BBDD-------------------------------
        var fechitaInicio = fechaI +" "+horaI;
        var fechitaFinal = fechaF +" "+horaF;
        //Fecha que muestra-------------------------------------------------
        var fechaMuestra = dia + "-" + mes + "-" + fini.getFullYear();
        //RELLENAMOS CAMPOS EN HTML-----------------------------------------
        $('#txtFechaI').val(fechaMuestra);
        $('#txtHoraI').val(horaI);
        $('#txtHoraF').val(horaF);
        //LOS CAMPO FECHA QUE PASA A LA BBDD---------------------------------
        $('#txtFechaInicio').val(fechitaInicio);
        $('#txtFechaFinal').val(fechitaFinal);
        //Llamamos al Modal
        //Clik en hora Laboral
        console.log(fini);
        //comprobamos que la hora nop sea entre las 14:00 y las 16:00 y tambien controlamos que no sea menor a la hora actual.
        if ((horaI == "14:00:00") || (horaI == "15:00:00") || (horaI == "15:30:00") || (horaI == "14:30:00")|| fechaHoy >= fini){   
        }else{ $("#ModalClik").modal();}
        },
        selectConstraint:"businessHours",  
    });
    $(".fc-day-grid").empty();
    $( "div" ).remove( ".fc-day-grid" );
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
      })
});