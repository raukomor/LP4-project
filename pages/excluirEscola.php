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
    
        <form method="POST" id="deleteEscola" class="form-group" action="" >
            <fieldset >
                <legend>Excluir Escola </legend>
                <label for="">Código da escola:</label>
                <input type="text" name="code" id="code" required/>
                <input type="hidden" name="deleteEscola" value="deleteEscola">
                </br>
                <button type="submit">Excluir</button>
            </fieldset>
        </form>
</body>
</html>