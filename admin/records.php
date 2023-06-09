<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
  header('Location: ../index');
}

 require 'includes/header.php';
 require 'includes/navconnected.php'; //require $nav;?>

 <div class="container-fluid product-page">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index" class="breadcrumb">Dashboard</a>
            <a href="infoproduct" class="breadcrumb">Các Sản Phẩm</a>
            <a href="stats" class="breadcrumb">Hồ Sơ</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

        <div class="container center-align staaats">
          <div class="row">
          <h4>Tất Cả Khuyến Mãi</h4>
          <hr>
          <?php


          include '../db.php';

         $queryfirst = "SELECT

        product.id as 'id',
        product.id_category,

         SUM(order_details.quantity) as 'total',
         orders.status,
         order_details.item_id,

         category.name as 'name',
         category.id

         FROM product, orders, order_details, category
         WHERE product.id = order_details.item_id
         
         AND category.id = product.id_category GROUP BY category.id";
         $resultfirst = $connection->query($queryfirst);
         if ($resultfirst->num_rows > 0) {

           // output data of each row
           while($rowfirst = $resultfirst->fetch_assoc()) {

                 $idp = $rowfirst['id'];
                 $name_best = $rowfirst['name'];
                 $totalsold = $rowfirst['total'];
                 $percent = ($totalsold / 50 )*100;

                 ?>

                  <div class="col s2">
                    <p class="black-text"><?= $name_best; ?></p>
                    <div class="card red<?= $idp; ?>" style="padding-top:<?=number_format((float)$percent, 2, '.', ''); ?>%">
                       <h5 class="white-text"><?=$totalsold ?></h5>
                    </div>
                  </div>

                 <?php }} ?>
          </div>
          <hr>

          <div class="row">      
              <table class="table-responsive table-bordered table-striped">
                <thead>
                  <th>#</th>
                  <th>Tên Trái Cây</th>
                  <th>Danh Mục Trái Cây</th>
                  <th>Đã Bán</th>
                  <th>Còn Lại</th>
                </thead>
                <tbody>
                <?php
                    include '../db.php';

                     $queryfirst = "SELECT

                    product.id as 'id',
                    product.name as 'pname',
                    product.quantity as 'quantity',
                    product.id_category,

                     SUM(order_details.quantity) as 'total',
                     orders.status,
                     order_details.item_id,

                     category.name as 'name',
                     category.id

                     FROM product, orders, order_details, category
                     WHERE product.id = order_details.item_id
                     AND orders.status = 'paid' 
                     AND category.id = product.id_category GROUP BY product.id ORDER BY SUM(order_details.quantity) DESC";
                     $resultfirst = $connection->query($queryfirst);
                     if ($resultfirst->num_rows > 0) {

          
                       // output data of each row
                      $id = 1;
                       while($rowfirst = $resultfirst->fetch_assoc()) {

                             $idp = $rowfirst['id'];
                             $name_prod = $rowfirst['pname'];
                             $name_best = $rowfirst['name'];
                             $totalsold = $rowfirst['total'];
                             $totalrem = $rowfirst['quantity'];
                  ?>
                  <tr>
                    <td><?=$id ?></td>
                    <td><?=$name_prod ?></td>
                    <td><?=$name_best ?></td>
                    <td><?=$totalsold ?></td>
                    <td><?=$totalrem ?></td>
                  </tr>
                <?php
                    $id ++;  }
                    }
                ?>
                </tbody>
              </table>
          </div>
        </div>
 <?php require 'includes/footer.php'; ?>
