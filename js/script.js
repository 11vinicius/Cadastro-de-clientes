$(function () {
    var item = "";
    $('#telefone').mask('(00)0000-0000');

    $('#cadastro').submit(function (e) {
        e.preventDefault();
        var erro = "";
        
        var cadastro = $(this).serialize();
        $.ajax({
            url: 'Pages/cadastro.php',
            type: 'POST',
            data: cadastro,
            success: function (c) {
                if (c == 1) {
                    window.location.href = "index.php";
                } else {
                    $('#erro').html('<div class="alert-danger">E-mail já cadastrado</div>');
                }    
            }
        });
    });
   
    $('#estado').change(function () {
        var estado = $(this).val();
        var item = "";
        var j = "";
        $.ajax({
            url: 'Pages/cidade_JSON.php',
            data: { uf: estado },
            type: 'get',
            dataType: 'json',
            success: function (j) {
                for (i = 0; i < j.length; i++){
                    item += "<option value=" + j[i]. nome + ">";
                    item += j[i].nome +"</option>"
                }
                $('#cidade').html(item);
            }
        });
    });

    $('#atualizar').submit(function (e) {
        e.preventDefault();

        var atualizar = $(this).serialize();
       
        $.ajax({
            url: 'Pages/update.php',
            type: 'POST',
            data: atualizar,
            success: function (j) {
                if (j == 1) {
                    window.location.href = "index.php";
                }
            }
        });
    });
});