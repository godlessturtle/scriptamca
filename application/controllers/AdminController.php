<?php

/**
 * Created by PhpStorm.
 * User: Aslan
 * Date: 18.10.2018
 * Time: 15:24
 */
class AdminController extends CI_Controller
{
    static $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModel');
        $this->load->helper('project');
    }

    public function isLoggedIn()
    {
        if (!$this->session->userdata('admin')) {
            redirect(base_url('panel/login'));
        }
    }

    public function index()
    {
        $this->isLoggedIn();
        $data['adminDetails'] = $this->AdminModel->getAdmin($this->session->userdata('admin')[0]->admin_id);
        $this->load->view('admin/index', $data);
    }

    public function profile(){
        $this->isLoggedIn();
        $data['adminDetails'] = $this->AdminModel->getAdmin($this->session->userdata('admin')[0]->admin_id);
        $this->load->view('admin/profile', $data);
    }

    public function updatePassword(){
        $this->isLoggedIn();
        if($this->input->post('re_pass') == $this->input->post('new_pass')){
            $oldPass = $this->AdminModel->getAdmin($this->session->userdata('admin')[0]->admin_id)[0]->admin_password;
            if($oldPass == md5(sha1($this->input->post('old_pass')))){
                $newPass = md5(sha1($this->input->post('new_pass')));
                $this->AdminModel->updatePassword($newPass);
                $this->session->set_flashdata('not', "Güncellendi");
                redirect(base_url('panel/profile'));
            }else{
                echo "eski şifre yanlış";
            }
        }else{
            echo "şifreler eşleşmedi";
        }
    }

    /*
     *
     * Category Start
     *
     * */

    public function categories()
    {
        $this->isLoggedIn();
        $per_page = 20;
        $data['pagination'] = pagination_func('panel/categories', $this->AdminModel->numCatRows(), $per_page);
        $data['categories'] = $this->AdminModel->getCategories($per_page, $this->uri->segment(3, 0));
        $data['adminDetails'] = $this->AdminModel->getAdmin($this->session->userdata('admin')[0]->admin_id);
        $this->load->view('admin/categories', $data);

    }

    public function deleteCategory($id)
    {
        $this->isLoggedIn();
        if (checkIfExists('categories', 'cat_id', $id)) {
            $this->AdminModel->deleteCategory($id);
            $this->session->set_flashdata('notification', 'swal("Başarılı!", "Kategori Silindi.", "success");');
            redirect(base_url('panel/categories'));
        } else {
            echo "Geçersiz İşlem";
        }

    }

    public function createCategory()
    {
        $this->isLoggedIn();
        $cat_name = trim($this->input->post('cat_name'));
        if (!$this->AdminModel->getCategoryBySlug(seo($cat_name))->num_rows() == 1) {
            $this->AdminModel->insertCategory($cat_name, seo($cat_name));
            $this->session->set_flashdata('notification', 'swal("Başarılı!", "Kategori Oluşturuldu.", "success");');
        } else {
            $this->session->set_flashdata('notification', 'swal("Uyarı!", "Böyle bir kategori zaten var.", "warning");');
        }

        redirect(base_url('panel/categories'));
    }

    public function editCategoryPage($id)
    {
        $this->isLoggedIn();
        $id = trim(strip_tags($id));
        $data['adminDetails'] = $this->AdminModel->getAdmin($this->session->userdata('admin')[0]->admin_id);
        $data['cat'] = $this->AdminModel->getCategory($id);
        $this->load->view('admin/pages/editCategory', $data);
    }

    public function updateCategory()
    {
        $cat_id = strip_tags(trim($this->input->post('cat_id')));
        $cat_name = strip_tags(trim($this->input->post('cat_name')));
        if (!$this->AdminModel->getCategoryBySlug(seo($cat_name))->num_rows() == 1) {
            $this->AdminModel->updateCategory($cat_id, $cat_name);
            $this->session->set_flashdata('notification', 'swal("Başarılı!", "Kategori Güncellendi.", "success");');
        } else {
            $this->session->set_flashdata('notification', 'swal("Hata!", "Böyle bir kategori zaten var.", "warning");');
        }

        redirect(base_url('panel/categories'));
    }

    /*
     *
     * Category End
     * Posts Start
     *
     * */

    public function posts()
    {
        $this->isLoggedIn();
        $data['adminDetails'] = $this->AdminModel->getAdmin($this->session->userdata('admin')[0]->admin_id);
        $per_page = 20;
        $data['pagination'] = pagination_func('panel/posts', $this->AdminModel->getPostsCount(), $per_page);
        $data['posts'] = $this->AdminModel->getPosts($per_page, $this->uri->segment(3, 0));
        $data['postCount'] = $this->AdminModel->getPostsCount();
        $this->load->view('admin/posts', $data);
    }

    public function newPost()
    {
        $this->isLoggedIn();
        $data['adminDetails'] = $this->AdminModel->getAdmin($this->session->userdata('admin')[0]->admin_id);
        $data['categories'] = $this->AdminModel->getAllCategories();
        $this->load->view('admin/pages/newPost', $data);
    }

    public function createPost()
    {
        $this->isLoggedIn();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('post_title', 'Yazı Başlığı', 'trim|required');
        if ($this->form_validation->run()) {
            $post_title = strip_tags(trim($this->input->post('post_title')));
            $post_tags = strip_tags(trim($this->input->post('post_tags')));
            $post_text = trim($this->input->post('post_text'));
            $post_category = strip_tags(trim($this->input->post('post_category')));
            $post_link = strip_tags(trim($this->input->post('post_link')));
            $config['upload_path'] = 'assets/images/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 2048;
            $config['file_name'] = seo($post_title) . "-" . uniqid();
            $config['min_width'] = 25;
            $config['min_height'] = 25;
            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('post_thumbnail')) {
                $img = $this->upload->data()['file_name'];
                $path = 'assets/images/' . $img;
            } else {
                echo $this->upload->display_errors();
            }

            $insertData = array(
                'post_title' => $post_title,
                'post_tags' => $post_tags,
                'post_text' => $post_text,
                'post_category' => getCatIDBySlug($post_category),
                'post_thumbnail' => $path,
                'post_views' => 0,
                'post_link' => $post_link,
                'post_slug' => seo($post_title),
                'post_author' => $this->session->userdata('admin')[0]->admin_id,
                'post_string_id' => uniqid()
            );
            $this->AdminModel->insertPost($insertData);
            $this->session->set_flashdata('notification', 'swal("Başarılı!", "Yazı Eklendi.", "success");');
            redirect(base_url('panel/posts'));
        } else {
            echo "böyle bi yazı var";
        }
    }

    public function editPost($id)
    {
        $this->isLoggedIn();
        if (checkIfExists('posts', 'post_id', $id)) {
            $data['post'] = $this->AdminModel->getSinglePost($id);
            $data['categories'] = $this->AdminModel->getAllCategories();
            $data['adminDetails'] = $this->AdminModel->getAdmin($this->session->userdata('admin')[0]->admin_id);
            $this->load->view('admin/pages/editPost', $data);
        } else {
            echo "Yetkisiz İşlem";
        }

    }

    public function updatePost()
    {
        $this->load->library('form_validation');
        $post_slug = seo($this->input->post('post_title'));
        if ($_FILES['post_thumbnail']['size'] == 0) {
            $id = $this->input->post('post_id');
            $path = $this->AdminModel->getSinglePost($id)[0]->post_thumbnail;
        } else {
            $config['upload_path'] = 'assets/images/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 2048;
            $config['file_name'] = $post_slug . "-script-full-indir-" . uniqid() . rand(0, 25000);
            $config['min_width'] = 25;
            $config['min_height'] = 25;
            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('post_img')) {
                $img = $this->upload->data()['file_name'];
                $path = 'assets/images/' . $img;
            } else {
                echo $this->upload->display_errors();
            }
        }
        $cat_id = getCatIDBySlug($this->input->post('post_category'));
        $this->form_validation->set_rules('post_title', 'Başlık', 'trim|required');
        $this->form_validation->set_rules('post_tags', 'Etiket', 'trim');
        $this->form_validation->set_rules('post_text', 'Yazı', 'trim|required');
        $this->form_validation->set_rules('post_category', 'Kategori', 'trim|required');

        if ($this->form_validation->run()) {

            $postData = array(
                'post_title' => $this->input->post('post_title'),
                'post_tags' => $this->input->post('post_tags'),
                'post_text' => $this->input->post('post_text'),
                'post_category' => $cat_id,
                'post_slug' => seo($this->input->post('post_title')),
                'post_thumbnail' => $path
            );
            $id = $this->input->post('post_id');
            $this->AdminModel->updatePost($id, $postData);
            redirect(base_url() . 'panel/posts');
        } else {

        }
    }

    public function deletePost($id)
    {
        $this->isLoggedIn();
        if (checkIfExists('posts', 'post_id', $id)) {
            $filename = $this->AdminModel->getPostImg($id);
            unlink($filename[0]->post_thumbnail);
            $this->AdminModel->deletePost($id);

            $this->session->set_flashdata('notification', 'swal("Başarılı!", "Yazı Silindi.", "success");');
            redirect(base_url('panel/posts'));
        } else {
            echo "Yetkisiz İşlem";
        }

    }

    /*
     *
     * /.post
     *
     * pages
     * */

    public function pages()
    {
        $this->isLoggedIn();
        $data['adminDetails'] = $this->AdminModel->getAdmin($this->session->userdata('admin')[0]->admin_id);
        $per_page = 20;
        $data['pagination'] = pagination_func('panel/pages', $this->AdminModel->getPageCount(), $per_page);
        $data['pages'] = $this->AdminModel->getPages($per_page, $this->uri->segment(3, 0));
        $this->load->view('admin/pages', $data);
    }

    public function deletePage($id)
    {
        $this->isLoggedIn();
        if (checkIfExists('pages', 'page_id', $id)) {
            $this->AdminModel->deletePage($id);
            $this->session->set_flashdata('notification', 'swal("Başarılı!", "Sayfa Silindi.", "success");');
            redirect(base_url('panel/pages'));
        } else {
            echo "Yetkisiz İşlem";
        }
    }

    public function newPage()
    {
        $this->isLoggedIn();
        $data['adminDetails'] = $this->AdminModel->getAdmin($this->session->userdata('admin')[0]->admin_id);
        $this->load->view('admin/pages/newPage', $data);
    }

    public function createPage()
    {
        $this->isLoggedIn();

        $page_title = $this->security->xss_clean(trim($this->input->post('page_title')));
        $page_text = $this->security->xss_clean(trim($this->input->post('page_text')));
        $page_tags = $this->security->xss_clean(trim($this->input->post('page_tags')));
        $slug = seo($page_title);
        if (!checkIfExists('pages', 'page_slug', $slug)) {
            $pageData = array(
                'page_title' => $page_title,
                'page_text' => $page_text,
                'page_tags' => $page_tags,
                'page_slug' => $slug
            );
            $this->AdminModel->insertPage($pageData);
            $this->session->set_flashdata('notification', 'swal("Başarılı!", "Sayfa Oluşturuldu.", "success");');
            redirect(base_url() . 'panel/pages');
        } else {
            $this->session->set_flashdata('notification', 'swal("Hata!", "Böyle bir sayfa zaten var.", "danger");');
            redirect(base_url('panel/pages'));
        }

    }

    public function editPage($id)
    {
        $this->isLoggedIn();
        $data['adminDetails'] = $this->AdminModel->getAdmin($this->session->userdata('admin')[0]->admin_id);
        $data['page'] = $this->AdminModel->getSinglePage($id);
        $this->load->view('admin/pages/editPage', $data);
    }

    public function updatePage()
    {
        $this->isLoggedIn();
        $page_id = $this->input->post('page_id');
        if (checkIfExists('pages', 'page_id', $page_id)) {
            $page_title = trim(strip_tags($this->input->post('page_title')));
            $page_text = trim(strip_tags($this->input->post('page_title')));
            $page_tags = trim(strip_tags($this->input->post('page_title')));

            $updateData = array(
                'page_title' => $page_title,
                'page_text' => $page_text,
                'page_tags' => $page_tags,
                'page_slug' => seo($page_title)
            );
            $this->AdminModel->updatePage($page_id, $updateData);
            $this->session->set_flashdata('notification', 'swal("Başarılı!", "Sayfa Güncellendi.", "success");');
            redirect(base_url('panel/pages'));
        } else {
            echo "Yetkisiz İşlem";
        }
    }


    /*
     *
     *
     * Settings
     *
     * */
    public function settings()
    {
        $this->isLoggedIn();
        $data['adminDetails'] = $this->AdminModel->getAdmin($this->session->userdata('admin')[0]->admin_id);
        $data['setting'] = $this->AdminModel->getSettings();
        $this->load->view('admin/settings', $data);
    }

    public function updateSettings()
    {
        $this->isLoggedIn();
        $suffix = trim($this->input->post('set_title_suffix'));
        $description = trim(strip_tags($this->input->post('set_description')));
        $keywords = trim(strip_tags($this->input->post('set_keywords')));
        $fb = trim(strip_tags($this->input->post('set_facebook')));
        $tw = trim(strip_tags($this->input->post('set_twitter')));
        $pt = trim(strip_tags($this->input->post('set_pinterest')));
        $yt = trim(strip_tags($this->input->post('set_youtube')));
        $gp = trim(strip_tags($this->input->post('set_googleplus')));
        $ig = trim(strip_tags($this->input->post('set_instagram')));
        $set_analytics = trim($this->input->post('set_analytics'));

        $updateData = array(
            'set_title_suffix' => $suffix,
            'set_description' => $description,
            'set_keywords' => $keywords,
            'set_fb' => $fb,
            'set_tw' => $tw,
            'set_pt' => $pt,
            'set_yt' => $yt,
            'set_ig' => $ig,
            'set_gp' => $gp,
            'set_id' => 0,
            'set_analytics' => $set_analytics
        );

        $this->AdminModel->updateSettings($updateData);
        $this->session->set_flashdata('notification', 'swal("Başarılı!", "Ayarlar Güncellendi.", "success");');
        redirect(base_url('panel/settings'));
    }


    /*
     *
     * Menus
     *
     * */

    public function menus()
    {
        $this->isLoggedIn();
        $data['categories'] = $this->AdminModel->getMenuOpts('categories');
        $data['pages'] = $this->AdminModel->getMenuOpts('pages');
        $data['adminDetails'] = $this->AdminModel->getAdmin($this->session->userdata('admin')[0]->admin_id);
        $data['menus'] = $this->AdminModel->getMenus();
        $this->load->view('admin/menus', $data);
    }

    public function createMenu()
    {
        $this->isLoggedIn();
        /*
         * 0 sayfa
         * 1 kategori
         * 2 external
         * */
        $title = trim($this->input->post('menu_title'));
        $slug = seo($this->input->post('menu_title'));
        $menu_url = null;
        $kategori = null;
        $menu_type = null;
        $selectbox = trim($this->input->post('selectBox0'));
        if ($selectbox == 0) {
            $menu_type = 0;
            $page_id = $this->input->post('selectSayfa');
            $menu_url = "sayfa/" . $this->AdminModel->getSinglePage($page_id)[0]->page_slug;
        } else if ($selectbox == 1) {
            $menu_type = 1;
            $kategori = $this->input->post('selectCat');
            $menu_url = "kategori/" . $this->AdminModel->getSingleCategory($kategori)[0]->cat_slug;
        } else if ($selectbox == 2) {
            $menu_type = 2;
            $menu_url = trim($this->input->post('external_link'));
        } else {
            $sayfa = null;
            $kategori = null;
            $external = null;
        }

        $menu_order = $this->AdminModel->getLastMenuOrder()[0]->menu_order + 1;
        $insertData = array(
            'menu_title' => $title,
            'menu_slug' => $slug,
            'menu_url' => $menu_url,
            'menu_kategori' => $kategori,
            'menu_topLevel' => 0,
            'menu_order' => $menu_order,
            'menu_type' => $menu_type,
            'menu_icon' => $this->input->post('menu_icon')
        );
        $this->AdminModel->insertMenu($insertData);
        $this->session->set_flashdata('notification', 'swal("Başarılı!", "Menü Oluşturuldu.", "success");');
        redirect(base_url('panel/menus'));
    }

    public function deleteMenu($menu_id)
    {
        $this->isLoggedIn();
        if (checkIfExists('menus', 'menu_id', $menu_id)) {
            $this->AdminModel->deleteMenu($menu_id);
            $this->session->set_flashdata('notification', 'swal("Başarılı!", "Menü Silindi.", "success");');
            redirect(base_url('panel/menus'));
        } else {
            echo "Geçersiz İşlem";
        }
    }

    public function menuorder()
    {
        $this->isLoggedIn();
        $orders = $this->input->get('menu');
        $this->AdminModel->updateMenuOrder($orders);
    }

    /*
     *
     * Modules
     * */

    public function modules()
    {
        $this->isLoggedIn();
        $data['categories'] = $this->AdminModel->getMenuOpts('categories');
        $data['adminDetails'] = $this->AdminModel->getAdmin($this->session->userdata('admin')[0]->admin_id);
        $data['modules'] = $this->AdminModel->getModules();
        $this->load->view('admin/modules', $data);
    }

    public function updateModuleOrders()
    {
        $this->isLoggedIn();
        $orders = $this->input->get('module');
        $this->AdminModel->updateModuleOrder($orders);
    }

    public function createModule()
    {
        $this->isLoggedIn();
        $module_title = trim($this->input->post('module_title'));
        $module_cat = trim($this->input->post('moduleCat'));

        $insertData = array(
            'module_title' => $module_title,
            'module_category' => $module_cat,
            'module_order' => $this->AdminModel->getLastModuleOrder() + 1
        );
        $this->AdminModel->insertModule($insertData);
        $this->session->set_flashdata('notification', 'swal("Başarılı!", "Modül Eklendi.", "success");');
        redirect(base_url('panel/modules'));
    }

    public function deleteModule($id){
        $this->isLoggedIn();
        $this->AdminModel->deleteModule($id);
        $this->session->set_flashdata('notification', 'swal("Başarılı!", "Modül Silindi.", "success");');
        redirect(base_url('panel/modules'));
    }


}