<div class="flex justify-center gap-10">
    <div class="w-1/3 my-10">
        <div class="py-2">
            <div class="mx-auto">
                <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Create New User</h2>
            </div>
            @if(session('success'))
            <div class="p-4 mt-6 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                {{ session('success')}}
            </div>
            @endif
            <div class="mt-4">
                <form action="#" method="POST" class="space-y-6" wire:submit.prevent="createNewUser">
                    <div>
                        <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                        <div class="mt-2">
                            <input id="name" type="name" name="name" autocomplete="name" wire:model="name"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                            @error('name')
                            <p class="mt-2 text-xs text-red-600"><span class="font-medium">{{$message}}
                                    @enderror
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                        <div class="mt-2">
                            <input id="email" type="email" name="email" autocomplete="email" wire:model="email"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                            @error('email')
                            <p class="mt-2 text-xs text-red-600"><span class="font-medium">{{$message}}
                                    @enderror
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                        </div>
                        <div class="mt-2">
                            <input id="password" type="password" name="password" wire:model="password"
                                autocomplete="current-password"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                            @error('password')
                            <p class="mt-2 text-xs text-red-600"><span class="font-medium">{{$message}}
                                    @enderror
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="profile-picture" class="block text-sm/6 font-medium text-gray-900">Profile
                            Picture</label>
                        <div
                            class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-6">
                            <div class="text-center">
                                <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon" aria-hidden="true"
                                    class="mx-auto size-12 text-gray-300">
                                    <path
                                        d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                        clip-rule="evenodd" fill-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-sm/6 text-gray-600">
                                    <label for="avatar"
                                        class="relative cursor-pointer rounded-md bg-transparent font-semibold text-indigo-600 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-indigo-600 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input wire:model="avatar" id="avatar" type="file" name="avatar" class="sr-only"
                                            accept="image/png, image/jpg, image/jpeg" />
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs/5 text-gray-600">PNG, JPG up to 5MB</p>
                            </div>
                        </div>
                        @error('avatar')
                        <p class="mt-2 text-xs text-red-600"><span class="font-medium">{{$message}}
                                @enderror
                    </div>

                    <div wire:loading wire:target="avatar"
                        class="flex items-center justify-center w-20 h-20 border border-gray-200 rounded-lg bg-gray-50">
                        <div
                            class="px-2 py-1 text-[10px] font-medium leading-none text-center text-blue-800 bg-blue-200 rounded-full animate-pulse">
                            loading...</div>
                    </div>

                    @if($avatar)
                    <p class="my-2 text-sm/6 font-medium">Preview</p>
                    <img class="w-20 h-20 rounded-full block object-cover" src="{{ $avatar->temporaryUrl() }}" alt="">
                    @endif

                    <div>
                        <button
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <svg wire:loading wire:target="createNewUser" aria-hidden="true"
                                class="w-4 h-4 text-gray-200 animate-spin fill-blue-600 self-center me-2"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                            <span class="sr-only">Loading...</span>
                            Create
                            New User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
</div>