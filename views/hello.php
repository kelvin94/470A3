<h1>index page</h1>

<h3>Create rectangle</h3>
<form action="./index.php" method="post">
  <label for="width">width</label>
  <input name="width" type='number' id='width'>
  <label for="height">height</label>
  <input name="height" type='number' id='height'>
  <label for="color">color</label>
  <input name="color" type='text' id='color'>
  <input type='submit'>
</form>

<h3>Edit rectangle by entering the id of the rectangle you want to edit</h3>
<form action="./index.php" method="put">
  <input name="method" type="text" value="put" hidden>
  <label for="id">id</label>
  <input name="id" type='number' id='id'>
  <label for="width">width</label>
  <input name="width" type='number' id='width'>
  <label for="height">height</label>
  <input name="height" type='number' id='height'>
  <label for="color">color</label>
  <input name="color" type='text' id='color'>
  <input type='submit'>
</form>
<br>
<br>
<h3>
    display all rectangles
</h3>
<div id='rectangles'><div>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>


<script>
$(document).ready(function(){
    $(function() {
      <?php
        $counter = 1;
        foreach ($allRectangles as $rectangle) {
          ?>
          $('#rectangles').append('<p>ID: <?php echo $counter ?></p> <div style="margin-bottom: 5px;" id="<?php echo $counter ?>"></div>');
          $('#'+<?php echo $counter;?>).width(<?php echo $rectangle[1]; ?>).height(<?php echo $rectangle[2]; ?>).css('background-color', '<?php echo $rectangle[3]; ?>');
          
        <?php
         $counter++;
        }
      ?>
      
  });
});
</script>

