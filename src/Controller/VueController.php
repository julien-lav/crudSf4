<?php
// src/Controller/VueController.php
 
namespace App\Controller;
 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 
class VueController extends Controller
{
    /**
     * @Route("/vuejs")
     */
    public function vue()
    {
        return $this->render('vuejs/vue.html.twig');
    }

    /**
     * @Route("/vue_ex1")
     */
    public function vueEx1()
    {
        return $this->render('vuejs/vue_ex1.html.twig');
    }

}

?>