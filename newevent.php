<?php 
include 'header.php';

?>

<!--/*body container*/-->


<form class="form-horizontal" role="form" method="post" action="dataconnect.php">
    <fieldset>

        <!-- Form Name -->
        <legend>Termin eingeben</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="VName">Veranstaltung</label>  
          <div class="col-md-4">
              <input id="VName" name="VName" placeholder="z.B. Familientag" class="form-control input-md" required="" type="text">
              <span class="help-block">hier den Namen der Veranstaltung geben</span>  
          </div>
      </div>

      <!-- Textarea -->
      <div class="form-group">
          <label class="col-md-4 control-label" for="Beschreibung">Beschreibung</label>
          <div class="col-md-4">                     
            <textarea class="form-control" id="Beschreibung" name="Beschreibung"></textarea>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="Datum">Datum</label>  
      <div class="col-md-4">
          <input id="Datum" name="Datum" placeholder="" class="form-control input-md" required="" type="text">
          <span class="help-block">gewünschtes Datum</span>  
      </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
      <label class="col-md-4 control-label" for="ZeitVon">Zeit von</label>  
      <div class="col-md-4">
          <input id="ZeitVon" name="ZeitVon" placeholder="" class="form-control input-md" required="" type="text">
          <span class="help-block">Anfangszeit z.B 10:00</span>  
      </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
      <label class="col-md-4 control-label" for="ZeitBis">Zeit bis</label>  
      <div class="col-md-4">
          <input id="ZeitBis" name="ZeitBis" placeholder="" class="form-control input-md" required="" type="text">
          <span class="help-block">Endezeit z.B. 14:00</span>  
      </div>
  </div>

  <!-- Select Basic -->
  <div class="form-group">
      <label class="col-md-4 control-label" for="RID">benötigter Raum</label>
      <div class="col-md-4">
        <select id="RID" name="RID" class="form-control">
          <option value="1">Männerraum</option>
          <option value="2">Frauenraum</option>
          <option value="3">ganze Moschee</option>
          <option value="4">außerhalb Moschee</option>
      </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Ort">Ort</label>  
  <div class="col-md-4">
      <input id="Ort" name="Ort" placeholder="IKV" class="form-control input-md" required="" type="text">
      <span class="help-block">Ort der Veranstaltung</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="PID">PersonenID</label>  
  <div class="col-md-4">
      <input id="PID" name="PID" placeholder="" class="form-control input-md" type="text">

  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="GName">Gruppenname</label>
  <div class="col-md-4">
    <select id="GName" name="GName" class="form-control">
      <option value="1">Vorstand</option>
      <option value="2">Beirat</option>
  </select>
</div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="StID">Status</label>
  <div class="col-md-4">
    <select id="StID" name="StID" class="form-control">
      <option value="1">in Bearbeitung</option>
      <option value="2">freigegeben</option>
      <option value="3">storniert</option>
  </select>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Sprache">Sprache</label>  
  <div class="col-md-4">
      <input id="Sprache" name="Sprache" placeholder="Deutsch" class="form-control input-md" type="text">
      <span class="help-block">Sprache der Veranstaltung</span>  
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="ZName">Zielgruppe</label>
  <div class="col-md-4">
    <select id="ZName" name="ZName" class="form-control">
      <option value="1">Männer</option>
      <option value="2">Frauen</option>
      <option value="3">Kinder</option>
      <option value="4">Jungs</option>
      <option value="5">Mädchen</option>
      <option value="6">nicht Muslime</option>
      <option value="7">alle</option>
  </select>
</div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="speichern"></label>
  <div class="col-md-4">
    <button id="speichern" name="speichern" class="btn btn-info">Termin reservieren</button>
</div>
</div>

</fieldset>
</form>




<br>



<?php 

        // $this->erstellt_am=$erstellt_am;
        // $this->freigegeben_am=$freigegeben_am;
include 'footer.php';

?>


