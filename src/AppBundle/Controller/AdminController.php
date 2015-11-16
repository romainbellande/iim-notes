<?php // src/AppBundle/AdminController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class AdminController
 */
class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin_list")
     */
    public function indexAction()
    {
        $admins = $this->getDoctrine()->getManager()->getRepository('AppBundle:Admin')->findAll();

        return $this->render('AppBundle:Admin:index.html.twig', [
            'admins' => $admins
        ]);
    }
}
