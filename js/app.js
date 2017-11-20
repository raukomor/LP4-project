function cadastrarEscola(){
    var nome = $('#name').val();
    var end = $('#end').val();
    var tel = $('#tel').val();

    newEscola(true,nome,end,tel);
}