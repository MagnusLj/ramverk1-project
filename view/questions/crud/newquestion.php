<?php

namespace Anax\View;

?>




<form method="post">
    <h1>Skriv ny fråga</h1>
    <fieldset>
    <legend>Skapa ny</legend>

    <p>
        <label>Titel:<br>
        <input type="text" name="questiontitle" default="En titel"/>
        </label>
    </p>

    <textarea name="questiontext" rows="4" cols="50"></textarea>




    <!-- </fieldset>

    <fieldset> -->
    <legend>Tags</legend>
<input type="checkbox" name="tags[]" value="1"> Geografi<br>
<input type="checkbox" name="tags[]" value="2"> Historia<br>
<input type="checkbox" name="tags[]" value="3"> Kultur/Litteratur<br>
<input type="checkbox" name="tags[]" value="4"> Natur/Vetenskap<br>
<input type="checkbox" name="tags[]" value="5"> Sport/Fritid<br>
<input type="checkbox" name="tags[]" value="6"> Underhållning<br>
<p>
    <button type="submit">Skapa</button>
    <!-- <button type="reset"><i class="fa fa-undo" aria-hidden="true"></i> Reset</button> -->
</p>
</fieldset>



</form>
