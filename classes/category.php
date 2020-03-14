<?php
    include './../lib/database.php';
    include './../helpers/format.php';
    class Category
    {
        private $db;
        private $fm; //format helpers
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_category($cateName)
        {
            $cateName = $this->fm->validation($cateName);
            $cateName = mysqli_real_escape_string($this->db->link, $cateName);
            

            if (empty($cateName)) {
                $alert = "<span class='text-error'>Danh mục sản phẩm không được trống!</span>";
                return $alert;
            } else {
                $query = "INSERT INTO tbl_categories(cateName) VALUES('$cateName')";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = "<span class='text-success'>Thêm danh mục sản phẩm thành công!</span>";
                    return $alert;
                } else {
                    $alert = "<span class='text-error'>Thêm danh mục sản phẩm thất bại!</span>";
                    return $alert;
                }
             
            }
        }

        public function show_category()
        {
            $query = "SELECT * FROM tbl_categories ORDER BY cateId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function getcatebyId($id)
        {
            $query = "SELECT * FROM tbl_categories WHERE cateId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_category($cateName, $id)
        {
            $cateName = $this->fm->validation($cateName);
            $cateName = mysqli_real_escape_string($this->db->link, $cateName);
            $id = $this->fm->validation($id);
            $id = mysqli_real_escape_string($this->db->link, $id);

            if (empty($cateName)) {
                $alert = "<span class='text-error'>Danh mục sản phẩm không được trống!</span>";
                return $alert;
            } else {
                $query = "UPDATE tbl_categories SET cateName = '$cateName' WHERE cateId = '$id'";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = "<span class='text-success'>Cập nhật danh mục sản phẩm thành công!</span>";
                    return $alert;
                } else {
                    $alert = "<span class='text-error'>Cập nhật danh mục sản phẩm thất bại!</span>";
                    return $alert;
                }
             
            }
        }

        public function delete_category($id)
        {
            $id = $this->fm->validation($id);
            $id = mysqli_real_escape_string($this->db->link, $id);
            $query = "DELETE FROM tbl_categories WHERE cateId = '$id'";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='text-success'>Xóa danh mục sản phẩm thành công!</span>";
                return $alert;
            } else {
                $alert = "<span class='text-error'>Xóa danh mục sản phẩm thất bại!</span>";
                return $alert;
            }
        }


    }
    
?>
