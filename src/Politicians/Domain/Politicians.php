<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 27/01/2019
 * Time: 16:26
 */

namespace App\Politicians\Domain;

use App\Politicians\Infrastructure\AggregateRoot;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(db="dbfullstack" , collection="politicians")
 */
class Politicians implements AggregateRoot
{
    public function __construct(
        $titular,
        $partido,
        $partidoParaFiltro,
        $genero,
        $cargo,
        $cargoParaFiltro,
        $institucion,
        $ccaa,
        $sueldoBase,
        $complementosSueldo,
        $pagasExtrasSueldo,
        $otrasDietasIndemnizac,
        $trieniosSueldo,
        $retribucionAnual,
        $retribucionMensual,
        $observaciones
    ) {
        $this->cargo = $cargo;
        $this->cargoParaFiltro = $cargoParaFiltro;
        $this->ccaa = $ccaa;
        $this->genero = $genero;
        $this->complementosSueldo = $complementosSueldo;
        $this->sueldoBase = $sueldoBase;
        $this->pagasExtrasSueldo = $pagasExtrasSueldo;
        $this->otrasDietasIndemnizac = $otrasDietasIndemnizac;
        $this->partido = $partido;
        $this->titular = $titular;
        $this->partidoParaFiltro = $partidoParaFiltro;
        $this->trieniosSueldo = $trieniosSueldo;
        $this->retribucionAnual = $retribucionAnual;
        $this->retribucionMensual = $retribucionMensual;
        $this->observaciones = $observaciones;
        $this->institucion = $institucion;
    }

    public static function create(
        $titular,
        $partido,
        $partidoParaFiltro,
        $genero,
        $cargo,
        $cargoParaFiltro,
        $institucion,
        $ccaa,
        $sueldoBase,
        $complementosSueldo,
        $pagasExtrasSueldo,
        $otrasDietasIndemnizac,
        $trieniosSueldo,
        $retribucionAnual,
        $retribucionMensual,
        $observaciones
    ) {
        return new self(
            $titular,
            $partido,
            $partidoParaFiltro,
            $genero,
            $cargo,
            $cargoParaFiltro,
            $institucion,
            $ccaa,
            $sueldoBase,
            $complementosSueldo,
            $pagasExtrasSueldo,
            $otrasDietasIndemnizac,
            $trieniosSueldo,
            $retribucionAnual,
            $retribucionMensual,
            $observaciones);
    }
    public  function update(
        $titular,
        $partido,
        $partidoParaFiltro,
        $genero,
        $cargo,
        $cargoParaFiltro,
        $institucion,
        $ccaa,
        $sueldoBase,
        $complementosSueldo,
        $pagasExtrasSueldo,
        $otrasDietasIndemnizac,
        $trieniosSueldo,
        $retribucionAnual,
        $retribucionMensual,
        $observaciones
    ) {
       $this->titular = $titular===null ? $this->titular : $titular;
       $this->partido = $partido===null ? $this->partido : $partido;
       $this->partidoParaFiltro = $partidoParaFiltro===null ? $this->partidoParaFiltro : $partidoParaFiltro;
       $this->genero = $genero===null ? $this->genero : $genero;
       $this->cargo = $cargo===null ? $this->cargo : $cargo;
       $this->cargoParaFiltro = $cargoParaFiltro===null ? $this->cargoParaFiltro : $cargoParaFiltro;
       $this->institucion = $institucion===null ? $this->institucion : $institucion;
       $this->ccaa = $ccaa===null ? $this->titular : $ccaa;
       $this->sueldoBase = $sueldoBase===null ? $this->sueldoBase : $sueldoBase;
       $this->complementosSueldo = $complementosSueldo===null ? $this->complementosSueldo : $complementosSueldo;
       $this->pagasExtrasSueldo = $pagasExtrasSueldo===null ? $this->pagasExtrasSueldo : $pagasExtrasSueldo;
       $this->otrasDietasIndemnizac = $otrasDietasIndemnizac===null ? $this->otrasDietasIndemnizac : $otrasDietasIndemnizac;
       $this->trieniosSueldo = $trieniosSueldo===null ? $this->trieniosSueldo : $trieniosSueldo;
       $this->retribucionAnual = $retribucionAnual===null ? $this->retribucionAnual : $retribucionAnual;
       $this->retribucionMensual = $retribucionMensual===null ? $this->retribucionMensual : $retribucionMensual;
       $this->observaciones = $observaciones===null ? $this->observaciones : $observaciones;
       return $this;
    }
    /**
     * @MongoDB\Id
     */
    private $id;

    /**
     * @MongoDB\Field(type="string", name="TITULAR")
     */
    private $titular;

    /**
     * @MongoDB\Field(type="string", name="PARTIDO")
     */
    private $partido;

    /**
     * @MongoDB\Field(type="string", name="PARTIDO_PARA_FILTRO")
     */
    private $partidoParaFiltro;
    /**
     * @MongoDB\Field(type="string", name="GENERO")
     */
    private $genero;

    /**
     * @MongoDB\Field(type="string", name="CARGO_PARA_FILTRO")
     */
    private $cargoParaFiltro;
    /**
     * @MongoDB\Field(type="string", name="CARGO")
     */
    private $cargo;

    /**
     * @MongoDB\Field(type="string", name="INSTITUCION")
     */
    private $institucion;


    /**
     * @MongoDB\Field(type="string", name="CCAA")
     */
    private $ccaa;
    /**
     * @MongoDB\Field(type="float", name="SUELDOBASE_SUELDO")
     */
    private $sueldoBase;

    /**
     * @MongoDB\Field(type="string", name="COMPLEMENTOS_SUELDO")
     */
    private $complementosSueldo;
    /**
     * @MongoDB\Field(type="string", name="PAGASEXTRA_SUELDO")
     */
    private $pagasExtrasSueldo;
    /**
     * @MongoDB\Field(type="float" , name="OTRASDIETASEINDEMNIZACIONES_SUELDO")
     */
    private $otrasDietasIndemnizac;

    /**
     * @MongoDB\Field(type="string", name="TRIENIOS_SUELDO")
     */
    private $trieniosSueldo;

    /**
     * @MongoDB\Field(type="float" , name="RETRIBUCIONMENSUAL")
     */
    private $retribucionMensual;
    /**
     * @MongoDB\Field(type="float" , name="RETRIBUCIONANUAL")
     */
    private $retribucionAnual;

    /**
     * @MongoDB\Field(type="string" , name="OBSERVACIONES")
     */
    private $observaciones;


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
    public function getPartidoParaFiltro()
    {
        return $this->partidoParaFiltro;
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
    public function getCargoParaFiltro()
    {
        return $this->cargoParaFiltro;
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
    public function getComplementosSueldo()
    {
        return $this->complementosSueldo;
    }

    /**
     * @return mixed
     */
    public function getPagasExtrasSueldo()
    {
        return $this->pagasExtrasSueldo;
    }

    /**
     * @return mixed
     */
    public function getOtrasDietasIndemnizac()
    {
        return $this->otrasDietasIndemnizac;
    }

    /**
     * @return mixed
     */
    public function getTrieniosSueldo()
    {
        return $this->trieniosSueldo;
    }

    /**
     * @return mixed
     */
    public function getRetribucionMensual()
    {
        return $this->retribucionMensual;
    }

    /**
     * @return mixed
     */
    public function getRetribucionAnual()
    {
        return $this->retribucionAnual;
    }

    /**
     * @return mixed
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }


}