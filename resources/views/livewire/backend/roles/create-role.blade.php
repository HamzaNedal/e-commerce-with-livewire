<div>
   <form class="m-form m-form--fit m-form--label-align-right col-md-12"  wire:submit.prevent="save">
      <div class="m-portlet__body">
         {{-- <div class="form-group m-form__group m--margin-top-10">
            <div class="alert m-alert m-alert--default" role="alert">
               The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
            </div>
         </div> --}}
         <div class="form-group m-form__group">
            <label for="role">
               {{ __("Role name") }}
            </label>
            <input type="text" wire:model="name" class="form-control m-input" id="role" aria-describedby="role" placeholder="Enter role name">
            <div class="m-form__group form-group row">
               <label class="m-checkbox">
                  <input type="checkbox" wire:model="selectedAll" >
                  {{ __('Select All') }}
                  <span></span>
               </label>
               <div class="col-12">
                  <div class="m-checkbox-inline">
                     @foreach ($permissions as $permission)
                     <label class="m-checkbox">
                        <input type="checkbox" wire:model="selectedPermissions.{{ $permission->id }}">
                        {{ __("$permission->name") }}
                        <span></span>
                     </label>
             
                     @endforeach
                 
                  </div>
           
               </div>
            </div>
         </div>

      </div>
      <div class="m-portlet__foot m-portlet__foot--fit">
         <div class="m-form__actions">
            <button  class="btn btn-primary">
               Submit
            </button>
            <button type="reset" class="btn btn-secondary">
               Cancel
            </button>
         </div>
      </div>
   </form>
</div>

