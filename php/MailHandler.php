<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

class MailHandler {
    private $mailer;
    private $senderEmail = 'denmarcfrancisharryangeles@gmail.com';
    private $senderPassword = 'ykby uahc oyqb fyni';

    public function __construct() {
        $this->mailer = new PHPMailer(true);
        $this->configureSMTP();
    }

    private function configureSMTP() {
        $this->mailer->isSMTP();
        $this->mailer->Host = 'smtp.gmail.com';
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $this->senderEmail;
        $this->mailer->Password = $this->senderPassword;
        $this->mailer->SMTPSecure = 'tls';
        $this->mailer->Port = '587';
        $this->mailer->setFrom($this->senderEmail);
    }

    public function sendMail($name, $email, $contact, $company, $subject, $message) {
        try {
            $this->mailer->addAddress($this->senderEmail);

            $this->mailer->isHTML(true);
            $this->mailer->Subject = htmlspecialchars($subject);
            $this->mailer->Body = $this->formatMessage($name, $email, $contact, $company, $message);

            $this->mailer->send();

            $this->alertAndRedirect('Email sent successfully.', 'index.php');
        } catch (Exception $e) {
            $this->alertAndRedirect("Message could not be sent. Mailer Error: {$this->mailer->ErrorInfo}", 'index.php');
        }
    }

    public function sendContact($name, $email, $message) {
        try {
            $this->mailer->addAddress($this->senderEmail);

            $this->mailer->isHTML(true);
            $this->mailer->Subject = "Contact";
            $this->mailer->Body = $this->formatMessage($name, $email, "###########", "Personal Mail", $message);

            $this->mailer->send();

            $this->alertAndRedirect('Email sent successfully.', 'contact.php');
        } catch (Exception $e) {
            $this->alertAndRedirect("Message could not be sent. Mailer Error: {$this->mailer->ErrorInfo}", 'index.php');
        }
    }

    private function formatMessage($name, $email, $contact, $company, $message) {
        return "
            <h3>$company</h3>
            Name: $name<br>
            Contact No.: $contact<br>
            Email: $email<br><br>
            $message<br>
        ";
    }

    private function alertAndRedirect($message, $location) {
        echo "
        <script>
            alert('$message');
            location.assign('$location');
        </script>
        ";
    }
}