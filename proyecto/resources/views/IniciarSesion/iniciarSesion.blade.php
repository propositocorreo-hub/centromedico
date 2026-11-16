<?php
extract($_REQUEST);
if (!isset($_REQUEST['x']))
    $x = 0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Plantilla Principal</title>
    @vite(['resources/js/menu.js'])
    @vite(['resources/css/estilos.css'])
    @vite(['resources/css/estiloMenu.css'])
</head>

<body>

    <div id="divContenedor">
        <div id="divEncabezado">
            @include ('IniciarSesion.encabezado')
        </div>
        <div id="divContenido">
            @include ('IniciarSesion.contenido')
            <br>
            <br>

            <br>
            <br>
            <br>
            <br>

            <form id="form1" name="form1" method="post" action="Controlador/validarInicioSesion.php">
                <table width="31%" border="0" align="center">
                    <tr bgcolor="#CCCC00">
                        <td colspan="2" align="center" bgcolor="#cc0000" class="texto">Inicio Sesión</td>
                    </tr>
                    <tr>
                        <td width="39%" align="right">Login</td>
                        <td width="61%"><label for="login"></label>
                            <input name="login" type="text" id="login" size="40" required />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Password:</td>
                        <td><label for="password"></label>
                            <input name="pass" type="password" id="pass" size="40" required />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" bgcolor="#cc0000"><input type="submit" name="button" id="button" value="Enviar" /></td>
                    </tr>
                </table>
            </form>
        </div>





        <div id="divPiePagina">
            @include ('IniciarSesion/piePagina')
        </div>
    </div>
</body>

</html>