<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use App\Service\EmailService;


class EmailController extends Controller
{

    /**
     * Matches /contact
     * 
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
 
       return $this->render('contact.html.twig', 
        [

        ]);
    }

    /**
     * Matches /send
     * 
     * @Route("/send", name="send")
     * @Method({"GET", "POST"})
     */
	public function index(Request $request, \Swift_Mailer $mailer, EmailService $emailService)
	{

			$data = $emailService->sendMail($request, $mailer);

		    return $this->render('contact.html.twig', 
		    [
		     // Used here to reload the page
		    ]);
		
	}
}
?>