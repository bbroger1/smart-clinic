<input 
    type="{{ $type }}" 
    placeholder="{{ $placeholder }}" 
    name="{{ $name }}" 
    class="input"
    value="{{ old($name) }}"
    @isset($pattern)
        pattern="{{ $pattern }}"
    @endisset />

@error($name)
    <p class="error">{{ $message }}</p>
@enderror