<!-- --------- Process The Form Response --------- -->
<?php 
if(isset($_POST['submit'])) {    // execute if the form has been submitted
  // --- add in any new variable you add to the form here
	$username = $_POST['username'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$area = $_POST['area_of_interest'];
	$comment = $_POST['comment'];
	$send_to = $_POST['send_to'];

// --- add your variables into the email - \n gives a newline
$formcontent="Your_Website Contact Form Submission - $area\n\nFrom: $username \nEmail: $email \nPhone: $phone \n \n$comment";
$subject = "Your_Website Contact Form";
$mailheader = "From: $email \r\n";


wp_mail($send_to, $subject, $formcontent, $mailheader) or die("Error!");
echo <<< EOR
<h3>Thank You, Your Comments Or Questions Have Been Submitted</h3>
<p>I'll respond to any questions or comments as soon as I can. Here is your follow up message, maybe include a link to somewhere else. :)</p>
EOR;

} else {  

echo <<< EOT

<!-- --------- Build The Form --------- -->
<form name="contactform" action="<?php the_permalink(); ?>" method="POST" id="my_custom_form">
	<div class="element">
		<label>Name</label>
		<input type="text" name="username" class="text" />
	</div>
	<div class="element">
		<label>Email</label>
		<input type="text" name="email" class="text" />
	</div>
	<div class="element">
		<label>Phone</label>
		<input type="text" name="phone" class="text" />
	</div>
	<div class="element">
		<label>Area Of Interest</label>
		<select name="area_of_interest" class="select">
			<option value="Interest 1">Interest 1</option>
			<option value="Interest 2">Interest 2</option>
			<option value="Interest 3">Interest 3</option>
		</select>
	</div>
	<div class="element">
		<label>Comment</label>
		<textarea name="comment" class="text textarea" /></textarea>
	</div>
	<div class="element">	
		<input type="submit" name="submit" id="submit" value="Submit" />
		<input type="hidden" name="submit_to" value="your_email@yourdomain.com" /> <!-- Replace this with your email -->
	</div>
</form>
<p>I'll respond to any questions or comments as soon as I can. This is where you would add your message to the bottom of the form.</p>

EOT;
 } ?>
