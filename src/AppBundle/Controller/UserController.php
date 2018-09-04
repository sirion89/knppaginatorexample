<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserController
 * @Route("/user")
 * @package AppBundle\Controller
 */
class UserController extends Controller {
	
	/**
	 * @param Request $request
	 * @Route("/lista", name="lista_registrati")
	 *
	 * @return Response
	 */
	public function listAction( Request $request ) {
		$users = $this->getDoctrine()->getManager()->getRepository( "MovigroupCongressiAppBundle:User" )->findAll();
		
		$paginator  = $this->get( "knp_paginator" );
		$pagination = $paginator->paginate(
			$users,
			$request->query->getInt( 'page', 1 ),
			$this->getParameter( "default_paginations_items" )
		);
		
		return $this->render( "User/user-list.html.twig", array(
			"pagination" => $pagination,
		) );
		
	}	
}