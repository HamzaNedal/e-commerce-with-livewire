@extends('layouts.app')
@section('content')


    	<!-- Slider -->
		@if ($sliders->IsNOtEmpty())
		<section class="section-slide">
			<div class="wrap-slick1">
				<div class="slick1">
					@foreach ($sliders as $slider)
					<div class="item-slick1" style="background-image: url({{ asset('storage/slider/'.$slider->image) }});">
						<div class="container h-full">
							<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
								<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
									<span class="ltext-101 cl2 respon2">
										{{ $slider->description }}
										
									</span>
								</div>
									
								<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
									<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
										{{ $slider->title }}
									</h2>
								</div>
									
								<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
									<a href="{{ $slider->link }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
										Shop Now
									</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
		
	

				</div>
			</div>
		</section>
		@endif
	<!-- Banner -->
	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
				{{-- @foreach ($categories as $category)
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="{{ asset('frontend') }}/images/about-01.jpg" alt="IMG-BANNER" style="width: 100px !important">

						<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									{{ $category->title }}
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
				@endforeach --}}



			</div>
		</div>
	</div>


	<!-- Product -->
	<livewire:frontend.show-products :categories="$categories" />

@endsection