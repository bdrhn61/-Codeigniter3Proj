function openTab(tabName) {
    if (tabName === 'Paris') {
      // Paris sekmesine basıldığında URL'ye yönlendir
      window.location.href = "http://localhost/project/app1/Welcome/getir";
      return;
  }
  else if (tabName === 'London') {
    window.location.href = "http://localhost/project/app1/";
    return;
}

  }

function deleteRow(button) {
    var row = button.parentElement.parentElement; // Tıklanan butonun bulunduğu satırı seç
    var id = row.getAttribute('data-id'); // Satırın id'sini al

    if (confirm('Bu ürünü silmek istediğinize emin misiniz?')) {
        // Silme işlemi için AJAX isteği gönder
        fetch(`http://localhost/project/app1/Welcome/delete/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest', // CSRF koruması için kullanılır
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                row.remove(); // Başarılı olursa satırı sayfadan kaldır
                alert('Ürün başarıyla silindi.'); // Başarılı mesajı
            } else {
                alert('Ürün silinirken bir hata oluştu.'); // Hata mesajı
            }
        })
        .catch(error => {
            console.error('Hata:', error);
            alert('Silme işlemi sırasında bir hata oluştu.'); // Sunucu hatası mesajı
        });
    }
}

    function toggleEdit(button) {
        var row = button.closest('tr');
    var cells = row.getElementsByTagName('td');
    var isEditing = button.textContent === 'Düzenle';

    for (var i = 1; i < cells.length - 1; i++) {
        cells[i].contentEditable = isEditing;
        cells[i].classList.toggle('editable', isEditing);
    }

    button.textContent = isEditing ? 'Kaydet' : 'Düzenle';

    if (!isEditing) {
        var productId = row.getAttribute('data-id');
        if (!productId) {
            alert('Ürün ID bulunamadı.');
            return;
        }

        var updatedData = {};
        for (var i = 1; i < cells.length - 1; i++) {
            updatedData[cells[i].getAttribute('data-field')] = cells[i].textContent;
        }

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://localhost/project/app1/Welcome/update/' + productId, true);
        xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
        xhr.send(JSON.stringify(updatedData));

        xhr.onload = function () {
            if (xhr.status === 200) {
                alert('Veriler başarıyla güncellendi.');
            } else {
                alert('Veriler güncellenirken bir hata oluştu.');
            }
        };
    }
    }