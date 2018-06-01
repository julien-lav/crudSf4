<?php
namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/*
use Symfony\Flex\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
*/

class UserController extends Controller
{
    /**
     * Matches /
     *
     * @Route("/", name="users_list")
     */
    public function list()
    {

        $users = $this
                    ->getDoctrine()
                    ->getRepository(User::class)
                    ->findAll();

       return $this->render('user/index.html.twig', 
        [
            'users' => $users
        ]);
    }

    /**
     * Matches /user/{id}
     *
     * @Route("/user/{id}", name="user_show")
     */
    public function show($id)
    {

        $user = $this
                    ->getDoctrine()
                    ->getRepository(User::class)
                    ->find($id);

       
       return $this->render('user/single.html.twig',
            array('user' => $user));
    }   

     /**
     * Matches /user/save
     *
     * @Route("/user/save", name="user_save")
     */    
    public function save() 
    {
        $entityManager = $this->getDoctrine()->getManager();

        $user = new User();

        $user->setFirstName('Teste');

        $entityManager->persist($user);
        $entityManager->flush();

        /*return new Response('User saved' . $user->getFirstName());*/
    }

     /**
     * Matches /user/delete
     *
     * @Route("/user/delete/{id}", name="user_delete")
     * Method({"DELETE"})
     */    
    public function delete(Request $request, $id) 
    {
           $user = $this
                    ->getDoctrine()
                    ->getRepository(User::class)
                    ->find($id);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();

        return $this->redirect($this->generateUrl('users_list'));     
    }

    /**
     * @Route("/user/new", name="new_user")
     * @Method({"GET", "POST"})
     */

    /*
    public function new(Request $Request) 
    {
        $user = new User();

        $form = $this->createFormBuilder($user)
                ->add('firstname', TextType::class, array('attr' => array('class' => 'form-control')));
                ->add('lastname', TextType::class, array('attr' => array('class' => 'form-control')));
                ->add('email', TextType::class, array('attr' => array('class' => 'form-control')));
                ->add('phone', TextType::class, array('attr' => array('class' => 'form-control')));
                ->add('dateOfBirth', TextType::class, array('attr' => array('class' => 'form-control')));
                ->add('deliveryPostalCode', TextType::class, array('attr' => array('class' => 'form-control')));
                ->add('invoicePostalCode', TextType::class, array('required' =>false, 'attr' => array('class' => 'form-control')));
                ->add('deliveryAdress', TextType::class, array('attr' => array('class' => 'form-control')));
                ->add('invoiceAdress', TextType::class, array('required' =>false, 'attr' => array('class' => 'form-control')));
                ->add('deliveryCity', TextType::class, array('attr' => array('class' => 'form-control')));
                ->add('invoiceCity', TextType::class, array('required' =>false, 'attr' => array('class' => 'form-control')));
                ->add('deliveryCountry', TextType::class, array('attr' => array('class' => 'form-control')));
                ->add('invoiceCountry', TextType::class, array('required' =>false, 'attr' => array('class' => 'form-control')));
    }*/
}

/*
INSERT INTO `user` (`id`, `firstname`, `email`, `lastname`, `date_of_birth`, `delivery_postal_code`, `invoice_postal_code`, `delivery_adress`, `invoice_adress`, `delivery_city`, `invoice_city`, `delivery_country`, `invoice_country`) VALUES (NULL, 'Cheunn', 'cheunn@mail.fr', 'Lee', '12/15/1986', '75011', '75011', '138 rue des cerises', 'idem', 'Paris', 'idem', 'fr', 'idem');
*/
?>





