<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller{

    static $data = array();
    public function __construct()
    {
        parent::__construct();
        $this->load->model('HomeModel');
        $this->load->helper('project');
    }

    public function notFound(){
         $data['settings'] = $this->HomeModel->getSettings();
         $data['menus'] = $this->HomeModel->getMenus();
         $data['topSlider'] = $this->HomeModel->getTopSliderItems();
        $this->load->view('errors/html/error_404', $data);
    }


    public function index()
    {   
        $data['modules'] = $this->HomeModel->getModules();

        $data['settings'] = $this->HomeModel->getSettings();
        $data['slider'] = $this->HomeModel->getRecentPosts();
        $data['topSlider'] = $this->HomeModel->getTopSliderItems();
        $data['popular'] = $this->HomeModel->getPopularPosts();
        $data['categories'] = $this->HomeModel->getCategories();
        $data['menus'] = $this->HomeModel->getMenus();
        $this->load->view('index', $data);
    }

    public function single($slug){
        $slug = $this->security->xss_clean(trim(strip_tags($slug)));
        if($this->HomeModel->checkIfExists('posts', 'post_slug', $slug)){
            $data['settings'] = $this->HomeModel->getSettings();
            $data['slider'] = $this->HomeModel->getRecentPosts();
            $data['topSlider'] = $this->HomeModel->getTopSliderItems();
            $data['popular'] = $this->HomeModel->getPopularPosts();
            $data['categories'] = $this->HomeModel->getCategories();
            $data['menus'] = $this->HomeModel->getMenus();

            
            $data['getSingle'] = $this->HomeModel->getSingle($slug);
            $data['randomPosts'] = $this->HomeModel->getRandomPosts();

            $data['relatedPosts'] = $this->HomeModel->getRelatedPosts($data['getSingle'][0]->post_category);
            $this->load->view('single', $data);
        }else{
            $this->notFound();
        }
        
    }

    public function downloadPage($dl_id){
        $id = $this->security->xss_clean(trim(strip_tags($dl_id)));
        if($this->HomeModel->checkIfExists('posts', 'post_string_id', $id)){
            $this->load->view('dlPage');
        }else{
            $this->notFound();
        }
    }

    public function category($slug){
        $this->load->helper('project');
        $slug = $this->security->xss_clean(trim(strip_tags($slug)));
        if($this->HomeModel->checkIfExists('categories', 'cat_slug', $slug)){
            $per_page = 8;
            $data['settings'] = $this->HomeModel->getSettings();
            $data['slider'] = $this->HomeModel->getRecentPosts();
            $data['topSlider'] = $this->HomeModel->getTopSliderItems();
            $data['popular'] = $this->HomeModel->getPopularPosts();
            $data['categories'] = $this->HomeModel->getCategories();
            $data['menus'] = $this->HomeModel->getMenus();


            $data['catPosts'] = $this->HomeModel->getCategoriesPage($per_page, strip_tags(trim($this->security->xss_clean($this->uri->segment(3, 0)))), $slug);
            $data['pagination'] = pagination_func_f('kategori/' . $slug, $this->HomeModel->catPostsCount($slug), $per_page);
            $this->load->view('category', $data);
        }else{
            $this->notFound();
        }
    }

    public function randomPost(){
        redirect(base_url($this->HomeModel->getRandomPost()[0]->post_slug));
    }

    public function search(){

        $data['settings'] = $this->HomeModel->getSettings();
        $data['slider'] = $this->HomeModel->getRecentPosts();
        $data['topSlider'] = $this->HomeModel->getTopSliderItems();
        $data['popular'] = $this->HomeModel->getPopularPosts();
        $data['categories'] = $this->HomeModel->getCategories();
        $data['menus'] = $this->HomeModel->getMenus();
        $per_page = 3;
        $term = trim($this->security->xss_clean($this->input->post('q')));
        $term = strip_tags(trim($term));
        $term = str_replace(array('<p>', '<script>', '<alert>', '<alert','alert>', '<p', 'p>', 'alert();', '();', '()', '(', ')', '{'), '[removed]', $term);
        $data['term'] = html_escape($term);
        $data['searchPosts'] = $this->HomeModel->search(html_escape($term));
        
        $this->load->view('search', $data);

    }


    public function sitemap(){
        $posts = $this->HomeModel->getPostSlugs();
        $categories  = $this->HomeModel->getCatSlugs();
        $pages  = $this->HomeModel->getPageSlugs();
        header("Content-type: text/xml");
        echo '<?xml version="1.0" encoding="UTF-8"?>
        <urlset xmlns="http://www.google.com/schemas/sitemap/0.84"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd">' . PHP_EOL;
        echo '
        <url>
        <loc>'.base_url().'</loc>
        <changefreq>hourly</changefreq>
        <priority>1.0</priority>
        </url>' . PHP_EOL; 

        foreach($posts as $book){
            echo '
            <url>
            <loc>'.base_url($book->post_slug).'</loc>
            <changefreq>daily</changefreq>
            <priority>0.5</priority>
            </url>' . PHP_EOL;
        }

        foreach($pages as $page){
            echo '
            <url>
            <loc>'.base_url('sayfa/') . $page->page_slug.'</loc>
            <changefreq>daily</changefreq>
            <priority>0.5</priority>
            </url>' . PHP_EOL;
        }


        foreach($categories as $cat){
            echo '
            <url>
            <loc>'.base_url('kategori/') . $cat->cat_slug.'</loc>
            <changefreq>daily</changefreq>
            <priority>0.5</priority>
            </url>' . PHP_EOL;
        }
        echo '</urlset>' . PHP_EOL;

    }




}