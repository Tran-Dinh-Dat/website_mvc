<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include './../classes/category.php';?>
<?php 
	$category = new Category();
	if (isset($_GET['delcateid'])) {
		$id = $_GET['delcateid'];
	}

	$delCate = $category->delete_category($id);
      
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách danh mục sản phẩm</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Id</th>
							<th>Tên danh mục</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$show_category = $category->show_category();
						if ($show_category) {
							$i = 0;
							while ($result = $show_category->fetch_assoc()) {
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?=$result['cateId']?></td>
							<td><?=$result['cateName']?></td>
							<td>
								<a href="catedit.php?cateid=<?=$result['cateId']?>">Sửa</a> || 
								<a href="?delcateid=<?=$result['cateId']?>" onclick="confirm('Bạn có chắc chắn xóa không?')">Xóa</a>
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

