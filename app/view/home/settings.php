<?php 


switch ($request[3]) {
    case 'sms':

        ?>
        <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">SMS</h4>
                
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/home/">Yönetim</a></li>
                    <li class="breadcrumb-item active">SMS</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Talimatlar</h4>
                <p class="text-muted">
                    Sistemin aktif bir şekilde onay kodu gönderebilmesi için yeterli SMS bakiyesinin olması gereklidir. SMS bakiyeleri en az 1.000 adet olmak üzere periyotlarla alınır. SMS paketerinin herhangi bir zaman sınırı bulunmamaktadır, aldığınız paketleri bitene kadar istediğiniz zaman kullanabilirsiniz.
                </p>
                <h4 class="card-title">Nasıl SMS Paketi Alınır?</h4>
                <p class="text-muted">
                    SMS paketi satın almak için aşağıdaki paketlerden istediğiniz seçin ve "Satın Al" butonuna tıklayın. Sistem sizi otomatik olarak satın alma sayfasına yönlendirecektir. Açılan sayfadan kredi kartı bilgilerinizi girerek online ödeme yapabilirsiniz. Yönlendirileceğiniz sayfa tamamen güvenlidir ve kredi kartı bilgilerinizi saklamaz. Sanal pos sistemlerimizde "3D Secure" ile güvenlik sağlanmaktadır ve ödeme işlemleriniz için SMS onayı istenecektir.
                </p>   
                <p class="text-muted">
                    SMS paketinizin hesabınıza sorunsuz bir şekilde tanımlanması için lütfen alışveriş esnasında sipariş açıklamasına "SITE_KEY" kodunuzu girin. Yanlış kod yazılması ya da açıklamanın boş bırakılmasından dolayı oluşabilecek aksaklıklardan kendiniz sorumlusunuz.
                </p>

                <p class="text-muted">
                   ** Paket fiyatlarına sanal pos komisyonu dahil değildir.
                </p>

                <div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="text-center mt-4 mb-4">
            <h4>SITE KEY:</h4>
            <input type="text" value="202210002" style="font-weight:bold" class="form-control-lg text-center font-weight-bold text-muted" disabled/>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="text-center mb-5">
            <h4>SMS Paketleri</h4>
            <p class="text-muted">Almak istediğiniz SMS paketini seçin. </p>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-3 col-md-6">
        <div class="card plan-box">
            <div class="card-body p-4">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h5>Paket 1</h5>
                        <p class="text-muted">Hesabınıza 1.000 adet SMS yükler</p>
                    </div>
                    <div class="flex-shrink-0 ms-3">
                        <i class="fas fa-sms h1 text-primary "></i>
                    </div>
                </div>
                <div class="py-4">
                    <h2> 59<sup><small>₺</small></sup>/ <span class="font-size-13">1.000 <sup><small>ADET SMS</small></sup></span></h2>
                </div>
                <div class="text-center plan-btn">
                    <a href="https://shopier.com/13410927" target="_blank" class="btn btn-primary btn-sm waves-effect waves-light">Satın Al</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card plan-box">
            <div class="card-body p-4">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h5>Paket 2</h5>
                        <p class="text-muted">Hesabınıza 2.500 adet SMS yükler</p>
                    </div>
                    <div class="flex-shrink-0 ms-3">
                        <i class="fas fa-sms h1 text-primary "></i>
                    </div>
                </div>
                <div class="py-4">
                    <h2> 147<sup><small>₺</small></sup>/ <span class="font-size-13">2.500 <sup><small>ADET SMS</small></sup></span></h2>
                </div>
                <div class="text-center plan-btn">
                <a href="https://shopier.com/13411156" target="_blank" class="btn btn-primary btn-sm waves-effect waves-light">Satın Al</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card plan-box">
            <div class="card-body p-4">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h5>Paket 3</h5>
                        <p class="text-muted">Hesabınıza 5.000 adet SMS yükler</p>
                    </div>
                    <div class="flex-shrink-0 ms-3">
                        <i class="fas fa-sms h1 text-primary "></i>
                    </div>
                </div>
                <div class="py-4">
                    <h2> 295<sup><small>₺</small></sup>/ <span class="font-size-13">5.000 <sup><small>ADET SMS</small></sup></span></h2>
                </div>
                <div class="text-center plan-btn">
                <a href="https://shopier.com/13411185" target="_blank" class="btn btn-primary btn-sm waves-effect waves-light">Satın Al</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card plan-box">
            <div class="card-body p-4">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h5>Paket 4</h5>
                        <p class="text-muted">Hesabınıza 10.000 adet SMS yükler</p>
                    </div>
                    <div class="flex-shrink-0 ms-3">
                        <i class="fas fa-sms h1 text-primary "></i>
                    </div>
                </div>
                <div class="py-4">
                    <h2> 590<sup><small>₺</small></sup>/ <span class="font-size-13">10.000 <sup><small>ADET SMS</small></sup></span></h2>
                </div>
                <div class="text-center plan-btn">
                <a href="https://shopier.com/13411227" target="_blank" class="btn btn-primary btn-sm waves-effect waves-light">Satın Al</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card plan-box">
            <div class="card-body p-4">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h5>Paket 5</h5>
                        <p class="text-muted">Hesabınıza 20.000 adet SMS yükler</p>
                    </div>
                    <div class="flex-shrink-0 ms-3">
                        <i class="fas fa-sms h1 text-primary "></i>
                    </div>
                </div>
                <div class="py-4">
                    <h2> 1.180<sup><small>₺</small></sup>/ <span class="font-size-13">20.000 <sup><small>ADET SMS</small></sup></span></h2>
                </div>
                <div class="text-center plan-btn">
                <a href="https://shopier.com/13411251" target="_blank" class="btn btn-primary btn-sm waves-effect waves-light">Satın Al</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card plan-box">
            <div class="card-body p-4">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h5>Paket 6</h5>
                        <p class="text-muted">Hesabınıza 25.000 adet SMS yükler</p>
                    </div>
                    <div class="flex-shrink-0 ms-3">
                        <i class="fas fa-sms h1 text-primary "></i>
                    </div>
                </div>
                <div class="py-4">
                    <h2> 1.475<sup><small>₺</small></sup>/ <span class="font-size-13">25.000 <sup><small>ADET SMS</small></sup></span></h2>
                </div>
                <div class="text-center plan-btn">
                <a href="https://shopier.com/13411268" target="_blank" class="btn btn-primary btn-sm waves-effect waves-light">Satın Al</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card plan-box">
            <div class="card-body p-4">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h5>Paket 7</h5>
                        <p class="text-muted">Hesabınıza 50.000 adet SMS yükler</p>
                    </div>
                    <div class="flex-shrink-0 ms-3">
                        <i class="fas fa-sms h1 text-primary "></i>
                    </div>
                </div>
                <div class="py-4">
                    <h2> 2.950<sup><small>₺</small></sup>/ <span class="font-size-13">50.000 <sup><small>ADET SMS</small></sup></span></h2>
                </div>
                <div class="text-center plan-btn">
                <a href="https://shopier.com/13411282" target="_blank" class="btn btn-primary btn-sm waves-effect waves-light">Satın Al</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card plan-box">
            <div class="card-body p-4">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h5>Paket 8</h5>
                        <p class="text-muted">Hesabınıza 100.000 adet SMS yükler</p>
                    </div>
                    <div class="flex-shrink-0 ms-3">
                        <i class="fas fa-sms h1 text-primary "></i>
                    </div>
                </div>
                <div class="py-4">
                    <h2> 5.900<sup><small>₺</small></sup>/ <span class="font-size-13">100.000 <sup><small>ADET SMS</small></sup></span></h2>
                </div>
                <div class="text-center plan-btn">
                <a href="https://shopier.com/13411303" target="_blank" class="btn btn-primary btn-sm waves-effect waves-light">Satın Al</a>
                </div>
            </div>
        </div>
    </div>
    
    
    
</div>
<?php



        break;
    case 'plan':
        ?>
        <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Planı Yükselt</h4>
                
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/home/">Yönetim</a></li>
                    <li class="breadcrumb-item active">Paket Fiyatları</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Talimatlar</h4>
                <p class="text-muted">
                    Kullandığınız randevu sisteminde bazı sınırlamalar mevcuttur. Bu sınırlamalar aldığınız paket dahilinde verilen limitlerdir. Sisteminizde bulunan limitli alanlar şu şekildedir:
                </p>
                    <ul>
                        <li>Yönetici Adedi</li>
                        <li>Müşteri Adedi</li>
                        <li>SMS Kullanımı</li>
                    </ul>
                <p class="text-muted">
                    Bu sınırlar sistemin stabil çalışması için zorunlu olan sınırlamalardır ve bu sınırlamalar sayesinde ihtiyacınız olan özellikler kadar ödeme yaparak tasarruf yapabileceksiniz. Tüm paketlerimiz aylıktır fakat sınırlamaların herhangi bir süresi bulunmamaktadır. Örneğin, 5 adet yönetici kullanım hakkınız varsa, bir sonraki ay ödemenizi yaptığınızda paketinizde 5 adet yönetici hakkı eklenmeyecektir. Paket limitlerinizin yeterli gelmediği durumlarda bir üst pakete kolaylıkla geçebilirsiniz. 
                </p>
                <p class="text-muted">
                    Üst pakete geçmek için yapmanız gereken tek şey, geçmek istediğiniz paketi seçip "satın al" butonuna tıklamaktır. Satın alma işleminiz gerçekleştikten sonra sistem en fazla 2 saat içerisinde paket yükseltme işlemini gerçekleştirecek ve bu geçiş esnasında herhangi bir veri kaybı yaşamayacaksınız. Aynı zamanda, üst pakete geçişiniz sırasında, mevcut paketiniz üzerinden de sistem çalışmaya devam edecektir.
                </p>
                <p class="text-muted">
                    Ay ortasında yapılan geçişler için önceden bilgi vermeniz tavsiye edilir. Paket yükseltmelerde, önceki paketinizden kalan gün hakkınız ile fiyat hesaplaması yaparak ilk ay fiyatınız ona göre düşürülür. Paket düşürme işlemlerinde ise kalan kullanım hakkınız hesabınıza ilave edilir.
                </p>


                


                <p class="text-muted">
                   ** Paketler ücret iadesi mevcut değildir.
                </p>

                <div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="text-center mt-4 mb-4">
            <h4>SITE KEY:</h4>
            <input type="text" value="202210002" style="font-weight:bold" class="form-control-lg text-center font-weight-bold text-muted" disabled/>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="text-center mb-5">
            <h4>Paketlerimiz</h4>
            <p class="text-muted">Almak istediğiniz paketi seçin. </p>
        </div>
    </div>
</div>

<div class="row">

<div class="col-xl-3 col-md-6">
    <div class="card plan-box">
        <div class="card-body p-4">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <h5>Başlangıç</h5>
                    <p class="text-muted">Küçük işletmeler için ideal</p>
                </div>
                <div class="flex-shrink-0 ms-3">
                <i class="fas fa-cubes h1 text-primary"></i>
                </div>
            </div>
            <div class="py-4 text-center"><center>
                <h2> 129<sup><small>₺</small></sup>/ <span class="font-size-13">ay</span></h2>
            </div>
            <div class="text-center plan-btn">
                <a href="javascript: void(0);" class="btn btn-primary btn-sm waves-effect waves-light">Planı Seç</a>
            </div>

            <div class="plan-features mt-5">
                <p><i class="fa-solid fa-user-secret text-primary me-2"></i> 5 adet Yönetici Limiti</p>
                <p><i class="fa-solid fa-users  text-primary me-2"></i> 500 Adet Müşteri Limiti</p>
                <p><i class="fa-solid fa-sms text-primary me-2"></i> 100 Adet Hediye SMS</p>
                <p><i class="fab fa-instalod text-primary me-2"></i> Ücretsiz Kurulum</p>
                <p><i class="fas fa-headset text-primary me-2"></i> Ücretsiz Teknik Destek</p>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6">
    <div class="card plan-box">
        <div class="card-body p-4">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <h5>Standart</h5>
                    <p class="text-muted">Küçük işletmeler için ideal</p>
                </div>
                <div class="flex-shrink-0 ms-3">
                <i class="fas fa-cubes h1 text-primary"></i>
                </div>
            </div>
            <div class="py-4 text-center"><center>
                <h2> 199<sup><small>₺</small></sup>/ <span class="font-size-13">ay</span></h2>
            </div>
            <div class="text-center plan-btn">
                <a href="javascript: void(0);" class="btn btn-primary btn-sm waves-effect waves-light">Planı Seç</a>
            </div>

            <div class="plan-features mt-5">
                <p><i class="fa-solid fa-user-secret text-primary me-2"></i> 10 adet Yönetici Limiti</p>
                <p><i class="fa-solid fa-users  text-primary me-2"></i> 1.000 Adet Müşteri Limiti</p>
                <p><i class="fa-solid fa-sms text-primary me-2"></i> 100 Adet Hediye SMS</p>
                <p><i class="fab fa-instalod text-primary me-2"></i> Ücretsiz Kurulum</p>
                <p><i class="fas fa-headset text-primary me-2"></i> Ücretsiz Teknik Destek</p>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6">
    <div class="card plan-box">
        <div class="card-body p-4">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <h5>Profesyonel</h5>
                    <p class="text-muted">Küçük işletmeler için ideal</p>
                </div>
                <div class="flex-shrink-0 ms-3">
                <i class="fas fa-cubes h1 text-primary"></i>
                </div>
            </div>
            <div class="py-4 text-center"><center>
                <h2> 289<sup><small>₺</small></sup>/ <span class="font-size-13">ay</span></h2>
            </div>
            <div class="text-center plan-btn">
                <a href="javascript: void(0);" class="btn btn-primary btn-sm waves-effect waves-light">Planı Seç</a>
            </div>

            <div class="plan-features mt-5">
                <p><i class="fa-solid fa-user-secret text-primary me-2"></i> 20 adet Yönetici Limiti</p>
                <p><i class="fa-solid fa-users  text-primary me-2"></i> 2.000 Adet Müşteri Limiti</p>
                <p><i class="fa-solid fa-sms text-primary me-2"></i> 100 Adet Hediye SMS</p>
                <p><i class="fab fa-instalod text-primary me-2"></i> Ücretsiz Kurulum</p>
                <p><i class="fas fa-headset text-primary me-2"></i> Ücretsiz Teknik Destek</p>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card plan-box">
        <div class="card-body p-4">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <h5>Premium</h5>
                    <p class="text-muted">Küçük işletmeler için ideal</p>
                </div>
                <div class="flex-shrink-0 ms-3">
                <i class="fas fa-cubes h1 text-primary"></i>
                </div>
            </div>
            <div class="py-4 text-center"><center>
                <h2> 369<sup><small>₺</small></sup>/ <span class="font-size-13">ay</span></h2>
            </div>
            <div class="text-center plan-btn">
                <a href="javascript: void(0);" class="btn btn-primary btn-sm waves-effect waves-light">Planı Seç</a>
            </div>

            <div class="plan-features mt-5">
                <p><i class="fa-solid fa-user-secret text-primary me-2"></i> 50 adet Yönetici Limiti</p>
                <p><i class="fa-solid fa-users  text-primary me-2"></i> 5.000 Adet Müşteri Limiti</p>
                <p><i class="fa-solid fa-sms text-primary me-2"></i> 100 Adet Hediye SMS</p>
                <p><i class="fab fa-instalod text-primary me-2"></i> Ücretsiz Kurulum</p>
                <p><i class="fas fa-headset text-primary me-2"></i> Ücretsiz Teknik Destek</p>
            </div>
        </div>
    </div>
</div>

</div>
<?php


        break;
}