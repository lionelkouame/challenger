<?php

namespace App\MessageHandler;

use App\Message\UserNotificationMessage;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Mime\Email;

class UserNotificationHandler implements MessageHandlerInterface
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function __invoke(UserNotificationMessage $message)
    {
        sleep(10);
        $email = (new Email())
            ->from('hello@example.com')
            ->to('you@example.com')
            ->cc('cc@example.com')
            ->bcc('bcc@example.com')
            ->replyTo('fabien@example.com')
            ->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!'. $message->getUserId())
            ->text('Sending emails is fun again!'.$message->getUserId())
            ->html('<p>See Twig integration for better HTML integration!</p>');

        $this->mailer->send($email);
    }


}
