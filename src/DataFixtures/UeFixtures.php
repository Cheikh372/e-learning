<?php

namespace App\DataFixtures;
use App\Entity\Matiere;
use App\Entity\UniteEnseignement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $ue = new UniteEnseignement();
        $ue->setSuffixe("HUMA");
        $ue->setLibelle("Humanite");
        $ue->setCoefficient(4);
        $manager->persist($ue);

        $ue2 = new UniteEnseignement();
        $ue2->setSuffixe("IA");
        $ue2->setLibelle("Intelligence Artificielle");
        $ue2->setCoefficient(6);
        $manager->persist($ue2);
        $manager->flush();

        $matiere = new Matiere();
        $matiere->setIdMatiere("IA100");
        $matiere->setLibelle("Reseaux Connectionniste");
        $matiere->setIdUe($ue);
        $matiere->setVolhcm(20);
        $matiere->setVolhtd(10);
        $matiere->setVolhtp(10);
        $matiere->setCoefficient(3);
        $manager->persist($matiere);

        $matiere1 = new Matiere();
        $matiere1->setIdMatiere("IA200");
        $matiere1->setLibelle("Systemes a Base de Connaissance");
        $matiere1->setIdUe($ue2);
        $matiere1->setVolhcm(20);
        $matiere1->setVolhtd(8);
        $matiere1->setVolhtp(5);
        $matiere1->setCoefficient(3);
        $manager->persist($matiere1);
       
        $manager->flush();
    }
}
