<?php


namespace App\notification;


use App\Entity\Contact;

class ContactNotification
{

    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer=$mailer;

    }

    public function notify(Contact $contact){
        $message = (new \Swift_Message('message de la part de  '.$contact->getLastname()))
            ->setFrom("mohamedbakkari2013@gmail.com")
            ->setTo($contact->getDepartement()->getEmailResponsable1())
            ->setTo($contact->getDepartement()->getEmailResponsable2())
            ->setBody($contact->getMessage(), 'text/plain');

        $this->mailer->send($message);

    }

}