<h1>index page</h1>

<form action="./index.php" method="post">
  <input name="width" type='number' id='width'>
  <input name="height" type='number' id='height'>
  <input name="color" type='text' id='color'>
  <input type='submit' id='go'>
</form>
<h3>
    display all rectangles
    <?php echo $test; ?>
</h3>
<br>
<br>
<br>
<br>
<br>

<div id='rectangles'><div>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>


<script>
  $(function() {
  $("#rectangles").width(80).height(50).css('background-color', 'red');
});
</script>

