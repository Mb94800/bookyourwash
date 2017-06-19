<?php


namespace DC\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use DC\UserBundle\User;
use DC\AdminBundle\DCAdminBundle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\DateTime;
use DC\HomeBundle\DCHomeBundle;
use DC\HomeBundle\Entity;
use DC\HomeBundle\Entity\Search;
use DC\AdminBundle\Entity\Booking;

class DefaultController extends Controller
{


    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function searchDCAction(Request $request){

        $search = new Search();

        $formBuilder = $this->get('form.factory')->createBuilder('form',$search);


        $formBuilder
            ->add('postcode', 'text')
            ->add('datetime','hidden')
            ->add('ipaddress','hidden')
            ->add('save', 'submit', array('label' => 'Check Drycleaners!'))
        ;


        $form = $formBuilder->getForm();

        $form->handleRequest($request);



        if ($form->isValid()) {




            $em = $this->getDoctrine()->getManager();


            $date = new \DateTime("now");

            $search->setDatetime($date);
            $search->setIpaddress($_SERVER['REMOTE_ADDR']);



            $em->persist($search);
       
            $em->flush();

            return $this->redirect($this->generateUrl('dc_home_listdc', array('postcode' => $search->getPostCode())));
        }



        return $this->render('DCHomeBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    /**
     * @param $postcode
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function shownearestDCAction($postcode){

        $postcode = $_GET['postcode'];

        $em = $this->getDoctrine()->getEntityManager();

        $listDC = $em->getRepository('DCAdminBundle:DryCleaners')->getAllDryCleaner();


        foreach($listDC as $dc){
            $dc->distance = $this->distance($dc->getLatitude(),$dc->getLongtitude(),$this->get_lat_long($postcode,"lat"),$this->get_lat_long($postcode,"long"), 'K');
            $dc->numberWM = $em->getRepository('DCAdminBundle:WashingMachine')->countWashingMachinesByDryCleaner($dc->getId(),1)[0][1];
            if($dc->numberWM > 0){
                $dc->lastWM = $em->getRepository('DCAdminBundle:WashingMachine')->getLastWM($dc->getId(),1);
            }
            $dc->openingHours = $em->getRepository('DCAdminBundle:OpeningHours')->getOpeningHoursByDryCleaner($dc->getId());
        }


        

        return $this->render('DCHomeBundle:Default:listDC.html.twig', array('postcode' => $postcode, 'listDC' => $listDC));

    }


    public function checkfreeslotsDCaction(){


    }


    public function bookingDCaction(Request $request){

        $dcid = $_GET['dcid'];
        $wmid = $_GET['wmid'];
        $em = $this->getDoctrine()->getEntityManager();

        $listSlots = $em->getRepository('DCAdminBundle:Booking')->getBookingsByDryCleaner($dcid,0);
        $booking = new Booking();
        $formBuilder = $this->get('form.factory')->createBuilder('form',$booking);

        $array = [];
        $idarray = [];
        foreach($listSlots as $slot) {


            $array[$slot->getId()] = date_format($slot->getStartDateTime(), 'H:i');


        }

        $slot = $slot->getStartDateTime()->format('mm:yy');
        $formBuilder
            ->add('id', 'hidden')
            ->add('startDateTime', 'choice',
                array('choices' => $array,
                        'expanded' => true,
                        'multiple' => false
                    ))
            ->add("Let's book!",'submit');


        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $booking->setWashingmachineId($wmid);
            $booking->setDrycleanerId($dcid);
            $booking->setBooked(1);
            $time = $array[$form->getData()->getStartDateTime()];

            $idbooking = $form->getData()->getStartDateTime();

            $booking->setStartDateTime(\DateTime::createFromFormat('H:i',$time));
            $securityContext = $this->container->get('security.authorization_checker');
            if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
                $booking->setUserId($this->getUser()->getId());
            }else{
                $booking->setUserId(0);
            }

            $em->persist($booking);



            $em->getRepository('DCAdminBundle:Booking')->updateSlotBooking($booking,$idbooking);

            $em->getRepository('DCAdminBundle:WashingMachine')->changeAvaibility($booking->getWashingmachineId(),0);
            $bookingcopy = $booking;

            $em->flush();

            $gen = $this->container->get('dc_generation');

            $code = $gen->random(9);
            $drycleaner = $em->getRepository('DCAdminBundle:DryCleaners')->getDryCleaner($dcid);

            $request = $this->getRequest();

            $bookingID = $booking->getId();




            return $this->redirect($this->generateUrl('dc_bookingdone',array('request' => $request, 'code' => $code, 'booking' => $bookingID , 'drycleaner' => $dcid, $_POST)));


        }

        return $this->render('DCHomeBundle:Default:bookingWM.html.twig', array('form' => $form->createView()));


    }

    public function confirmationBookingAction(Request $request,$code,$booking,$drycleaner){
        $em = $this->getDoctrine()->getManager();

        $booking = $em->getRepository('DCAdminBundle:Booking')->getBooking($_GET['booking']);
        $drycleaner = $em->getRepository('DCAdminBundle:DryCleaners')->getDryCleaner($_GET['drycleaner']);
        $code = strtoupper($_GET['code']);


        $formBuilderPhone = $this->get('form.factory')->createBuilder('form');
        $formBuilderPhone
            ->add('Numberphone', 'text')
            ->add('save','submit')
     ;

        $formPhone = $formBuilderPhone->getForm();

        $formPhone->handleRequest($request);
        if($formPhone->isValid()){

            $msg = $this->container->get('dc_messages');
            $msg->sendConfirmation($booking,$drycleaner,$code,$formPhone->getData()['Numberphone']);
            var_dump($msg);
            return $this->render('DCHomeBundle:Default:bookingdone2.html.twig');
        }

        return $this->render('DCHomeBundle:Default:bookingdone.html.twig', array('form' => $formPhone->createView(), 'code' => $code, 'booking' => $booking, 'drycleaner' =>$drycleaner));


    }

    function distance($lat1, $lon1, $lat2, $lon2, $unit) {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return round(($miles * 1.609344));
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }
    public function indexAction()
    {


       return($this->searchDCAction(new Request()));
    }

    public function get_lat_long($postalcode,$opt){
        $postalcode = urlencode($postalcode);
        $url ="https://maps.googleapis.com/maps/api/geocode/json?address=".$postalcode.",+UK&sensor=false&key=AIzaSyCuoDQheiwo8yZhH-zJuYSnvZ2LyjQvZKI";


        $json = @file_get_contents($url);

        $result = json_decode($json);



        if($opt == 'lat') {
            return $result->results["0"]->geometry->location->lat;
        }else{
            return $result->results["0"]->geometry->location->lng;
        }
    }
}
