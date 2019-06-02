<?php
    $sql = "SELECT p.name as name_pro , p.avatar,p.user_id,p.cate_id,p.status,p.id,u.name as name_user,c.name as name_cate
            FROM products p INNER JOIN cates c ON p.cate_id = c.id
                            INNER JOIN  users u ON p.user_id = u.id LIMIT 2";
    $result = mysqli_query($db,$sql);
    $data = returnDataRow($result);



    //code phân trang
   $sql = "SELECT count(id) as total FROM products";
   $result = mysqli_query($db,$sql);
   $row = returnRow($result);
   $total_records = $row['total'];
   $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
   $limit = 2;
   $total_page = ceil($total_records/$limit);
   if ($current_page > $total_page){
       $current_page = $total_page;
   }elseif ($current_page < 1){
       $current_page = 1;
   }
   $start = ($current_page -1)*$limit;
   $sql = "SELECT * FROM products LIMIT $start,$limit";
   $result = mysqli_query($db,$sql);
//    pre($name);die();
?>
      <div class="row">
        <div class="col-sm-12">
          <div class="white-box">
            <h3 class="box-title m-b-0">Danh sách sản phẩm</h3>
            <p class="text-muted m-b-30"></p>
            <div class="table-responsive">
            <table id="myTable" class="table table-striped">
              <thead>
                <tr>
                  <th>id</th>
                  <th>tên</th>
                  <th>menu</th>
                  <th>user</th>
                  <th>avatar</th>
                  <th>tùy chọn</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($data as $item){?>
                <tr>
                  <td><?php echo $item['id']?></td>
                  <td><?php echo $item['name_pro']?></td>
                  <td><?php echo $item['name_cate']?></td>
                  <td><?php echo $item['name_user']?></td>
                  <td>
                    <img src="<?=base_url?>/admin/public/images/product/avatar/<?php echo $item['avatar']?>" width="80px;" height="80px;" alt="">
                  </td>
                  <td>
                    <a href="<?=base_url?>/admin/module/product/edit.php" id="editItem"><i class="ti-pencil text-success"></i></a> |
                    <a href="" class="proDelItem" data-msg="Bạn muốn xóa?"><i class="ti-trash text-danger"></i></a>
                  </td>
                </tr>
              <?php }?>
              </tbody>
            </table>
                <div class="pagination">
                    <ul class="pagination">
                        <!--
                            -> first_page // khi page > 1
                            -> 5 page đầu 1-5 5-9 9-> 9+5 // page_curent > 4 && page_curent <  total - 4 ? page_curent -> page_curent + 4
                            -> ... 100 page //  page_curent < check total - 4
                            //-> 5 page cuối
                            -> last _page // khi page < total page

                        -->
                        <?php

                            if ($current_page > 1 && $total_page > 1){
                                echo '<li><a href="/admin/module/product/list.php?page='.($current_page-1).'">&laquo;</a></li>';
                            }
                        ?>
                        <?php
                            for ($i =1;$i <= $total_page;$i++){
                                if ($i == $current_page){
                                    echo '<li class="active"><a href="#">'.$i.'</a></li>';
                                }else{
                                    echo '<li><a href="/admin/module/product/list.php?page='.$i.'"">'.$i.'</a></li>';
                                }
                            }
                        ?>
<!--                        <li class="active"><a href="#">1</a></li>-->
<!--                        <li class="disabled"><a href="#">2</a></li>-->
<!--                        <li><a href="#">3</a></li>-->
<!--                        <li><a href="#">4</a></li>-->
<!--                        <li><a href="#">5</a></li>-->
                        <?php
                            if ($current_page < $total_page && $total_page > 1){
                                echo '<li><a href="/admin/module/product/list.php?page='.($current_page+1).'"">&raquo;</a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
          </div>
        </div>
      </div>
