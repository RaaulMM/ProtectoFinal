function ajaxSubmit(_$id) { 

    switch (_$id) {
        case 1:
            var nombreProyecto = $("#nombreProyecto").val();
            
            $.ajax({
                url: "index.php",
                data:'mod='+'Panel'+'&ope='+'registroPro'+'&nombreProyecto='+nombreProyecto,
                type: "GET",
               
            });
                    
        break;

        case 2:
            var nombreProfesor = $("#nombreProfesor").val();
            var apelledidoProfesor = $("#apelledidoProfesor").val();
            
            $.ajax({
                url: "index.php",
                data:'mod='+'Panel'+'&ope='+'registroProfesor'+'&nombreProfesor='+nombreProfesor+'&apelledidoProfesor='+apelledidoProfesor,
                type: "GET",
               
            });
        
        break;

        case 3:
                var idProy = $("#idProy").val();
                var idProf = $("#idProf").val();
                
                $.ajax({
                    url: "index.php",
                    data:'mod='+'Panel'+'&ope='+'registroProPro'+'&idProy='+idProy+'&idProf='+idProf,
                    type: "GET",   
                    
                });
        break;
    }
}

