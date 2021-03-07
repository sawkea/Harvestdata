<?php

namespace App\Extraction;

use App\Entity;

class Exraction extends Entity {
    private $id;
    private $date;
    private $nameExtract;
    private $urlExtract;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    public function get_id(){ return $this->id; }
    protected function set_id($id)
    {
        $this->id = $id;
        return $this;
    }

    public function get_date(){ return $this->date; }
    protected function set_date($date)
    {
        $this->date = $date;
        return $this;
    }

    public function get_nameExtract(){ return $this->nameExtract; }
    protected function set_nameExtract($nameExtract)
    {
        $this->nameExtract = $nameExtract;
        return $this;
    }

    public function get_urlExtract(){ return $this->urlExtract; }
    protected function set_urlExtract($urlExtract)
    {
        $this->urlExtract = $urlExtract;
        return $this;
    }
}