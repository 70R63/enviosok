<div class="card-body crypto-wallet">
    <div class="row row-sm">

        @foreach ($preferences as $preference)

        <div class="col-sm-6 col-md-6 col-xl-3">
            <div class="card custom-card">
                <div class="card-body user-card text-center">
                    <div class="main-img-user avatar-lg online text-center">
                        <img alt="avatar" class="rounded-circle" src="../../assets/img/users/5.jpg">
                    </div>
                    <div class="mt-2">
                        <h5 class="mb-1">{{$preference['unit_price']}}</h5>
                        <p class="mb-1 tx-inverse">{{$preference['currency_id']}}</p>
                        <span class="text-muted"><i class="far fa-check-circle text-success mr-1"></i>Verified</span>
                    </div>
                    <a href="{{$preference['init_point']}}" class="btn ripple btn-primary mt-3">${{$preference['unit_price']}}</a>
                </div>
            </div>
        </div>

        @endforeach
        
        
    </div>
</div> 