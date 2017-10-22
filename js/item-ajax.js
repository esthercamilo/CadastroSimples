$( document ).ready(function() {

var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;

manageData();

/* manage data list */
function manageData() {
    $.ajax({
        dataType: 'json',
        url: url+'api/getData.php',
        data: {page:page}
    }).done(function(data){
    	total_page = Math.ceil(data.total/10);
    	current_page = page;

    	$('#pagination').twbsPagination({
	        totalPages: total_page,
	        visiblePages: current_page,
	        onPageClick: function (event, pageL) {
	        	page = pageL;
                if(is_ajax_fire != 0){
	        	  getPageData();
                }
	        }
	    });

    	manageRow(data.data);
        is_ajax_fire = 1;

    });

}

/* Get Page Data*/
function getPageData() {
	$.ajax({
    	dataType: 'json',
    	url: url+'api/getData.php',
    	data: {page:page}
	}).done(function(data){
		manageRow(data.data);
	});
}


/* Add new Item table row */
function manageRow(data) {
	var	rows = '';
	$.each( data, function( key, value ) {
	  	rows = rows + '<tr>';
	  	rows = rows + '<td>'+value.nome+'</td>';
	  	rows = rows + '<td>'+value.sobrenome+'</td>';
	  	rows = rows + '<td>'+value.endereco+'</td>';
	  	rows = rows + '<td data-id="'+value.id+'">';
        rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">Editar</button> ';
        rows = rows + '<button class="btn btn-danger remove-item">Remover</button>';
        rows = rows + '</td>';
	  	rows = rows + '</tr>';
	});

	$("tbody").html(rows);
}

/* Inserir novo cadastro */
$(".crud-submit").click(function(e){
    e.preventDefault();
    var form_action = $("#create-item").find("form").attr("action");
    var nome = $("#create-item").find("input[name='nome']").val();
    var sobrenome = $("#create-item").find("input[name='sobrenome']").val();
    var endereco = $("#create-item").find("textarea[name='endereco']").val();

    if(nome != '' && sobrenome != '' && endereco != ''){
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: url + form_action,
            data:{nome:nome, sobrenome:sobrenome, endereco:endereco}
        }).done(function(data){
            $("#create-item").find("input[name='nome']").val('');
            $("#create-item").find("input[name='sobrenome']").val('');
            $("#create-item").find("textarea[name='endereco']").val('');
            getPageData();
            $(".modal").modal('hide');
            toastr.success('Pessoa adicionada..', 'Sucesso', {timeOut: 2500});
        });
    }else{
        alert('Preencha todos os cmapos.')
    }


});

/* Remove Item */
$("body").on("click",".remove-item",function(){
    var id = $(this).parent("td").data('id');
    var c_obj = $(this).parents("tr");

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: url + 'api/delete.php',
        data:{id:id}
    }).done(function(data){
        c_obj.remove();
        toastr.success('Pessoa removida com sucesso..', 'Sucesso', {timeOut: 2500});
        getPageData();
    });

});


/* Edit Item */
$("body").on("click",".edit-item",function(){

    var id = $(this).parent("td").data('id');
    var nome = $(this).parent("td").prev("td").prev("td").text();
    var sobrenome = $(this).parent("td").prev("td").text();
    var endereco = $(this).parent("td").prev("td").text();

    $("#edit-item").find("input[name='nome']").val(nome);
    $("#edit-item").find("input[name='sobrenome']").val(sobrenome);
    $("#edit-item").find("textarea[name='endereco']").val(endereco);
    $("#edit-item").find(".edit-id").val(id);

});


/* Updated new Item */
$(".crud-submit-edit").click(function(e){

    e.preventDefault();
    var form_action = $("#edit-item").find("form").attr("action");
    var nome = $("#edit-item").find("input[name='nome']").val();
    var sobrenome = $("#edit-item").find("input[name='sobrenome']").val();
    var endereco = $("#edit-item").find("textarea[name='endereco']").val();

    var id = $("#edit-item").find(".edit-id").val();

    if(nome != '' && sobrenome != '' && endereco != ''){
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: url + form_action,
            data:{nome:nome, sobrenome:sobrenome,endereco:endereco, id:id}
        }).done(function(data){
            getPageData();
            $(".modal").modal('hide');
            toastr.success('Registro atualizado.', 'Sucesso', {timeOut: 2500});
        });
    }else{
        alert('Preencha todos os cmapos.')
    }

});
});
