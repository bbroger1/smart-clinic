<input 
    type="{{ $type }}" 
    placeholder="{{ $placeholder }}" 
    name="{{ $name }}" 
    class="input"
    value="{{ old($name) }}" />

@error($name)
    <p class="error">{{ $message }}</p>
@enderror