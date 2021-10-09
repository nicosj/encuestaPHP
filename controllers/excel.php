<?php


class excelController{
    public function __construct(){
      require_once('/lib/PHPExcel.php');
      require_once('models/excelModel.php');

    }
    public function save(){
        $excelmodel= new ExcelModel();
        $data["persona"]=$excelmodel->get_persona();
        $data["hobby"]=$excelmodel->get_hobby();
        $ele = ["Ninguno","Deportes", "Musical", "Cocina", "Literario", "Manualidades", "Juegos", "Modelismo", "Baile", "Cine", "Otro"];
        $sexo=["","Masculino","Femenino"];


        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Encuestas")
            ->setLastModifiedBy(date('d-m-Y H:i:s'))
            ->setTitle("Encuestas")
            ->setSubject("Datos Hobby")
            ->setDescription("Test.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test");

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B2', 'Nombre')
            ->setCellValue('C2', 'Sexo')
            ->setCellValue('D2', 'Hobby');

        $cont=3;
        foreach($data["persona"] as $pivot){
            $arr="";
            foreach($data["hobby"] as $dato){
                if($dato->llave===$pivot->id){
                    $arr .= "".$ele[$dato->hobby]." : ".$dato->horas."";
                }
            }
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('B'.$cont, $pivot->nombre)
                ->setCellValue('C'.$cont, $sexo[$pivot->sexo])
                ->setCellValue('D'.$cont, $arr);
            $cont++;
        }
        $objPHPExcel->getActiveSheet()->setTitle('Simple');

        $objPHPExcel->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Resultado'.Date("d_m_Y-H_i").'.xlsx"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');


        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
        header ('Cache-Control: cache, must-revalidate');
        header ('Pragma: public');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');


    }
}