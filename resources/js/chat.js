export function initChatListener() {
    console.log("Chat JS loaded");

    const conversationId = document.querySelector('input[name="conversation_id"]')?.value;
    const userId = document.querySelector('meta[name="user-id"]')?.content;

    if (!conversationId || !window.Echo) return;

    console.log("Akan subscribe ke channel:", `private-conversations.${conversationId}`);

    const channel = window.Echo.private(`private-conversations.${conversationId}`);
    console.log("Sudah subscribe, menunggu event...");

    channel.listen('MessageSent', (e) => {
        console.log("Pesan diterima:", e.message);
        const chatbox = document.querySelector('.chat-message .card-body');
        
        console.log("Chatbox ditemukan:", chatbox);
    });

    window.Echo.private(`private-conversations.${conversationId}`)
        .listen('MessageSent', (e) => {
            console.log("Pesan diterima:", e.message);
            const chatbox = document.querySelector('.chat-message .card-body');
            if (!chatbox) return;

            const isOwn = e.message.sender_id == userId;
            const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

            const messageHTML = isOwn
                ? `
                    <div class="message-out">
                        <div class="d-flex align-items-end flex-column">
                            <p class="mb-1 text-muted"><small>${time}</small></p>
                            <div class="message d-flex align-items-end flex-column">
                                <div class="d-flex align-items-center mb-1 chat-msg">
                                    <div class="flex-grow-1 ms-3">
                                        <div class="msg-content bg-primary">
                                            <p class="mb-0 text-white">${e.message.body}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`
                : `
                    <div class="message-in">
                        <div class="d-flex">
                            <div class="chat-avtar">
                                <img class="rounded-circle img-fluid wid-40"
                                     src="/assets/images/user/avatar-3.jpg" />
                            </div>
                            <div class="flex-grow-1 mx-3">
                                <p class="mb-1 text-muted">${e.message.sender.name} <small>${time}</small></p>
                                <div class="message d-flex align-items-start flex-column">
                                    <div class="msg-content card card-border-none mb-0">
                                        <p class="mb-0">${e.message.body}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;

            chatbox.insertAdjacentHTML('beforeend', messageHTML);
            chatbox.scrollTop = chatbox.scrollHeight;
        });
}