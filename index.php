<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Criptografia</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
            function onClick(metodo) {
                texto = $('#texto').val();
                chave = $('#chave').val();
                textoC = $('#textoCripto').val();
                opt = "";
                $("#opt option:selected").each(function () {
                    opt = $(this).val();
                });
                data = "";
                switch (metodo) {
                    case "cripto":
                        $('#texto').css('border', '1px solid black');
                        $('#chave').css('border', '1px solid black');
                        $('#textoCripto').css('border', '1px solid black');
                        if ((texto !== "") && (chave !== "") && (textoC === "")) {
                            data = "texto=" + texto + "&chave=" + chave+"&fn=cri";
                        } else {
                            if (texto === "")
                                $('#texto').css('border', '1px solid red');
                            if (chave === "")
                                $('#chave').css('border', '1px solid red');
                            break;
                        }
                    case "decripto":
                        $('#texto').css('border', '1px solid black');
                        $('#chave').css('border', '1px solid black');
                        $('#textoCripto').css('border', '1px solid black');
                        if ((texto === "") && (chave !== "") && (textoC !== "")) {
                            data = "textoC=" + textoC + "&chave=" + chave+"&fn=des";
                        } else {
                            if (chave === "")
                                $('#chave').css('border', '1px solid red');
                            if (textoC === "")
                                $('#textoCripto').css('border', '1px solid red');
                        }
                        break;
                }
                
                if (data !== "") {
                    data += "&tipo="+opt;
                    $.ajax({
                        type: "POST",
                        url: "./C_D.php",
                        data: data,
                        success: function (response) {
                            $('#texto').css('border', '1px solid black');
                            $('#chave').css('border', '1px solid black');
                            $('#textoCripto').css('border', '1px solid black');   
                            alert(response);
                        }
                    });
                } else {
                    alert("Não foi possível enviar os textos ao servidor");
                }
            }
        </script>
    </head>
    <body>
        Texto: <textarea id="texto"></textarea><br><br>
        Chave: <input type="text" id="chave"><br><br>
        Texto criptografado:<br><br>
        <textarea id="textoCripto" ></textarea>
        <br><br>
        <select name="opt">
            <option value="AES">AES</option> 
            <option value="DES" selected>DES</option>
            <option value="Twofish">Twofish</option>
            <option value="Blowfish">Blowfish</option>
        </select>
        <input type="submit" value="Criptografar" id="cripto" onclick="onClick('cripto')">
        <input type="submit" value="Descriptografar" id="decripto" onclick="onClick('decripto')">
    </body>
</html>
