<?php
$style = '';

if($top->bg_color != ''){
$style = 'background-color:'.$top->bg_color;
}
?>
<div style="{!! $style !!}">
    <h1>Hello, world!</h1>
</div>