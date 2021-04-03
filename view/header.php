<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- O τίτλος της σελίδας -->
    <title>ΠΑΝΕΠΙΣΤΗΜΙΟ ΘΕΣΣΑΛΟΝΙΚΗΣ</title>
    <!-- Font awsome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
      integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ="
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="view/styles/main.css"/>
    <script src="./view/js/index.js"></script>
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
        <div class="header__user">
          <div class="header__name">
            <img class="header__image" src="./assets/images/<?= $avatar ?>" alt="<?= $lastname ?>"/>
            <p><?= $lastname ?> <?= $name ?></p>
          </div>
          <div class="header__buttons">
            <a href="./login.php" class="btn-light">dashboard</a>
            <a href="./logout.php" class="btn-light exit">εξοδος</a>
          </div>

      <?php } else{ ?>
      </div>
      <a href="./login.php" class="btn btn-outline">εισοδος</a>
      <?php } ?>
    </header>
