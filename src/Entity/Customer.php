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

/**
 * @ORM\Table(name="Customer")
 * @ApiResource
 * @ORM\Entity
 */
class Customer extends BaseEntity
{
    /**
     * @var string $name
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}