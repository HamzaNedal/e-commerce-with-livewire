
<div>
    <form class="m-form m-form--fit m-form--label-align-right col-md-12" wire:submit.prevent="save" enctype="multipart/form-data">
       <div class="m-portlet__body">
          <div class="form-group m-form__group row">
             <div class="col-md-12">
                <label for="title">
               {{ __("Title") }}
            </label>
            <input type="hidden" wire:model="category.id">
               <input type="text" wire:model="category.title" class="form-control m-input @error('category.title') is-invalid @enderror" id="title" aria-describedby="title" placeholder="Enter title">
               @error('category.title') <small class="invalid-feedback">{{ $message }}</small> @enderror
               
               <label class="col-3 col-form-label">
                {{ __("Status") }}
             </label>
             <div class="col-3">
                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                   <label>
                       <input type="checkbox" wire:model.defer='category.status' >
                       <span></span>
                   </label>
               </span>
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
