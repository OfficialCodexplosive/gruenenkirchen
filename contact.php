<form action="" method="post">
  <div class="elem-group">
    <input type="text" id="name" name="visitor_name" placeholder="Name" pattern=[A-Z\sa-z]{3,20} required>
  </div>
  <div class="elem-group">
    <input type="email" id="email" name="visitor_email" placeholder="E-Mail" required>
  </div>
  <div class="elem-group">
    <textarea id="message" name="visitor_message" placeholder="Nachricht" required></textarea>
  </div>
  <button type="submit">Senden</button>
</form>