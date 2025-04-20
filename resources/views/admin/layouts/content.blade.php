@if (!empty($content) && view()->exists($content))
    @include($content)
@else
    <p>Content not available.</p>
@endif
