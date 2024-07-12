<?php
if (isset($_SERVER["HTTP_ORIGIN"])) {
  header("Access-Control-Allow-Origin: " . $_SERVER["HTTP_ORIGIN"]);
  header("Access-Control-Allow-Credentials:true");
  header('content-type: application/json; charset=utf-8');
} else {
  header("Access-Control-Allow-Origin: http://localhost:8080");
  header("Access-Control-Allow-Credentials:true");
  header('Access-Control-Allow-Headers:Content-Type');
}

require_once ("../vendor/autoload.php");

// envを読み込めるようにする
$dotenv = Dotenv\Dotenv::createImmutable($_SERVER["DOCUMENT_ROOT"]);
$dotenv->load();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$parameterData = [
  "companyName" => (string)$_POST["companyName"],
  "name" => (string)$_POST["name"],
  "email" => (string)$_POST["email"],
  "tel" => (string)$_POST["tel"],
  "contactType" => (string)$_POST["contactType"],
  "text" => (string)$_POST["text"],
];

/* ユーザー側に送信用 */
$postBody  = "※このメールはシステムからの自動返信です。\n";
$postBody .= "\n";
$postBody .= "テストメールをお届けします。";


$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'mailhog';
$mail->Port = 1025;
$mail->SMTPAuth = false;
$mail->Username = null;
$mail->Password = null;
// $mail->SMTPSecure = 'tls';
// $mail->CharSet = 'utf-8';
$mail->isHTML(false);

// メールアドレスを設定する
$mail->addAddress("");
$mail->setFrom("", "メール送信テスト");
$mail->Subject = "【メール送信テスト】お問い合わせを承りました。";
$mail->Body = $postBody;

$sendFlg = true;

try {
  if($mail->send()) {
    // ok
    error_log("ユーザー側 送信成功", 0);
  } else {
    error_log("ユーザー側 送信失敗： " . $mail->ErrorInfo, 0);
    $sendFlg = false;
  }
} catch (Exception $e) {
  $sendFlg = false;
  error_log($e, 0);
}



/* 運営側に送信用 */
// //メール本文
// $postBody  = 運営側のメール送信です。\n";


// $mail = new PHPMailer();
// $mail->isSMTP();
// $mail->Host = $_ENV['MAIL_HOST'];
// $mail->SMTPAuth = true;
// $mail->Username = $_ENV['MAIL_USERNAME'];
// $mail->Password = $_ENV['MAIL_PASSWORD'];
// $mail->SMTPSecure = 'tls';
// $mail->CharSet = 'utf-8';
// $mail->Port = 587;
// $mail->isHTML(false);

// $mail->addAddress($_ENV['MAIL_TO_CONTACT_ADDRESS']);
// $mail->addBcc($_ENV['MAIL_BCC_CONTACT_ADDRESS']);
// $mail->setFrom($_ENV['MAIL_FROM_ADDRESS'], $_ENV['MAIL_FROM_NAME']);

// //件名・本文格納
// $mail->Subject = $_ENV['APP_NAME'] . "からお問い合わせがありました。";
// $mail->Body = $postBody;

// try {
//   if($mail->send()){
//     // ok
//     error_log("運営側 送信成功", 0);
//   }else{
//     error_log("運営側 送信失敗： " . $mail->ErrorInfo, 0);
//     $sendFlg = false;
//   }
    
// } catch (Exception $e) {
//   $sendFlg = false;
//   error_log($e, 0);
// }

echo json_encode(['result' => $sendFlg]);