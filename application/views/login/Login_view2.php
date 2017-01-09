<h2><?php echo $title; ?></h2>

<ul>
	<?php echo validation_errors("<li>","</li>"); ?>

	<?php if(isset($error)){
		 echo("<li> $error") ;
	}?>
</ul>


<?php echo form_open('Login/index'); ?>	
	
    <label for="email">email</label>
    <input type="input" name="email" /><br />

    <label for="password">password</label>
    <input type="input" name="password" /><br />

    <input type="submit" name="submit" value="Validate user" />

</form>