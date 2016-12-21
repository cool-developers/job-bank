
<ul>
	<?php
	if (isset($error)){
		echo("<li>$error</li>");	
	}
	echo validation_errors("<li>","</li>"); ?>
</ul>	

<?php echo form_open('login'); ?>

 
    <label for="user">Usuario</label>
    <input type="input" name="user" /><br />

    <label for="password">Password</label>
    <input type="input" name="password" /><br />

    <button name="submit" value="Logearse">Logearse</button>

</form>