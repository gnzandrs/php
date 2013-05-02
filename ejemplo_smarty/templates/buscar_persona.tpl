<br />
<div align="center">
    <form name="buscar_persona" method="post" action="buscar_persona.php">
        <table width="200" border="0">
            <tr>
                <td>Buscar:</td>
                <td><input type="text" name="letras" id="letras"></td>
            </tr>
            <tr>
                <br />
                <td><input type="submit" name="Buscar" id="Buscar" value="Buscar"></td>
                <td><input type="submit" name="Volver" id="Volver" value="Volver"></td>
            </tr>
        </table>
        <br />
        <table border="1" width="20%">
            <tr>
                <td>Rut</td>
                <td>Nombre</td>
            </tr>
            <tr>
                {$tabla}	
            </tr>
        </table>
    </form>
</div>