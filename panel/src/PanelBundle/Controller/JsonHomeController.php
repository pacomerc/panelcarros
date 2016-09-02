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

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

//use PHPExcel;

class JsonHomeController extends Controller
{
    /**
     * @Route("/json-home/", name="jsonhomepanel" ) 
     */
    public function indexAction(Request $request)
    {
       $encoders = [new XmlEncoder(), new JsonEncode()];
       $normalizers = [new GetSetMethodNormalizer()];
       $serializer = new Serializer($normalizers, $encoders);

        $repository = $this->getDoctrine()->getRepository('PanelBundle:ExcelDataBase')->findBy(array(),array("id"=>"ASC"));
        if(!$repository){
           die("Error en obtener datos. Favor de consultar al administrador");
        }
        //die("fin");
        $json = $serializer->serialize($repository, 'json');
       return new Response($json);  
        
    }//////end function

    /**
     * @Route("/json/detalle/{id}", name="json_detalle")
     */
    public function detalleAction($id)
    {
//        Preparo variables para crear los headers y poder convertir los daton en Json
        $encoders = [new XmlEncoder(), new JsonEncode()];
        $normalizers = [new GetSetMethodNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

//        Realizo la busqueda del registro pedido
        $detalle = $this->getDoctrine()->getRepository('PanelBundle:ExcelFataBase')->findOneBy(['id' => $id]);

//        Compruebo de que exista el registro
        if(!$detalle)
        {
            die('El registro no existe');
        }

//        Convierto los datos recogidos a un arreglo Json
        $json = $serializer->serialize($detalle, 'json');

//        Mando el Json
        return new Request($json);
    }
}
