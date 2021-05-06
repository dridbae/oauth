<?php

namespace App\Entity;

use FOS\OAuthServerBundle\Entity\AccessToken as BaseAccessToken;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="oauth2_access_tokens")
 * @ORM\Entity
 *
 * @ORM\AttributeOverrides({
 *      @ORM\AttributeOverride(name="token",
 *          column=@ORM\Column(
 *              name     = "access_token_token",
 *              type     = "string",
 *              unique   = true,
 *          )
 *      ),
 *      @ORM\AttributeOverride(name="expiresAt",
 *          column=@ORM\Column(
 *              name     = "access_token_expires_at",
 *              type     = "integer",
 *          )
 *      ),
 *      @ORM\AttributeOverride(name="scope",
 *          column=@ORM\Column(
 *              name     = "access_token_scope",
 *              type     = "string",
 *              nullable = true,
 *          )
 *      ),
 * })
 */
class AccessToken extends BaseAccessToken
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(nullable=false, name="client_id")
     */
    protected $client;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(nullable=true, name="access_token_user_id")
     */
    protected $user;
}
