<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Form\ProjetType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends AbstractController
{

    /**
     * @Route("/default", name="default")
     */
    public function index(Request $request): Response
    {


        $session = new Session(new NativeSessionStorage(), new AttributeBag());
        $proj=new Projet();
        $formProje = $this->createForm(ProjetType::class, $proj);
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'formProjet'=>$formProje->createView()
        ]);
    }
    /**
     * @Route("/test", name="test")
     */
    public function test()
    {
        $s = $this->get('session');
        dump('test');
        $s->set('code', 'hello');
        $s->save();
        die();
    }
}
