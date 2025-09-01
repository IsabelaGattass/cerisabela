<?php
class Inicial extends CRUD {
    protected $table = "inicial";
    private $id_inicial;

    private $titulo;

    private $info;

    private $logo;

    private $cores;

    private $banners; 

    public function getId()
    {
        return $this->id_inicial;
    }

    public function setId($id_inicial)
    {
        $this->id_inicial = $id_inicial;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    
    public function getInfo()
    {
        return $this->info;
    }

    public function setInfo($info)
    {
        $this->info = $info;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    public function getCores()
    {
        return $this->cores;
    }

    public function setCores($cores)
    {
        $this->cores = $cores;
    }


    public function getBanners()
    {
        return $this->banners;
    }

    public function setBanners($banners)
    {
        return $this->banners = $banners;
    }

    public function add()
    {

    }

}


?>