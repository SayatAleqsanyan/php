<?php
require_once './includes/csrf.php';
$csrf_token = generate_csrf_token();
?>
<form action="action/action_login.php" method="post" onsubmit="return validateLoginForm();">
    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
    <input type="email" name="email" placeholder="Էլ․ հասցե" required><br>
    <input type="password" name="password" placeholder="Գաղտնաբառ" required><br>
    <label><input type="checkbox" name="remember"> Հիշել ինձ</label><br>
    <input type="submit" value="Մուտք"><br>
</form>
<script>
  function validateLoginForm() {
    // JavaScript վավերացում
    return true;
  }
</script>

