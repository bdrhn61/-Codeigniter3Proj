<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="http://localhost/project/app1/assets/css/style.css">
  <style>

  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="http://localhost/project/app1/assets/javascript/script.js"></script>

</head>
<body>

<h1>Ürün</h1>


<div class="tabs-container">
  <button onclick="openTab('London')" class="tab">Ürün Ekle</button>
  <button onclick="openTab('Paris')" class="tab">Listele Ve Düzenle</button>
</div>

<div id="London" class="tabcontent"></div>
<div id="Paris" class="tabcontent"></div>

<div class="grid-container">
    <div class="grid-item">
        <form>
            <div class="form-group">
                <label for="field1"> * Ürün Başlık    :    </label>
              
            </div>
            <div class="form-group">
                <label for="field2">Ürün Ek Bilgi Başlığı:</label>
                
            </div>
            <div class="form-group">
                <label for="field3">Ürün Ek Bilgi Açıklama:</label>
              
            </div>
            <div class="form-group">
                <label for="field4">Meta Title:</label>
              
            </div>
            <div class="form-group">
                <label for="field5">Meta Keywords:</label>
               
            </div>
            <div class="form-group">
                <label for="field6">* Ürün Kodu: </label>
               
            </div>
            <div class="form-group">
                <label for="field7">* Miktar:</label>
               
            </div>
            <div class="form-group">
                <label for="field8">* Sepet Ekstra İndirim %:</label>
               
            </div>
            <div class="form-group">
                <label for="field9">* Vergi Oranı %:</label>
               
            </div>
            <div class="form-group">
                <label for="field9">* Satış Fiyatı:</label>
               
            </div>
            <div class="form-group">
                <label for="field10">Müşteri Grubu:</label>
               
            </div>
            <div class="form-group">
                <label for="field11">Öncelik:</label>
               
            </div>
            <div class="form-group">
                <label for="field10">Yüzde İndirim Oranı</label>
               
            </div>
            <div class="form-group">
                <label for="field10">İndirimli Fiyat</label>
               
            </div>
            <div class="form-group">
                <label for="field11">Başlangıç Ve Bitiş Tarihi</label>
               
            </div>
            <div class="form-group">
                <label for="field11">Resim:</label>
               
            </div>
            
            
           
        </form>


    </div>
    <div class="grid-item">

        <form  id="productForm" action="/home/saveProduct" method="post">
        <div class="form-group">
            <input type="text" name="urunBaslik" id="field1" name="field1">
        </div>
        <div class="form-group">
            <input type="text" name="urunEkBilgiBasligi" id="field2" name="field2">
        </div>
        <div class="form-group">
            <input type="text" name="urunEkBilgiAciklama" id="field3" name="field3">
        </div>
        <div class="form-group">
            <input type="text" name="metaTitle" id="field4" name="field4">
        </div>
        <div class="form-group">
            <input type="text" name="metaKeyword" id="field5" name="field5">
        </div>
        <div class="form-group">
            <input type="text" name="product_code" id="field6" name="field6">
        </div>
        <div class="form-group">
            <input type="text" name="quantity" id="field7" name="field7">
        </div>
        <div class="form-group">
            <input type="text" name="extra_discount_percentage" id="field8" name="field8">
        </div>
        <div class="form-group">
            <input type="text" name="tax_rate_percentage" id="field9" name="field9">
        </div>
        <div class="form-group">
            <input type="text" name="sale_price" id="field10" name="field10">
        </div>

        <div class="custom-select" >
        <select id="field11" name="musteriGrubu" class="field11">
            <option value="" disabled selected>Müşteri</option> 
          <option value="1">1</option>
          <option value="2">2</option>
         
        </select>
      </div>

      <div class="form-group" >
        <input type="text" id="field12" name="oncelik" class="field12">
      </div>
      <div class="custom-select" >
      <select id="field13" name="price" class="field13">
                <option value="" disabled selected>TL            </option> 
                <option value="0">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
                <option value="60">60</option>
                <option value="70">70</option>
                <option value="80">80</option>
                <option value="90">90</option>
                <option value="100">100</option>
             
            </select>
            </div>
            <div class="form-group" >
                    <input type="text" id="field14" name="currency" class="field14">
                  </div>

                  <div class="custom-select" >
        <input type="date" id="field15" name="baslangicTarihi" class="field15">
      </div>
      <div class="custom-select" >
        <input type="date" id="field16" name="bitisTarihi" class="field16">
      </div>
            </form>
           
    <input type="file" id="image" name="image" accept="image/*">
    </div>

    

</div>
<div class="buttons-container">
    <button class="save-button" id="saveButton">Kaydet</button>
  </div>





</body>
</html>