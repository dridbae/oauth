<?php

namespace App\Entity;

use FOS\OAuthServerBundle\Entity\Client as BaseClient;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="oauth2_clients")
 * @ORM\Entity
 *
 * @ORM\AttributeOverrides({
 *      @ORM\AttributeOverride(name="randomId",
 *          column=@ORM\Column(
 *              name     = "client_random_id",
 *              type     = "string",
 *              length   = 50
 *          )
 *      ),
 *      @ORM\AttributeOverride(name="redirectUris",
 *          column=@ORM\Column(
 *              name     = "client_redirect_uris",
 *              type     = "array",
 *          )
 *      ),
 *      @ORM\AttributeOverride(name="secret",
 *          column=@ORM\Column(
 *              name     = "client_secret",
 *              type     = "string",
 *              nullable = true,
 *              length   = 50
 *          )
 *      ),
 *      @ORM\AttributeOverride(name="allowedGrantTypes",
 *          column=@ORM\Column(
 *              name     = "client_allowed_grant_types",
 *              type     = "array",
 *          )
 *      ),
 * })
 */
class Client extends BaseClient
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true, length=64)
     */
    protected $name;

    /**
     * @var array
     * @ORM\Column(type="array")
     */
    protected $roles;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     *
     * @return Client
     */
    public function setRoles(array $roles): Client
    {
        $this->roles = $roles;

        return $this;
    }
}
