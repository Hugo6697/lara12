<div 
    
>
    <h1>Crud post with pusher</h1>
    <form wire:submit="save">
        <label for="title">Title:</label>

        <input type="text" id="title" wire:model="title" class="border border-blue-500">
        <label for="title">Body:</label>

        <input type="text" id="body" wire:model="body" class="border border-blue-500">

        <button type="submit">Save</button>
    </form>
    <!-- component -->
    <!-- This is an example component -->
    <div class="max-w-2xl mx-auto mt-3">

        <div class="p-4 max-w-md bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Lista de post</h3>
                <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                    Ver todos
                </a>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($posts as $post) 
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-1.jpg"
                                    alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{ $post->title }}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                   {{ $post->body }}
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                ver
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
