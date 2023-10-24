<?php
include("includs/db.php");
$secret_key = 'secret';
$amount = $_POST['amount']; //  количество денег
$date_time = $_POST['datetime']; // дата оплаты
$sender = $_POST['sender']; // номер кошелька
$sha1 = sha1( $_POST['notification_type'] . '&'. $_POST['operation_id']. '&' . $_POST['amount'] . '&643&' . $_POST['datetime'] . '&'. $_POST['sender'] . '&' . $_POST['codepro'] . '&' . $secret_key. '&' . $_POST['label'] );
if ($sha1 != $_POST['sha1_hash'] ) 
{
    echo 'При пополнении счета произошел сбой, обратитесь в техническую поддержку.';
    exit();
}
echo 'Пополнение счета прошло успешно.';
$stmt = $pdo->query("INSERT INTO pays(login,amount,date_time,sender) VALUES ('$login','$amount','$date_time','$sender')");
exit();
?>