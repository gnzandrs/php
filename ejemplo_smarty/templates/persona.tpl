<br />
<div align="center">
    <form action="persona.php" method="post" name="persona" enctype="multipart/form-data">
        <table width="296" border="1">
          <tr>
            <td width="114">Nombre:</td>
            <td width="172"> {$nombre}</td>
          </tr>
          <tr>
            <td>Telefono:</td>
            <td>{$telefono}</td>
          </tr>
          <tr>
            <td>Rut:</td>
            <td>{$rut}</td>
          </tr>
          <tr>
            <td>Foto:</td>
            <td><a href="ver_fotografia.php?nombre={$nombre}">Ver</a></td>
          </tr>
        </table>
    <br />
    <div align="center"><input type="submit" value="Aceptar" name="Aceptar" /></div>
    </form>
</div>