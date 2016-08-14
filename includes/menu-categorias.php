<?php

$catArray = [
  array(
  'title' => 'Abstractas',
  'icon' => 'asterisk'
),
array(
  'title' => 'Animales',
  'icon' => 'cloud'
),
array(
  'title' => 'Bicicletas',
  'icon' => 'pencil'
),
array(
  'title' => 'Comics',
  'icon' => 'glass'
),
array(
  'title' => 'Creatividad',
  'icon' => 'music'
),
array(
  'title' => 'Fantasía',
  'icon' => 'search'
),
array(
  'title' => 'Películas',
  'icon' => 'heart'
),
array(
  'title' => 'Comidas',
  'icon' => 'star'
),
array(
  'title' => 'Diversión',
  'icon' => 'user'
),
array(
  'title' => 'Juegos',
  'icon' => 'off'
),
array(
  'title' => 'Música',
  'icon' => 'signal'
),
array(
  'title' => 'Naturaleza',
  'icon' => 'cog'
),
array(
  'title' => 'Patrones',
  'icon' => 'home'
),
array(
  'title' => 'Deportes',
  'icon' => 'flag'
),
array(
  'title' => 'Tipografía',
  'icon' => 'headphones'
)
];

sort($catArray);

?>

<div class="hidden-xs hidden-sm col-md-2 col-lg-2">
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

<div class="hidden-md hidden-lg col-xs-12 col-sm-12">
  <select class="selectpicker" onchange="location = this.options[this.selectedIndex].value;">
    <option value="Elegí una categoría">Elegí una categoría</option>
    <?php foreach ($catArray as $categoria) { ?>
      <option value="categoryProduct.php?id=<?php echo $categoria['title'] ?>">
        <?php echo $categoria['title'] ?>
      </option>
    <?php } ?>
  </select>
</div>
