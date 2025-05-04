<?php
require_once 'includes/csrf.php';
?>

<div class="register-form">
    <form id="registerForm" action="action/action_register.php" method="post">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="reg_email">Էլ. հասցե:</label>
            <input type="email" id="reg_email" name="email" required>
        </div>

        <div class="form-group">
            <label for="reg_password">Գաղտնաբառ:</label>
            <input type="password" id="reg_password" name="password" required>
            <small>Գաղտնաբառը պետք է սկսվի մեծատառով և պարունակի թիվ, նվազագույնը 8 նիշ</small>
        </div>

        <div class="form-group">
            <label for="firstname">Անուն:</label>
            <input type="text" id="firstname" name="firstname" required>
        </div>

        <div class="form-group">
            <label for="lastname">Ազգանուն:</label>
            <input type="text" id="lastname" name="lastname" required>
        </div>

        <div class="form-group">
            <label for="birthdate">Ծննդյան ամսաթիվ:</label>
            <input type="date" id="birthdate" name="birthdate" required>
        </div>

        <div class="form-group">
            <label for="additional">Լրացուցիչ տեղեկություն:</label>
            <input type="text" id="additional" name="additional">
        </div>

        <div class="form-group">
            <label>Սեռ:</label>
            <label>
                <input type="radio" name="gender" value="male" required> Արական
            </label>
            <label>
                <input type="radio" name="gender" value="female"> Իգական
            </label>
        </div>

        <div class="form-group">
            <button type="submit">Գրանցվել</button>
        </div>
    </form>
</div>

<script>
  document.getElementById('registerForm').addEventListener('submit', function(e) {
    let email = document.getElementById('reg_email').value;
    let password = document.getElementById('reg_password').value;
    let isValid = true;

    if (!email || !email.includes('@')) {
      alert('Խնդրում ենք մուտքագրել ճիշտ էլ. հասցե');
      isValid = false;
    }

    if (!password || password.length < 8) {
      alert('Գաղտնաբառը պետք է լինի առնվազն 8 նիշ');
      isValid = false;
    }

    if (!/^[A-Z].*\d/.test(password)) {
      alert('Գաղտնաբառը պետք է սկսվի մեծատառով և պարունակի թիվ');
      isValid = false;
    }

    if (!isValid) {
      e.preventDefault();
    }
  });
</script>