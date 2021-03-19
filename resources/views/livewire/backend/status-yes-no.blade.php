<div>
    <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
        <label>
            <input type="checkbox"  wire:click="changeStatus({{ $id }})" value='{{ $status }}' @if ($status == 1) checked='checked' @endif>
            <span></span>
        </label>
    </span>
</div>