//Select na tabela escola com id especifico
function GetEscolaById(code){
    var url = "services/escolaService.php";
    console.log(url);
    $.ajax({
        method: "POST",
        url: url,
        data: { relatorioCode: code},
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
                console.log(data);
            }
        }

    });
};

//Select na tabela escola inteira
function GetAllEscola(){
    var url = "services/escolaService.php";
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

//search na tabela escola por nome
function SearchEscolaByName(name){
    var url = "services/escolaService.php";
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
function newEscola(newEscola, name, end, tel){
    var url = "services/escolaService.php";
    console.log(url);
    $.ajax({
        method: "POST",
        url: url,
        data: { 
            newEscola: newEscola, 
            name: name,
            end: end,
            tel: tel
        },
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
                console.log(data.success);
            }
           
        }

    });
};

//Editar Cadastro da tabela escola
function editEscola(editEscola, code, name, end, tel){
    var url = "services/escolaService.php";
    console.log(url);
    $.ajax({
        method: "POST",
        url: url,
        data: { 
            editEscola: editEscola, 
            code: code,
            name: name,
            end: end,
            tel: tel
        },
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
                console.log(data.success);
            }
           
        }

    });
};

//Excluir Cadastro da tabela escola
function deleteEscola(deleteEscola, code){
    var url = "services/escolaService.php";
    console.log(url);
    $.ajax({
        method: "POST",
        url: url,
        data: { 
            deleteEscola: deleteEscola, 
            code: code
        },
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
                console.log(data.success);
            }
           
        }

    });
};

