<?php

namespace App\Entity;

use App\Repository\EntregaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntregaRepository::class)
 */
class Entrega
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaEntrega;

    /**
     * @ORM\OneToOne(targetEntity=Pedido::class, inversedBy="entrega", cascade={"persist", "remove"})
     */
    private $pedido;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaEntrega(): ?\DateTimeInterface
    {
        return $this->fechaEntrega;
    }

    public function setFechaEntrega(\DateTimeInterface $fechaEntrega): self
    {
        $this->fechaEntrega = $fechaEntrega;

        return $this;
    }

    public function __toString()
    {
        return $this->fechaEntrega;
    }

    public function getPedido(): ?Pedido
    {
        return $this->pedido;
    }

    public function setPedido(?Pedido $pedido): self
    {
        $this->pedido = $pedido;

        return $this;
    }

}
