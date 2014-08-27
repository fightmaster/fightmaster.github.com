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
     * @param string $subject
     * @return MailService
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @param string $recipient
     * @return MailService
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * @param string $message
     * @return MailService
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function send()
    {
        mail($this->recipient, $this->subject, $this->message);
    }
}
