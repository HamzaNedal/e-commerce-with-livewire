<div >
    <div class="mt-5">
	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row"  wire:ignore>
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                          
                            <div class="slick3 gallery-lb">
                                @foreach ($product->media as $media)
								<div class="item-slick3" data-thumb="{{ asset('storage/media/'.$media->file_name) }}">
									<div class="wrap-pic-w pos-relative">
										<img src="{{ asset('storage/media/'.$media->file_name) }}" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('storage/media/'.$media->file_name) }}">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
                                @endforeach
							</div>
                          
							

						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							{{ $product->name }}
						</h4>

						<span class="mtext-106 cl2">
							${{ $product->price }}
						</span>

						<p class="stext-102 cl3 p-t-23">
							{{ $product->name }}
						</p>
						
						<!--  -->
						<form wire:submit.prevent="addToCart">
							{{-- <input type="hidden" wire:mode="info.id" > --}}
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Size
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" id='size'>
											<option>Choose an option</option>
                                            @foreach ($product->sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->title }}</option>
                                            @endforeach
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Color
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0" >
										<select class="js-select2"  id="color">
											<option>Choose an option</option>
                                            @foreach ($product->colors as $color)
                                            <option value="{{ $color->id }}">{{ $color->title }}</option>
                                            @endforeach
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m quantity">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" id="quantity" name="num-product" value="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m quantity">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>

									<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04" >
										Add to cart
									</button>
								</div>
							</div>	
						</div>
					</form>
						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40" >
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link @if ($active == 'description') active @endif" data-toggle="tab" href="#description" wire:click='active("description")' role="tab">Description</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link @if ($active == 'information') active @endif" data-toggle="tab" href="#information" wire:click='active("information")' role="tab">Additional information</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link  @if ($active == 'reviews') active @endif" data-toggle="tab" href="#reviews" wire:click='active("reviews")' role="tab">Reviews ({{ $product->reviews->count() }})</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade @if ($active == 'description') show active @endif" id="description"  wire:click='active("description")' role="tabpanel" >
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									{{ $product->description }}
								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade  @if ($active == 'information') show active @endif" id="information"    role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">
                                        {{-- @dd($product->additional_information); --}}
                                        @foreach ($product->additional_information as $add)
                                            <li class="flex-w flex-t p-b-7">
                                                <span class="stext-102 cl3 size-205">
                                                    {{ $add->display_name }}
                                                </span>

                                                <span class="stext-102 cl6 size-206">
                                                    {{ $add->value }}
                                                </span>
                                            </li>

                                        @endforeach
									
			
									</ul>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade @if ($active == 'reviews') show active @endif" id="reviews" role="tabpanel" wire:click='active("reviews")'>
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">
										<!-- Review -->
                                        @foreach ($product->reviews as $review)
                                        <div class="flex-w flex-t p-b-68">
											<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
												<img src="{{ asset('frontend') }}/images/avatar-01.jpg" alt="AVATAR">
											</div>

											<div class="size-207">
												<div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20">
														{{ $review->guest_name }}
													</span>

													<span class="fs-18 cl11">
                                                        @foreach (range(1, $review->stars) as $number)
                                                         <i class="zmdi zmdi-star"></i>
                                                        @endforeach
													</span>
												</div>

												<p class="stext-102 cl6">
													{{ $review->description }}
												</p>
											</div>
										</div>
                                        @endforeach
									
										
										<!-- Add review -->
										<form class="w-full" wire:submit.prevent="save" >
											<h5 class="mtext-108 cl2 p-b-7">
												Add a review
											</h5>

											<p class="stext-102 cl6">
												Your email address will not be published. Required fields are marked *
											</p>

											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Your Rating
												</span>

												<span class="wrap-rating fs-18 cl11 pointer" >
													<i class="item-rating pointer zmdi zmdi-star-outline" value='1'></i>
													<i class="item-rating pointer zmdi zmdi-star-outline" value='2'></i>
													<i class="item-rating pointer zmdi zmdi-star-outline" value='3'></i>
													<i class="item-rating pointer zmdi zmdi-star-outline" value='4'></i>
													<i class="item-rating pointer zmdi zmdi-star-outline" value='5'></i>
													<input class="dis-none" type="number" id="rating" name="rating" >
												</span>
											</div>

											<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Your review</label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" wire:model.defer='info.reviews.description' name="review"></textarea>
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="name">Name</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" wire:model.defer='info.reviews.name' name="name">
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="email">Email</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" wire:model.defer='info.reviews.email' name="email">
												</div>
											</div>

											<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10" >
												Submit
											</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">

			<span class="stext-107 cl6 p-lr-25">
				Category: {{ $product->category->title }}
			</span>
		</div>
	</section>
	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105" wire:ignore>
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
                    {{-- @dd($product->category->products()->where('status',1)->get()) --}}
                    @foreach ($product->category->products()->where('status',1)->where('id','<>',$product->id)->limit(5)->get() as $product)
                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="{{ asset('storage/media/'.$product->media[0]->file_name) }}" alt="IMG-PRODUCT">
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="{{ route('product_details', ['slug'=>$product->slug]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										{{ $product->name }}
									</a>

									<span class="stext-105 cl3">
										${{ $product->price }}
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										{{-- <img class="icon-heart1 dis-block trans-04" src="{{ asset('frontend') }}/images/icons/icon-heart-01.png" alt="ICON"> --}}
										{{-- <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('frontend') }}/images/icons/icon-heart-02.png" alt="ICON"> --}}
									</a>
								</div>
							</div>
						</div>
					</div>
                    @endforeach
				</div>
			</div>
		</div>
	</section>
    </div>

</div>
@push('js')
    <script>
        $('.item-rating').on('click',function(){
            @this.set(`info.reviews.stars`, $(this).attr('value'));
        });
		$('.quantity').on('click',function(){
            @this.set(`info.quantity`, $('#quantity').val());
        });
		$('#size').on('change',function(){
            @this.set(`info.size`, $('#size').val());
        });
		$('#color').on('change',function(){
            @this.set(`info.color`, $('#color').val());
        });
    </script>
@endpush