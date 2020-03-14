<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include './../classes/category.php';?>
<?php 
    
    $category = new Category();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$cateName = $_POST['cateName'];

        $insertCate = $category->insert_category($cateName);
	}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm danh mục</h2>
               <div class="block copyblock"> 
                <?php
                    if (isset($insertCate)) {
                        echo $insertCate;
                    }
                ?>
                 <form action="catadd.php" method="post">
                    <table class="form" >					
                        <tr>
                            <td>
                                <input type="text" name="cateName" placeholder="Nhập danh mục sản phẩm..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>