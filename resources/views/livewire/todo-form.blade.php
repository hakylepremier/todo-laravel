<div>

    <p class="text-white text-xl">Add form is {{ $addForm }}</p>
    @if ($addForm)

    <form wire:submit.prevent="addNew" class="bg-tertiary text-primary p-7 rounded-2xl flex-initial w-[500px] text-sm " @click.outside="formOpen = false">
        {{-- @csrf --}}
    
        <header class="flex justify-between items-center mb-2">
          <div class="text-xl cursor-pointer" x-on:click="formOpen = false">Cancel</div>
          <button type="submit" class="py-2 px-7 bg-primary text-tertiary rounded-xl cursor-pointer" 
          x-on:click="formOpen = false"
          >Add</button>
        </header>
    
        <div class="mb-7">
          <label for="todo-form-title" class="mb-3 block font-semibold text-xl">Title</label>
          <input type="text" class="block w-full p-2 rounded-lg bg-light" name="title" id="todo-form-title" placeholder="Add a title" wire:model="title">
          @error('title') <span class="error text-red-600"">{{ $message }}</span> @enderror
        </div>
    
        <div class="mb-7">
          <label for="todo-form-desc" class="mb-3 block font-semibold text-xl">Description</label>
          <textarea rows="4" class="block w-full p-2 rounded-lg bg-light" name="description" id="todo-form-desc" placeholder="Add a description" wire:model="description"></textarea>
          @error('description') <span class="error text-red-600">{{ $message }}</span> @enderror
          <!-- <input type="text" class="todo-input todo-input-descr" name="todo-form-desc" id="todo-form-desc" placeholder="Add a description"> -->
        </div>
    
        <div>
          <p class="mb-3 font-semibold text-xl">Categories</p>
          <div class="text-base">
            @foreach ($categories as $category)
            <div class="">
              <input type="radio" name="category_id" value="{{ $category->id }}" id="category-{{  $category->id  }}" wire:model="category_id">
              <label for="category-{{  $category->id  }}" class="">{{ $category->name }}</label>
            </div>
            @endforeach
          @error('category') <span class="error text-red-600">{{ $message }}</span> @enderror
  
          </div>
        </div>
      </form>

      @else

      <form wire:submit.prevent="update({{ $todo }})" class="bg-tertiary text-primary p-7 rounded-2xl flex-initial w-[500px] text-sm " @click.outside="formOpen = false">
    
        <header class="flex justify-between items-center mb-2">
            <div class="text-xl cursor-pointer" x-on:click="formOpen = false">Cancel</div>
            <button type="submit" class="py-2 px-7 bg-primary text-tertiary rounded-xl cursor-pointer" 
            x-on:click="formOpen = false"
            >Edit</button>
        </header>
    
        <div class="mb-7">
            <label for="todo-form-title" class="mb-3 block font-semibold text-xl">Title</label>
            <input type="text" class="block w-full p-2 rounded-lg bg-light" name="title" id="todo-form-title" placeholder="Add a title" wire:model="title">
            @error('title') <span class="error text-red-600"">{{ $message }}</span> @enderror
        </div>
    
        <div class="mb-7">
            <label for="todo-form-desc" class="mb-3 block font-semibold text-xl">Description</label>
            <textarea rows="4" class="block w-full p-2 rounded-lg bg-light" name="description" id="todo-form-desc" placeholder="Add a description" wire:model="description"></textarea>
            @error('description') <span class="error text-red-600">{{ $message }}</span> @enderror
            <!-- <input type="text" class="todo-input todo-input-descr" name="todo-form-desc" id="todo-form-desc" placeholder="Add a description"> -->
        </div>
    
        <div>
            <p class="mb-3 font-semibold text-xl">Categories</p>
            <div class="text-base">
            @foreach ($categories as $category)
            <div class="">
                <input type="radio" name="category_id" value="{{ $category->id }}" id="category-{{  $category->id  }}" wire:model="category_id">
                <label for="category-{{  $category->id  }}" class="">{{ $category->name }}</label>
            </div>
            @endforeach
            @error('category') <span class="error text-red-600">{{ $message }}</span> @enderror
    
            </div>
        </div>
    </form>
    
    @endif

</div>

