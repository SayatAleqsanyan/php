<div class="usersBlock">
    <h3><?= $card_title?></h3>
    <?php
    if (count($users) == 0) {
        echo "<h4 style='margin-left: 150px'>Այս բայինը դեռ դատարկ է </h4>";
    }
    foreach ($users as $user):?>
        <div class="card">
            <img src="../public/users_img/profile.png" alt="Avatar" style="width:100px">
            <div class="container">
                <h4><b><?= htmlspecialchars($user['login']) ?></b></h4>
                <p><?= htmlspecialchars($user['email']) ?></p>
                <form method="post" action="">
                    <input type="hidden" name="from_id" value="<?= $_SESSION['id'] ?>">
                    <input type="hidden" name="to_id" value="<?= $user['id'] ?>">
                    <?php
                        switch ($card_title) {
                            case 'Ask Me': ?>
                                <button type="submit" name="action" value="accept" class="btn btn-success">Accept</button>
                                <button type="submit" name="action" value="reject" class="btn btn-danger">Delete</button>
                            <?php break;
                            case 'My Requests': ?>
                                <input type="hidden" name="action" value="reject">
                                <button type="submit" class="btn">Cancel</button>
                            <?php break;
                            case 'Friends': ?>
                                <input type="hidden" name="action" value="reject">
                                <button type="submit" class="btn">Remove Friend</button>
                            <?php break;
                            case 'Other Users': ?>
                                <input type="hidden" name="action" value="send">
                                <button type="submit" class="btn">Add Friend</button>
                            <?php break;
                        }?>
                </form>
            </div>
        </div>
    <?php endforeach;?>
</div>