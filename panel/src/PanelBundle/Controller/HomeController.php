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

class HomeController extends Controller
{
    /**
     * @Route("/home/", name="homepanel" ) 
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();
        if ($session->has('rol'))
        {
            $contfilas = "";
            $form = $this->createFormBuilder()
                /*->add('seleccionar_Archivo',ChoiceType::class,
                   array(
                    'choices' => array(
                        'Tipo de archivo' => null,
                        'Excel xsl' => "xsl",
                        'Excel xlsx' => "xslx",
                        'Archivo csv' =>"csv"
                    ),'choice_attr' => function($val, $key, $index) {
                        // adds a class ¡
                          return ['class' => 'select-'.strtolower($key)];
                    },'attr' => array('class' => 'icons'),'label_attr'=> array('class' => 'esconder'),"required"=>true))
                    */
                ->add('Archivo', FileType::class, array('label' => 'Archivo (Excel) '))
                ->add('enviar', SubmitType::class, array('label' => 'Cargar', 'attr' => array('class' => 'cargar-button-home')))
                ->getForm();


            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                // $data = $request;
                //$file = $data->files->get("Archivo");
                //$form['Archivo']->getData()->guessExtension()
                $file = $form['Archivo'];
                //die($file->getData()->getClientOriginalName());
                $archivo = explode(".", $file->getData()->getClientOriginalName());
                $sep = $archivo[count($archivo) - 1];
                $fileName = md5(uniqid()) . '.' . $sep;


                if ($sep != "xls" && $sep != "xlsx" && $sep != "csv") {////if
                    die("Archivo no valido");
                } else {
                    //////////////////////archivo valido
                    $fileName = md5(uniqid()) . '.' . $sep;
                    $uipload = $file->getData()->move($this->getParameter('excel_directory'), $fileName);
                    if ($uipload) {
                        //die($uipload);
                        $contfilas = self::leerexcel($uipload);
                        //die("filas:".$contfilas);
                    }

                }///end if

                //die($sep);
                //die("requestname:".$form['Archivo']->getData()->getClientOriginalName());
                //$form = null;

            }

            //echo  "filas2".$contfilas;
            return $this->render('PanelBundle:panel:home.html.twig', array("form" => $form->createView(), "numerofilas" => $contfilas));
        } else
        {
            $this->get('session')->getFlashBag()->clear();
            $this->get('session')->getFlashBag()->add('error', 'Favor de iniciar sesión.');

            return $this->redirectToRoute('panel_sing_in');
        }
    }

    public function leerexcel($archivo){
      set_time_limit(0); // 0 = no limits
       
            //die()
      $excelDB= new ExcelDataBase();

      $objPHPExcel = $this->get('phpexcel')->createPHPExcelObject($archivo);
      $total_sheets=$objPHPExcel->getSheetCount();
      $allSheetName=$objPHPExcel->getSheetNames();
      $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
      //Se obtiene el número máximo de filas
      $highestRow = $objWorksheet->getHighestRow();
      //Se obtiene el número máximo de columnas
      $highestColumn = $objWorksheet->getHighestColumn();
      //$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
      //$headingsArray contiene las cabeceras de la hoja excel. Llos titulos de columnas
      $headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true);
      $headingsArray = $headingsArray[1];
 
      //Se recorre toda la hoja excel desde la fila 2 y se almacenan los datos
       $r = -1;
       $namedDataArray = array();
       $em = $this->getDoctrine()->getManager();
       for ($row = 2; $row <= $highestRow; ++$row) {
            $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
            if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
              //echo $dataRow[$row]['A']."<br/>";
                  ++$r;
                  $contador=0;///se reinicia el contador
                  foreach($headingsArray as $columnKey => $columnHeading) {
                          $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
                          $dato=(string)$dataRow[$row][$columnKey];


                          if($dataRow[$row][$columnKey]==null){
                            $dato="null";
                          }
                          
                          switch ($contador) {
                            case 0:///Stock Number
                              $excelDB->setStockNumber($dato);
                            break;
                            case 1:///Vin
                              $excelDB->setVin($dato);
                            break;
                            case 2:///Year
                              $excelDB->setYear($dato);
                            break;
                            case 3:///Make
                              $excelDB->setMake($dato);
                            break;
                            case 4:///Model
                              $excelDB->setModel($dato);
                            break;
                            case 5:///Body Style
                              $excelDB->setBodyStyle($dato);
                            break;
                            case 6:///Mileage
                              $excelDB->setMileage($dato);
                            break;
                            case 7:///Price
                              $excelDB->setPrice($dato);
                            break;
                            case 8:///MSRP
                              $excelDB->setMSRP($dato);
                            break;
                            case 9:///Type
                              $excelDB->setType($dato);
                            break;
                            case 10:///Exterior Color
                              $excelDB->setExteriorColor($dato);
                            break;
                            case 11:///Interior Color
                              $excelDB->setInteriorColor($dato);
                            break;
                            case 12:///Trim
                              $excelDB->setTrim($dato);
                            break;
                            case 13:///Model Code
                              $excelDB->setModelCode($dato);
                            break;
                            case 14:///Transmission
                              $excelDB->setTransmission($dato);
                            break;
                            case 15:///Cost
                              $excelDB->setCost($dato);
                            break;
                            case 16:///Date Arrived
                              $excelDB->setDateArrived($dato);
                            break;
                            case 17:///Featured Equipment
                              $excelDB->setFeaturedEquipment($dato);
                            break;
                            case 18:///Option Group
                              $excelDB->setOptionGroup($dato);
                            break;
                            case 19:///Fed Color Code
                              $excelDB->setFedColor($dato);
                            break;
                            case 20:///Location
                              $excelDB->setLocation($dato);
                            break;
                            case 21:///Certified
                              $excelDB->setCertified($dato);
                            break;
                            
                            default:
                                  die("Error en columnas");                            
                              break;
                          }
                          //echo  $contador." headingcolumns:".$columnHeading."<br/>";
                          $contador++;
                            
                  } //endforeach
                 $em->persist($excelDB);
                  $em->flush();
                  $em->clear();
                  
            } //endif
        }
       //var_dump($namedDataArray);
        //echo $namedDataArray[0][0];

    //die("<br/><br/>");
    return "Se subieron <strong>".$highestRow."</strong> filas";

    }/////end leer archivo
}
