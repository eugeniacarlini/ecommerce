<div class="col-xs-12 col-sm-12 col-md-2 hidden-xs hidden-sm visible-md visible-lg">
  <aside class="navbar-categories">
    <ul>
      <?php foreach ($catArray as $categoria) { ?>
        <li>
          <a class="category" href="categoryProduct.php?id=<?php echo $categoria['title'] ?>" title="<?php echo $categoria['title'] ?>">
            <span class='glyphicon glyphicon-<?php echo $categoria['icon'] ?>' aria-hidden="true"></span>
            <?php echo $categoria['title'] ?>
          </a>
        </li>
      <?php } ?>
    </ul>
  </aside>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 visible-xs visible-sm hidden-md hidden-lg">
  <select class="selectpicker" onchange="location = this.options[this.selectedIndex].value;">
    <?php foreach ($catArray as $categoria) { ?>
      <option selected="<?php echo $categoria ?>" value="categoryProduct.php?id=<?php echo $categoria['title'] ?>">
        <?php echo $categoria['title'] ?>
      </option>
    <?php } ?>
  </select>
</div>
