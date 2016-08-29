<?php

namespace PanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\EmailType;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class HomeController extends Controller
{
    /**
     * @Route("/home/")
     */
    public function indexAction()
    {

    	$form = $this->createFormBuilder()
            ->add('seleccionar_Archivo',ChoiceType::class,
               array(
                'choices' => array(
                    'Tipo de archivo1' => null,
                    'Excel xsl' => "xsl",
                    'Excel xlsx' => "xslx",
                    'Archivo csv' =>"csv"
                ),'choice_attr' => function($val, $key, $index) {
                    // adds a class ¡
                      return ['class' => 'select-'.strtolower($key)];
                },'attr' => array('class' => 'icons'),'label_attr'=> array('class' => 'esconder'),"required"=>true              ))
            ->add('enviar', SubmitType::class, array('label' => 'Cargar','attr' => array('class' => 'cargar')))
            ->getForm();
        return $this->render('PanelBundle:panel:home.html.twig',array("form"=>$form->createView()));
    }
}
