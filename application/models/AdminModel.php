<?php

class AdminModel extends CI_Model{

    public function getAdmin($id){
        $query = $this->db->get_where('admin', array('admin_id' => $id));
        return $query->result();
    }

    public function updatePassword($newPass){
        $this->db->where('admin_id', 1)->update('admin',array('admin_password' => $newPass));
    }


    /*
     *
     * Category Stuff Start
     *
     * */

    public function getCategories($limit, $segment){
        return $this->db->limit($limit, $segment)->order_by('cat_id', 'DESC')->get('categories');
    }

    public function numCatRows(){
        return $this->db->get('categories')->num_rows();
    }

    public function deleteCategory($id){
        $this->db->where('post_category', $id)->delete('posts');
        $this->db->where('cat_id', $id)->delete('categories');
        $this->db->where('module_category', $id)->delete('modules');

    }

    public function insertCategory($cat_name, $cat_slug){
        $this->db->insert('categories', array('cat_name' => $cat_name, 'cat_slug' => $cat_slug));
    }

    public function getCategory($id){
        return $this->db->get_where('categories', array('cat_id' => $id))->result();
    }

    public function getCategoryBySlug($slug){
        return $this->db->get_where('categories', array('cat_slug' => $slug));
    }

    public function updateCategory($cat_id, $cat_name){
        $this->db->where('cat_id', $cat_id)->update('categories', array('cat_name' => $cat_name));
    }

    public function getAllCategories(){
        return $this->db->get('categories')->result();
    }

    public function getSingleCategory($cat_id){
        return $this->db->get_where('categories', array('cat_id' => $cat_id))->result();
    }

    /*
     *
     * Category Stuff End
     * Posts Start
     *
     * */

    public function getPosts($limit, $segment){
        return $this->db->limit($limit, $segment)->order_by('post_id', 'DESC')->get('posts');
    }

    public function getPostsCount(){
        return $this->db->get('posts')->num_rows();
    }

    public function insertPost($data){
        $this->db->insert('posts', $data);
    }

    public function deletePost($id){
        $this->db->where('post_id', $id)->delete('posts');
    }

    public function getSinglePost($id){
        return $this->db->where('post_id', $id)->get('posts')->result();
    }

    public function updatePost($id, $data){
        $this->db->where('post_id', $id)->update('posts', $data);
    }

    public function getPostImg($id){
        return $this->db->select('post_thumbnail')->where('post_id', $id)->get('posts')->result();
    }

    /*
     *
     *
     * Posts End
     * Pages Start
     *
     * */

    public function getPageCount(){
        return $this->db->get('pages')->num_rows();
    }

    public function getPages($limit, $segment){
        return $this->db->limit($limit, $segment)->order_by('page_id', 'DESC')->get('pages');
    }

    public function deletePage($id){
        $this->db->where('page_id', $id)->delete('pages');
    }

    public function insertPage($data){
        $this->db->insert('pages', $data);
    }

    public function getSinglePage($id){
        return $this->db->where('page_id', $id)->get('pages')->result();
    }

    public function updatePage($id, $data){
        $this->db->where('page_id', $id)->update('pages', $data);
    }


    /*
     *
     * Settings
     *
     * */

    public function getSettings(){
        return $this->db->get('settings')->result();
    }

    public function updateSettings($data){
        $this->db->update('settings', $data);
    }

    /*
     *
     * Menus
     * */

    public function getMenus(){
        return $this->db->order_by('menu_order', 'ASC')->get_where('menus', array('menu_topLevel' => 0))->result();
    }

    public function insertMenu($data){
        $this->db->insert('menus', $data);
    }

    public function getMenuOpts($table_name){
        $query = $this->db->get($table_name);
        return $query->result();
    }

    public function getLastMenuOrder(){
        $query = $this->db->select('menu_order')->limit(1)->order_by('menu_order', 'DESC')->get('menus');
        return $query->result();
    }

    public function deleteMenu($menu_id){
        $this->db->where('menu_id', $menu_id)->delete('menus');
    }

    public function updateMenuOrder($source){
        foreach($source as $order => $id){
            $this->db->query("UPDATE menus SET menu_order=$order WHERE menu_id = $id");
        }
        echo "Menü Sıraları Güncellendi, Sayfayı Yenileyin";
    }

    /*
     * Modules
     * */

    public function getModules(){
        return $this->db->order_by('module_order', 'ASC')->get('modules')->result();
    }

    public function updateModuleOrder($source){
        foreach($source as $order => $id){
            $this->db->query("UPDATE modules SET module_order=$order WHERE module_id = $id");
            //$this->db->where('module_id', $id)->update('modules', array('module_order' => $order));
        }
        echo "Modül Sıraları Güncellendi, Sayfayı Yenileyin";
    }

    public function insertModule($data){
        $this->db->insert('modules', $data);
    }

    public function getLastModuleOrder(){
        $query = $this->db->limit(1)->order_by('module_order', 'DESC')->get('modules');
        return $query->result()[0]->module_order;
    }

    public function deleteModule($id){
        $this->db->where('module_id', $id)->delete('modules');
    }



}

