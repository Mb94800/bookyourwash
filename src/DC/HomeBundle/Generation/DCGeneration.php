<?php
// src/OC/PlatformBundle/Antispam/OCAntispam.php

namespace DC\HomeBundle\Generation;

class DCGeneration
{
        /**
         * Génere un code aléatoire de taille $car
         *
         * @param int $car
         * @return string
         */

        function random($car) {
            $string = "";
            $chaine = "abcdefghijklmnpqrstuvwxy";
            srand((double)microtime()*1000000);
            for($i=0; $i<$car; $i++) {
                $string .= $chaine[rand()%strlen($chaine)];
            }
            return $string;
        }


}