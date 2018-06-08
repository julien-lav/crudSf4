<?php 


namespace App\Controller\MyAdmin;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Flex\Response;

use App\Service\MessageService;


class AdminController extends Controller
{
    /**
     * Matches /admin
     * 
     * @Route("/admin", name="admin_list")
     */
    public function list()
    {
       $users = $this
                    ->getDoctrine()
                    ->getRepository(User::class)
                    ->findAll();

       return $this->render('/myadmin/index.html.twig', 
        [
            'users' => $users
        ]);
    }   

    /**
     * Matches /service
     * 
     * @Route("/service", name="service")
     */
    public function new(MessageService $messageService)
    {
        $message = $messageService->getHappyMessage();
        $this->addFlash('success', $message);
    // ...
        return $this->render('vuejs/vue_ex1.html.twig');
    }
}

?>




