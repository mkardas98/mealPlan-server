<div class="formItem inputWrapper">
    <label for="{{$name ?? ''}}">{{$placeholder ?? ''}}</label>
    <input class="@error($name) is-invalid @enderror" name="{{$name ?? ''}}" id="{{$name ?? ''}}" type="{{$type}}"
           placeholder="{{$placeholder ?? ''}}" value="{{old($name) ?? $value}}" onfocus="onChangeInput(this)" {{isset($pattern) ? 'pattern='.$pattern : ''}}
        {{isset($required) ? $required ? 'required' : '' : ''}}>
    {!! $errors->first($name, '<p class="inputWrapper__error">:message</p>') !!}
</div>


