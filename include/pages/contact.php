<?php
function post($index) {
	return isset($_POST[$index]) ? $_POST[$index] : '';
}

foreach($_POST as $index => $post) $_POST[$index] = htmlentities($_POST[$index]);
$send = true;
$emails = array('leosw' => 'leo-serre@legtux.org');
$headers = 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\n";
$headers .= 'From: ' . post('email') . "\n";
$output = 'Message envoyé depuis le site http://'.$_SERVER["SERVER_NAME"].'/ par ' . post('name') . '<br/><hr><br /><br />' . str_replace("\n", "<br />", stripslashes(post('message')));
if(isset($_POST['submit'])) {
	if(post('ns') == '') {
		if(post('name') == '') {
			echo '<p class="error">Vous devez indiquer un nom ou un pseudo.</p>';
			$send = false;
		}
		if(post('subject') == '') {
			echo '<p class="error">Vous devez indiquer un sujet.</p>';
			$send = false;
		}
		if(post('email') == '') {
			echo '<p class="error">Vous devez indiquer un email.</p>';
			$send = false;
		}
		if(post('message') == '') {
			echo '<p class="error">Vous devez écrire un message.</p>';
			$send = false;
		}
		if($send) {
			if(mail($emails[post('dest')], post('subject'), strtr($output, array_flip(get_html_translation_table(HTML_ENTITIES))), $headers)) {
				echo '<p class="ok">Envoi du message réussi.</p>';
			} else {
				echo '<p class="error">Impossible d\'envoyer le message.</p>';
			}
		}
	}
}
?>

<form id="contact" method="post" action="">
	<label for="name">Nom / Pseudo :</label>
		<input name="name" id="name" type="text" value="<?php echo post('name'); ?>"/><br/>
	<label for="email">E-mail :</label>
		<input id="email" name="email" type="text" value="<?php echo post('email'); ?>"/><br/>
	<label for="subject">Sujet :</label>
		<input id="subject" name="subject" type="text" value="<?php echo post('subject'); ?>"/><br/>
	<label for="dest">Destinataire :</label>
		<select id="dest" name="dest">
		<option value="leosw" <?php echo post('leosw') == 'leosw' ? ' selected="selected" ' : ' '; ?>>Léo SERRE&nbsp;</option>
		</select><br/>
	<label for="message" class="labeltxt">Message :</label>
		<textarea id="message" name="message" rows="8" cols="90"><?php echo post('message'); ?></textarea>

	<input type="submit" name="submit" value="Envoyer"/>
	<input type="reset" name="reset" value="Annuler"/>
	<input type="hidden" name="ns" value="<?php echo post('ns'); ?>"/>
</form>

