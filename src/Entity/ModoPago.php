<?php

namespace App\Entity;

use App\Repository\ModoPagoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModoPagoRepository::class)
 */
class ModoPago
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ncuenta;

    /**
     * @ORM\Column(type="integer")
     */
    private $ntarjeta;

    /**
     * @ORM\ManyToOne(targetEntity=Cliente::class, inversedBy="modoPago")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cliente;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNcuenta(): ?string
    {
        return $this->ncuenta;
    }

    public function setNcuenta(string $ncuenta): self
    {
        $this->ncuenta = $ncuenta;

        return $this;
    }

    public function getNtarjeta(): ?int
    {
        return $this->ntarjeta;
    }

    public function setNtarjeta(int $ntarjeta): self
    {
        $this->ntarjeta = $ntarjeta;

        return $this;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function __toString()
    {
        return $this->cliente;
    }

}
