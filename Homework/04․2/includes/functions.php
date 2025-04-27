<?php
session_start();

// Ֆունկցիա գաղտնաբառի վավերացման համար (regex)
function validatePassword($password) {
    // Գաղտնաբառը պետք է սկսվի մեծատառով և պարունակի թիվ
    return preg_match('/^[A-Z].*\d/', $password) && strlen($password) >= 8;
}

// Ֆունկցիա էլ. հասցեի վավերացման համար
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Ֆունկցիա սեսիայի ակտիվության ստուգման համար
function checkSessionActivity() {
    if (!isset($_SESSION['last_activity'])) {
        $_SESSION['last_activity'] = time();
        return true;
    }

    // Եթե օգտվողը 30 վայրկյանից ավելի ակտիվ չէ, ավարտում ենք սեսիան
    if (time() - $_SESSION['last_activity'] > 30) {
        session_unset();
        session_destroy();
        return false;
    }

    // Թարմացնում ենք ակտիվության ժամանակը
    $_SESSION['last_activity'] = time();
    return true;
}

// Ֆունկցիա սխալի լոգավորման համար
function logError($message) {
    $timestamp = date('Y-m-d H:i:s');
    $log_message = "[$timestamp] $message\n";
    error_log($log_message, 3, __DIR__ . '/../data/log.txt');
}

// Ֆունկցիա օգտվողների տվյալները ֆայլից կարդալու համար
function getUsersFromFile() {
    $users = [];
    $file = __DIR__ . '/../data/users.txt';

    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $user_data = explode('|', $line);
            if (count($user_data) >= 2) {
                $email = $user_data[0];
                $users[$email] = [
                    'email' => $email,
                    'password' => $user_data[1],
                    'firstname' => $user_data[2] ?? '',
                    'lastname' => $user_data[3] ?? '',
                    'birthdate' => $user_data[4] ?? '',
                    'additional' => $user_data[5] ?? '',
                    'gender' => $user_data[6] ?? ''
                ];
            }
        }
    }

    return $users;
}

// Ֆունկցիա գաղտնաբառի ճշտությունը ստուգելու համար
function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}

// Ֆունկցիա օգտագործողի գոյությունը ստուգելու համար
function authenticateUser($email, $password) {
    $users = getUsersFromFile();

    if (isset($users[$email])) {
        $user = $users[$email];
        if (verifyPassword($password, $user['password'])) {
            return $user;
        }
    }

    return false;
}

// Ֆունկցիա CSRF թոքենի ստեղծման համար
function generateCSRFToken() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Ֆունկցիա CSRF թոքենի ստուգման համար
function verifyCSRFToken($token) {
    if (!isset($_SESSION['csrf_token']) || $_SESSION['csrf_token'] !== $token) {
        return false;
    }
    return true;
}
?>