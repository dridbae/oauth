<?php
/**
 * Created by PhpStorm.
 * User: gbu
 * Date: 08/04/2016
 * Time: 16:21
 */

namespace App\Entity;

use FOS\OAuthServerBundle\Entity\AuthCode as BaseAuthCode;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table("oauth2_auth_codes")
 * @ORM\Entity
 *
 * @ORM\AttributeOverrides({
 *      @ORM\AttributeOverride(name="token",
 *          column=@ORM\Column(
 *              name     = "auth_code_token",
 *              type     = "string",
 *              unique   = true,
 *          )
 *      ),
 *      @ORM\AttributeOverride(name="expiresAt",
 *          column=@ORM\Column(
 *              name     = "auth_code_expires_at",
 *              type     = "integer",
 *          )
 *      ),
 *      @ORM\AttributeOverride(name="scope",
 *          column=@ORM\Column(
 *              name     = "auth_code_scope",
 *              type     = "string",
 *              nullable = true,
 *          )
 *      ),
 *      @ORM\AttributeOverride(name="redirectUri",
 *          column=@ORM\Column(
 *              name     = "auth_code_redirect_uri",
 *              type     = "text",
 *          )
 *      ),
 * })
 */
class AuthCode extends BaseAuthCode
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(nullable=false, name="auth_code_client_id")
     */
    protected $client;
}
