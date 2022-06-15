<?php

if (isset($_POST['search'])) {
  $url = $_SERVER['HTTP_HOST'].'/cluster-api';
  $search = str_replace(' ', '%20', $_POST['search']);
  $request_url = $url . '/find/' . $search;

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $request_url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $response = curl_exec($curl);
  $result = json_decode($response);
  curl_close($curl);
} else {
  header("Location: index.php");
  exit;
}

?>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="author" content="colorlib.com">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,800" rel="stylesheet" />
  <link href="css/main.css" rel="stylesheet" />
  <style type="text/css">
    table, td, th {
      border: 1px solid;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }
  </style>
</head>
<body>
  <div class="s006">
    <div style="background-color: white; padding: 2rem; border-radius: 1rem; width: 50%; text-align: center;">
      <div style="text-align: left; font-size: 1rem; margin-bottom: 2rem;">Nama : <?= $result{0}->nama ?></div>
      <table style="text-align: center;">
        <tr>
          <th>Mata Pelajaran</th>
          <th>Nilai</th>
        </tr>
        <?php foreach ($result as $key) { ?>
          <tr>
            <td><?= $key->mapel ?></td>
            <td><?= $key->score ?></td>
          </tr> 
        <?php } ?>
      </table>
    </div>
  </div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
