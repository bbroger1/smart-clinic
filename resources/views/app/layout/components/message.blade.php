@if (!strcmp($op, 'success'))
<p class="message success">{{ $message }}</p>
@elseif(!strcmp($op, 'error'))
<p class="message error">{{ $message }}</p>
@endif