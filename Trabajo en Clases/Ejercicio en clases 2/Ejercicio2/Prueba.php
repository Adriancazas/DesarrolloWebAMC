<?php
class Prueba {
    public $item;
    public $color;
    public $color_fondo;
    public $imagen;

    public function __construct($item, $color, $color_fondo, $imagen) {
        $this->item = $item;
        $this->color = $color;
        $this->color_fondo = $color_fondo;
        $this->imagen = $imagen;
    }

    
    public function cuadrado() {
        echo "<div class='cuadrado' style='color:{$this->color}; background:{$this->color_fondo};'>
                <p>{$this->item}</p>
                <img src='imagenes/{$this->imagen}' alt='{$this->item}'>
              </div>";
    }

    
    public function diagonal() {
        $palabra = strtoupper($this->item);
        echo "<table class='diagonal'>";
        $i = 0;
        foreach (str_split($palabra) as $letra) {
            echo "<tr>";
            for ($j = 0; $j < $i; $j++) {
                echo "<td></td>";
            }
            echo "<td style='color:{$this->color}; background:{$this->color_fondo};'>{$letra}</td>";
            echo "</tr>";
            $i++;
        }
        echo "</table>";
    }
}
?>
