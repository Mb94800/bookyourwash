<?php

namespace DC\AdminBundle\Controller;

use DC\AdminBundle\DCAdminBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use DC\AdminBundle\Entity\DryCleaners;
use DC\AdminBundle\Entity\WashingMachine;
use DC\AdminBundle\Entity\OpeningHours;
use DC\UserBundle\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\HttpFoundation\Response;
use DC\AdminBundle\Entity\Booking;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class DefaultController extends Controller
{
    public function indexAction(){




    }

    public function logInAction(){

        $em = $this->getDoctrine()->getEntityManager();

        if (in_array("ADMIN",$this->getUser()->getRoles())) {

            $listDC = $em->getRepository('DCAdminBundle:DryCleaners')->myFindAllDryCleanersByOwner($this->getUser()->getId());

            foreach($listDC as $dc) {
                $dc->numberWMAvailable = $em->getRepository('DCAdminBundle:WashingMachine')->countWashingMachinesByDryCleaner($dc->getId(), 1)[0][1];
                $dc->numberWMUnavailable = $em->getRepository('DCAdminBundle:WashingMachine')->countWashingMachinesByDryCleaner($dc->getId(), 0)[0][1];
            }

            $securityContext = $this->container->get('security.authorization_checker');
            $listB = $em->getRepository('DCAdminBundle:Booking')->getBookingsByDryCleaner($this->getUser()->getId(), null);

            return $this->render('DCAdminBundle:Default:index.html.twig', array('listDC' => $listDC));
        }else{
            return $this->render('DCAdminBundle:Default:forbidden.html.twig');
        }

    }

    public function addOpeningHoursAction(Request $request){
        $openinghours = new OpeningHours();

        $id = $_GET['id'];

        $formBuilder = $this->get('form.factory')->createBuilder('form', $openinghours);

        $formBuilder
            ->add('dayOneOpening',  TimeType::class, array(
                'input'  => 'datetime'))
             ->add('dayOneClosing',  TimeType::class, array(
                'input'  => 'datetime'))
            ->add('dayTwoOpening',  TimeType::class, array(
                'input'  => 'datetime'))
            ->add('dayTwoClosing',  TimeType::class, array(
                'input'  => 'datetime'))
            ->add('dayThreeOpening',  TimeType::class, array(
                'input'  => 'datetime'))
            ->add('dayThreeClosing',  TimeType::class, array(
                'input'  => 'datetime'))
            ->add('dayFourOpening',  TimeType::class, array(
                'input'  => 'datetime'))
            ->add('dayFourClosing',  TimeType::class, array(
                'input'  => 'datetime'))
            ->add('dayFiveOpening',  TimeType::class, array(
                'input'  => 'datetime'))
            ->add('dayFiveClosing',  TimeType::class, array(
                'input'  => 'datetime'))
            ->add('daySixOpening',  TimeType::class, array(
                'input'  => 'datetime'))
            ->add('daySixClosing',  TimeType::class, array(
                'input'  => 'datetime'))
            ->add('daySevenOpening',  TimeType::class, array(
                'input'  => 'datetime'))
            ->add('daySevenClosing',  TimeType::class, array(
                'input'  => 'datetime'))
            ->add('save','submit');

        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $openinghours->setIdDC($id);
            $em->persist($openinghours);
            $em->flush();

            return $this->redirect($this->generateUrl('edit', array('id' => $id)));

        }


        return $this->render('DCAdminBundle:Default:addOpeningHours.html.twig', array('form' => $form->createView(), 'id' => $id));
    }

    public function addDrycleanerAction(Request $request){

        $drycleaners = new DryCleaners();

        $formBuilder = $this->get('form.factory')->createBuilder('form', $drycleaners);



        $formBuilder
            ->add('name',      'text', array('required' => false))
            ->add('country', 'text', array('required' => false))
            ->add('postalcode', 'text', array('required' => false))
            ->add('addresslineone',   'text', array('required' => false))
            ->add('addresslinetwo',   'text', array('required' => false))
            ->add('addresslinethree',   'text', array('required' => false))
            ->add('postcity',    'text', array('required' => false))
            ->add('county', 'text', array('required' => false))
            ->add('save',      'submit')
            ->add('IDOwner', 'hidden')
        ;

        $form = $formBuilder->getForm();





        $form->handleRequest($request);

        if ($form->isValid()) {
            // On l'enregistre notre objet $advert dans la base de données, par exemple
            $em = $this->getDoctrine()->getManager();
            $drycleaners->setIDOwner($this->getUser()->getId());
            $admin = new DCAdminBundle();
            $address = $drycleaners->getAddressLineOne().$drycleaners->getAddressLineTwo().$drycleaners->getAddressLineThree();
            $lat = $admin->get_lat_long($drycleaners->getPostalCode(),'lat');
            $long = $admin->get_lat_long($drycleaners->getPostalCode(),'long');

            $drycleaners->setLatitude($lat);
            $drycleaners->setLongtitude($long);


            $em->persist($drycleaners);
      
            $em->flush();


            // On redirige vers la page de visualisation de l'annonce nouvellement créée
            return $this->redirect($this->generateUrl('addOpeningHours', array('id'=>$drycleaners->getId())));
        }

        return $this->render('DCAdminBundle:Default:add.html.twig', array(
            'form' => $form->createView(),
        ));



    }

    public function addWashingMachineAction(Request $request, $id){

        $id = $_GET['id'];

        $washingmachine = new WashingMachine();

        $formBuilder = $this->get('form.factory')->createBuilder('form', $washingmachine);

        $formBuilder
            ->add('avaibility', ChoiceType::class, array(
                'choices'  => array(
                    true => 'Available',
                    false => 'Unavailable'
                )))
            ->add('idDrycleaner','hidden')
            ->add('save', 'submit')
        ;

        $form = $formBuilder->getForm();

        $form->handleRequest($request);


        $washingmachine->setIdDrycleaner($id);



        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();

            $listWC = $em->getRepository('DCAdminBundle:WashingMachine')->myFindAllByWashingMachinesByDryCleaner($id);
            $em->persist($washingmachine);
            $em->flush();


            return $this->redirect($this->generateUrl('edit', array('id' => $id)));
        }




          return $this->render('DCAdminBundle:Default:addWM.html.twig', array(
              'form' => $form->createView(), 'id' => $id
          ));




    }

    public function editDrycleanerAction($id, Request $request){
            $drycleaners = new DryCleaners();


            $id = $_GET['id'];
   


            $em = $this->getDoctrine()->getManager();
            $listWM = $em->getRepository('DCAdminBundle:WashingMachine')->myFindAllByWashingMachinesByDryCleaner($id);
            $drycleaner = $em->getRepository('DCAdminBundle:DryCleaners')->getDryCleaner($id);
            $listBookings = $em->getRepository('DCAdminBundle:Booking')->getBookingsByDryCleaner($id,null);
            $openingHours = $em->getRepository('DCAdminBundle:OpeningHours')->getOpeningHoursByDryCleaner($id);

            $booking = new Booking();

            $formBuilder = $this->get('form.factory')->createBuilder('form', $booking);

            $formBuilder
                ->add('startDateTime', TimeType::class, array(
                    'input'  => 'datetime',
                    'widget' => 'choice',
                ))
                ->add('save','submit');


            $form = $formBuilder->getForm();


            $form->handleRequest($request);

            if($form->isValid()){
                $booking->setDrycleanerId($id);
                $booking->setUserId(0);
                $booking->setBooked(0);
                $em->persist($booking);
                $em->flush();

                return $this->render('DCAdminBundle:Default:edit.html.twig', array('form' => $form->createView(),'drycleaner'=>$drycleaner,'listWM' => $listWM, 'listB' => $listBookings, 'listOH' => $openingHours));
            }
            return $this->render('DCAdminBundle:Default:edit.html.twig', array('form' => $form->createView(),'drycleaner'=>$drycleaner,'listWM' => $listWM, 'listB' => $listBookings, 'listOH' => $openingHours));
    }
    
    

  
}
