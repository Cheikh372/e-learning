<?php

namespace App\DataFixtures;

use App\Entity\Enseignant;
use App\Entity\Etudiant;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    private $encode;

    public function __construct(UserPasswordEncoderInterface $enc)
    {
        $this->encode =$enc;
    }
    public function load(ObjectManager $manager)
    {
        $etudiant =new Etudiant;
        $etudiant->setMatricule("P251000");
        $etudiant->setNom("Sall");
        $etudiant->setPrenom("Fama");
        $etudiant->setAdresse("Sanar");
        $etudiant->setCin("100000022223");
        $etudiant->setDateNaissance(new  \Datetime);
        $etudiant->setLieuNaissance("Thies");
        $etudiant->setEmail("fama@fmail.com");
        $etudiant->setPhoto("maphoto.png");
        $etudiant->setTelephone("78563214");
        $etudiant->setSexe("F");
        $manager->persist($etudiant);

        $enseignant =new Enseignant;
        $enseignant->setMatricule("EN51020");
        $enseignant->setNom("Tall");
        $enseignant->setPrenom("Abdou");
        $enseignant->setAdresse("SaintLouis");
        $enseignant->setGrade("Doctor");
        $enseignant->setSpecialite("Gestion de Donnees");
        $enseignant->setEmail("abdou@fmail.com");
        $enseignant->setPhoto("maphoto.png");
        $enseignant->setTelephone("78563214");
        $manager->persist($enseignant);
        $manager->flush();

        $user = new User();
        $user->setUsername("etudiant");
        $user->setRoles(["ROLE_ETUDIANT"]);
        $user->setIdUser($etudiant->getId());
        $user->setPassword($this->encode->encodePassword($user,"etudiant"));
        $manager->persist($user);

        $user1 = new User();
        $user1->setUsername("enseignant");
        $user1->setRoles(["ROLE_ENSEIGNANT"]);
        $user1->setIdUser($enseignant->getId());
        $user1->setPassword($this->encode->encodePassword($user1,"etudiant"));
        $manager->persist($user1);

        $manager->flush();
    }
}
