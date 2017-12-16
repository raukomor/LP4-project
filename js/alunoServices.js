//Select na tabela escola com id especifico
function GetEscolaById(formDados){
    var url = "../services/escolaService.php";
    console.log(url);
    $.ajax({
        method: "POST",
        url: url,
        data: formDados,//{ relatorioCode: code},
        cache: false,
        dataType: "json",
        beforeSend: function(){
            console.log("carregando");
        },
        error: function(){
            console.log("problema com a fonte de dados");
        },
        success: function(data){},         
        complete: function(data){
            response = data.responseJSON;
        }
    });
    
};

//Select na tabela escola para a edição
function GetAlunoForEdit(id){
    var url = "../services/alunoService.php";
    console.log(id);
    $.ajax({
        method: "POST",
        url: url,
        data: {relatorioCode: id},//{ relatorioCode: code},
        cache: false,
        dataType: "json",
        beforeSend: function(){
            console.log("carregando");
        },
        error: function(ex){
            console.log(ex.responseText);
        },
        success: function(data){
            if(data.erro){
                alert(data.erro);
            }
            else{
                
                var formElements = new Array();
                $("#editaAluno :input").each(function(){
                    formElements.push($(this));
                });
                
                
                formElements[0].val(data.nm_aluno); 
                formElements[1].val(data.dt_nascimento); 
                formElements[2].val(data.nm_endereco); 
                formElements[3].val(data.cd_telefone); 
                formElements[4].val(data.cd_escola); 
                formElements[5].val(data.cd_turma); 
                formElements[6].val(data.cd_senha); 
                formElements[7].val(data.im_perfil); 
            }
        },         
        complete: function(data){
            
            var dados = data.responseJSON; 
            
        }
    });
};

//Select na tabela escola inteira
function GetAllAlunos(){
    var url = "../services/alunoService.php";
    console.log(url);
    $.ajax({
        method: "POST",
        url: url,
        data: { relatorio: "all" },
        cache: false,
        dataType: "json",
        beforeSend: function(){
            console.log("carregando");
        },
        error: function(ex){
            console.log(ex.responseText);
        },
        success: function(data){
            if(data.erro){
                console.log(data.erro);
            }else{
                // for(var i = 0; i < data.length; i++){
                //     console.log(data[i]);
                //     console.log(data[i].cd_escola);
                //     console.log(data[i].nm_escola);
                //     console.log(data[i].nm_endereco_escola);
                //     console.log(data[i].cd_telefone_escola);
                // }
                console.log(data);
                
                $.each(data, function(i, d) {
                    var area = $("#alunos");
                    area.append(
                        "<div class='itens container'>"+
                        "<div class='row'>" +
                            "<div class='col-12'><img src='"+ d.im_perfil + "' class='rounded' alt='Imagem de Perfil'></div>" +
                            "<div class='col-12'>Nome: " + d.nm_aluno + "</div>" +
                            "<div class='col-12'>CPF: " + d.cd_cpf_aluno + "</div>" +
                            "<div class='col-12'>Data de Nascimento: " + d.dt_nascimento_aluno + "</div>" +
                            "<div class='col-12'>Endereço: " + d.nm_endereco_aluno + "</div>" +
                            "<div class='col-12'>Telefone: " + d.cd_telefone_aluno + "</div>" +
                            "<div class='col-12'>Código da Escola: " + d.cd_escola + "</div>" +
                            "<div class='col-12'>Código da Turma: " + d.cd_turma + "</div>" +
                            "<div class='col-12'>Data de Matricula: " + d.dt_matricula + "</div>" +
                            // "<div class='col-12'>" + d.cd_senha + "</div>" +
                            
                            // "<form action='' method='post'>" +
                            //     "<input type='hidden' name='action' value='edit'/>"+
                            //     "<input type='hidden' name='cd_aluno' id='cd_aluno' value='" + d.cd_cpf_aluno + "'/>"+
                                "<div class='col-6'><button type='button'  class='btn btn-primary editCodeAluno' data-toggle='modal' data-target='#editModal' value='" + d.cd_cpf_aluno + "'>Editar</button></div>" +
                            // "</form>"+
                            
                            "<form action='' class='excludeAluno' method='post'>" +
                                "<input type='hidden' name='deleteAluno' value='" + d.cd_cpf_aluno + "'/>"+
                                "<div class='col-6'><input type='submit' class='btn btn-primary' value='excluir'/></div>" +
                            "</form>"+
                    "</div>"+
                    "</div>"+
                    "<br>"
                    );
                });

                //adicionando observers aos botões de edit e excluir
                $( "form" ).submit(function( event ) {
                    //console.log($(this).find("input:first").val());
                    var formDados = $(this).serialize();
                    if($(this).find("input[type=hidden]:first").val() == "edit"){
                        console.log(formDados);
                    }

                    if($(this).find("input[type=hidden]:first").val() == "delete"){
                        console.log(formDados);   
                    }

                    event.preventDefault();
                });

                $('.editCodeAluno').on('click', function(){
                    $('.editAluno').val($(this).val());
                    GetAlunoForEdit($(this).val());
                });

                $('.excludeAluno').on('submit',function(e) {
                    e.preventDefault();
                    
                    var formDados = $(".excludeAluno").serialize();
                            
                    deleteAluno(formDados);
                });
            }
        }

    });
};

