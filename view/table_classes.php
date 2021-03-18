<?php
  include('./view/header.php');
  include('./view/navbar.php');
?>

<!-- Περιεχόμενο Σελίδας - Main -->
<main class="main">
  <section class="posts">
    <h2 class="page-title">μαθηματα</h2>
    <table>
      <thead>
        <tr>
          <th>Εξάμηνο</th>
          <th>Μάθημα</th>
          <th>Διδάσκων</th>
          <th>Διδακτικές Μονάδες</th>
          <th>Είδος</th>
        </tr>
      </thead>
      <tbody>
      <!-- Μθήματα Εξάμηνο 1 -->
        <?php foreach ($semester1 as $index => $value){
        $title = $value['title'];
        $points = $value['points'];
        $mandarory = $value['mandatory'] == 1 ? 'Βασικο' : 'Επιλογής';
        $semester = $value['classSemester'];
        $name = $value['name'];
        $lastname = $value['lastName'];
        ?>
        <tr>
          <?php if($index === 0) { ?>
          <td rowspan="<?= count($semester1)?>"><?= $semester ?></td>
          <?php } ?>
          <td class="left"><?= $title ?></td>
          <td class="left"><?= $name ?> <?= $lastname ?></td>
          <td class="width-5"><?= $points ?></td>
          <td class="left width-10"><?= $mandarory ?></td>
        </tr>
        <?php } ?>

        <!-- Μθήματα Εξάμηνο 2 -->
        <?php foreach ($semester2 as $index => $value){
        $title = $value['title'];
        $points = $value['points'];
        $mandarory = $value['mandatory'] == 1 ? 'Βασικο' : 'Επιλογής';
        $semester = $value['classSemester'];
        $name = $value['name'];
        $lastname = $value['lastName'];
        ?>
        <tr>
          <?php if($index === 0) { ?>
          <td rowspan="<?= count($semester2)?>"><?= $semester ?></td>
          <?php } ?>
          <td class="left"><?= $title ?></td>
          <td class="left"><?= $name ?> <?= $lastname ?></td>
          <td class="width-5"><?= $points ?></td>
          <td class="left width-10"><?= $mandarory ?></td>
        </tr>
        <?php } ?>

        <!-- Μθήματα Εξάμηνο 3 -->
        <?php foreach ($semester3 as $index => $value){
        $title = $value['title'];
        $points = $value['points'];
        $mandarory = $value['mandatory'] == 1 ? 'Βασικο' : 'Επιλογής';
        $semester = $value['classSemester'];
        $name = $value['name'];
        $lastname = $value['lastName'];
        ?>
        <tr>
          <?php if($index === 0) { ?>
          <td rowspan="<?= count($semester3) ?>"><?= $semester ?></td>
          <?php } ?>
          <td class="left"><?= $title ?></td>
          <td class="left"><?= $name ?> <?= $lastname ?></td>
          <td class="width-5"><?= $points ?></td>
          <td class="left width-10"><?= $mandarory ?></td>
        </tr>
        <?php } ?>

      </tbody>
    </table>
  </section>
</main>

<?php
  include('./view/footer.php');
?>