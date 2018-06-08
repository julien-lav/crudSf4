<?php


namespace App\Service;

use App\Conroller\EmailController;
use Symfony\Component\HttpFoundation\Request;

/**
 * summary
 */
class EmailService
{
	/* gmail config */

	/* custom config */
	private $adminEmail;
	private $mailer;
	private $recipientEmail;


    /**
     * summary
     */
    public function __construct($adminEmail, \Swift_Mailer $mailer, $recipientEmail)
    {
  		$this->adminEmail = $adminEmail;         
  		$this->mailer = $mailer;   
  		$this->recipientEmail = $recipientEmail;      
    }    

    /*
    TO DO 
    FAIRE UNE FONCTION 
    TYPE GET ET UNE 
    TYPE SET POUR POUVOIRE SWITCHER ENTRE LES 
    SERVICES MAIL ET ENTRE LES MAILS UTILISATEURS ET ADMIN DU SITE
    */

    public function sendMail (Request $request, $mailer) {

    	if($request->isMethod('POST'))
		{
			$name = $request->get('nom');
			$email = $request->get('email');
			$body = $request->get('body');
			$subject = $request->get('subject');

		    $message = (new \Swift_Message($subject))
		        ->setFrom($email)
		        ->setTo($this->recipientEmail)
		        ->setBody(
					$body,
                   'text/plain'
                )
            ;
		    $mailer->send($message);
    	}	
    }
}

?>