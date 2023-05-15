<div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="companyModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" id="modalDialog">
      <div class="modal-content">
        
        <div class="modal-body" id="companyModalBody">
          <div class="row border-bottom mb-4 py-4">
            <blockquote class="blockquote text-center" id="modalTitle">
                <p>Bir Firma Oluştur</p>
            </blockquote>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="companyname" placeholder="RandevularNet">
                <label for="companyname" class="px-4">Firma Adı</label>
                
            </div>
            <a href="javascript:void(0)" id="choosePlan" class="btn btn-success m-auto col-2 d-none">Devam</a>
          </div>
          <div class="row">
            <blockquote class="blockquote text-center">
                <p>Bir Firmaya Katıl</p>
            </blockquote>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput" class="px-4">Davet Kodu</label>
            </div>
              
          </div>
          <div class="row">
            <mark class="text-muted px-4">Bir firma oluşturarak ya da var olan bir firmaya katılarak kullanmaya başlayabilirsin.</mark>
          </div>
        </div>

        <div class="modal-body d-none" id="choosePlanModalBody">
          <div class="row border-bottom mb-4 py-4">
            <blockquote class="blockquote text-center" id="modalTitle">
                <p>Bir Plan Seç</p>
            </blockquote>
            
            <a href="javascript:void(0)" id="choosePlan" class="btn btn-success m-auto col-2 d-none">Devam</a>
          </div>
          <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">

            @foreach ($plans as $plan)
            <div class="col">
              <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                  <h4 class="my-0 fw-normal">{{$plan->title}}</h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title">{{$plan->price}}₺<small class="text-body-secondary fw-light">/ay</small></h1>
                  <ul class="list-unstyled mt-3 mb-4 text-start">
                    <li><i class="fas fa-envelope"></i> {{$plan->email}} E-posta</li>
                    <li><i class="fas fa-hdd"></i> {{$plan->storage}} MB Depolama</li>
                    <li><i class="fas fa-users"></i> {{$plan->customer}} Müşteri</li>
                    <li><i class="fas fa-user-tie"></i> {{$plan->staff}} Kullanıcı</li>
                  </ul>
                  <button type="button" class="w-100 btn btn-lg btn-outline-primary choosePlanBtn" id="{{$plan->id}}">Seç</button>
                </div>
              </div>
            </div>
            @endforeach
            
            
            
          </div>
        </div>

        <div class="modal-body d-none" id="choosePeriodModalBody">
          <div class="row border-bottom mb-4 py-4">
            <blockquote class="blockquote text-center" id="modalTitle">
                <p>Ödeme Periyodu Seç</p>
            </blockquote>
          </div>
          <div class="row mb-4 text-center">
            <div class="col">
              Firma Adı: <b id="companyNameVal"></b><br>
              Plan:   <b id="planVal"></b>
            </div>
          </div>
          <div class="row  mb-3 text-center">

            <div class="col-3">
              <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                  <h4 class="my-0 fw-normal">Aylık</h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title"><span id="aylik"></span><small class="text-body-secondary fw-light">₺/ay</small></h1>
                  
                  <button type="button" class="w-100 btn btn-lg btn-outline-primary choosePeriodBtn" id="1">Başla</button>
                </div>
              </div>
            </div>

            <div class="col-3">
              <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                  <h4 class="my-0 fw-normal">3 Aylık <span class="badge float-end" id="ucaylikbadge"></span></h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title"><span id="ucaylik"></span><small class="text-body-secondary fw-light">₺/3 ay</small></h1>
                  
                  <button type="button" class="w-100 btn btn-lg btn-outline-primary choosePeriodBtn" id="2">Başla</button>
                </div>
              </div>
            </div>

            <div class="col-3">
              <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                  <h4 class="my-0 fw-normal">6 Aylık <span class="badge float-end" id="altiaylikbadge"></span></h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title"><span id="altiaylik"></span><small class="text-body-secondary fw-light">₺/6 ay</small></h1>
                  
                  <button type="button" class="w-100 btn btn-lg btn-outline-primary choosePeriodBtn" id="3">Başla</button>
                </div>
              </div>
            </div>


            <div class="col-3">
              <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                  <h4 class="my-0 fw-normal">1 Yıllık <span class="badge float-end" id="yillikbadge"></span></h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title"><span id="yillik"></span><small class="text-body-secondary fw-light">₺/yıl</small></h1>
                  
                  


                  <button type="button" class="w-100 btn btn-lg btn-outline-primary choosePeriodBtn" id="4">Başla</button>
                </div>
              </div>
            </div>
            <form action="javascript:void(0)" id="companyCreateForm">
              <input type="hidden" name="companyNameData" id="companyNameData">
              <input type="hidden" name="PlanIdData" id="PlanIdData">
              <input type="hidden" name="PeriodData" id="PeriodData">
              <input type="hidden" name="PriceData" id="PriceData">
              <a href="javascript:void(0)" class="btn btn-outline-success btn-lg d-none" id="companyCreate">Tamamla</a>
            </form>
            
            
          </div>
        </div>
        
      </div>
    </div>
  </div>


  