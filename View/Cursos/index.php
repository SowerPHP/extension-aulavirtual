<h1>Cursos</h1>
<ul>
<?php
foreach($cursos as $link => &$name) {
    echo '<li>',"\n";
    if (is_numeric($link)) {
        echo '<strong>'.$name['name'].'</strong>',"\n";
        echo '<ul style="margin-top:1em;margin-bottom:2em">',"\n";
        foreach ($name['nav'] as $l => &$c) {
            echo '<li><a href="',$_base,'/cursos',$l,'">',$c['name'],'</a></li>',"\n";
        }
        echo '</ul>',"\n";
    } else {
        echo '<a href="',$_base,'/cursos',$link,'">',$name['name'],'</a>',"\n";
    }
    echo '</li>',"\n";
}
?>
</ul>
