<?php
/*
Template Name: Contact Form
*/
?>
<?php

if (isset($_POST['submitted'])) {

	if (trim($_POST['checking']) !== '') {
		$captchaError = true;
	} else {

		//nom
		if (trim($_POST['contactNom']) === '') {
			$nomError = 'Indiquez votre nom.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactNom']);
		}

		//prenom
		if (trim($_POST['contactPrenom']) === '') {
			$prenomError = 'Indiquez votre prénom.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactPrenom']);
		}

		//email
		if (trim($_POST['email']) === '') {
			$emailError = 'Indiquez votre email.';
			$hasError = true;
		} else if (!preg_match(" /^.+@.+\.[a-zA-Z]{2,}$/ ", trim($_POST['email']))) {
			$emailError = 'Adresse email invalide.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}

		//message
		if (trim($_POST['comments']) === '') {
			$commentError = 'Entrez votre message.';
			$hasError = true;
		} else {
			if (function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}

		//si pas d'erreurs
		if (!isset($hasError)) {

			$emailTo = 'me@somedomain.com';
			$subject = 'Formulaire de contact de ' . $name;
			$sendCopy = trim($_POST['sendCopy']);
			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'De : mon site <' . $emailTo . '>' . "\r\n" . 'R&eacute;pondre &agrave; : ' . $email;

			mail($emailTo, $subject, $body, $headers);

			if ($sendCopy == true) {
				$subject = 'Formulaire de contact';
				$headers = 'De : <webmaster@chaletetcaviar.com>';  // a modifier
				mail($email, $subject, $body, $headers);
			}

			$emailSent = true;
		}
	}
} ?>


<?php get_header(); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/contact-form.js"></script>

<?php if (isset($emailSent) && $emailSent == true) { ?>

	<div class="thanks">
		<h1>Merci, <?= $name; ?></h1>
		<p>Votre e-mail a &eacute;t&eacute; envoy&eacute; avec succ&egrave;s. Vous recevrez une r&eacute;ponse prochainement.</p>
	</div>

<?php } else { ?>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>

			<?php if (isset($hasError) || isset($captchaError)) { ?>
				<p class="error text-primary">Erreur lors de l'envoi du formulaire.</p>
			<?php } ?>

			<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
				<fieldset>
					<div class="entete">
					<legend class="text-dark text-center"><h1>&nbsp;Laissez nous votre message</h1></legend>
					</div>
					<br />
					<hr class="mb-2" />
					<br />
					<div class="col-md-8">
						<label class="text-info" for="contactNom">Nom</label>
						<input type="text" class="form-control" name="contactNom" id="contactNom" value="<?php if (isset($_POST['contactNom'])) echo $_POST['contactNom']; ?>" class="requiredField" />
						<?php if ($nomError != '') { ?>
							<div>
								<span class="error text-primary"><?= $nomError; ?></span>
							</div>
						<?php } ?>
					</div>
					<br />
					<div class="col-md-8">
						<label class="text-info" for="contactPrenom">Prénom</label>
						<input type="text" class="form-control" name="contactPrenom" id="contactPrenom" value="<?php if (isset($_POST['contactPrenom'])) echo $_POST['contactPrenom']; ?>" class="requiredField" />
						<?php if ($prenomError != '') { ?>
							<div>
								<span class="error text-primary"><?= $prenomError; ?></span>
							</div>
						<?php } ?>
					</div>
					<br />
					<div class="col-md-8">
						<label class="text-info" for="email">Email</label>
						<input type="text" class="form-control" name="email" id="email" value="<?php if (isset($_POST['email']))  echo $_POST['email']; ?>" class="requiredField email" />
						<?php if ($emailError != '') { ?>
							<span class="error text-primary"><?= $emailError; ?></span>
						<?php } ?>
					</div>
					<br />
					<div class="col-md-8">
						<label class="text-info" for="comments">Message</label>
						<textarea class="form-control" name="comments" id="commentsText" rows="10" cols="30" class="requiredField"></textarea>
						<?php if (isset($_POST['comments'])) {
							if (function_exists('stripslashes')) {
								echo stripslashes($_POST['comments']);
							} else {
								echo $_POST['comments'];
							}
						} ?>
						<?php if ($commentError != '') { ?>
							<span class="error text-primary"><?= $commentError; ?></span>
						<?php } ?>
					</div>
					<br />
					<input type="hidden" name="submitted" id="submitted" value="true" />
				</fieldset>
				<div class="input-group">
					<div class="col-md-3"></div>
					<button type="submit" class=" col-md-2 btn btn-secondary">Envoyer</button>
				</div>
			</form>

		<?php endwhile; ?>
	<?php endif; ?>
<?php } ?>

<?php get_footer(); ?>