<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload');
	}

	public function hello()
	{
		echo "ddsadsa";
	}

	public function ekle()
	{
		$upload_path = './uploads/';

		// yoksa oluştur
		if (!is_dir($upload_path)) {
			mkdir($upload_path, 0755, true); 
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2048;

		$this->upload->initialize($config);

		if ($this->upload->do_upload('image')) {
			$uploaded_data = $this->upload->data();
			$image_url =base_url('uploads/' . $uploaded_data['file_name']);  //"http://localhost/project/app1/uploads". $uploaded_data['file_name'] ;
			
		} else {
			$error = $this->upload->display_errors();
    echo $error; 
    $image_url = "22222222";
		}

		$data = array(
			'urunBaslik' => $this->input->post('urunBaslik'),
			'urunEkBilgiBasligi' => $this->input->post('urunEkBilgiBasligi'),
			'urunEkBilgiAciklama' => $this->input->post('urunEkBilgiAciklama'),
			'metaTitle' => $this->input->post('metaTitle'),
			'metaKeyword' => $this->input->post('metaKeyword'),
			'product_code' => $this->input->post('product_code'),
			'quantity' => $this->input->post('quantity'),
			'extra_discount_percentage' => $this->input->post('extra_discount_percentage'),
			'tax_rate_percentage' => $this->input->post('tax_rate_percentage'),
			'sale_price' => $this->input->post('sale_price'),
			'musteriGrubu' => $this->input->post('musteriGrubu'),
			'oncelik' => $this->input->post('oncelik'),
			'price' => $this->input->post('price'),
			'currency' => $this->input->post('currency'),
			'baslangicTarihi' => $this->input->post('baslangicTarihi'),
			'bitisTarihi' => $this->input->post('bitisTarihi'),
			'image_url' => $image_url
		);

		if ($this->Product_model->insert($data)) {
			echo "Ürün başarıyla eklendi!";
		} else {
			echo "Hata: Ürün eklenirken bir sorun oluştu.";
		}


	}

	public function getir()
	{
		
		$this->load->model('Product_model');

		try {
			
			$products = $this->Product_model->get_all_products(); 

			if (!$products) {
				throw new Exception('Veriler getirilemedi.');
			}

			
			$data['products'] = $products;
			$this->load->view('EkleDuzenle', $data);

		} catch (Exception $e) {
			
			$data['error'] = $e->getMessage();
			$this->load->view('EkleDuzenle', $data);
		}
	}


	public function update($id)
	{
		$this->load->model('Product_model');  

		
		$data = json_decode(file_get_contents('php://input'), true);

		if (!$data) {
			$this->output
				->set_status_header(400) 
				->set_output(json_encode(['message' => 'Geçersiz veri']));
			return;
		}

		$updateData = array(
			'urunBaslik' => isset($data['urunBaslik']) ? $data['urunBaslik'] : null,
			'urunEkBilgiBasligi' => isset($data['urunEkBilgiBasligi']) ? $data['urunEkBilgiBasligi'] : null,
			'urunEkBilgiAciklama' => isset($data['urunEkBilgiAciklama']) ? $data['urunEkBilgiAciklama'] : null,
			'metaKeyword' => isset($data['metaKeyword']) ? $data['metaKeyword'] : null,
			'product_code' => isset($data['product_code']) ? $data['product_code'] : null,
			'quantity' => isset($data['quantity']) ? $data['quantity'] : null,
			'extra_discount_percentage' => isset($data['extra_discount_percentage']) ? $data['extra_discount_percentage'] : null,
			'tax_rate_percentage' => isset($data['tax_rate_percentage']) ? $data['tax_rate_percentage'] : null,
			'sale_price' => isset($data['sale_price']) ? $data['sale_price'] : null,
			'musteriGrubu' => isset($data['musteriGrubu']) ? $data['musteriGrubu'] : null,
			'oncelik' => isset($data['oncelik']) ? $data['oncelik'] : null,
			'price' => isset($data['price']) ? $data['price'] : null,
			'currency' => isset($data['currency']) ? $data['currency'] : null,
			'baslangicTarihi' => isset($data['baslangicTarihi']) ? $data['baslangicTarihi'] : null,
			'bitisTarihi' => isset($data['bitisTarihi']) ? $data['bitisTarihi'] : null
		);

		if ($this->Product_model->update_product($id, $updateData)) {
			$this->output
				->set_status_header(200)
				->set_output(json_encode(['message' => 'Güncelleme başarılı']));
		} else {
			log_message('debug', 'Güncelleme başarısız: ' . print_r($updateData, true));
			log_message('error', 'Veritabanı Hata Mesajı: ' . $this->db->error()['message']);

			$this->output
				->set_status_header(500)
				->set_output(json_encode(['message' => 'Güncelleme başarısız']));
		}
	}

	public function delete($id)
	{
		$this->load->model('Product_model');

		if ($this->Product_model->delete($id)) {
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['success' => true]));
		} else {
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['success' => false]));
		}
	}

}
