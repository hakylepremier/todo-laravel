@extends('layouts.base')

@section('content')

<main class="gap-5 md:flex">
  <aside class="flex flex-row justify-evenly md:justify-start md:gap-5 md:flex-col my-5 md:m-0 ">
    @foreach ($categories as $category)
    <div class="flex gap-x-2.5 items-center">
      <div class="w-5 h-5 rounded-full bg-light"></div>
      <span class="">{{ $category->name }}</span>
    </div>
    @endforeach
  </aside>
  <section class="text-tertiary grid grid-cols-auto350 gap-5 items-start ">
    @foreach ($todos as $todo)
    <article class="bg-secondary p-4 rounded-xl relative" x-data="{ toggleDone: {{ $todo->is_checked }} == 0 ? false : true }">
      {{-- {{ $todo->is_checked }} --}}
      <header class="flex justify-end  ">
        <div class="absolute top-2 right-4" x-data="{ open: false }">
          <img src="{{ asset('build/assets/icons/more-icon.svg') }} " alt="" class="w-7" x-on:click="open = ! open">
          <div class="flex flex-col bg-primary text-light rounded-xl w-40 p-1 absolute top-5 right-0" x-show="open" x-transition x-cloak>
            <a href="{{ route('todos.edit', $todo) }}" class="p-3 border-b border-solid border-secondary ">Edit...</a>
            {{-- <a href="" class="p-3">Delete</a> --}}
            <form action="{{ route('todos.destroy', $todo) }}" method="POST">
              @method('DELETE')
              @csrf
              <button type="submit" class="p-3" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
          </div>
        </div>
        
      </header>
      <h2 class="text-[1.5rem] font-semibold" :class="toggleDone ? ' line-through' : ''">{{ $todo->title }}</h2>
      <p class="my-4" :class="toggleDone ? ' line-through' : ''">
        {{ $todo->description }}
      </p>
      <div class="flex justify-between ">
        <span>{{ $todo->category->name }}</span>
        <div class="">
          <a href='{{ route('todos.toggleCheck', $todo) }}' id="1" class="flex gap-3 items-center" x-on:click="toggleDone = ! toggleDone">
            <div class="border border-tertiary w-5 h-5 rounded-[5px]  " :class="toggleDone ? ' text-light border-light' : ''">
              <svg class="" x-show="toggleDone"  x-cloak xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960"><path fill="currentColor" d="M378 807.609q-7.696 0-14.674-2.848t-13.109-8.978l-181-181Q157.391 602.957 157.391 586t11.826-28.783q11.826-11.826 28.066-11.826 16.239 0 28.63 11.826L378 709.304l355.652-355.087q11.826-11.826 28.283-12.109 16.456-.282 28.283 12.109 11.826 11.826 11.826 28.566 0 16.739-11.826 28.565L405.783 795.783q-6.131 6.13-13.109 8.978T378 807.609Z"/></svg>
            </div>
            <p class="" :class="toggleDone ? ' text-light' : ''">Done</p>
          </a>
        </div>
      </div>
    </article>
    @endforeach

  </section>
</main>

<section class="fixed top-0 left-0 bg-black w-full h-screen flex justify-center items-center bg-opacity-40" x-cloak x-show="formOpen">
  <form action="{{ route('todos.store') }}" method="POST" class="bg-tertiary text-primary p-7 rounded-2xl flex-initial w-[500px] text-sm ">
    @csrf

    <header class="flex justify-between items-center mb-2">
      <a href="" class="text-xl">Cancel</a>
      <input type="submit" class="py-2 px-7 bg-primary text-tertiary rounded-xl" value="Add">
    </header>

    @if ($errors->any())
      <div class="text-red-500 ">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>                        
    @endif

    <div class="mb-7">
      <label for="todo-form-title" class="mb-3 block font-semibold text-xl">Title</label>
      <input type="text" class="block w-full p-2 rounded-lg bg-light" name="title" id="todo-form-title" placeholder="Add a title">
    </div>

    <div class="mb-7">
      <label for="todo-form-desc" class="mb-3 block font-semibold text-xl">Description</label>
      <textarea rows="4" class="block w-full p-2 rounded-lg bg-light" name="description" id="todo-form-desc" placeholder="Add a description"></textarea>
      <!-- <input type="text" class="todo-input todo-input-descr" name="todo-form-desc" id="todo-form-desc" placeholder="Add a description"> -->
    </div>

    <div>
      <p class="mb-3 font-semibold text-xl">Categories</p>
      <div class="text-base">
        @foreach ($categories as $category)
        <div class="">
          <input type="radio" name="category_id" value="{{ $category->id }}" id="category-{{  $category->id  }}">
          <label for="category-{{  $category->id  }}" class="">{{ $category->name }}</label>
        </div>
        @endforeach
      </div>
    </div>
  </form>
</section>

@endsection