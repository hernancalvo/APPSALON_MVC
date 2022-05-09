<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;



class Email {

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token) {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {

        // Crear el objeto de Email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'bb4d8085ea8357';
        $mail->Password = '523574e3aee577';

        $mail->setFrom("cuentas@appsalon.com");
        $mail->addAddress("cuentas@appsaon.com", "AppSalon.com");
        $mail->Subject = "Confirma tu Cuenta";

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = "UTF-8";

        $contenido = "<html>";
        $contenido.= "<p><strong>Hola " . $this->nombre . "</strong> Has Creado tu Cuenta en App Salon, solo debes confirmala presionando el siguiente enlace</p>";
        $contenido.= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a></p>";
        $contenido.= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido.= "</html>";
        $mail->Body = $contenido;

        // Enviar el Email
        $mail->send();
    }

    public function enviarInstrucciones() {
        // Crear el objeto de Email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'bb4d8085ea8357';
        $mail->Password = '523574e3aee577';

        $mail->setFrom("cuentas@appsalon.com");
        $mail->addAddress("cuentas@appsaon.com", "AppSalon.com");
        $mail->Subject = "Reestablece tu Password";

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = "UTF-8";

        $contenido = "<html>";
        $contenido.= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado reestablecer tu Password, sigue el siguiente enlace para hacerlo</p>";
        $contenido.= "<p>Presiona aquí: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Reestablecer Password</a></p>";
        $contenido.= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
        $contenido.= "</html>";
        $mail->Body = $contenido;

        // Enviar el Email
        $mail->send();        
    }
}