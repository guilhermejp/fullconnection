<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('fpdf/fpdi.php');

class Concat_pdf extends FPDI
{
    public $files = array();

    public function setFiles($files)
    {
        $this->files = $files;
    }

    public function concat()
    {
        foreach($this->files AS $file) {
            $pageCount = $this->setSourceFile($file);
            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                $pageId = $this->ImportPage($pageNo);
                $s = $this->getTemplatesize($pageId);
                $this->AddPage('P', $s);
                $this->useTemplate($pageId);
            }
        }
    }
}