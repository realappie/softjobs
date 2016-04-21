<div class="filters">
  <div class="dienstverband filterfield">
    <h2>Diensverband</h2>
    <div class="filtergroup">
      <div class="form-group">
        <label><input type="checkbox" name='dienstverband' value='fulltime'>Fulltime</label>
        <label><input type="checkbox" name='dienstverband' value='parttime'>Parttime</label>
        <label><input type="checkbox" name='dienstverband' value='weekendwerk'>Weekendwerk</label>
        <label><input type="checkbox" name='dienstverband' value='Vakantiewerk'>Vakantiewerk</label>
      </div>
    </div>
  </div>
  <div class="sector filterfield">
    <h2>Sector</h2>
    <div class="filtergroup">
      <div class="form-group">
        <?php
          $get_branches = $branche->get_branche();
          foreach($get_branches as $get_branche) {
            echo '<label><input type="checkbox" name="categorie" value="'.$get_branche['brancheID'].'">'.$get_branche['branchenaam'].'</label>';
          }
         ?>
      </div>
    </div>
  </div>
  <div class="opleidingsniveau filterfield">
    <h2>Opleidingsniveau</h2>
    <div class="filtergroup">
      <div class="form-group">
        <label><input type="checkbox" name='opleiding' value='VMBO'>VMBO</label>
        <label><input type="checkbox" name='opleiding' value='MBO'>MBO</label>
        <label><input type="checkbox" name='opleiding' value='HBO'>HBO</label>
        <label><input type="checkbox" name='opleiding' value='WO'>WO</label>
      </div>
    </div>
  </div>
</div>
