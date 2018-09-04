<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserController
 * @Route("/")
 * @package AppBundle\Controller
 */
class UserController extends Controller {
	
	/**
	 * @param Request $request
	 * @Route("/", name="users_list")
	 *
	 * @return Response
	 */
	public function listAction( Request $request ) {
		$users = $this->getDoctrine()->getManager()->getRepository( "AppBundle:User" )->findAll();
		
		$paginator  = $this->get( "knp_paginator" );
		$pagination = $paginator->paginate(
			$users,
			$request->query->getInt( 'page', 1 ),
			30
		);
		
		return $this->render( "User/user-list.html.twig", array(
			"pagination" => $pagination,
		) );
		
	}	
}