<?php

function input($dato, $nombre, $attr){
    $ele = "
        <div class=\"input-group\">
            <span class=\"input-group-addon\" id=\"basic-addon1\"></span>
            <input $attr name=\"$nombre\" type=\"text\" autocomplete=\"off\" class=\"form-control\" placeholder=\"$dato\" aria-describedby=\"basic-addon1\">
        </div>
    ";
    echo $ele;
}

function boton($btnid, $nombre, $text, $clase){
    $bot="
    <button name=\"$nombre\" id=\"$btnid\" class=\"$clase\">$text</button>
    ";
    echo $bot;
}
