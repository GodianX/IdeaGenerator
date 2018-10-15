<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Table(name="ig_action")
     * @ORM\Entity(repositoryClass="App\Repository\ActionRepository")
     */
class Action
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $value;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $view_counter;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return mixed
     */
    public function getViewCounter(): ?int
    {
        return $this->view_counter;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @param int $view_counter
     */
    public function setViewCounter(int $view_counter): void
    {
        $this->view_counter = $view_counter;
    }
}
