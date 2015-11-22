<?php // src/AppBundle/AdminController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\AdminType;
use AppBundle\Entity\Admin;
use Symfony\Component\HttpFoundation\Request;
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
    /**
     * @Route("/admin/add", name="admin_add")
     */
    public function addAction(Request $request){
      $admin = new Admin();

      $form = $this->createForm(new AdminType(), $admin);

      if($request->isMethod('POST')
      && $form->handleRequest($request)
      && $form->isValid()){
        $this->get('fos_user.user_manager')->updateUser($admin);
        $admin->addRole('ROLE_ADMIN');
        $db = $this->getDoctrine()->getManager();
        $db->persist($admin);
        $db->flush();

        return $this->redirectToRoute('admin_list');
      }

      return $this->render('AppBundle:Admin:add.html.twig',[
        'form' => $form->createView()
        ]);

    }
    /**
     * @Route("/admin/delete/{id}", name="admin_delete")
     */
    public function deleteAction($id){

      $db = $this->getDoctrine()->getManager();
      $admin = $db->getRepository('AppBundle:Admin')->find($id);
      $db->remove($admin);
      $db->flush();

      return $this->redirectToRoute('admin_list');

    }

    /**
     * @Route("/update/{id}", name="admin_update")
     */
    public function updateAction($id)
    {
        $request = $this->get('request');

        if (is_null($id)) {
            $postData = $request->get('AppBundle:Admin');
            $id = $postData['id'];
        }

        $db = $this->getDoctrine()->getEntityManager();
        $admin = $db->getRepository('AppBundle:Admin')->find($id);
        $form = $this->createForm(new AdminType(), $admin);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                // perform some action, such as save the object to the database
                $db->flush();

                return $this->redirect($this->generateUrl('admin_list'));
            }
        }

        return $this->render('AppBundle:Admin:update.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
