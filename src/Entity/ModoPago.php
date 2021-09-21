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
     * @ORM\Column(type="integer")
     */
    private $ntarjeta;

    /**
     * @ORM\ManyToOne(targetEntity=Cliente::class, inversedBy="modoPago")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cliente;

    /**
     * @ORM\Column(type="integer")
     */
    private $cvc;

    /**
     * @ORM\Column(type="integer")
     */
    private $caducidad_mes;

    /**
     * @ORM\Column(type="integer")
     */
    private $caducidad_ano;
    

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $propietario_tarjeta;

    public function getId(): ?int
    {
        return $this->id;
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
        return $this->id;
    }

    public function getCvc(): ?int
    {
        return $this->cvc;
    }

    public function setCvc(int $cvc): self
    {
        $this->cvc = $cvc;

        return $this;
    }


    public function getCaducidadMes(): ?int
    {
        return $this->caducidad_mes;
    }

    public function setCaducidadMes(int $caducidad_mes): self
    {
        $this->caducidad_mes = $caducidad_mes;

        return $this;
    }

    public function getCaducidadAno(): ?int
    {
        return $this->caducidad_ano;
    }

    public function setCaducidadAno(int $caducidad_ano): self
    {
        $this->caducidad_ano = $caducidad_ano;

        return $this;
    }

    

    public function getPropietarioTarjeta(): ?string
    {
        return $this->propietario_tarjeta;
    }

    public function setPropietarioTarjeta(string $propietario_tarjeta): self
    {
        $this->propietario_tarjeta = $propietario_tarjeta;

        return $this;
    }

}
