@props(['job'])

<x-panel class="flex gap-x-6">
  <div>
    <x-employer-logo/>
  </div>

  <div class="flex-1 flex flex-col">
    <a href="#" class="self-start text-sm text-gray-500">{{ $job->employer->name }}</a>
    <h3 class="font-bold text-xl mt-1 group-hover:text-blue-800 transition-colors duration-300">{{ $job->title }}</h3>
    <p class="text-sm text-gray-500 mt-auto">{{ $job->salary }}</p>
  </div>

  <div class="flex gap-2 mt-auto">
    @foreach($job->tags as $tag)
      <x-tag :$tag/>
    @endforeach
  </div>
</x-panel>