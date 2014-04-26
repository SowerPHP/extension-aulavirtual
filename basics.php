<?php

/**
 * SowerPHP: Minimalist Framework for PHP
 * Copyright (C) SowerPHP (http://sowerphp.org)
 *
 * Este programa es software libre: usted puede redistribuirlo y/o
 * modificarlo bajo los términos de la Licencia Pública General GNU
 * publicada por la Fundación para el Software Libre, ya sea la versión
 * 3 de la Licencia, o (a su elección) cualquier versión posterior de la
 * misma.
 *
 * Este programa se distribuye con la esperanza de que sea útil, pero
 * SIN GARANTÍA ALGUNA; ni siquiera la garantía implícita
 * MERCANTIL o de APTITUD PARA UN PROPÓSITO DETERMINADO.
 * Consulte los detalles de la Licencia Pública General GNU para obtener
 * una información más detallada.
 *
 * Debería haber recibido una copia de la Licencia Pública General GNU
 * junto a este programa.
 * En caso contrario, consulte <http://www.gnu.org/licenses/gpl.html>.
 */

/**
 * @file basics.php
 * Funciones de la extensión aulavirtual
 * @version 2014-04-26
 */

/**
 * Función para crear los enlaces para la sección "enlaces útiles" en el layout
 * de la página
 * @param linksName Links que se están renderizando
 * @return Retorna un string con los enlaces
 * @author Esteban De La Fuente Rubio, DeLaF (esteban[at]delaf.cl)
 * @version 2014-03-25
 */
function header_useful_links ($linksName)
{
    $useful_links = SowerPHP\core\Configure::read($linksName);
    if (is_array($useful_links) && count($useful_links)) {
        $links = array();
        foreach ($useful_links as $link => &$name) {
            $links[] = '<a href="'.$link.'">'.$name.'</a>';
        }
        return implode(' | ', $links)."\n";
    }
    return "\n";
}

/**
 * Función para crear los enlaces para los cursos y sus submenús
 * @param link Enlace del curso (identificador)
 * @param name Arreglo con los datos del curso
 * @param curso Curso actual que se ve
 * @param nav Submenú del curso
 * @author Esteban De La Fuente Rubio, DeLaF (esteban[at]delaf.cl)
 * @version 2014-04-26
 */
function nav_cursos ($link, $name, $curso, $nav = array())
{
    $l = _BASE.'/cursos'.$link;
    echo '<li>',"\n";
    if ($link == $curso) {
        echo '<a href="',$l,'" title="',$name['title'],'" style="padding:0"><span class="thisPage">&raquo; ',$name['name'],'</span></a>',"\n";
        if(!empty($nav)) {
            echo '<ul>',"\n";
            foreach ($nav as $link => &$name) {
                $l = _BASE.'/cursos'.$curso.$link;
                if(strpos(_REQUEST, '/cursos'.$curso.$link)===0) echo '<li><a href="',$l,'" style="padding:0"><span class="thisSubPage">&raquo; ',$name,'</span></a></li>',"\n";
                else echo '<li><a href="',$l,'">&rsaquo; ',$name,'</a></li>',"\n";
            }
            echo '</ul>',"\n";
        }
    } else {
        echo '<a href="',$l,'" title="',$name['title'],'">&rsaquo; ',$name['name'],'</a>',"\n";
    }
    echo '</li>',"\n";
}
