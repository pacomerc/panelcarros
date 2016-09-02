<?php

namespace PanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\EmailType;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use PanelBundle\Entity\ExcelDataBase;
//use PHPExcel;

class PrintCarsController.php extends Controller
{
    /**
     * @Route("/ajax/", name="ajaxseccion" ) 
     */
    public function indexAction(Request $request)
    {
    
        return $this->render('PanelBundle:panel:printcars.html.twig');
    }
}
