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
    <script src="jquery-3.3.1.slim.js"></script>
    <script type="text/javascript">
        function onClick(metodo) {
            texto = $('#texto').val();
            chave = $('#chave').val();
            textoC = $('#textoCripto').val();
            opt = $("#opt option:selected").val();
            switch (metodo) {
                case
                "cripto"
                :
                    if(textoC !== ""){
                        $('#textoCripto').val("");
                        textoC = "";
                    }
                    $('#texto').css('border', '1px solid black');
                    $('#chave').css('border', '1px solid black');
                    $('#textoCripto').css('border', '1px solid black');
                    if ((texto !== "") && (chave !== "") && (textoC === "")) {
                        data = "texto=" + texto + "&chave=" + chave + "&fn=cript";
                        if (data !== "") {
                            data += "&tipo=" + opt;
                            $.ajax({
                                type: "POST",
                                url: "./C_D.php",
                                data: data,
                                success: function ( result ) {
                                    $('#texto').css('border', '1px solid black');
                                    $('#chave').css('border', '1px solid black');
                                    $('#textoCripto').css('border', '1px solid black');
                                    $('#textoCripto').val(result);

                                },
                                error: function (result) {
                                    console.log(result);
                                }
                            });
                        }
                        else {
                            alert("Não foi possível enviar os textos ao servidor");
                        }
                    } else {
                        if (texto === "")
                            $('#texto').css('border', '1px solid red');
                        if (chave === "")
                            $('#chave').css('border', '1px solid red');
                        if (textoC !== "")
                            $('#textoCripto').css('border', '1px solid red');

                    }
                    data = "";
                    break;
                    case
                "decripto"
                :
                    $('#texto').css('border', '1px solid black');
                    $('#chave').css('border', '1px solid black');
                    $('#textoCripto').css('border', '1px solid black');
                    if ((texto === "") && (chave !== "") && (textoC !== "")) {
                        data = "textoC=" + textoC + "&chave=" + chave + "&fn=descript";
                        if (data !== "") {
                            data += "&tipo=" + opt;
                            $.ajax({
                                type: "POST",
                                url: "./C_D.php",
                                data: data,
                                success: function (result) {
                                    $('#texto').css('border', '1px solid black');
                                    $('#chave').css('border', '1px solid black');
                                    $('#textoCripto').css('border', '1px solid black');

                                    $('#texto').val(result);


                                },
                                error: function (result) {
                                    console.log(result);
                                }
                            });
                        }
                        else {
                            alert("Não foi possível enviar os textos ao servidor");
                        }
                    } else {
                        if (chave === "")
                            $('#chave').css('border', '1px solid red');
                        if (texto !== "")
                            $('#texto').css('border', '1px solid red');
                        if (textoC === "")
                            $('#textoCripto').css('border', '1px solid red');
                    }
                    data = "";
                    break;
            }

        }
    </script>
</head>
<body>
Texto: <textarea id="texto"></textarea><br><br>
Chave: <input type="text" id="chave"><br><br>
Texto criptografado:<br><br>
<textarea id="textoCripto"></textarea>
<br><br>
<select id="opt">
    <option value="AES">AES</option>
    <option value="DES">DES</option>
    <option value="Twofish">Twofish</option>
    <option value="Blowfish">Blowfish</option>
</select>
<input type="submit" value="Criptografar" id="cripto" onclick="onClick('cripto')">
<input type="submit" value="Descriptografar" id="decripto" onclick="onClick('decripto')">
</body>
</html>
