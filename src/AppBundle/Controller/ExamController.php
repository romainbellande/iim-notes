<?php // src/AppBundle/ExamController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\ExamType;
use AppBundle\Entity\Exam;
use Symfony\Component\HttpFoundation\Request;
/**
 * Class ExamController
 */
class ExamController extends Controller
{
    /**
     * @Route("/exam", name="exam_list")
     */
    public function indexAction()
    {
        $exams = $this->getDoctrine()->getManager()->getRepository('AppBundle:Exam')->findAll();

        return $this->render('AppBundle:Exam:index.html.twig', [
            'exams' => $exams
        ]);
    }

    /**
     * @Route("/exam/add", name="exam_add")
     */
    public function addAction(Request $request){
      $exam = new Exam();
      $form = $this->createForm(new ExamType(), $exam);

      if($request->isMethod('POST')
      && $form->handleRequest($request)
      && $form->isValid()){

        $db = $this->getDoctrine()->getManager();
        $db->persist($exam);
        $db->flush();

        return $this->redirectToRoute('exam_list');
      }

      return $this->render('AppBundle:Exam:add.html.twig',[
        'form' => $form->createView()
        ]);

    }
    /**
     * @Route("/exam/delete/{id}", name="exam_delete")
     */
    public function deleteAction($id){

      $db = $this->getDoctrine()->getManager();
      $exam = $db->getRepository('AppBundle:Exam')->find($id);
      $db->remove($exam);
      $db->flush();

      return $this->redirectToRoute('exam_list');

    }
}
