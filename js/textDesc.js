function textDesc(_$id) {
   
    $.ajax({
        url: "index.php",
        data: 'mod=' + 'Panel' + '&ope=' + 'textArea' + '&idText='+ _$id,
        type: "GET",
        success: function (response) {
            $('.textArea span').html(response).fadeIn();
           
        }
    });
}

function deletePro(_$id) {
   
    $.ajax({
        url: "index.php",
        data: 'mod=' + 'Panel' + '&ope=' + 'textArea' + '&idText='+ _$id,
        type: "GET",
        success: function (response) {
            $('.textArea span').html(response).fadeIn();
           
        }
    });
}
