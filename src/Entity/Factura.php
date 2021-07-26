<?php

namespace App\Entity;

use App\Repository\FacturaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FacturaRepository::class)
 */
class Factura
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Pedido::class, inversedBy="facturas")
     */
    private $Pedido;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPedido(): ?Pedido
    {
        return $this->Pedido;
    }

    public function setPedido(?Pedido $Pedido): self
    {
        $this->Pedido = $Pedido;

        return $this;
    }
}
