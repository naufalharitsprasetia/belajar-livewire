<section class="bg-white mt-12">
    <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900">Contact Us
        </h2>
        <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 sm:text-xl">Got a technical
            issue? Want to send feedback about a beta feature? Need details about our Business plan? Let us know.</p>
        @if(session('success'))
        <div class="p-4 mt-6 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            {{ session('success')}}
        </div>
        @endif
        <form wire:submit.prevent="createNewMessage" class="space-y-8">
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your
                    email</label>
                <input type="email" id="email" wire:model="form.email"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="name@flowbite.com">
                @error('form.email')
                <p class="mt-2 text-xs text-red-600"><span class="font-medium">{{$message}}
                        @enderror
            </div>
            <div>
                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">Subject</label>
                <input type="text" id="subject"
                    class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Let us know how we can help you" wire:model="form.subject">
                @error('form.subject')
                <p class="mt-2 text-xs text-red-600"><span class="font-medium">{{$message}}
                        @enderror
            </div>
            <div class="sm:col-span-2">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Your
                    message</label>
                <textarea id="message" rows="6" wire:model="form.message"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Leave a message..."></textarea>
                @error('form.message')
                <p class="mt-2 text-xs text-red-600"><span class="font-medium">{{$message}}
                        @enderror
            </div>
            <button type="submit"
                class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-blue-700 sm:w-fit hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Send
                message</button>
        </form>
    </div>
</section>