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
        $view = $this->view($students);
        return $this->handleView($view);

    }



    /**
     * @Route("/grades", name="get_grades")
     */
    public function getGradesAction()
      {
        $grades = $this->getDoctrine()->getManager()->getRepository('AppBundle:Grade')->findAll(); // get data, in this case list of users.
        $view = $this->view($grades);
        return $this->handleView($view);

      }

      /**
       * @Route("/exams", name="get_exams")
       */
      public function getExamsAction()
        {
          $exams = $this->getDoctrine()->getManager()->getRepository('AppBundle:Exam')->findAll(); // get data, in this case list of users.
          $view = $this->view($exams);
          return $this->handleView($view);

        }

        /**
         * @Route("/admins", name="get_admins")
         */
        public function getAdminsAction()
          {
            $admins = $this->getDoctrine()->getManager()->getRepository('AppBundle:Admin')->findAll(); // get data, in this case list of users.
            $view = $this->view($admins);
            return $this->handleView($view);

          }
}
