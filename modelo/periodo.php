<?php
require_once '../config/local/database.php';

Class Periodo extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function all_periodo()
    {
        $consulta = "select idperiodo, periodo, estado from periodo
                    order by idperiodo desc";
        
        $result = $this->_db->prepare($consulta);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar_periodo($inputs)
    {
        $consulta = "insert into periodo (periodo, estado) values (:periodo,:estado)";
        
        $result = $this->_db->prepare($consulta);
        $result->execute(
            $inputs
        );

        return ($result) ? true : false;
    }

    public function buscar_periodo($idperiodo)
    {
        $consulta = "select idperiodo, periodo, estado from periodo
                    where idperiodo=:idperiodo";
        
        $result = $this->_db->prepare($consulta);
        $result->execute(
            array(
                ":idperiodo" => $idperiodo
            )
        );

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar_periodo($inputs)
    {
        $consulta = "update periodo set periodo=:periodo, estado=:estado
                    where idperiodo=:idperiodo";
        
        $result = $this->_db->prepare($consulta);
        $result->execute(
            $inputs
        );

        return ($result) ? true : false;
    }

    public function actualizar_estado_periodo($idperiodo,$estado)
    {
        $consulta = "update periodo set estado=:estado
                    where idperiodo=:idperiodo";
        
        $result = $this->_db->prepare($consulta);
        $result->execute(
            array(
                ":idperiodo" => $idperiodo,
                ":estado" => $estado
            )
        );

        return ($result) ? true : false;
    }
}