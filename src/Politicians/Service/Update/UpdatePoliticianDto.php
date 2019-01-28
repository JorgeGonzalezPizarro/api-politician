<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 27/01/2019
 * Time: 19:15
 */

namespace App\Politicians\Service\Update;


use MongoDB\BSON\ObjectId;

class UpdatePoliticianDto
{
    private $id;
    private $titular;
    private $partido;
    private $partidoFiltro;
    private $genero;
    private $cargoFiltro;
    private $cargo;
    private $institucion;
    private $ccaa;
    private $sueldoBase;
    private $complementoSueldo;
    private $pagasExtra;
    private $dietas;
    private $trienios;
    private $retMesual;
    private $retAnual;
    private $observaciones;

    public function __construct(
        $id,
        $titular,
        $partido,
        $partidoFiltro,
        $genero,
        $cargoFiltro,
        $cargo,
        $institucion,
        $ccaa,
        $sueldoBase,
        $complementoSueldo,
        $pagasExtra,
        $dietas,
        $trienios,
        $retMensual,
        $retAnual,
        $observaciones
    )
    {

        $this->id = $id;
        $this->sueldoBase=$sueldoBase;
        $this->cargo = $cargo;
        $this->cargoFiltro = $cargoFiltro;
        $this->partidoFiltro=$partidoFiltro;
        $this->complementoSueldo = $complementoSueldo;
        $this->titular = $titular;
        $this->pagasExtra = $pagasExtra;
        $this->dietas = $dietas;
        $this->genero = $genero;
        $this->ccaa = $ccaa;
        $this->partido=$partido;
        $this->institucion = $institucion;
        $this->retAnual = $retAnual;
        $this->retMesual = $retMensual;
        $this->observaciones = $observaciones;
        $this->trienios = $trienios;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitular()
    {
        return $this->titular;
    }

    /**
     * @return mixed
     */
    public function getPartido()
    {
        return $this->partido;
    }

    /**
     * @return mixed
     */
    public function getPartidoFiltro()
    {
        return $this->partidoFiltro;
    }

    /**
     * @return mixed
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * @return mixed
     */
    public function getCargoFiltro()
    {
        return $this->cargoFiltro;
    }

    /**
     * @return mixed
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @return mixed
     */
    public function getInstitucion()
    {
        return $this->institucion;
    }

    /**
     * @return mixed
     */
    public function getCcaa()
    {
        return $this->ccaa;
    }

    /**
     * @return mixed
     */
    public function getSueldoBase()
    {
        return $this->sueldoBase;
    }

    /**
     * @return mixed
     */
    public function getComplementoSueldo()
    {
        return $this->complementoSueldo;
    }

    /**
     * @return mixed
     */
    public function getPagasExtra()
    {
        return $this->pagasExtra;
    }

    /**
     * @return mixed
     */
    public function getDietas()
    {
        return $this->dietas;
    }

    /**
     * @return mixed
     */
    public function getTrienios()
    {
        return $this->trienios;
    }

    /**
     * @return mixed
     */
    public function getRetMesual()
    {
        return $this->retMesual;
    }

    /**
     * @return mixed
     */
    public function getRetAnual()
    {
        return $this->retAnual;
    }

    /**
     * @return mixed
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }
}