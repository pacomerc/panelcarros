<?php

namespace PanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use PanelBundle\Entity\Usuario;
use PanelBundle\Form\UsuarioType;

class SessionController extends Controller
{
    /**
     * @Route("/", name="panel_sing_in")
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();
        if($session->has('rol'))
        {
            return $this->redirectToRoute('homepanel');
        } else {
            $user = new Usuario();
            $form = $this->createForm(UsuarioType::class, $user);
            $form->handleRequest($request);
            if($form->isValid())
            {
                // Comprovación de la existencia del usuario
                $data = $form->getData();
//                echo '<pre>';
//                echo $data->getPass();
//                echo '</pre>';
//                exit();
                $pass = sha1($data->getPass());
                $usuario = $this->getDoctrine()->getRepository('PanelBundle:Usuario')->findOneBy(['email' => $data->getEmail(), 'pass' => $pass]);
//                echo '<pre>';
//                print_r($usuario);
//                echo '</pre>';
//                exit();
                if($usuario)
                {
                    $session->start();
                    $session->set('rol', $usuario->getRol());

                    return $this->redirectToRoute('homepanel');
                } else {
                    $this->get('session')->getFlashBag()->clear();
                    $this->get('session')->getFlashBag()->add('error', 'El Usuario y/o contraseña no son válidos');

                    return $this->redirectToRoute('panel_sing_in');
                }
            } else {
                // Mandar vista del formulario
                return $this->render('PanelBundle:panel:singin.html.twig', ['form' => $form->createView()]);
            }
        }
    }

    /**
     * @Route("/logout", name="panel_log_out")
     */
    public function logoutAction(Request $request)
    {
        $session = $request->getSession();
        $session->clear();

        $this->get('session')->getFlashBag()->clear();
        $this->get('session')->getFlashBag()->add('success', 'La sesión se a cerrado correctamente.');

        return $this->redirectToRoute('panel_sing_in');
    }
}
