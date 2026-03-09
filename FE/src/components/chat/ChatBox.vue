<template>
    <div>
        <!-- Nút mở chat -->
        <div class="chat-toggle" @click="toggleChat">
            <span v-if="!isOpen">🤖✨ Chat</span>
            <span v-else>✖</span>
        </div>

        <!-- Hộp chat -->
        <div v-if="isOpen" class="chat-container">
            <h2>FoodXpress AI</h2>
            <div class="chat-box">
                <div v-for="(msg, index) in messages" :key="index"
                    :class="['message', msg.sender === 'AI' ? 'ai' : 'user']">
                    <strong>{{ msg.sender }}:</strong> {{ msg.text }}
                </div>
                <!-- Hiển thị đang gõ -->
                <div v-if="isTyping" class="message ai typing">
                    <strong>AI:</strong> <span class="dot"></span><span class="dot"></span><span class="dot"></span>
                </div>
            </div>

            <div class="quick-options">
                <button v-for="(option, index) in quickReplies" :key="index" @click="sendQuickReply(option)">
                    {{ option.text }}
                </button>
            </div>

            <div class="input-container">
                <input v-model="userInput" @keyup.enter="sendMessage" placeholder="Nhập tin nhắn..." />
                <button @click="sendMessage">Gửi</button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            userInput: "",
            messages: [
                { sender: "AI", text: "Xin chào! Tôi, nền tảng FoodXpress có thể giúp gì cho bạn?" },
            ],
            isOpen: false,
            isTyping: false,
            quickReplies: [],
        };
    },
    methods: {
        toggleChat() {
            this.isOpen = !this.isOpen;
        },
        async sendMessage() {
            if (!this.userInput.trim()) return;

            this.messages.push({ sender: "Bạn", text: this.userInput });
            const messageToSend = this.userInput;
            this.userInput = "";
            this.isTyping = true;

            try {
                const response = await axios.post(
                    "http://127.0.0.1:8000/api/customer/chat",
                    { message: messageToSend }
                );
                this.isTyping = false;
                this.messages.push({ sender: "AI", text: response.data.reply });
            } catch (error) {
                this.isTyping = false;
                console.error("Lỗi:", error);
                this.messages.push({
                    sender: "AI",
                    text: "Xin lỗi, đã xảy ra lỗi khi gửi tin nhắn.",
                });
            }

            this.$nextTick(() => {
                const chatBox = this.$el.querySelector(".chat-box");
                chatBox.scrollTop = chatBox.scrollHeight;
            });
        },
        sendQuickReply(option) {
            this.messages.push({ sender: "Bạn", text: option.text });
            this.messages.push({ sender: "AI", text: option.reply });
        },
    },
};
</script>

<style>
.chat-toggle {
    position: fixed;
    bottom: 20px;
    right: 25px;
    background: #e53935;
    color: white;
    padding: 16px 26px;
    border-radius: 50px;
    cursor: pointer;
    font-size: 18px;
    z-index: 9999;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.chat-toggle:hover {
    background: #b71c1c;
}

.chat-container {
    position: fixed;
    bottom: 90px;
    right: 25px;
    width: 450px;
    height: 600px;
    background: #fff;
    border: 2px solid #e53935;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    padding: 20px;
    display: flex;
    flex-direction: column;
    z-index: 9998;
    animation: slideUp 0.3s ease-out;
}

.chat-container h2 {
    margin: 0 0 15px 0;
    color: #e53935;
    font-size: 22px;
    text-align: center;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.chat-box {
    flex: 1;
    overflow-y: auto;
    padding: 12px;
    margin-bottom: 12px;
    border-radius: 12px;
    background: #fff0f0;
    display: flex;
    flex-direction: column;
    gap: 8px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.message {
    max-width: 75%;
    padding: 10px 14px;
    border-radius: 15px;
    word-break: break-word;
    font-weight: 500;
    font-size: 15px;
}

.message strong {
    color: #b71c1c;
    font-weight: 700;
}

.message.ai {
    background: #ffcdd2;
    align-self: flex-start;
    color: #4a0000;
}

.message.user {
    background: #f28b82;
    color: white;
    align-self: flex-end;
    font-weight: 600;
}

.message.typing {
    font-style: italic;
    background: #fff0f0;
}

.typing .dot {
    display: inline-block;
    width: 6px;
    height: 6px;
    margin: 0 2px;
    background: #e53935;
    border-radius: 50%;
    animation: blink 1.4s infinite both;
}

.typing .dot:nth-child(2) {
    animation-delay: 0.2s;
}

.typing .dot:nth-child(3) {
    animation-delay: 0.4s;
}

@keyframes blink {

    0%,
    80%,
    100% {
        opacity: 0;
    }

    40% {
        opacity: 1;
    }
}

.quick-options {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
    margin-bottom: 12px;
}

.quick-options button {
    background: #e53935;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 10px;
    font-size: 14px;
    cursor: pointer;
    transition: 0.2s;
}

.quick-options button:hover {
    background: #b71c1c;
}

.input-container {
    display: flex;
    width: 100%;
    gap: 6px;
}

.input-container input {
    flex: 1;
    padding: 14px;
    border: 1px solid #e53935;
    border-radius: 10px 0 0 10px;
    font-size: 15px;
}

.input-container button {
    padding: 14px;
    background: #e53935;
    color: white;
    border: none;
    border-radius: 0 10px 10px 0;
    font-size: 15px;
    cursor: pointer;
    width: 100px;
    transition: 0.2s;
}

.input-container button:hover {
    background: #b71c1c;
}
</style>
