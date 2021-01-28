<!doctype html>
<!-- Created By Guna Dermawan -->
<!-- find me on github : github.com/gunadermawan -->
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>stemming PHP By Guna Dermawan  </title>
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Tugas Final STKI A11.4507</h1>
        <p class="lead">1. Guna Dermawan - A11.2018.11538 <br>
        2. M.Izzul Fahmi - A11.2018.11055<br>
        3. Sania Nastasya Viora - A11.2018.11565
        kelomok : A11.4507 <br>
        Tugas STKI stemming dengan PHP<br></p>
      </div>
    </div>
    <div class="container">
      <div class="alert alert-primary" role="alert">
      => Before



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->

<?php
//fungsi preproses menerima teks dan menerapkan beberapa tugas awal
//fase indexing dokumen teks
function preproses($teks) {

    //1. mengubah ke huruf kecil
    $teks = strtolower(trim($teks));
    //menghilangkan tanda baca
    $teks = str_replace("'", " ", $teks);

    $teks = str_replace("-", " ", $teks);

    $teks = str_replace(")", " ", $teks);

    $teks = str_replace("(", " ", $teks);

    $teks = str_replace("\"", " ", $teks);

    $teks = str_replace("/", " ", $teks);

    $teks = str_replace("=", " ", $teks);

    $teks = str_replace(".", " ", $teks);

    $teks = str_replace(",", " ", $teks);

    $teks = str_replace(":", " ", $teks);

    $teks = str_replace(";", " ", $teks);

    $teks = str_replace("!", " ", $teks);

    $teks = str_replace("?", " ", $teks);

    //2. hapus stoplist
    //stopword diletakkan di array untuk memudahkan penggunaan
    $astoplist = array ("yang", "juga", "dari", "dia", "kami", "kamu", "ini", "itu",
                               "atau", "dan", "tersebut", "pada", "dengan", "adalah", "yaitu");

    foreach ($astoplist as $i => $value) {
        $teks = str_replace($astoplist[$i], "", $teks);
    }
    //3. terapkan stemming
    $astemlist  = array("berada","ada","dahulu","dulu","berkeinginan","ingin","menjadi","jadi","memetakan","petakan","memecahkan","pecahkan" );
    // ketika saya berada dimasa kecil dahulu,saya berkeinginan untuk menjadi seorang programmer yang bisa memetakan dan memecahkan masalah di masyarakat luas
    //perhatikan cara mengubah suatu term ke bentuk stemnya
    for ($i=0; $i<count($astemlist); $i = $i +2) {
        //ganti term (jika ditemukan term pada index ganjil) dengan stem pada index genap ($i=1)
        $teks = str_replace($astemlist[$i], $astemlist[$i+1], $teks);
    }
    //hilangkan ruang kosong di awal & akhir teks
    $teks = trim($teks);
    return $teks;
} //end function
    //sampel penggunaan stemming pada PHP
    $berita = "ketika saya berada dimasa kecil dahulu,saya berkeinginan untuk menjadi seorang programmer yang bisa memetakan dan memecahkan masalah di masyarakat luas!";
    print("<hr/> <h1>Sebelum pre-processing : </h1><br/>" . $berita . "<hr/></div>");
?>
      <div class="alert alert-success" role="alert">
        => After
        <hr>
        <?php
          $berita = preproses($berita);
          print("<h1>Setelah pre-processing : </h1><br/>" . $berita . "<hr />");
        ?>
      </div>
    </div>
    <footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Guna Dermawan <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
  </body>
</html>