//search na tabela escola por nome
function SearchEscolaByName(name){
    var url = "../services/escolaService.php";
    console.log(url);
    $.ajax({
        method: "POST",
        url: url,
        data: { search: name},
        cache: false,
        dataType: "json",
        beforeSend: function(){
            console.log("carregando");
        },
        error: function(){
            console.log("problema com a fonte de dados");
        },
        success: function(data){
            if(data.erro){
                console.log(data.erro);
            }else{
                for(var i = 0; i < data.length; i++){
                    console.log(data[i]);
                    console.log(data[i].cd_escola);
                    console.log(data[i].nm_escola);
                    console.log(data[i].nm_endereco_escola);
                    console.log(data[i].cd_telefone_escola);
                }
            }
        }

    });
};

//Inserir na tabela aluno
function newAluno(formdata,formDados){
    var url = "../services/alunoService.php";
    
    $.ajax({
        url: url,
        type: "POST",
        contentType: false,
        processData: false,
        data: formdata,formDados,
        cache: false,
        beforeSend: function(){
            console.log("carregando");
        },
        error: function(ex){
            console.log(ex.responseText);
        },
        success: function(data){
            if(data.erro){
                alert("Erro ao cadastrar o aluno");
            }else{
                alert("Aluno cadastrado com sucesso");
            }
           
            //$(location).attr('href', '/LP4-project');
            $('#newAluno')[0].reset();
            $('#cadastroModal').modal('toggle');
            $('#alunos').empty();
            GetAllAlunos();
        } 
    });

    // $.ajax({
    //     method: "POST",
    //     url: url,
    //     data: formDados,/*{ 
    //         newEscola: newEscola, 
    //         name: name,
    //         end: end,
    //         tel: tel
    //     },*/
    //     cache: false,
    //     dataType: "json",
       
    //     beforeSend: function(){
    //         console.log("carregando");
    //     },
    //     error: function(ex){
    //         console.log(ex.responseText);
    //     },
    //     success: function(data){
    //         if(data.erro){
    //             alert(data.erro);
    //         }else{
    //             alert(data.success);
    //         }
           
    //         // $(location).attr('href', '/LP4-project');
    //     }

    // });
};

//Editar Cadastro da tabela escola
function editAluno(formdata,formDados){
    var url = "../services/alunoService.php";
    // var url = "../services/img.php";
    $.ajax({
        url: url,
        type: "POST",
        contentType: false,
        processData: false,
        data: formdata,formDados,
        cache: false,
        beforeSend: function(){
            console.log("carregando");
        },
        error: function(ex){
            console.log(ex.responseText);
        },
        success: function(data){
            if(data.erro){
                alert("Erro ao Editar o aluno");
            }else{
                alert("Aluno Alterado com sucesso");
            }
            console.log(data);
            //$(location).attr('href', '/LP4-project');
            $('#editaAluno')[0].reset();
            $('#editModal').modal('toggle');
            $('#alunos').empty();
            GetAllAlunos();
        } 
    });
};

//Excluir Cadastro de aluno
function deleteAluno(formDados){
    var url = "../services/alunoService.php";
    console.log(url);
    $.ajax({
        method: "POST",
        url: url,
        data: formDados,
        cache: false,
        dataType: "json",
        beforeSend: function(){
            console.log("carregando");
        },
        error: function(ex){
            console.log(ex.responseText);
        },
        success: function(data){
            if(data.erro){
                alert(data.erro);
            }else{
                alert(data.success);
            }
           
            $('#alunos').empty();
            GetAllAlunos();
           
        }

    });
};


function getEscolas(){
    var url = "../services/alunoService.php";
    console.log(url);
    $.ajax({
        method: "POST",
        url: url,
        data: {getEscolas: "getEscolas"},
        cache: false,
        dataType: "json",
        beforeSend: function(){
            console.log("carregando");
        },
        error: function(ex){
            console.log(ex.responseText);
        },
        success: function(data){
            if(data.erro){
                alert(data.erro);
            }else{
                console.log(data);
                
                $.each(data, function(i, d) {
                    var dropdown = $("<option></option>");
                    dropdown.text(d.nm_escola);
                    dropdown.val(d.cd_escola);
                    $(".dropEscola").append(dropdown);
                });
                
                //$('#alunos').empty();
                //GetAllAlunos();
            }
        }
    

    });
}



$(document).ready(function(){
    getEscolas();
})