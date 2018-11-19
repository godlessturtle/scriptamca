<?php
/**
 * Created by PhpStorm.
 * User: Aslan
 * Date: 22.10.2018
 * Time: 16:16
 */
class HomeModel extends CI_Model{

    public function checkIfExists($table_name, $search_term, $data){
        $query = $this->db->where($search_term, $data)->get($table_name);
        $bool = $query->num_rows();
        if($bool == 1){
            return true;
        }else{
            return false;
        }
    }

    public function getPostSlugs(){
        $query = $this->db->select('post_slug')->get('posts');
        return $query->result();
    }

    public function getCatSlugs(){
        $query = $this->db->select('cat_slug')->get('categories');
        return $query->result();
    }

    public function getPageSlugs(){
        $query = $this->db->select('page_slug')->get('pages');
        return $query->result();
    }

    public function getSettings(){
        return $this->db->get('settings')->result();
    }

    //sidebar
    public function getRecentPosts($limit=5){
        $query = $this->db->limit($limit)->order_by('post_id', 'DESC')->get('posts');
        return $query->result();
    }

    public function getModules(){
        $query = $this->db->order_by('module_order', 'ASC')->get('modules');
        return $query->result();
    }

    public function getTopSliderItems(){
        $query = $this->db->select(array('post_title', 'post_slug'))->limit(10)->get('posts');
        return $query->result();
    }

    public function getSidebarTags(){
        $query = $this->db->select('post_tags', 'DISTINCT')->get('posts');
        return $query->result();
    }

    public function getPopularPosts($limit = 5){
        $query = $this->db->limit($limit)->order_by('post_views', 'DESC')->get('posts');
        return $query->result();
    }

    public function getCategories($limit = 99){
        $query = $this->db->limit(99)->get('categories');
        return $query->result();
    }

    public function getMenus(){
        $query = $this->db->order_by('menu_order', 'ASC')->get('menus');
        return $query->result();
    }


    public function getSingle($slug){
        $query = $this->db->limit(1)->where('post_slug', $slug)->get('posts');


        $this->db->where('post_slug', $slug, trim(urldecode($slug)));
        $this->db->select('post_views');
        $count = $this->db->get('posts')->row();

        $this->db->where('post_slug', $slug, urldecode($slug));
        $this->db->set('post_views', ($count->post_views + 1));
        $this->db->update('posts');


        return $query->result();
    }

    public function getRelatedPosts($cat_id){
        return $this->db->order_by('rand()')->limit(4)->where('post_category', $cat_id)->get('posts')->result();
    }

    public function getRandomPosts($limit= 2){
        $query = $this->db->order_by('rand()')->limit($limit)->get('posts');
        return $query->result();
    }

    public function getCatPosts($slug){
        $cat_id = $this->db->select('cat_id')->limit(24)->where('cat_slug', $slug)->get('categories')->result()[0]->cat_id;
        $query = $this->db->where('post_category', $cat_id)->get('posts');
        return $query->result();
    }

    public function catPostsCount($slug){
        $cat_id = $this->db->where('cat_slug', $slug)->get('categories')->result()[0]->cat_id;
        $query = $this->db->get_where('posts', array('post_category' => $cat_id));
        return $query->num_rows();
    }

    public function getCategoriesPage($limit, $segment, $slug){
        $cat_id = $this->db->where('cat_slug', $slug)->get('categories')->result()[0]->cat_id;
        return $this->db->limit($limit, $segment)->order_by('post_id', 'DESC')->where('post_category', $cat_id)->get('posts')->result();
    }

    public function getRandomPost(){
        return $this->db->limit(1)->order_by('rand()')->select('post_slug')->get('posts')->result();
    }

    public function search($term, $limit = 10){
        $query = $this->db->limit($limit)->like('post_text', $term)->get('posts');
        return $query->result();
    }


}
