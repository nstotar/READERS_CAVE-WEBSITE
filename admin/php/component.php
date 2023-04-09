<?php

function inputElement($icon, $placeholder, $name, $value)
{
    $ele = "
        
        <div class=\"input-group mb-2\">
                        <div class=\"input-group-prepend\">
                            <div class=\"input-group-text bg-warning\">$icon</div>
                        </div>
                        <input type=\"text\" name='$name' value='$value' autocomplete=\"off\" placeholder='$placeholder' class=\"form-control\" id=\"inlineFormInputGroup\" placeholder=\"Username\">
                    </div>
    
    ";
    echo $ele;
}
function inputnum($icon, $placeholder, $name, $value)
{
    $ele = "
        
        <div class=\"input-group mb-2\">
                        <div class=\"input-group-prepend\">
                            <div class=\"input-group-text bg-warning\">$icon</div>
                        </div>
                        <input type=\"number\" name='$name' value='$value' autocomplete=\"off\" placeholder='$placeholder' class=\"form-control\" id=\"inlineFormInputGroup\" placeholder=\"Username\">
                    </div>
    
    ";
    echo $ele;
}

function buttonElement($btnid, $styleclass, $text, $name, $attr)
{
    $btn = "
        <button name='$name' '$attr' class='$styleclass' id='$btnid'>$text</button>
    ";
    echo $btn;
}
function fileIMG($icon, $name, $placeholder, $value)
{
    $file = "
   <div class=\"input-group mb-2\">
   <div class=\"input-group-prepend\">
       <div class=\"input-group-text bg-warning\">$icon</div>
   </div>
   <input type=\"file\" name='$name' value='$value' placeholder='$placeholder' class=\"form-control\" id=\"inlineFormInputGroup\" placeholder=\"uploade Image\">

   </div>
";
    echo $file;
}
