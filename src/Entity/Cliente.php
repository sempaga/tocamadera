<?php

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClienteRepository::class)
 */
class Cliente
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
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellido;

    /**
     * @ORM\Column(type="integer")
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ciudad;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $calle;

    /**
     * @ORM\Column(type="integer")
     */
    private $cp;

    /**
     * @ORM\Column(type="integer")
     */
    private $npiso;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;



    /**
     * @ORM\OneToMany(targetEntity=ModoPago::class, mappedBy="cliente", orphanRemoval=true)
     */
    private $modoPago;

    /**
     * @ORM\OneToMany(targetEntity=Pedido::class, mappedBy="cliente")
     */
    private $pedidos;

   

    public function __construct()
    {
        $this->pedidos = new ArrayCollection();
        $this->modoPago = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getTelefono(): ?int
    {
        return $this->telefono;
    }

    public function setTelefono(int $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getCiudad(): ?string
    {
        return $this->ciudad;
    }

    public function setCiudad(string $ciudad): self
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    public function getCalle(): ?string
    {
        return $this->calle;
    }

    public function setCalle(string $calle): self
    {
        $this->calle = $calle;

        return $this;
    }

    public function getCp(): ?int
    {
        return $this->cp;
    }

    public function setCp(int $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getNpiso(): ?int
    {
        return $this->npiso;
    }

    public function setNpiso(int $npiso): self
    {
        $this->npiso = $npiso;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    

    /**
     * @return Collection|ModoPago[]
     */
    public function getModoPago(): Collection
    {
        return $this->modoPago;
    }

    public function addModoPago(ModoPago $modoPago): self
    {
        if (!$this->modoPago->contains($modoPago)) {
            $this->modoPago[] = $modoPago;
            $modoPago->setCliente($this);
        }

        return $this;
    }

    public function removeModoPago(ModoPago $modoPago): self
    {
        if ($this->modoPago->removeElement($modoPago)) {
            // set the owning side to null (unless already changed)
            if ($modoPago->getCliente() === $this) {
                $modoPago->setCliente(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Pedido[]
     */
    public function getPedidos(): Collection
    {
        return $this->pedidos;
    }

    public function addPedido(Pedido $pedido): self
    {
        if (!$this->pedidos->contains($pedido)) {
            $this->pedidos[] = $pedido;
            $pedido->setCliente($this);
        }

        return $this;
    }

    public function removePedido(Pedido $pedido): self
    {
        if ($this->pedidos->removeElement($pedido)) {
            // set the owning side to null (unless already changed)
            if ($pedido->getCliente() === $this) {
                $pedido->setCliente(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nombre;
    }


    
}
