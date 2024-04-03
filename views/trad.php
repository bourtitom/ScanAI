<?php include("header.php"); ?>


<form id="FormTrad" action="../controllers/Controller.php?todo=Trad" method="post">
<input type='hidden' name='todo' value='Trad'>
  <div class="allContain">
  <div class="containerDrop">
  <select>
    <option selected value="0">Language</option>
    <option value="1">English</option>
    <option value="2">French</option>
    <option value="3">Japanese</option>
    <option value="3">Spanish</option>
    <option value="3">German</option>
  </select>

  </div>

  <div class="containerUpload">
  <div class="input-div">
    <input class="inputtt" name="ImgScan" name="file" type="file">
  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" stroke-linejoin="round" stroke-linecap="round" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke="currentColor" class="icon"><polyline points="16 16 12 12 8 16"></polyline><line y2="21" x2="12" y1="12" x1="12"></line><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path><polyline points="16 16 12 12 8 16"></polyline></svg>
  </div>
  </div>
  </div>
  <button class="btnTrad">Translate</button>
</form>


<?php include("footer.php"); ?>
