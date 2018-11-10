<h1>Jia Ying Lin (301243916) Assignment 3/4</h1>

<h3>Create rectangle</h3>
<form action="./index.php" method="post">
  <label for="width">width</label>
  <input name="width" type='number' id='width' min="1" max="999" required><br>
  <label for="height">height</label>
  <input name="height" type='number' id='height' min="1" max="999" required><br>
  <label for="color">color</label>
  <input name="color" type='text' id='color' required><br>
  <label for="rotateAngle">rotate Angle</label>
  <input name="rotateAngle" type='text' id='rotateAngle' min="1" max="999" required><br>
  <label for="flashyColor">flashy color</label>
  <input name="flashyColor" type='text' id='flashyColor' required><br>
  <input type='submit'>
</form>

<h3>Edit rectangle by entering the id of the rectangle you want to edit</h3>
<form action="./index.php" method="post">
  <input name="method" type="text" value="put" hidden>
  <label for="id">id</label>
  <input name="id" type='number' id='id'  min="1" max="999" required><br>
  <label for="width">width</label>
  <input name="width" type='number' id='width'  min="1" max="999" required><br>
  <label for="height">height</label>
  <input name="height" type='number' id='height'  min="1" max="999" required><br>
  <label for="color">color</label>
  <input name="color" type='text' id='color' required><br>
  <label for="rotateAngle">rotate Angle</label>
  <input name="rotateAngle" type='text' id='rotateAngle' min="1" max="999" required><br>
  <label for="flashyColor">flashy color</label>
  <input name="flashyColor" type='text' id='flashyColor' required>
  <input type='submit'>
</form>
<br>
<br>

<h3>delete rectangle by entering the id of the rectangle you want to delete</h3>
<form action="./index.php" method="post">
  <input name="method" type="text" value="destroy" hidden>
  <label for="id">id</label>
  <input name="id" type='number' id='id' required>
  <input type='submit'>
</form>
<br>
<br>
<h3>
    display all rectangles, refresh the page if you did not see the flashy color
</h3>
<div id='rectangles' style="padding-left: 30px;"><div>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script
src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
crossorigin="anonymous"></script>

<script>
$(document).ready(function(){
    $(function() {
      <?php
        foreach ($allRectangles as $rectangle) {
          ?>
          $('#rectangles').append('<p>ID: <?php echo $rectangle[0]; ?></p> <div style="margin-bottom: 5px;" id="<?php echo $rectangle[0]; ?>"></div>');
          $('#'+<?php echo $rectangle[0]; ?>).width(<?php echo $rectangle[1]; ?>).height(<?php echo $rectangle[2]; ?>).css({'background-color': '<?php echo $rectangle[3]; ?>', 'transform': 'rotate(<?php echo $rectangle[4]; ?>deg)'});
          $('#'+<?php echo $rectangle[0]; ?>).effect("highlight", {color: "<?php echo $rectangle[5]; ?>"}, 2000);
          
        <?php
        }
      ?>
      
  });
});
</script>

