<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Structure;
use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class LoadBaseData extends Fixture implements FixtureInterface, ContainerAwareInterface {
	use ContainerAwareTrait;
	
	/**
	 * Load data fixtures with the passed EntityManager
	 *
	 * @param ObjectManager $manager
	 *
	 * @throws \Doctrine\ORM\ORMException
	 * @throws \Doctrine\ORM\OptimisticLockException
	 */
	public function load( ObjectManager $manager ) {
		$em = $this->container->get('doctrine.orm.default_entity_manager');
		
		for($i = 0 ; $i < 50 ; $i++){
			$user = new User();
			$user
				->setFirstName("Name".$i)
				->setLastName("Surname".$i);
			
			if (rand(0,1) === 1){
				$structure = new Structure();
				$structure
					->setName("Structure".$i);
				
				$em->persist($structure);
				$em->flush();
				$user->setStructure($structure);
			}
			
			$em->persist($user);
		}
		$em->flush();
	}
}