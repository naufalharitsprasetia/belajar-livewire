<div class="w-1/3 my-10">
    <div class="mx-auto mb-4">
        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">User List</h2>
    </div>

    <form wire:submit="search" class="max-w-lg mx-auto">
        <label for="default-search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input wire:model.live="query" type="search" id="default-search"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search User(s)..." />
            <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>

    <ul role="list" class="divide-y divide-gray-100">
        @foreach ($users as $user)
        <li class="flex justify-between gap-x-6 py-5">
            <div class="flex min-w-0 gap-x-4">
                @php
                $imgDefault = "/img/my.png";
                @endphp
                <img src="{{ $user->avatar ?? asset($imgDefault) }}" alt=""
                    class="size-12 flex-none rounded-full bg-gray-50" />
                <div class="min-w-0 flex-auto">
                    <p class="text-sm/6 font-semibold text-gray-900">{{ $user->name }}</p>
                    <p class="mt-1 truncate text-xs/5 text-gray-500">{{ $user->email }}</p>
                </div>
            </div>
            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end self-center">
                <p class="mt-1 text-xs/5 text-gray-500">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>
        </li>
        @endforeach
    </ul>
    {{ $users->links() }}
</div>