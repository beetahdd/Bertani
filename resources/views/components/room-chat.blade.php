<div class="pl-4 pt-2 pb-4 justify-between flex flex-col h-screen">
    <div id="messages"
        class="flex flex-col space-y-4  overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
        @foreach ($content as $message)
            @if ($message->role == 'receiver')
            <div class="chat-message">
                <div class="flex items-end">
                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                        <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">{{ $message->content }}</span></div>
                    </div>
                    <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                        alt="My profile" class="w-6 h-6 rounded-full order-1">
                </div>
            </div>
            @else
            <div class="chat-message">
                <div class="flex items-end justify-end">
                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                        <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white ">{{ $message->content }}</span></div>
                    </div>
                    <img src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                        alt="My profile" class="w-6 h-6 rounded-full order-2">
                </div>
            </div>
            @endif
        @endforeach
    </div>
    <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
        <div class="relative flex items-center">
            <!-- Input Field -->
            <div class="w-full">
                <input type="text" id="messageInput" placeholder="Write your message!"
                    class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-8 pr-36 bg-gray-200 rounded-md py-3 resize-none overflow-auto"
                    oninput="autoResize(this);" wire:model.lazy="message">

            </div>

            <!-- Send Button -->
            <button type="button" wire:click="kirimPesan" onclick="getElementById('messageInput').value = ''"
                class="absolute right-0 inline-flex items-center justify-center rounded-lg px-4 py-3 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
                <span class="font-bold">Send</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="h-6 w-6 ml-2 transform rotate-90">
                    <path
                        d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z">
                    </path>
                </svg>
            </button>
            <small id="typing" class="text-gray-700"  hidden>
                is typing...
            </small>
        </div>
    </div>

</div>

<style>
    .scrollbar-w-2::-webkit-scrollbar {
        width: 0.25rem;
        height: 0.5rem;
    }

    .scrollbar-track-blue-lighter::-webkit-scrollbar-track {
        --bg-opacity: 1;
        background-color: #1d2124;
        background-color: rgba(247, 250, 252, var(--bg-opacity));
    }

    .scrollbar-thumb-blue::-webkit-scrollbar-thumb {
        --bg-opacity: 1;
        background-color: #539de8;
        background-color: rgba(237, 242, 247, var(--bg-opacity));
    }

    .scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
        border-radius: 0.25rem;
    }
</style>
<script>
    // function sendTypingEvent(){
    //     Echo.private(`chat.{{ $role == 'farmer' ? 'buyer' : 'farmer' }}.{{ $friend->id }}`).whisper("typing", {
    //         userID: {{ $user->id }},
    //     });
    // }

    let typingTimer;

    // Echo.private(`chat.{{ $role == 'farmer' ? 'farmer' : 'buyer' }}.{{ $user->id }}`)
    //     .listen("MessageSent", (response) => {
    //         // Pastikan cara menambah pesan sesuai framework Anda
    //         // Misalnya dengan Livewire: @this.call('appendMessage', response.message)
    //     })
    //     .listenForWhisper("typing", (response) => {
    //         const typingIndicator = document.getElementById('typing');
            
    //         if (response.userID !== {{ $friend->id }}) {
    //             typingIndicator.hidden = true;
    //             return;
    //         }

    //         typingIndicator.hidden = false;
            
    //         clearTimeout(typingTimer);
    //         typingTimer = setTimeout(() => {
    //             typingIndicator.hidden = true;
    //         }, 1000);
    //     });

    const el = document.getElementById('messages');
    el.scrollTop = el.scrollHeight;

    function autoResize(input) {
        input.style.height = 'auto';
        input.style.height = input.scrollHeight + 'px';
    }
</script>