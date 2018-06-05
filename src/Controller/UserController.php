<?php
namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Flex\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

// Use statement for annotation Method
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/*
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
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
     * Matches /user/delete
     *
     * @Route("/user/delete/{id}", name="user_delete")
     * Method({"DELETE"})
     * @Security("has_role('ROLE_ADMIN')")
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

            $response = new Response();
            $response->send($msg);

        // return $this->redirect($this->generateUrl('users_list'));     
        // Si on utilise le return directement, on peut se passer de $response 
        // et donc de son --> use Symfony\Flex\Response;

    }

    /**
     * @Route("/user/new", name="new_user")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function new(Request $request, UserPasswordEncoderInterface $passwordEncoder) 
    {
        $user = new User();

        $form = $this->createFormBuilder($user)
                ->add('username', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('password', RepeatedType::class, array(
                    'type' => PasswordType::class,
                    'first_options'  => array('label' => 'Password'),
                    'second_options' => array('label' => 'Repeat Password'),))
                ->add('firstname', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('lastname', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('email', EmailType::class, array('attr' => array('class' => 'form-control')))
                ->add('phone', IntegerType::class, array('attr' => array('class' => 'form-control')))
                ->add('dateOfBirth', DateType::class, array('required' =>false, 'placeholder' => 'Select a date', 'attr' => array('class' => 'form-control')))
                ->add('deliveryPostalCode', IntegerType::class, array('attr' => array('class' => 'form-control')))
                ->add('invoicePostalCode', IntegerType::class, array('required' =>false, 'attr' => array('class' => 'form-control')))
                ->add('deliveryAdress', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('invoiceAdress', TextType::class, array('required' =>false, 'attr' => array('class' => 'form-control')))
                ->add('deliveryCity', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('invoiceCity', TextType::class, array('required' =>false, 'attr' => array('class' => 'form-control')))
                ->add('deliveryCountry', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('invoiceCountry', TextType::class, array('required' =>false, 'attr' => array('class' => 'form-control')))
                 ->add('save', SubmitType::class, array(
                  'label' => 'Create a new user',
                  'attr' => array('class' => 'btn btn-primary')))
                ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
          
            $user = $form->getData();
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
            


            $entityManager = $this->getDoctrine()->getManager();

            /*if( !($user->getDateOfBirth() instanceof \DateTime) )
                $user->setDateOfBirth( new \DateTime($user->getDateOfBirth()) );*/

        


            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('users_list');
      }
        
        return $this->render('user/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/user/edit/{id}", name="edit_user")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function update(Request $request, $id, UserPasswordEncoderInterface $passwordEncoder) 
    {
        $user = new User();
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

       $form = $this->createFormBuilder($user)
                ->add('username', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('password', RepeatedType::class, array(
                    'type' => PasswordType::class,
                    'first_options'  => array('label' => 'Password'),
                    'second_options' => array('label' => 'Repeat Password'),))
                ->add('firstname', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('lastname', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('email', EmailType::class, array('attr' => array('class' => 'form-control')))
                ->add('phone', IntegerType::class, array('attr' => array('class' => 'form-control')))
                ->add('dateOfBirth', DateType::class, array('required' =>false, 'placeholder' => 'Select a date', 'attr' => array('class' => 'form-control')))
                ->add('deliveryPostalCode', IntegerType::class, array('attr' => array('class' => 'form-control')))
                ->add('invoicePostalCode', IntegerType::class, array('required' =>false, 'attr' => array('class' => 'form-control')))
                ->add('deliveryAdress', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('invoiceAdress', TextType::class, array('required' =>false, 'attr' => array('class' => 'form-control')))
                ->add('deliveryCity', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('invoiceCity', TextType::class, array('required' =>false, 'attr' => array('class' => 'form-control')))
                ->add('deliveryCountry', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('invoiceCountry', TextType::class, array('required' =>false, 'attr' => array('class' => 'form-control')))
                 ->add('save', SubmitType::class, array(
                  'label' => 'Create a new user',
                  'attr' => array('class' => 'btn btn-primary')))
                ->getForm();

        $form->handleRequest($request);

       

        if($form->isSubmitted() && $form->isValid()) {

            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
         
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
            return $this->redirectToRoute('users_list');
      }
        
        return $this->render('user/new.html.twig', array('form' => $form->createView()));
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
}

/*
INSERT INTO `user` (`id`, `firstname`, `email`, `date_of_birth`, `delivery_postal_code`, `invoice_postal_code`, `delivery_adress`, `invoice_adress`, `delivery_city`, `invoice_city`, `delivery_country`, `invoice_country`, `phone`, `lastname`) VALUES (NULL, 'Albert', 'alb@mail.fr', '2018-06-14', '11220', '75011', '12 rue des trèfles  ', '12 rue des trèfles  ', 'Lyon', 'Lyon', 'fr', 'fr', '212121', 'Premier');
*/
?>





