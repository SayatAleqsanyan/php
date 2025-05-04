<?php
require_once 'includes/csrf.php';

$remembered_email = '';
$remembered_password = '';

if (isset($_COOKIE['remember_email']) && isset($_COOKIE['remember_password'])) {
    $remembered_email = $_COOKIE['remember_email'];
    $remembered_password = base64_decode($_COOKIE['remember_password']);
}

if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}
$form_disabled = ($_SESSION['login_attempts'] >= 3) ? 'disabled' : '';
?>
<div class="login-form">
    <?php if ($_SESSION['login_attempts'] >= 3): ?>
        <div class="error">
            <p>Դուք սպառել եք մուտքի փորձերի քանակը: Խնդրում ենք փորձել ավելի ուշ:</p>
        </div>
    <?php endif; ?>

    <form id="loginForm" action="action/action_login.php" method="post" <?php echo $form_disabled; ?>>
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="email">Էլ. հասցե:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($remembered_email); ?>" required>
        </div>

        <div class="form-group">
            <label for="password">Գաղտնաբառ:</label>
            <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($remembered_password); ?>" required>
        </div>

        <div class="form-group">
            <label for="captcha">Captcha (մուտքագրեք "security"):</label>
            <input type="text" id="captcha" name="captcha" required>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="remember_me" <?php echo ($remembered_email && $remembered_password) ? 'checked' : ''; ?>>
                Հիշել ինձ
            </label>
        </div>

        <div class="form-group">
            <button type="submit">Մուտք գործել</button>
        </div>
    </form>
</div>
<script>
  document.getElementById('loginForm').addEventListener('submit', function(e) {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let captcha = document.getElementById('captcha').value;
    let isValid = true;


    if (!email || !email.includes('@')) {
      alert('Խնդրում ենք մուտքագրել ճիշտ էլ. հասցե');
      isValid = false;
    }


    if (!password || password.length < 8) {
      alert('Գաղտնաբառը պետք է լինի առնվազն 8 նիշ');
      isValid = false;
    }

    if (captcha !== 'security') {
      alert('Captcha-ն սխալ է: Խնդրում ենք մուտքագրել "security"');
      isValid = false;
    }

    if (!isValid) {
      e.preventDefault();
    }
  });
</script>