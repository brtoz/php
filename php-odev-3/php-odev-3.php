<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php odev 3</title>
  </head>
  <body>
    <form method='POST'>
      <input placeholder="Sayı Gir" type='number' name='num'/>
      <button type='submit'>Hesapla</button>
    </form>
  </body>
</html>

<?php
  $num = $_POST['num'];

  function checkNum($num){
    $message = '';

    $num == '' ? $message = "Boş bir değer veremezsiniz. Lütfen bir sayı girin!" : (
    $num % 3 == 0 ? $message = "$num sayısının 3'e bölümünün sonucu: " . $num/3 : 
    (($num+1) % 3 == 0 ? $message = "$num sayısı 3'e bölünemez. 3'e bölünebilecek en yakın sayı: " . $num + 1 :
      $message = "$num sayısı 3'e bölünemez. 3'e bölünebilecek en yakın sayı: " . $num - 1)
    );
    
    return $message;
  }

  echo checkNum($num);
?>