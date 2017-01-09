<ul>
	<?php
	if (isset($error)){
		echo("<li>$error</li>");	
	}
	echo validation_errors("<li>","</li>"); ?>
</ul>	

<?php echo form_open('login'); ?>

 
    <label for="user">Email</label>
    <input type="input" name="user" /><br />

    <label for="password">Contraseña</label>
    <input type="input" name="password" required=""/><br />

    <button name="submit" value="Logearse">Logearse</button>

</form>