<?php

namespace App\DataFixtures;

use App\Entity\Client;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ClientFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $client = new Client();
        $client->setName('api');
        $client->setRoles(['ROLE_USER']);
        $client->setRandomId('5lf4edqprqko0kcg0ookgcgs0kc8gkc8kwkcg4888k0s08ssc0');
        $client->setSecret('33ei6opmtjc4ksgoc844cgk0s4wscw8880ggc040cs8w0o080c');
        $client->setAllowedGrantTypes(['password', 'refresh_token']);
        $manager->persist($client);
        $manager->flush();
    }
}
