<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- O τίτλος της σελίδας -->
    <title>ΠΑΝΕΠΙΣΤΗΜΙΟ ΘΕΣΣΑΛΟΝΙΚΗΣ</title>
    <link rel="stylesheet" href="view/styles/main.css"/>
  </head>
  <body>
    <!-- Επικεφαλίδα - Header -->
    <header class="header">
      <a href=".">
        <img
          class="header__logo"
          src="assets/images/logo.svg"
          alt="logo university thessaloniki"
        />
      </a>
      <div class="header__title">
        <h2 class="title">Ηλεκτρονικη Γραμματεια</h2>
        <h2 class="title">Μεταπτυχιακου Προγραμματος Σπουδων</h2>
        <h2 class="title">Δημοσια Ιστορια</h2>
        <h1 class="title">Πανεπιστημιο Θεσσαλονικης</h1>
      </div>
      <?php if($name){ ?>
      <?= $name ?>
      <?= $role ?>
      <a href="./logout.php" class="btn btn-outline">εξοδος</a>
      <?php } else{ ?>
      <a href="./login.php" class="btn btn-outline">εισοδος</a>
      <?php } ?>
    </header>
