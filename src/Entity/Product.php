<?php
/**
 * Created by PhpStorm.
 * User: flori
 * Date: 16/05/2019
 * Time: 09:46
 */

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 * @ApiResource
 */
class Product extends BaseEntity
{
    /**
     * @var string $name
     * @Assert\NotBlank
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var string $description
     * @Assert\NotBlank
     * @ORM\Column(name="description", type="string")
     */
    private $description;

    /**
     * @var int $price
     * @Assert\NotBlank
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var int $stock
     * @Assert\NotBlank
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock;

    /**
     * @var string $picture
     * @ORM\Column(name="picture", type="string", nullable=true)
     */
    private $picture;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="App\Entity\Cart", inversedBy="products")
     * @ORM\JoinTable(name="products_carts")
     */
    private $carts;

    public function __construct() {
        $this->carts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock): void
    {
        $this->stock = $stock;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture): void
    {
        $this->picture = $picture;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getCarts()
    {
        return $this->carts;
    }

    /**
     * @param mixed $carts
     */
    public function setCarts($carts): void
    {
        $this->carts = $carts;
    }

    public function addCart(Cart $cart)
    {
        $this->carts[] = $cart;
    }

    public function __toString()
    {
        return $this->name;
    }

}