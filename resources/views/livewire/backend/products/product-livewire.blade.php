
<div>
    <form class="m-form m-form--fit m-form--label-align-right col-md-12" wire:submit.prevent="save" enctype="multipart/form-data">
       <div class="m-portlet__body">
          {{-- <div class="form-group m-form__group m--margin-top-10">
             <div class="alert m-alert m-alert--default" role="alert">
                The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
             </div>
          </div> --}}
          <div class="form-group m-form__group row">
             <div class="col-md-3">
                <label for="name">
               {{ __("Name") }}
            </label>
            <input type="hidden" wire:model="product.id">
               <input type="text" wire:model="product.name" class="form-control m-input @error('product.name') is-invalid @enderror" id="name" aria-describedby="name" placeholder="Enter name">
               @error('product.name') <small class="invalid-feedback">{{ $message }}</small> @enderror
            </div>
            <div class="col-md-3">
               <label for="stock">
                  {{ __("Stock") }}
               </label>
               <input type="text" wire:model="product.stock" class="form-control m-input @error('product.stock') is-invalid @enderror" id="stock" aria-describedby="stock" placeholder="Enter stock">
                  @error('product.stock') <small class="invalid-feedback">{{ $message }}</small> @enderror
            </div>
            <div class="col-md-3">
               <label for="price">
                  {{ __("Price") }}
               </label>
               <input type="text" wire:model="product.price" class="form-control m-input @error('product.price') is-invalid @enderror" id="price" aria-describedby="price" placeholder="Enter price">
                  @error('product.price') <small class="invalid-feedback">{{ $message }}</small> @enderror
            </div>
             <div class="col-md-6">
               <label for="description">
                  {{ __("Description") }}
               </label>
                  <textarea name="" id="" cols="30" rows="10" type="text" wire:model="product.description" class="form-control m-input @error('product.description') is-invalid @enderror" id="description"  placeholder="Enter description"></textarea>
                  @error('product.description') <small class="invalid-feedback">{{ $message }}</small> @enderror
            </div>
            <div class="col-md-3" wire:ignore>
               <label for="categories">
                  {{ __("Categories") }}
               </label>
                     <select class="form-control m-select2" id="categories"  name="category">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                           {{ $category->title }}
                        </option>
                        @endforeach
                     </select>
                     <label for="users">
                        {{ __("users") }}
                     </label>
                           <select class="form-control m-select2" id="users"  name="user">
                              @foreach ($users as $user)
                              <option value="{{ $user->id }}">
                                 {{ $user->name }}
                              </option>
                              @endforeach
                           </select>
                     <label class="col-3 col-form-label">
                        {{ __("Status") }}
                     </label>
                     <div class="col-3">
                        <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                           <label>
                               <input type="checkbox" wire:model.defer='product.status' >
                               <span></span>
                           </label>
                       </span>
                     </div>
               </div>
               <div class="col-md-6" wire:ignore>
                  <label for="color">
                     {{ __("Colors") }}
                  </label>
                        <select class="form-control m-select2" id="colors"  name="colors" multiple="multiple" >
                           @foreach ($colors as $color)
                           <option value="{{ $color->id }}">
                              {{ $color->title }}
                           </option>
                           @endforeach
                        </select>
                        <label for="size">
                           {{ __("Sizes") }}
                        </label>
                              <select class="form-control m-select2" id="sizes" name="sizes" multiple="multiple">
                                 @foreach ($sizes as $size)
                                 <option value="{{ $size->id }}">
                                    {{ $size->title }}
                                 </option>
                                 @endforeach
                              </select>
                </div>
                <div class="col-md-12" wire:ignore>
                  <label for="photos">
                     {{ __("Photos") }}
                  </label>
                     <div class="file-loading">
                        <input type="file" name="images[]" wire:model.defer='product.images'  class="form-control" id="post-images" multiple>
                        
                    </div>
                    {{-- @if ($product)
                     Photo Preview:
                     <img src="{{ $product['images'][0]->temporaryUrl() }}">
                  @endif --}}
               </div>

               {{-- input-repeat --}}
               {{-- <div class="col-md-12" wire:ignore>
               <div id="m_repeater_1">
                  <div class="form-group  m-form__group row" id="m_repeater_1">
                     <label  class="col-lg-2 col-form-label">
                        {{ __('Additional information') }}
                     </label>
                     <div data-repeater-list="" class="col-lg-10">
                        <div data-repeater-item class="form-group m-form__group row align-items-center">
                           <div class="col-md-3">
                              <div class="m-form__group m-form__group--inline">
                                 <div class="m-form__label">
                                    <label>
                                      {{ __('Key') }}
                                    </label>
                                 </div>
                                 <div class="m-form__control">
                                    <input type="text" class="form-control m-input" wire:model="product.additional.key">
                                 </div>
                              </div>
                              <div class="d-md-none m--margin-bottom-10"></div>
                           </div>
                           <div class="col-md-3">
                              <div class="m-form__group m-form__group--inline">
                                 <div class="m-form__label">
                                    <label class="m-label m-label--single">
                                       {{ __('Value') }}
                                    </label>
                                 </div>
                                 <div class="m-form__control">
                                    <input type="text" class="form-control m-input" wire:model="product.additional.value">
                                 </div>
                              </div>
                              <div class="d-md-none m--margin-bottom-10"></div>
                           </div>
                           <div class="col-md-4">
                              <div data-repeater-delete="" class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
                                 <span>
                                    <i class="la la-trash-o"></i>
                                    <span>
                                       Delete
                                    </span>
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="m-form__group form-group row">
                     <label class="col-lg-2 col-form-label"></label>
                     <div class="col-lg-4">
                        <div data-repeater-create="" class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
                           <span>
                              <i class="la la-plus"></i>
                              <span>
                                 Add
                              </span>
                           </span>
                        </div>
                     </div>
                  </div>
               </div>
               </div> --}}
            </div>


             </div>
             <div class="m-portlet__foot m-portlet__foot--fit">
               <div class="m-form__actions">
                  <button  class="btn btn-primary">
                     {{ __("Save") }}
                  </button>
                 
                  <a href="#" class="btn btn-secondary" id="clickToHideMe"> 
                     Cancel
                  </a>
               </div>
            </div>
 

      </form>
      {{-- // initialPreviewConfig:[
         //     @if($product->media->count()>0)
         //         @foreach ($product->media as $media)
         //             {caption:"{{ $media->file_name }}",size:{{ $media->file_size }},width:"120px",url:"{{ route('admin.post.media.destroy',[$media->id,'_token'=>csrf_token()]) }}",key:"{{ $media->id }}"},
         //         @endforeach
         //     @endif
             
             // initialPreview:[
            //     @if($product->media->count()>0)
            //         @foreach ($product->media as $media)
            //             "{{ asset('assets/products/'.$media->file_name) }}",
            //         @endforeach
            //     @endif
            // ],
             // maxFileCount: {{ 5-$product->media->count() }},
         // ], --}}
 </div>
 @push('css')
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
 @endpush
@push('js')
<script src="{{ asset('backend') }}/assets/demo/default/custom/crud/forms/widgets/select2.js" type="text/javascript"></script>
<script src="{{ asset('backend') }}/assets/demo/default/custom/crud/forms/widgets/dropzone.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="{{ asset('backend') }}/assets/demo/default/custom/crud/forms/widgets/form-repeater.js" type="text/javascript"></script>

    <script>
      //  Livewire.on('imagesPreview', imagePreview=> {
      //     console.log(imagePreview);
      //     $('#post-images').trigger('change');
      //    // $("#post-images").fileinput(
           
 
      //    //    {
      //    //          theme: "fa",
      //    //          maxFileCount: 5,
      //    //          allowedFileTypes: ['image'],
      //    //          showCancel: true,
      //    //          showRemove: true,
      //    //          showUpload: true,
      //    //          overwriteInitial: false,
      //    //          initialPreview:[
      //    //             `${imagePreview[0]}`
      //    //          ],
      //    //          initialPreviewAsData:true,
      //    //          initialPreviewFileType:'image',
         
      //    //    }
      //    // );
      //  });
      //  $('#post-images').trigger('change');
      // $('#m_repeater_1').repeater({
         
      //    beforeAdd: function($doppleganger) {
      //       console.log($doppleganger);
      //    // return $doppleganger;
      //    },
      //    afterAdd: function($doppleganger) {},
      //    beforeDelete: function($elem) {},
      //    afterDelete: function() {
      //       console.log('hellp')
      //    }

      //    });
      $("#post-images").fileinput(
            {
                  theme: "fa",
                  maxFileCount: 5,
                  allowedFileTypes: ['image'],
                  showCancel: true,
                  showRemove: true,
                  showUpload: true,
                  overwriteInitial: false,
                  initialPreviewAsData:true,
                  initialPreviewShowDelete:true,
                  initialPreviewFileType:'image',
                  maxFilePreviewSize: 10240,
         
            }
         );
      // window.addEventListener('addInitPhoto', data => {
      //    $("#post-images").fileinput('destroy');
      //    console.log(data.detail.images);
      //    $("#post-images").fileinput(
      //       {
      //             theme: "fa",
      //             maxFileCount: 5,
      //             allowedFileTypes: ['image'],
      //             showCancel: true,
      //             showRemove: true,
      //             showUpload: true,
      //             initialPreview:data.detail.images,
      //             overwriteInitial: false,
      //             initialPreviewAsData:true,
      //             initialPreviewFileType:'image',
         
      //       }
            
      //    );
      //    // $("#post-images").fileinput('refresh');
      //    // $("#post-images").fileinput('refresh',{initialPreview:['http://localhost:8000/storage/media/ydY68x3YKtjdhRvFD2BL8SDE0JtwYWo2CKCRbCoC.png']});
      // })
     
      Livewire.on('showMe', data=> {
         $("#post-images").fileinput('destroy');
         
         if(typeof data['images'] !== 'undefined') {
            $("#post-images").fileinput(
               {
                     theme: "fa",
                     maxFileCount: 5,
                     maxFilePreviewSize: 10240,
                     allowedFileTypes: ['image'],
                     showCancel: true,
                     showRemove: true,
                     showUpload: true,
                     initialPreviewShowDelete:true,
                     initialPreview:data['images']['images'],
                     initialPreviewConfig:data['images']['captions'],
                     overwriteInitial: false,
                     initialPreviewAsData:true,
                     initialPreviewFileType:'image',
            
               }
            );
         }else{
            $("#post-images").fileinput('refresh');
         }
         
      });
        $(document).ready(function () {
         $('.m-select2').select2();
         $('.m-select2').select2().trigger('change');
         $('.select2-container').css('width','100%');
        });
         // Dropzone.options.myAwesomeDropzone = {
         //    maxFilesize: 2,
         // };
        
      //    $("#post-images").on('change', function (e) {
           
      //       var name = $(this).attr('name');
      //       var data =  $(this).val();
      //       // console.log(data);
      //       // @this.set(`product.${name}`, data);
      //   });
       
        $('.m-select2').on('change', function (e) {
            var name = $(this).attr('name');
            var data =  $(this).select2("val");
            @this.set(`product.${name}`, data);
        });
        $('#post-images').on('filecleared', function(event) {
             @this.set(`product.images`, null);
         });
        
    </script>
@endpush