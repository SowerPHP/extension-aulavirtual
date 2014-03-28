<h1>Cursos</h1> 
<ul>
<?php
foreach ($cursos as $link => &$info) {
    echo '<li><a href="',$_base,'/cursos',$link,'">',$info['name'],'</a></li>';
}
?>
</ul>
