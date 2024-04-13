<!-- <!DOCTYPE html>
<html lang="en" dir= "ltr">
<head>
    <meta charset="utf-8">
    <title>Send Email</title>
</head>

<body>
    <h1>Send Email</h1>

    <form action="<?php echo ROOT?>/sendemail/sendEmail" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="subject">Subject:</label>
        <input type="text" name="subject" id="subject" required>
        <br>
        <label for="message">Message:</label>
        <textarea name="message" id="message" required></textarea>
        <br>
        <button type="submit">Send</button>
    </form>

</body>
</html>

     -->
 <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Send Email</title>
</head>
<body>
  <h1>Send Email</h1>

  <form action="<?php echo ROOT?>/sendemail/sendEmail" method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="subject">Subject:</label>
    <input type="text" name="subject" id="subject" required>
    <br>
    <label for="message">Message:</label>
    <textarea name="message" id="message" required></textarea>
    <br>
    <button type="submit">Send</button>
  </form>

</body>
</html>