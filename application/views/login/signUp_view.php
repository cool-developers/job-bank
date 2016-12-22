<h2><?php echo $title; ?></h2>

<ul>
	<?php echo validation_errors("<li>","</li>"); ?>

	<?php if(isset($error)){
		 echo("<li> $error") ;
	}?>
</ul>


<?php echo form_open('Registro/index'); ?>	
	
    <label for="email">email</label>
    <input type="input" name="email" /><br />

    <label for="password">contraseña</label>
    <input type="input" name="password" /><br />
    
    <label for="confPpassword">confirmar contraseña</label>
    <input type="input" name="password" /><br />
    
    <input type="submit" name="submit" value="Create user" />

</form>