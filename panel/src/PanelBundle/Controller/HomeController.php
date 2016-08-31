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
//use PHPExcel;

class HomeController extends Controller
{
    /**
     * @Route("/home/", name="homepanel")
     */
    public function indexAction(Request $request)
    {

    	$form = $this->createFormBuilder()
            ->add('seleccionar_Archivo',ChoiceType::class,
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
            ->add('Archivo', FileType::class, array('label' => 'Archivo (Excel) '))
            ->add('enviar', SubmitType::class, array('label' => 'Cargar','attr' => array('class' => 'cargar')))
            ->getForm();



            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
               // $data = $request;
                //$file = $data->files->get("Archivo");
               //$form['Archivo']->getData()->guessExtension()
                $file=$form['Archivo'];
                //die($file->getData()->getClientOriginalName());
                $archivo=explode(".", $file->getData()->getClientOriginalName());
                $sep=$archivo[count($archivo)-1];
                $fileName = md5(uniqid()).'.'.$sep;
                    

                if($sep!="xls"&&$sep!="xlsx"&&$sep!="csv"){////if
                    die("Archivo no valido");
                }else{
                    //////////////////////archivo valido
                    $fileName = md5(uniqid()).'.'.$sep;
                    $uipload=$file->getData()->move($this->getParameter('excel_directory'), $fileName);
                    if($uipload){

                        //die($uipload);    
                        self::leerexcel($uipload);
                    }
                    
                }///end if
                
                //die($sep);
                //die("requestname:".$form['Archivo']->getData()->getClientOriginalName());
                //$form = null;

            }


        return $this->render('PanelBundle:panel:home.html.twig',array("form"=>$form->createView()));
    }



    public function leerexcel($archivo){
            /*$phpExcelObject =  $this->get('xls.load_xls2007')->load($archivo);
            $allSheetName=$objPHPExcel->getSheetNames();
            $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
            $highestRow = $objWorksheet->getHighestRow();
            $highestColumn = $objWorksheet->getHighestColumn();
            $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
          
            $headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true);
            $headingsArray = $headingsArray[1];


                    //Se recorre toda la hoja excel desde la fila 2 y se almacenan los datos
               $r = -1;
               $namedDataArray = array();
               for ($row = 2; $row <= $highestRow; ++$row) {
                    $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
                    if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
                          ++$r;
                          foreach($headingsArray as $columnKey => $columnHeading) {
                                  $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
                          } //endforeach
                    } //endif
                }
            var_dump($namedDataArray);*/
            //$phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();



           /* $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject($archivo);
            $objPHPExcel->setActiveSheetIndex(0);
            $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
            */
            /*

            


            $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
            $writer->save($archivo);
            die($archivo);*/
            //die()

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
       for ($row = 2; $row <= $highestRow; ++$row) {
            $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
            if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
                  ++$r;
                  foreach($headingsArray as $columnKey => $columnHeading) {
                          $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
                  } //endforeach
            } //endif
        }
       var_dump($namedDataArray);
    die("<br/><br/>");


    }/////end leer archivo
}
