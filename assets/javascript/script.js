function openTab(tabName) {
    if (tabName === 'Paris') {
      // Paris sekmesine basıldığında URL'ye yönlendir
      window.location.href = "http://localhost/project/app1/Welcome/getir";
      return;
  }
  else if (tabName === 'London') {
    window.location.href = "http://localhost/project/app1/Welcome/";
    return;
}

  }



  $(document).ready(function () {
      $('#saveButton').click(function () {
          
        var formData = new FormData();
        formData.append('urunBaslik', $('#field1').val());
        formData.append('urunEkBilgiBasligi', $('#field2').val());
        formData.append('urunEkBilgiAciklama', $('#field3').val());
        formData.append('metaTitle', $('#field4').val());
        formData.append('metaKeyword', $('#field4').val());
        formData.append('product_code', $('#field6').val());
        formData.append('quantity', $('#field7').val());
        formData.append('extra_discount_percentage', $('#field8').val());
        formData.append('tax_rate_percentage', $('#field9').val());
        formData.append('sale_price', $('#field10').val());
        formData.append('musteriGrubu', $('#field11').val());
        formData.append('oncelik', $('#field12').val());
        formData.append('price', $('#field14').val());
        formData.append('currency', $('#field13').val());
        formData.append('baslangicTarihi', $('#field15').val());
        formData.append('bitisTarihi', $('#field16').val());

        // Dosya ekleme
        var fileInput = $('#image')[0];
        if (fileInput.files.length > 0) {
            formData.append('image', fileInput.files[0]);
        }

        // AJAX ile veri gönderimi
        $.ajax({
            url: 'http://localhost/project/app1/Welcome/ekle',
            type: 'POST',
            data: formData,
            contentType: false, // İçerik türünü ayarlamayın
            processData: false, // jQuery'nin veri işleme işlevini devre dışı bırakın
            success: function (response) {
                alert('Ürün başarıyla eklendi!');
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
                console.log(error);
                alert('Bir hata oluştu: ' + error);
            }
        });
    });
  });