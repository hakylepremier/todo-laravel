<article class="bg-secondary p-4 rounded-xl relative" x-data="{ toggleDone: {{ $todo->is_checked }} == 0 ? false : true }">
    {{-- {{ $todo->is_checked }} --}}
    <header class="flex justify-end h-1 ">
        <div class="absolute top-4 right-4" x-data="{ open: false }">
        {{-- <img src="{{ asset('build/assets/icons/more-icon.svg') }} " alt="" class="w-7 h-1" x-on:click="open = ! open"> --}}
        <div class="w-6 h-2 flex justify-between cursor-pointer" x-on:click="open = ! open">
            <div class="rounded w-[5px] h-[5px] bg-tertiary"></div>
            <div class="rounded w-[5px] h-[5px] bg-tertiary"></div>
            <div class="rounded w-[5px] h-[5px] bg-tertiary"></div>
        </div>
        <div class="flex flex-col bg-primary text-light rounded-xl w-40 p-1 absolute top-5 right-0" x-show="open" x-transition x-cloak @click.outside="open = false">
            <a href="{{ route('todos.edit', $todo) }}" class="p-3 border-b border-solid border-secondary ">Edit...</a>
            {{-- <a href="" class="p-3">Delete</a> --}}
            <form 
                {{-- action="{{ route('todos.destroy', $todo) }}"  --}}
                {{-- action="#" 
                method="POST"  --}}
                wire:submit.prevent="deleteTodo({{ $todo }})"
            >
            {{-- @method('DELETE')
            @csrf --}}
            <button type="submit" class="p-3" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
        </div>
        
        {{-- @livewire('todo-card') --}}
    </header>
    <h2 class="text-[1.5rem] font-semibold" :class="toggleDone ? ' line-through' : ''">{{ $todo->title }}</h2>
    <p class="my-4" :class="toggleDone ? ' line-through' : ''">
        {{ $todo->description }}
    </p>
    <div class="flex justify-between ">
        <span>{{ $todo->category->name }}</span>
        <div class="">
            <div 
            {{-- href='{{ route('todos.toggleCheck', $todo) }}'  --}}
            id="1" class="flex gap-3 items-center hover:cursor-pointer"
            x-on:click="toggleDone = ! toggleDone"
            {{-- @click="toggleDone = ! toggleDone" --}}
            wire:click='toggle({{ $todo }})'
            >
                <div class="border border-tertiary w-5 h-5 rounded-[5px]  " :class="toggleDone ? ' text-light border-light' : ''">
                <svg class="" x-show="toggleDone"  x-cloak xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960"><path fill="currentColor" d="M378 807.609q-7.696 0-14.674-2.848t-13.109-8.978l-181-181Q157.391 602.957 157.391 586t11.826-28.783q11.826-11.826 28.066-11.826 16.239 0 28.63 11.826L378 709.304l355.652-355.087q11.826-11.826 28.283-12.109 16.456-.282 28.283 12.109 11.826 11.826 11.826 28.566 0 16.739-11.826 28.565L405.783 795.783q-6.131 6.13-13.109 8.978T378 807.609Z"/></svg>
                </div>
                <p class="" :class="toggleDone ? ' text-light' : ''">Done</p>
            </div>
        </div>
    </div>
    </article>