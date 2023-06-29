<div>
<main class="gap-5 md:flex">
    <aside class="flex flex-row justify-evenly md:justify-start md:gap-5 md:flex-col my-5 md:m-0 ">
      @foreach ($categories as $category)
      <div class="flex gap-x-2.5 items-center">
        <div class="w-5 h-5 rounded-full bg-light"></div>
        <span class="">{{ $category->name }}</span>
      </div>
      @endforeach
      <span>SPA</span>
    </aside>
  
    @livewire('todos')
  
</main>
  
<section class="fixed top-0 left-0 bg-black w-full h-screen flex justify-center items-center bg-opacity-40" x-cloak x-show="formOpen">
    {{-- <form wire:submit.prevent="addNew" class="flex-col flex ">
        <input type="text" class="text-black" wire:model="title">
        @error('title') <span class="error text-red-600"">{{ $message }}</span> @enderror
     
        <input type="text" class="text-black"  wire:model="description">
        @error('description') <span class="error text-red-600">{{ $message }}</span> @enderror
     
        <button type="submit">Save Contact</button>
    </form> --}}
    @livewire('add-form')

</section>
</div>