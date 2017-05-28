<?php

/**
 * Home Controller
 */
class Home extends HTS_Controller {

  function __construct() {
    parent::__construct('home');
  }

  public function index() {
    $this->fetchLang();
    loadNavbarLang($this, $data);
    $data['title'] = $this->lang->line('home_title');
    $data['home_jumbotron_text'] = $this->lang->line('home_jumbotron_text');
    $data['page_controller'] = $this->getPage();
    $data['footer_text'] = $this->lang->line('footer_text');

    if(isSessionValid($this)){
      $data['auth'] = $this->session->auth;
      $data['name'] = $this->session->name;
      $data['surname'] = $this->session->surname;
    } else {
      $data['auth'] = FALSE;
      $data['name'] = " ";
      $data['surname'] = " ";
    }
    $this->loadHomePage($data);
  }

  public function licence() {
    $this->fetchLang();
    $data['home_license_title'] = $this->lang->line('home_license_title');
    $data['home_license_text'] = $this->lang->line('home_license_text');
    $this->load->view("public/license", $data);
  }

  public function project() {
    $this->fetchLang();
    $data['home_about_project_title'] = $this->lang->line('home_about_project_title');
    $data['home_about_project_text'] = $this->lang->line('home_about_project_text');
    $data['home_about_project_future_title'] = $this->lang->line('home_about_project_future_title');
    $data['home_about_project_future_text'] = $this->lang->line('home_about_project_future_text');
    $this->load->view("public/about_project", $data);
  }

  public function system() {
    $this->fetchLang();
    $data['home_about_system_title'] = $this->lang->line('home_about_system_title');
    $data['home_about_system_text'] = $this->lang->line('home_about_system_text');
    $data['home_about_system_apache_title'] = $this->lang->line('home_about_system_apache_title');
    $data['home_about_system_apache_text'] = $this->lang->line('home_about_system_apache_text');
    $data['home_about_system_php_title'] = $this->lang->line('home_about_system_php_title');
    $data['home_about_system_php_text'] = $this->lang->line('home_about_system_php_text');
    $data['home_about_system_mysql_title'] = $this->lang->line('home_about_system_mysql_title');
    $data['home_about_system_mysql_text'] = $this->lang->line('home_about_system_mysql_text');
    $data['home_about_system_codeig_title'] = $this->lang->line('home_about_system_codeig_title');
    $data['home_about_system_codeig_text'] = $this->lang->line('home_about_system_codeig_text');
    $data['home_about_system_rasppi_title'] = $this->lang->line('home_about_system_rasppi_title');
    $data['home_about_system_rasppi_text'] = $this->lang->line('home_about_system_rasppi_text');
    $data['home_about_system_plotly_title'] = $this->lang->line('home_about_system_plotly_title');
    $data['home_about_system_plotly_text'] = $this->lang->line('home_about_system_plotly_text');
    $data['home_about_system_tool_title'] = $this->lang->line('home_about_system_tool_title');
    $data['home_about_system_tool_text'] = $this->lang->line('home_about_system_tool_text');
    $data['home_about_system_atom_title'] = $this->lang->line('home_about_system_atom_title');
    $data['home_about_system_atom_text'] = $this->lang->line('home_about_system_atom_text');
    $data['home_about_system_browser_title'] = $this->lang->line('home_about_system_browser_title');
    $data['home_about_system_browser_text'] = $this->lang->line('home_about_system_browser_text');
    $data['home_about_system_xampp_title'] = $this->lang->line('home_about_system_xampp_title');
    $data['home_about_system_xampp_text'] = $this->lang->line('home_about_system_xampp_text');
    $data['home_about_system_pma_title'] = $this->lang->line('home_about_system_pma_title');
    $data['home_about_system_pma_text'] = $this->lang->line('home_about_system_pma_text');
    $data['home_about_system_pyidle_title'] = $this->lang->line('home_about_system_pyidle_title');
    $data['home_about_system_pyidle_text'] = $this->lang->line('home_about_system_pyidle_text');
    $data['home_about_system_rdp_title'] = $this->lang->line('home_about_system_rdp_title');
    $data['home_about_system_rdp_text'] = $this->lang->line('home_about_system_rdp_text');
    $data['home_about_system_fzlla_title'] = $this->lang->line('home_about_system_fzlla_title');
    $data['home_about_system_fzlla_text'] = $this->lang->line('home_about_system_fzlla_text');
    $data['home_about_system_git_title'] = $this->lang->line('home_about_system_git_title');
    $data['home_about_system_git_text'] = $this->lang->line('home_about_system_git_text');
    $this->load->view("public/about_system", $data);
  }

  public function app() {
    $this->fetchLang();
    $data['home_about_app_title'] = $this->lang->line('home_about_app_title');
    $data['home_about_app_text'] = $this->lang->line('home_about_app_text');
    $data['home_about_app_arch_alt'] = $this->lang->line('home_about_app_arch_alt');
    $this->load->view("public/about_app", $data);
  }

  /*****************************************************************************
   ***************************** PRIVATE FUNCTIONS *****************************
   ****************************************************************************/

  /**
   * @param Array $data
   */
  private function loadHomePage(&$data) {
    $this->load->view("templates/content_top", $data);
    $this->load->view("templates/header", $data);
    $this->load->view("public/home", $data);
    $this->load->view("templates/footer", $data);
    $this->load->view("templates/content_bottom");
  }

  private function fetchLang() {
    $this->lang->load(array($this->getPage()), $this->session->language);
  }

}
