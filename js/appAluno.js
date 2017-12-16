$( document ).ready(function() {
    GetAllAlunos();
    //$('input[type=file]').on('change', prepareUpload);

    
      $('#newAluno').on('submit',function(e) {
        e.preventDefault();
        
        var formDados = $("#data").serialize();
        var form = $(this);
        
        var formdata = new FormData(form[0]);
                
        newAluno(formdata,formDados);
    });

    $('#editaAluno').on('submit',function(e) {
        e.preventDefault();
        
        var formDados = $("#data").serialize();
        var form = $(this);
        
        var formdata = new FormData(form[0]);
                
        editAluno(formdata,formDados);
    });

    

    
});