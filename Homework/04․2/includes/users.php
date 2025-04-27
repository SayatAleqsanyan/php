<?php
// Այստեղ պահում ենք թույլատրված օգտագործողների ցանկը
// Գաղտնաբառերը հեշավորված են bcrypt ալգորիթմով

$authorized_users = [
    'Ml2bA@example.com' => [
        'email' => 'Ml2bA@example.com',
        'password' => '$2y$10$w28K4rmtfFgWbe2aWnbAl.msZvCe.gxmr8M1gz1OQ9QiJOmAK7Z42', // Հեշավորված գաղտնաբառ
        'firstname' => 'dsafdsa',
        'lastname' => 'sdafdsaf',
        'birthdate' => '2000-07-13',
        'additional' => 'dsafas',
        'gender' => 'male'
    ],
    // Կարող ենք ավելացնել այլ օգտագործողներ
];

// Ֆունկցիա օգտագործողին զանգվածից գտնելու համար
function findUserInArray($email) {
    global $authorized_users;

    if (isset($authorized_users[$email])) {
        return $authorized_users[$email];
    }

    return false;
}
?>