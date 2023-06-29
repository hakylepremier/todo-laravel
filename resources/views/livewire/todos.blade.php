<div>
    <section class="text-tertiary grid grid-cols-auto350 gap-5 items-start ">
        @foreach ($todos as $todo)
            {{-- <h2>{{ $todo->title }}</h2> --}}
            @livewire('todo-card', ['todo' => $todo], key($todo->id))
            {{-- <hr> --}}
        @endforeach
        {{-- Care about people's approval and you will be their prisoner. --}}
    </section>
</div>
