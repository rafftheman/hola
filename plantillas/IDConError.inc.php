<div class="form-group has-error">         
    <br>
    <input type="number" class="form-control" name='ID' placeholder='ID' <?php echo 'value="' . $_POST['ID'] . '"' ?>>
    <br>
    <input type="password" class="form-control" name="Pass" placeholder='Contraseña'>
    <?php $validador -> mostrar_error_cosas()?>
</div>

<button type="submit" class="form-control btn btn-default btn-primary" name="b1">Buscar</button>
<br>
