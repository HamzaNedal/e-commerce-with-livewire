
<div>
    <form class="m-form m-form--fit m-form--label-align-right col-md-12" wire:submit.prevent="save" >
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
                     <select class="form-control m-select2" id="m_select2_1"  name="category">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                           {{ $category->title }}
                        </option>
                        @endforeach
                     </select>
                     <label for="users">
                        {{ __("users") }}
                     </label>
                           <select class="form-control m-select2" id="m_select2_2"  name="user">
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
                        <select class="form-control m-select2" id="m_select2_3"  name="colors" multiple="multiple" >
                           @foreach ($colors as $color)
                           <option value="{{ $color->id }}">
                              {{ $color->title }}
                           </option>
                           @endforeach
                        </select>
                        <label for="size">
                           {{ __("size") }}
                        </label>
                              <select class="form-control m-select2" id="m_select2_4" name="sizes" multiple="multiple">
                                 @foreach ($sizes as $size)
                                 <option value="{{ $size->id }}">
                                    {{ $size->title }}
                                 </option>
                                 @endforeach
                              </select>
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
 
@push('js')
    <script>
        $('.m-select2').on('change', function (e) {
            var name = $(this).attr('name');
            var data =  $(this).select2("val");
            @this.set(`product.${name}`, data);
        });
    </script>
@endpush