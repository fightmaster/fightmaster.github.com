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
    private $subject;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $recipient;

    /**
     * @param string $recipient
     * @param string $subject
     * @param string $message
     */
    public function __construct($recipient, $subject, $message)
    {
        $this->recipient = $recipient;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function send()
    {
        mail($this->recipient, $this->subject, $this->message);
    }
}
