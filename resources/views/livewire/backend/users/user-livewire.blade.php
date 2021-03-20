<div>
    <form class="m-form m-form--fit m-form--label-align-right col-md-12" wire:submit.prevent="save" >
       <div class="m-portlet__body">
          {{-- <div class="form-group m-form__group m--margin-top-10">
             <div class="alert m-alert m-alert--default" role="alert">
                The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
             </div>
          </div> --}}
          <div class="form-group m-form__group row">
             <div class="col-md-6">
                <label for="name">
               {{ __("Name") }}
            </label>
            <input type="hidden" wire:model="user.id">
               <input type="text" wire:model="user.name" class="form-control m-input @error('user.name') is-invalid @enderror" id="name" aria-describedby="name" placeholder="Enter name">
               @error('user.name') <small class="invalid-feedback">{{ $message }}</small> @enderror
               <label for="email">
                  {{ __("Email") }}
               </label>
                  <input type="email" wire:model="user.email" class="form-control m-input  @error('user.email') is-invalid @enderror" id="email" aria-describedby="email" placeholder="Enter email ">
                  @error('user.email') <small class="invalid-feedback">{{ $message }}</small> @enderror
            </div>
             <div class="col-md-6">
               <label for="password">
                  {{ __("Password") }}
               </label>
                  <input type="password" wire:model="user.password" class="form-control m-input  @error('user.password') is-invalid @enderror" id="password" aria-describedby="password" placeholder="Enter phone">
                  @error('user.password') <small class="invalid-feedback">{{ $message }}</small> @enderror
                  <label for="phone_number">
                     {{ __("Phone Number") }}
                  </label>
                     <input type="text" wire:model="user.phone_number" class="form-control m-input" id="phone_number" aria-describedby="phone_number" placeholder="Enter phone">
               </div>
               <div class="col-md-6">
                  <label for="dob">
                     {{ __("DOB") }}
                  </label>
                     <input type="date" wire:model="user.dob" class="form-control m-input" id="dob" aria-describedby="dob" placeholder="Enter phone">
                     <label class="col-3 col-form-label">
                        {{ __("Status") }}
                     </label>
                     <div class="col-3">
                        <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                           <label>
                               <input type="checkbox" wire:model='user.status' >
                               <span></span>
                           </label>
                       </span>
                     </div>
                  </div>
                  <div class="col-md-6">
                        <label class="col-3 col-form-label">
                          {{__('Roles')}}
                        </label>
                        <div class="col-9">
                           <div class="m-radio-inline">
                              @foreach ($roles as $role)
                              <label class="m-radio">
                                 <input type="radio" name="example_8" value="{{ $role->name }}" wire:model="user.role">
                                  {{$role->name}}
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
                     {{ __("Save") }}
                  </button>
                 
                  <a href="#" class="btn btn-secondary" id="clickToHideMe"> 
                     Cancel
                  </a>
               </div>
            </div>
 

      </form>
 </div>
 
