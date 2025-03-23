<div class="input-field-container">
    <label for="{{$name}}">{{$label}}</label>
    @if ($input === 'textarea')
        <textarea name="{{$name}}" id="{{$name}}" class="border rounded-sm" rows="3">{{$value}}</textarea>
    @else
        <input value="{{$value}}" name="{{$name}}" class="border rounded-sm" type="{{$type ?? 'text'}}" id="{{$name}}">
    @endif
    @error($name)
    <small class="text-red-500">{{$message}}</small>
    @enderror
</div>