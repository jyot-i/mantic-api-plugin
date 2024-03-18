<?php
// MySubscriberApiBundle/Entity/Subscriber.php

namespace MauticPlugin\MySubscriberApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="subscribers")
 */
class Subscriber
{
    /**
     * ID of the subscriber, the primary key.
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Username of the subscriber.
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $username;

    /**
     * Status of the subscriber (e.g., active, inactive).
     *
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $status;

    /**
     * Expiration date of the subscription.
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $expireDate;

    /**
     * Get the ID of the subscriber.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the username of the subscriber.
     *
     * @param string $username
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Get the username of the subscriber.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the status of the subscriber.
     *
     * @param bool $status
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get the status of the subscriber.
     *
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the expiration date of the subscription.
     *
     * @param \DateTime $expireDate
     * @return self
     */
    public function setExpireDate($expireDate)
    {
        $this->expireDate = $expireDate;
        return $this;
    }

    /**
     * Get the expiration date of the subscription.
     *
     * @return \DateTime
     */
    public function getExpireDate()
    {
        return $this->expireDate;
    }
}