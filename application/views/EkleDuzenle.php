<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/project/app1/assets/css/style.css">
    <style>

    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://localhost/project/app1/assets/javascript/duzenle.js"></script>

    <script>

    </script>

</head>

<body>
    <h1>Ürün Listesi</h1>



    <div class="tabs-container">
        <button onclick="openTab('London')" class="tab">Ürün Ekle</button>
        <button onclick="openTab('EkleDuzenle')" class="tab">Listele ve Düzenle</button>

    </div>

    <div id="London" class="tabcontent"></div>
    <div id="EkleDuzenle" class="tabcontent"></div>

    <?php if (isset($error)): ?>
        <div style="color: red;">
            <strong>Hata:</strong> <?= html_escape($error); ?>
        </div>
    <?php else: ?>
        <div class="table-container">

            <table>
                <thead>
                    <tr>
                        <th>İd</th>
                        <th>Ürün Adı</th>
                        <th>Resim</th>
                        <th>Fiyat</th>
                        <th>Para Birimi</th>
                        <th>Meta Keyword</th>
                        <th>Ürün Kodu</th>
                        <th>Miktar</th>
                        <th>Extra İndirim Yüzdesi </th>
                        <th>Vergi Oranı Yüzdesi</th>
                        <th>İndirimli Fiyat</th>
                        <th>musteriGrubu</th>
                        <th>oncelik</th>
                        <th>Fiyat</th>
                        <th>Para Birimi</th>
                        <th>Baslangic Tarihi</th>
                        <th>Bitis Tarihi</th>
                        <th>İşlemler</th>
                        <th>Sil</th>


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr data-id="<?= html_escape( $product->id); ?>">
                            <td data-field="id" contenteditable="false"><?= html_escape($product->id); ?></td>
                            <td data-field="urunBaslik" contenteditable="false"><?= html_escape($product->urunBaslik ); ?></td>
                            <td>
                                <?php if (!empty( $product->image_url )): ?>
                                    <img src="<?= html_escape($product->image_url); ?>" width="100">
                                <?php else: ?>
                                    Resim Yok                                
                                <?php endif; ?>
                            </td> <!-- Resim sütunu -->
                            <td data-field="urunEkBilgiBasligi" contenteditable="false">
                                <?= html_escape($product->urunEkBilgiBasligi ); ?></td>
                            <td data-field="urunEkBilgiAciklama" contenteditable="false">
                                <?= html_escape( $product->urunEkBilgiAciklama ); ?></td>
                            <td data-field="metaKeyword" contenteditable="false"><?= html_escape($product->metaKeyword); ?>
                            </td>
                            <td data-field="product_code" contenteditable="false"><?= html_escape($product->product_code ); ?>
                            </td>
                            <td data-field="quantity" contenteditable="false"><?= html_escape($product->quantity ); ?></td>
                            <td data-field="extra_discount_percentage" contenteditable="false">
                                <?= html_escape(  $product->extra_discount_percentage ); ?></td>
                            <td data-field="tax_rate_percentage" contenteditable="false">
                                <?= html_escape($product->tax_rate_percentage ); ?></td>
                            <td data-field="sale_price" contenteditable="false"><?= html_escape($product->sale_price ); ?></td>
                            <td data-field="musteriGrubu" contenteditable="false"><?= html_escape($product->musteriGrubu ); ?>
                            </td>
                            <td data-field="oncelik" contenteditable="false"><?= html_escape($product->oncelik); ?></td>
                            <td data-field="price" contenteditable="false"><?= html_escape($product->price ); ?></td>
                            <td data-field="currency" contenteditable="false"><?= html_escape($product->currency ); ?></td>
                            <td data-field="baslangicTarihi" contenteditable="false">
                                <?= html_escape($product->baslangicTarihi ); ?></td>
                            <td data-field="bitisTarihi" contenteditable="false"><?= html_escape($product->bitisTarihi ); ?>
                            </td>

                            <td>
                                <button class="edit-button" onclick="toggleEdit(this)">Düzenle</button>


                            </td>
                            <td>
                                <button class="delete-button" onclick="deleteRow(this)">Sil</button>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php endif; ?>



</body>

</html>