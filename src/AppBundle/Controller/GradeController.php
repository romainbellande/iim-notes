<?php // src/AppBundle/GradeController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class GradeController
 */
class GradeController extends Controller
{
    /**
     * @Route("/grade", name="grade_list")
     */
    public function indexAction()
    {
        $grades = $this->getDoctrine()->getManager()->getRepository('AppBundle:Grade')->findAll();

        return $this->render('AppBundle:Grade:index.html.twig', [
            'grades' => $grades
        ]);
    }
}
