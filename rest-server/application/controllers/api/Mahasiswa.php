<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends REST_Controller {
   public function __construct()
   {
      parent::__construct();
      $this->load->model('mahasiswa_model');
      // 1 jam cuma bisa 2x
      $this->methods['index_get']['limit'] = 100;
   }
   public function index_get()
   {
      $id = $this->get('id');
      if($id === null) {
         $mahasiswa = $this->mahasiswa_model->getMahasiswa();
      } else {
         $mahasiswa = $this->mahasiswa_model->getMahasiswa($id);
      }
      if($mahasiswa != null) {
         $this->response([
             'status' => true,
             'data' => $mahasiswa
         ], REST_Controller::HTTP_OK);
      } else {
         $this->response([
             'status' => false,
             'message' => 'id notfound'
         ], REST_Controller::HTTP_NOT_FOUND);
      }
   }

   public function index_delete()
   {
    $id = $this->delete('id');

    if($id === null) {
      $this->response([
          'status' => false,
          'message' => 'provide an id'
      ], REST_Controller::HTTP_BAD_REQUEST);
    } else {
      if($this->mahasiswa_model->deleteMhs($id) > 0) {
        $this->response([
            'status' => true,
            'id' => $id,
            'message' => 'deleted'
        ], REST_Controller::HTTP_NO_CONTENT);
      } else {
        $this->response([
            'status' => false,
            'message' => 'id notfound'
        ], REST_Controller::HTTP_BAD_REQUEST);
      }
    }
   }

   public function index_post()
   {
      $data = [
        'nrp' => $this->post('nrp'),
        'nama' => $this->post('nama'),
        'email' => $this->post('email'),
        'jurusan' => $this->post('jurusan'),
      ];

      if($this->mahasiswa_model->createMhs($data) > 0) {
        $this->response([
            'status' => true,
            'message' => 'new mahasiswa has been created.'
        ], REST_Controller::HTTP_CREATED);
      } else {
         $this->response([
             'status' => false,
             'message' => 'failed to create new data.'
         ], REST_Controller::HTTP_BAD_REQUEST);
      }
   }

   public function index_put()
   {
      $id = $this->put('id');

      $data = [
        'nrp' => $this->put('nrp'),
        'nama' => $this->put('nama'),
        'email' => $this->put('email'),
        'jurusan' => $this->put('jurusan'),
      ];
      if($this->mahasiswa_model->updateMhs($data, $id) > 0) {
        $this->response([
            'status' => true,
            'message' => 'mahasiswa has been updated.'
        ], REST_Controller::HTTP_NO_CONTENT);
      } else {
         $this->response([
             'status' => false,
             'message' => 'failed to updated new data.'
         ], REST_Controller::HTTP_BAD_REQUEST);
      }
   }
}