<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/services.js" defer="defer"></script>
    <script src="../js/app.js" defer="defer"></script>

</head>
    <title>Document</title>
</head>
<body>
    
        <form method="POST" id="selectEscolaForUpdate" class="form-group" action="" >
            <fieldset >
                <legend>Procurar Escola </legend>
                <label for="">Código da escola:</label>
                <input type="text" name="relatorioCode" id="code" required/>
                </br>
                <button type="submit">Procurar</button>
            </fieldset>
        </form>
        
        <form method="POST" id="editEscola" class="form-group" action="" style="display: none">
            <fieldset >
                <legend>Editar Escola </legend>
                <label for="">Nome:</label>
                <input type="text" name="name" id="name" required/>
                </br> 
                <label for="">Endereço:</label>
                <input type="text" name="end" id="end" required/>
                </br>
                <label for="">Telefone:</label>
                <input type="number" name="tel" id="tel" required/>
                </br>
                <input type="hidden" name="code">
                <input type="hidden" name="editEscola" value="editEscola">
                <button type="submit">Editar</button>
            </fieldset>
        </form>
</body>
</html>