var response;

$(function(){
    $('#newEscola').submit(function(event){
        event.preventDefault();
        var formDados = $(this).serialize();
        newEscola(formDados);
    });
});

$(function(){
    $('#editEscola').submit(function(event){
        event.preventDefault();
        var formDados = $(this).serialize();
        editEscola(formDados);
    });
});

$(function(){
    $('#selectEscolaForUpdate').submit(function(event){
        event.preventDefault();
        var formDados = $(this).serialize();
        GetEscolaForEdit(formDados);
    });
});

$(function(){
    $('#deleteEscola').submit(function(event){
        event.preventDefault();
        var formDados = $(this).serialize();
        deleteEscola(formDados);
    });
});


