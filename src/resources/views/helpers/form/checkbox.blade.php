<div class="formItem checkboxWrapper">

        <div class="pretty p-icon p-round p-smooth">
            <input class="form-check-input" type="checkbox" name="{{$name ?? ''}}"
                   id="{{$name ?? ''}}" {{ old($name) ? 'checked' : $checked ? 'checked' : '' }}>
            <div class="state p-success">
                <i class="icon mdi mdi-check"></i>
                <label for="{{$name ?? ''}}">{{$label ?? ''}}</label>
            </div>
        </div>

    {!! $errors->first($name, '<p class="inputWrapper__error">:message</p>') !!}
</div>
