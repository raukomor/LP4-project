<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/services.js" defer="defer"></script>
    <script src="js/app.js" defer="defer"></script>

</head>
    <title>Document</title>
</head>
<body>
    
        <form onsubmit="newEscola(true, $('#name').val(), $('#end').val(), $('#tel').val());">
            <fieldset >
                <legend>Cadastro de Escola</legend>
                <label for="">Nome:</label>
                <input type="text" name="" id="name" required/>
                </br> 
                <label for="">Endereço:</label>
                <input type="text" name="" id="end" required/>
                </br>
                <label for="">Telefone:</label>
                <input type="number" name="" id="tel" required/>
                </br>
                <input type="submit" value="Cadastrar" >
            </fieldset>
        </form>
</body>
</html>