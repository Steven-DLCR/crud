<?php
require_once '../modelo/periodo.php';

$periodo = new Periodo();

switch ($_POST["accion"])
{
    case 'listar_periodo':
        $all_periodo = $periodo->all_periodo();
        $array = array(
            'rst'   => 1,
            'datos' => $all_periodo,
        );
        echo json_encode($array);        
        break;

    case 'crear_periodo':
        $inputs = array(
            ':periodo'   => $_POST["periodo"],
            ':estado'    => $_POST["estado"]
        );
        $response = $periodo->insertar_periodo($inputs);
        if ($response == false) {
            $array = array(
                'rst' => 2,
                'msj' => 'Error de registro'
            );
            echo json_encode($array);
            break;
        }

        $array = array(
            'rst' => 1,
            'msj' => 'Registro exitoso'
        );
        echo json_encode($array);
        break;
    
    case 'buscar_periodo':
        $data = $periodo->buscar_periodo($_POST["idperiodo"]);
        $array = array(
            'rst' => 1,
            'datos' => $data,
        );
        echo json_encode($array);
        break;
    
    case 'actualizar_periodo':
        $inputs = array(
            ':idperiodo'   => $_POST["idperiodo"],
            ':periodo'     => $_POST["periodo"],
            ':estado'      => $_POST["estado"]
        );
        $response = $periodo->actualizar_periodo($inputs);
        if ($response == false) {
            $array = array(
                'rst' => 2,
                'msj' => 'Error de actualizacion'
            );
            echo json_encode($array);
            break;
        }

        $array = array(
            'rst' => 1,
            'msj' => 'Actualizacion exitoso'
        );
        echo json_encode($array);
        break;

    case 'actualizar_estado_periodo':
        $response = $periodo->actualizar_estado_periodo($_POST["idperiodo"], $_POST["estado"]);
        if ($response == false) {
            $array = array(
                'rst' => 2,
                'msj' => 'Error de actualizacion'
            );
            echo json_encode($array);
            break;
        }

        $array = array(
            'rst' => 1,
            'msj' => 'Actualizacion exitoso'
        );
        echo json_encode($array);
        break;
}