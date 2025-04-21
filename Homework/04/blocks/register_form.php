<?php
require_once './includes/csrf.php';
$csrf_token = generate_csrf_token();
?>
<form action="action/action_register.php" method="post" onsubmit="return validateRegisterForm();">
    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
    <input type="text" name="First_Name" placeholder="Անուն" required><br>
    <input type="text" name="Last_Name" placeholder="Ազգանուն" required><br>
    <input type="date" name="Date_of_Birth" required><br>
    <input type="text" name="Country" placeholder="Երկիր" required><br>
    <label>Սեռ:
        <input type="radio" name="gender" value="male" required> Տղամարդ
        <input type="radio" name="gender" value="female"> Կին
    </label><br>
    <input type="email" name="email" placeholder="Էլ․ հասցե" required><br>
    <input type="password" name="password" placeholder="Գաղտնաբառ" required><br>
    <input type="submit" value="Գրանցվել"><br>
</form>
<script>
  function validateRegisterForm() {
    // JavaScript վավերացում
    return true;
  }
</script>
