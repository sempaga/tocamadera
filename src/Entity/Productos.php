<?php

namespace App\Entity;

use App\Repository\ProductosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductosRepository::class)
 */
class Productos
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
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dimensiones;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $color;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $precio;

    /**
     * @ORM\ManyToMany(targetEntity=Proveedor::class, mappedBy="producto")
     */
    private $proveedors;

    

    /**
     * @ORM\ManyToOne(targetEntity=Categoria::class, inversedBy="productos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoria;

    /**
     * @ORM\ManyToMany(targetEntity=Pedido::class, mappedBy="productos")
     */
    private $pedidos;

    public function __construct()
    {
        $this->proveedors = new ArrayCollection();
        $this->pedidos = new ArrayCollection();
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

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getDimensiones(): ?string
    {
        return $this->dimensiones;
    }

    public function setDimensiones(string $dimensiones): self
    {
        $this->dimensiones = $dimensiones;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getPrecio(): ?string
    {
        return $this->precio;
    }

    public function setPrecio(string $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * @return Collection|Proveedor[]
     */
    public function getProveedors(): Collection
    {
        return $this->proveedors;
    }

    public function addProveedor(Proveedor $proveedor): self
    {
        if (!$this->proveedors->contains($proveedor)) {
            $this->proveedors[] = $proveedor;
            $proveedor->addProducto($this);
        }

        return $this;
    }

    public function removeProveedor(Proveedor $proveedor): self
    {
        if ($this->proveedors->removeElement($proveedor)) {
            $proveedor->removeProducto($this);
        }

        return $this;
    }

   

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

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
            $pedido->addProducto($this);
        }

        return $this;
    }

    public function removePedido(Pedido $pedido): self
    {
        if ($this->pedidos->removeElement($pedido)) {
            $pedido->removeProducto($this);
        }

        return $this;
    }
}
