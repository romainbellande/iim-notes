<?php // src/AppBundle/APIController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\FOSRestController;




class APIController extends FOSRestController
{
  /**
   * @Route("/students", name="get_students")
   */
  public function getStudentsAction()
    {
        $students = $this->getDoctrine()->getManager()->getRepository('AppBundle:Student')->findAll(); // get data, in this case list of users.
        $json = $this->get('jms_serializer')->serialize($students,'json');
        $view = $this->view($json)
        ->setFormat('json')
        ->setStatusCode(200);

        return $this->handleView($view);

    }



    /**
     * @Route("/grades", name="get_grades")
     */
    public function getGradesAction()
      {
          $grades = $this->getDoctrine()->getManager()->getRepository('AppBundle:Grade')->findAll(); // get data, in this case list of users.
          $json = $this->get('jms_serializer')->serialize($grades,'json');
          $view = $this->view($json)
          ->setFormat('json')
          ->setStatusCode(200);

          return $this->handleView($view);

      }

      /**
       * @Route("/exams", name="get_exams")
       */
      public function getExamsAction()
        {
            $exams = $this->getDoctrine()->getManager()->getRepository('AppBundle:Exam')->findAll(); // get data, in this case list of users.
            $json = $this->get('jms_serializer')->serialize($exams,'json');
            $view = $this->view($json)
            ->setFormat('json')
            ->setStatusCode(200);

            return $this->handleView($view);

        }

        /**
         * @Route("/admins", name="get_admins")
         */
        public function getAdminsAction()
          {
              $admins = $this->getDoctrine()->getManager()->getRepository('AppBundle:Admin')->findAll(); // get data, in this case list of users.
              $json = $this->get('jms_serializer')->serialize($admins,'json');
              $view = $this->view($json)
              ->setFormat('json')
              ->setStatusCode(200);

              return $this->handleView($view);

          }
}
