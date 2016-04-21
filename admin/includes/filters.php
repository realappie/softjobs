<?php
  $branches = $branche->get_branche();
 ?>

<div class="filters">
  <div class="search">
    <input type="text" name="search" value="" placeholder="Zoek voor vacatures">
    <select class="form-control">
      <?php
        foreach($branches as $branche) {
          echo '
                <option value="'.$branche['brancheID'].'">'.$branche['branchenaam'].'</option>
          ';
        }
       ?>
    </select>
    <button type="submit" name="submit" class="custombutton">Zoek vacature</button>
  </div>
</div>
