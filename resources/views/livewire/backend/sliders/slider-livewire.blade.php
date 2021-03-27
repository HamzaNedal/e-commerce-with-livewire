
<div>
    <form class="m-form m-form--fit m-form--label-align-right col-md-12" wire:submit.prevent="save" enctype="multipart/form-data">
       <div class="m-portlet__body">
          {{-- <div class="form-group m-form__group m--margin-top-10">
             <div class="alert m-alert m-alert--default" role="alert">
                The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
             </div>
          </div> --}}
          <div class="form-group m-form__group row">
             <div class="col-md-8">
                <label for="title">
               {{ __("Title") }}
            </label>
            <input type="hidden" wire:model="slider.id">
               <input type="text" wire:model="slider.title" class="form-control m-input @error('slider.title') is-invalid @enderror" id="title" aria-describedby="title" placeholder="Enter title">
               @error('slider.title') <small class="invalid-feedback">{{ $message }}</small> @enderror
            </div>
             <div class="col-md-8">
               <label for="description">
                  {{ __("Description") }}
               </label>
                  <textarea name="" id="" cols="30" rows="10" type="text" wire:model="slider.description" class="form-control m-input @error('slider.description') is-invalid @enderror" id="description"  placeholder="Enter description"></textarea>
                  @error('slider.description') <small class="invalid-feedback">{{ $message }}</small> @enderror
            </div>
            <div class="col-md-8">
                <label for="link">
               {{ __("Link") }}
            </label>
               <input type="text" wire:model="slider.link" class="form-control m-input @error('slider.link') is-invalid @enderror" id="link" aria-describedby="link" placeholder="Enter link">
               @error('slider.link') <small class="invalid-feedback">{{ $message }}</small> @enderror
            </div>
                <div class="col-md-12" wire:ignore>
                  <label for="photos">
                     {{ __("Photos") }}
                  </label>
                     <div class="file-loading">
                        <input type="file" name="images" wire:model.defer='slider.image'  class="form-control" id="slider-images" multiple>
                        
                    </div>
               </div>
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

      $("#slider-images").fileinput(
            {
                  theme: "fa",
                  maxFileCount:1,
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
     
      Livewire.on('showMe', data=> {
         $("#slider-images").fileinput('destroy');
         
         if(typeof data['images'] !== 'undefined') {
            $("#slider-images").fileinput(
               {
                     theme: "fa",
                     maxFileCount: 1,
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
            $("#slider-images").fileinput('refresh');
         }
         
      });
       
        $('#slider-images').on('filecleared', function(event) {
             @this.set(`slider.image`, null);
         });
        
    </script>
@endpush