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
function GetEscolaForEdit(formDados){
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
            
            var dados = data.responseJSON; 
            if(dados.erro){
                alert(dados.erro);
            }
            else{
                $("#editEscola").css("display", "block");
                $("#selectEscolaForUpdate").css("display", "none");
                
                var formElements = new Array();
                $("#editEscola :input").each(function(){
                    formElements.push($(this));
                });
                
                formElements[0].val(dados.nm_escola); 
                formElements[1].val(dados.nm_endereco_escola); 
                formElements[2].val(dados.cd_telefone_escola); 
                formElements[3].val($('#selectEscolaForUpdate').find('#code').val());
            }
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
        error: function(){
            console.log("problema com a fonte de dados");
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
                     "<div class='row'>" +
                     "<div class='col'>" + d.nm_aluno + "</div>" +
                     "<div class='col'>" + d.cd_cpf_aluno + "</div>" +
                     "<div class='col'>" + d.dt_nascimento_aluno + "</div>" +
                     "<div class='col'>" + d.nm_endereco_aluno + "</div>" +
                     "<div class='col'>" + d.cd_telefone_aluno + "</div>" +
                     "<div class='col'>" + d.cd_escola + "</div>" +
                     "<div class='col'>" + d.cd_turma + "</div>" +
                     "<div class='col'>" + d.dt_matricula + "</div>" +
                     "<div class='col'>" + d.cd_senha + "</div>" +
                     "<div class='col'><input type='submit' class='btn btn-primary' name='' value='editar'/></div>" +
                     "<div class='col'><input type='submit' class='btn btn-primary' name='' value='excluir'/></div>" +
                     "</div>"
                    );
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

//Inserir na tabela escola
function newEscola(formDados){
    var url = "../services/escolaService.php";
    console.log(url);
    $.ajax({
        method: "POST",
        url: url,
        data: formDados,/*{ 
            newEscola: newEscola, 
            name: name,
            end: end,
            tel: tel
        },*/
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
                alert(data.erro);
            }else{
                alert(data.success);
            }
           
            $(location).attr('href', '/LP4-project');
        }

    });
};

//Editar Cadastro da tabela escola
function editEscola(formDados){
    var url = "../services/escolaService.php";
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
        error: function(){
            console.log("problema com a fonte de dados");
        },
        success: function(data){
            if(data.erro){
                alert(data.erro);
            }else{
                alert(data.success);
            }
           
            $(location).attr('href', '/LP4-project');
           
        }

    });
};

//Excluir Cadastro da tabela escola
function deleteEscola(formDados){
    var url = "../services/escolaService.php";
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
        error: function(){
            console.log("problema com a fonte de dados");
        },
        success: function(data){
            if(data.erro){
                alert(data.erro);
            }else{
                alert(data.success);
            }
           
            $(location).attr('href', '/LP4-project');
           
        }

    });
};

