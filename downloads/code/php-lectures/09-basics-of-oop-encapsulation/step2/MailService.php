<?php
/**
 * The service sends an email to user
 *
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class MailService
{
    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $message;

    /**
     * @var string
     */
    public $recipient;

    public function send()
    {
        mail($this->recipient, $this->subject, $this->message);
    }
}
