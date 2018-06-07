<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class EmailsController extends Controller
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
	public function index(Request $request, \Swift_Mailer $mailer)
	{

		if($request->isMethod('POST'))
		{
			$data = $request->request;
			$name = $data->get('nom');
			$email = $data->get('email');
			$body = $data->get('body');
			$subject = $data->get('subject');

		    $message = (new \Swift_Message($subject))
		        ->setFrom($email)
		        ->setTo('colossusofdestiny.band@gmail.com')
		        ->setBody(
					$body,
                   'text/plain'
                )
            ;

		    $mailer->send($message);



		    return $this->render('contact.html.twig', 
		    [
		     // Used here to reload the page
		    ]);
		}
	}
}
?>