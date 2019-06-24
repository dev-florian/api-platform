<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ApiResource(
 *     attributes={"access_control"="is_granted('ROLE_USER')"},
 *     itemOperations={
 *         "delete"={"access_control"="is_granted('ROLE_ADMIN')", "access_control_message"="Only admins."},
 *         "get"={"access_control"="is_granted('ROLE_ADMIN')", "access_control_message"="Only admins."}
 *     },
 *      collectionOperations={
 *         "get"={"access_control"="is_granted('ROLE_ADMIN')", "access_control_message"="Only admins."}
 *     }
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(type="json")
     */
    private $roles;

    public function __construct()
    {
        $this->isActive = true;
        $this->roles [] = 'ROLE_USER';
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
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
    public function getisActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive): void
    {
        $this->isActive = $isActive;
    }

    public function getRoles()
    {
        $roles = $this->roles;
        return $roles;
    }

    public function eraseCredentials()
    {
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function setRole(array $roles)
    {
        foreach ($roles as $role) {
            if (!in_array($role, $this->roles)) {
                $this->roles [] = $role;
            }
        }
    }
}