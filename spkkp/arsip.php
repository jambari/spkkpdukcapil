<?php
  include('config.php');
  include('fungsi.php');
  include('header.php');
 ?>

 <br><br><br><br>
 <section class="w3-content">
   <h3>Daftar Hasil Penilaian yang telah disetujui dan diarsipkan oleh Kepala Dinas</h3>
   <table class="w3-table-all" >
       <thead>
         <th>No</th>
         <th>Nama</th>
         <th>Nilai</th>
         <th>Tahun</th>
       </thead>
   <tbody>



   <?php

   $query = "SELECT id_alternatif,nilai, tahun FROM arsip";
   $result = mysqli_query($koneksi, $query);
   $i = 0;
   while ($row = mysqli_fetch_array($result)) {
     $i++;
     ?>
     <tr>
       <td> <?php echo $i; ?> </td>
       <td> <?php
          echo ucfirst(getNamaa($row['id_alternatif']));
       ?>
     </td>
     <td> <?php echo round($row['nilai'],3); ?> </td>
     <td> <?php echo $row['tahun']; ?> </td>
     </tr>

     <?php
   }
    ?>

    </tbody>
   </table>
 </section>


<?php include('footer.php'); ?>
