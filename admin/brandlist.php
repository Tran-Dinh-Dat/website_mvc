<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include './../classes/brand.php';?>
<?php 
	$brand = new Brand();
	if (isset($_GET['delbrandid'])) {
        $id = $_GET['delbrandid'];
        $delBrand = $brand->delete_brand($id);
	}

	
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách danh mục sản phẩm</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Id</th>
							<th>Tên thương hiệu</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$show_brand = $brand->show_brand();
						if ($show_brand) {
							$i = 0;
							while ($result = $show_brand->fetch_assoc()) {
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?=$result['brandId']?></td>
							<td><?=$result['brandName']?></td>
							<td>
								<a href="brandedit.php?brandid=<?=$result['brandId']?>">Sửa</a> || 
								<a href="?delbrandid=<?=$result['brandId']?>" onclick="confirm('Bạn có chắc chắn xóa không?')">Xóa</a>
							</td>
						</tr>
					<?php
							}
						}
					?>
					
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

