<?php
  if (isset($_GET["source"])) {
    highlight_file("level1.php");
    die();
  }

  function str_contains(string $haystack, string $needle) {
    return empty($needle) || strpos($haystack, $needle) !== false;
  }

  function is_forbidden(string $blacklist, string $str) {
    foreach (explode("|", $blacklist) as $word) {
      if (str_contains($str, $word)) {
        return true;
      }
    }

    return false;
  }

  function fill_table($db) {
    $produit = "";
    if (isset($_GET["product"])) {
      $produit = $_GET["product"];
      $produit = str_replace("\0", "", $produit);

    }

    $blacklist = "union|UNION|select|SELECT|=";

    if (is_forbidden($blacklist, $produit)) {
      $produit = "";
    }
    $sql = "SELECT * FROM inventory WHERE product LIKE '".$produit."%' AND online = 'Yes'";
    $result = $db->query($sql);
    
    $data = array();

    while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
      array_push($data, $res);
    }

    foreach($data as $row) {
      echo "<tr>
      <td>" . $row["id"] . "</td>
      <td>" . $row["product"] . "</td>
      <td>" . $row["online"] . "</td>
      </tr>";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <?php
    include('head.php');
  ?>
<body>

  <!-- Navigation -->
  <?php
    include('nav.php');
    $db = new SQLite3('/db/db1.sqlite');
  ?>

  <!-- Page Content -->
  <div class="container">
    <div class="mb-2 text-center">
      <h1 class="mt-4">Level 1</h1>
    </div>

    <div class="mb-2">
      <p>Est-il possible de contourner le méchanisme d'insécurité suivant? Le flag se trouve dans la table "inventory".</p>
      <p><a href="/level1.php?source=1">Cliquez ici pour voir la source</a></p>
    </div>

    <div class="mb-2">
      <form>
        <div class="form-group">
          <label for="productInput">Product</label>
          <input type="text" class="form-control" name="product" id="productInput">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

    <div class="mb-2">
      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Available Online?</th>
          </tr>
        </thead>
        <?php fill_table($db); ?>
      </table>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>