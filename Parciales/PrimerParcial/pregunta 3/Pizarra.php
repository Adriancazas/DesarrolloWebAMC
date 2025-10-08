<?php
class Pizarra {
    public $palabra;
    public $color;
    public $color_fondo;
    
    public function __construct($palabra, $color, $color_fondo) {
        $this->palabra = $palabra;
        $this->color = $color;
        $this->color_fondo = $color_fondo;
    }
    //g l ta
    public function diagonal() {
        $longitud = strlen($this->palabra);
        $html = "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse;'>";
        
        for ($i = 0; $i < $longitud; $i++) {
            $html .= "<tr>";
            
        //ve si celd v  dia
            for ($j = 0; $j < $i; $j++) {
                $html .= "<td width='40' height='40'></td>";
            }
            
          //verif s vaci 
            $letra = $this->palabra[$i]; //obt la letr en pos I
            $html .= "<td width='40' height='40' style='background-color: {$this->color_fondo}; color: {$this->color}; text-align: center; font-weight: bold; font-size: 18px;'>{$letra}</td>";
            
           //celd vac d de la let
            for ($j = $i + 1; $j < $longitud; $j++) {
                $html .= "<td width='40' height='40'></td>";
            }
            
            $html .= "</tr>";//cie
        }
        
        $html .= "</table>";
        return $html;
    }
}
?>