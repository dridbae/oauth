<?php

namespace App\Entity;

use FOS\OAuthServerBundle\Entity\RefreshToken as BaseRefreshToken;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="oauth2_refresh_tokens")
 * @ORM\Entity
 *
 * @ORM\AttributeOverrides({
 *      @ORM\AttributeOverride(name="token",
 *          column=@ORM\Column(
 *              name     = "refresh_token_token",
 *              type     = "string",
 *              unique   = true,
 *          )
 *      ),
 *      @ORM\AttributeOverride(name="expiresAt",
 *          column=@ORM\Column(
 *              name     = "refresh_token_expires_at",
 *              type     = "integer",
 *              nullable = true,
 *          )
 *      ),
 *      @ORM\AttributeOverride(name="scope",
 *          column=@ORM\Column(
 *              name     = "refresh_token_scope",
 *              type     = "string",
 *              nullable = true,
 *          )
 *      ),
 * })
 */
class RefreshToken extends BaseRefreshToken
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(nullable=false, name="refresh_token_client_id")
     */
    protected $client;
}
