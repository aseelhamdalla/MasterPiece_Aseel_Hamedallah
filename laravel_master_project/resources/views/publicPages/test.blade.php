
<div class="container ">
    <h4 class="card-title">Related Services</h4>
    <div class="row">

        @if (isset($RelatedServices))
            @foreach ($RelatedServices as $one)

                {{-- ***********************To prevent show the same service in related service --}}
                @if ($one->id == $services->id)


                @else
                    <div class="col-lg-4">
                        <div class="service-view">
                            <div class="service-widget">
                                <div class="service-img">
                                    <a href="{{ $one->id }}">
                                        <img class="img-fluid serv-img" alt="Service Image"
                                            src="{{ asset('uploads/photo/' . $one->image) }}">
                                    </a>

                                    <div class="item-info">
                                        <div class="service-user">
                                            <a href="#">
                                                <img src="{{ asset('uploads/photo/' . $one->ProviderService->info->image) }}"
                                                    alt="">
                                            </a>
                                            <span class="service-price">{{ $one->price }}</span>
                                        </div>
                                        <div class="cate-list">
                                            <a class="bg-yellow" href="service-details.html">{{ $catName }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-content">
                                    <h3 class="title">
                                        <a href="service-details.html">{{ $one->name }}</a>
                                    </h3>
                                    <div class="rating">
                                        @if (isset($reviewSum) && !empty($reviewSum))
                                            @for ($star = 1; $star <= 5; $star++)

                                                @if ($reviewSum >= $star) <i
                                                class="fas fa-star filled "></i>
                                            @else
                                                <i class="fas fa-star "></i> @endif
                                            @endfor

                                            <span class="d-inline-block average-rating">({{ $reviewSum }})</span>
                                        @endif
                                    </div>

                                    <div class="user-info">
                                        <div class="row">
                                            <span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i>
                                                <span>xxxxxxxx30</span></span>
                                            <span class="col ser-location"><span>{{ $one->location }}</span> <i
                                                    class="fas fa-map-marker-alt ml-1"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            @endforeach
        @endif
    </div>
</div>

</div>
</div>
