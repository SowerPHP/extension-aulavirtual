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
 * @file @core.php
 * Configuración de la extensión aulavirtual
 * @version 2014-04-10
 */

// Tema de la página (diseño)
\sowerphp\core\Configure::write('page.layout', 'sinorca');

// Textos de la página
\SowerPHP\core\Configure::write('page.header.title', 'Cursos NOMBRE');
\SowerPHP\core\Configure::write('page.body.title', 'Cursos NOMBRE');

// about me
\sowerphp\core\Configure::write('page.aboutme', 'Soy...');

// Menú principal del sitio web
\SowerPHP\core\Configure::write('nav.website', array(
    '/inicio'=>'Inicio',
    '/cursos'=>array('name'=>'Cursos', 'title'=>'', 'nav'=>array(
        '/curso1'=>array('name'=>'Curso 1', 'title'=>'', 'nav'=>array(
        )),
        '/curso2'=>array('name'=>'Curso 2', 'title'=>'', 'nav'=>array(
        )),
    )),
//    '/horario'=>'Horario',
    '/documentos'=>'Documentos',
    '/contacto'=>'Contacto',
));

// Enlaces útiles (parte superior)
\sowerphp\core\Configure::write('page.header.useful_links', array(
    'left' => array(
//        'http://es.wikipedia.org' => 'Wikipedia'
    ),
    'right' => array(
    ),
));

// banners
\sowerphp\core\Configure::write('banners.right', array(
    // índice es la url del enlace, valor es la url de la imagen (banner)
));
\sowerphp\core\Configure::write('banners.google.ads', array(
    'client' => '',
    'ads' => array(
        '160x600' => '',
        '468x60' => '',
    ),
));

// Módulos que usará esta aplicación
\sowerphp\core\Module::uses(array(
    'Exportar',
));
