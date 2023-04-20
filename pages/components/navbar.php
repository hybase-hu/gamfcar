<?php 
  if (session_status() == PHP_SESSION_NONE) {session_start();}
  include_once "./config/config.inc.php";
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary p-4" data-bs-theme="dark">
<div class="container-fluid">
  <a class="navbar-brand" href="/gamfcar/"><img src="/gamfcar/resource/img/site/logo_wide.png" style="width:120px;object-fit:cover;" /></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">


      <?php
        foreach ($menus_from_config as $menu) {
          echo '<li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/gamfcar/?page='.$menu["url"].'">'.$menu["title"].'</a>
                </li>';
        }
      ?>
      


      <!--
      <li class="nav-item">
        <a class="nav-link" href="/gamfcar/index.php?page=opinions">Vélemények</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/gamfcar/index.php?page=contact">Elérhetőség / Kapcsolat</a>
      </li>
      -->
    </ul>
    <ul class="navbar-nav">
      <?php

      if (isset($_SESSION["loggedin"])){
        if ($_SESSION["loggedin"] == true) {
          echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="/gamfcar/index.php?page=logout">'
            . $_SESSION["full_name"] . " ("  . $_SESSION["username"] .
            ') Kijelentkezés</a></li>';
        }
      }
      else {
        echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="/gamfcar/index.php?page=login">Belépés</a></li>';
      }
      ?>
      
    </ul>
  </div>
  

</div>
</nav>

