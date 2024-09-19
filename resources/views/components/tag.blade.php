@props(['tag', 'size' => 'base'])

<a
    href="/tags/{{ strtolower( $tag->name ) }}"
    class="bg-white/10 hover:bg-white/25 px-2 py-1 rounded-xl text-xs transition-colors duration-300"
>
  {{ $tag->name }}
</a>