<template>
    <div id="dialog-container">
        <aside>
            <header>
                <input type="text" placeholder="search"/>
            </header>
            <ul>
                <li v-for="friend in friends" :key="friend.id">
                    <router-link :to="{ name: 'Dialog', params: { friendId: friend.id, friends: friends, user: user } }">
                        <div>
                            <h2>{{ friend.username }}</h2>
                        </div>
                    </router-link>
                </li>
            </ul>
        </aside>

        <main>
            <header>
                <div>
                    <h2>Chat with {{ currentFriend ? currentFriend.username : 'Unknown' }}</h2>
                </div>
            </header>

            <ul id="chat">
                <li v-for="message in dialog" :key="message.id" :class="message.sender_id === user.id ? 'me' : 'you'">
                    <div class="entete">
                        <span :class="['status', message.sender_id === user.id ? 'blue' : 'green']"></span>
                        <h2>{{ message.sender_id === user.id ? user.username : currentFriend.username }}</h2>
                        <h3> {{ new Date(message.created_at).toLocaleString() }}</h3>
                    </div>
                    <div class="message">
                        {{ message.text }}
                    </div>
                </li>
            </ul>

            <footer>
                <div class="form-group">
                    <textarea v-model="message" placeholder="Type your message"></textarea>
                    <button @click="sendMessage" class="btn btn-default">Send</button>
                </div>
            </footer>
        </main>
    </div>
</template>

<script>
export default {
    name: 'DialogComponent',
    props: {
        friendId: {
            type: Number,
            required: true
        },
        user: {
            type: Object,
            required: true
        },
        friends: {
            type: Array,
            required: true
        },
        users: {
        }
    },
    data() {
        return {
            currentFriend: null,
            dialog: [],
            message: '',
            users: this.users,
        };
    },
    created() {
        this.getDialog(this.friendId);
    },
    watch: {
        friendId(newFriendId) {
            this.getDialog(newFriendId);
        }
    },
    methods: {
        getDialog(friendId) {
            axios.get("/dialog-api/" + friendId)
                .then(response => {
                    this.dialog = response.data;
                    this.currentFriend = this.users.find(friend => friend.id === parseInt(friendId));
                })
                .catch(error => {
                    console.error('Error fetching dialog', error);
                });
        },

        createMessage(payload) {
            axios.post("/send-message", payload)
                .then(response => {
                    const newMessage = response.data;
                    this.dialog.push(newMessage); // Добавляем новое сообщение в массив dialog
                })
                .catch(error => {
                    console.error('Error creating message', error);
                });
        },

        sendMessage() {
            const payload = {
                sender_id: this.user.id, // Идентификатор отправителя
                recipient_id: this.currentFriend.id, // Идентификатор получателя
                text: this.message // Текст сообщения
            };
            this.createMessage(payload);
            this.message = ''; // Очищаем поле ввода после отправки сообщения
        },
    }
};
</script>


<style scoped>
body {
    background-color: #ffffff;
    font-family: Arial;
}
#dialog-container {
    width: 1400px;
    height: 750px;
    background-color: #ffffff;
    margin-top: 25px;
    margin-left: 250px;
    font-size: 0;
    border-radius: 5px;
    overflow: hidden;
}

.empty_state {
    position: relative;
    top: -25px;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    margin-left: 310px;
    margin-bottom: -150px;

    h3 {
        margin-right: 580px;
        margin-top: 55px;
        text-align: center;
        font-weight: normal;
        font-size: 25px;
    }
    p {
        font-size: 15px;
        color: #999;
        text-align: center;
        margin-right: 580px;
        margin-top: 10px;
    }
    button {
        outline: none;
        border: none;
        border-radius: 3px;
        padding: 8px 8px;
        margin-right: 560px;
        margin-top: 10px;
        width: 50%;
        max-width: 200px;
        background: #348ac7;
        color: white;
        letter-spacing: 0.8px;
        text-transform: uppercase;
        font-size: 12px;
    }
}
aside {
    width: 300px;
    height: 750px;
    background-color: #47584C;
    display: inline-block;
    font-size: 15px;
    vertical-align: top;
}
main {
    width: 1100px;
    height: 750px;
    display: inline-block;
    font-size: 15px;
    vertical-align: top;
    background-color: #ffffff;
}

aside header {
    padding: 30px 20px;
}
aside input {
    width: 100%;
    height: 40px;
    line-height: 50px;
    padding: 0 50px 0 20px;
    background-color: #28382c;
    border: none;
    border-radius: 3px;
    color: #fff;
    background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_search.png);
    background-repeat: no-repeat;
    background-position: 170px;
    background-size: 40px;
}
aside input::placeholder {
    color: #fff;
}
aside ul {
    padding-left:0;
    margin:0;
    list-style-type:none;
    overflow-y:scroll;
    height:690px;
}
aside li a {
    padding:10px 10px;
    background-color: #47584C;
}
aside li:hover a {
    background-color: #28382c;
}

h2,
h3 {
    margin: 0;
}
aside li img {
    border-radius: 50%;
    margin-left: 20px;
    margin-right: 8px;
}
aside li div {
    display: inline-block;
    vertical-align: top;
    margin-top: 12px;
}
aside li h2 {
    font-size: 14px;
    color: #fff;
    font-weight: normal;
    margin-bottom: 5px;
}
aside li h3 {
    font-size: 12px;
    color: #7e818a;
    font-weight: normal;
}

.status {
    background-color: #ffffff;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    display: inline-block;
    margin-right: 7px;
}
.green {
    background-color: #58b666;
}
.orange {
    background-color: #ff725d;
}
.blue {
    background-color: #6fbced;
    margin-right: 0;
    margin-left: 7px;
}

main header {
    height: 40px;
    padding: 0 20px 30px 40px;
}
main header > * {
    display: inline-block;
    vertical-align: top;
}
main header img:first-child {
    border-radius: 50%;
}
main header img:last-child {
    width: 24px;
    margin-top: 8px;
}
main header div {
    margin-left: 10px;
    margin-right: 145px;
}
main header h2 {
    font-size: 16px;
    margin-bottom: 5px;
}
main header h3 {
    font-size: 14px;
    font-weight: normal;
    color: #7e818a;
}

#chat {
    padding-left: 0;
    background-color: #ffffff;
    margin: 0;
    list-style-type: none;
    overflow-y: scroll;
    height: 500px;
    max-width: 1400px;
    border-top: 2px solid #fff;
    border-bottom: 2px solid #fff;
}
#chat li {
    padding: 10px 30px;
}
#chat h2,
#chat h3 {
    display: inline-block;
    font-size: 13px;
    font-weight: normal;
}
#chat h3 {
    color: #bbb;
}
#chat .entete {
    margin-bottom: 5px;
}
#chat .message {
    padding: 20px;
    color: #fff;
    line-height: 25px;
    max-width: 90%;
    display: inline-block;
    text-align: left;
    border-radius: 5px;
}
#chat .me {
    text-align: right;
}

#chat .you .message {
    background-color: #58b666;
    max-width: 100%;
}
#chat .me .message {
    background-color: #6fbced;
    max-width: 100%;
}
#chat .triangle {
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 10px 10px 10px;
}
#chat .you .triangle {
    border-color: transparent transparent #58b666 transparent;
    margin-left: 15px;
}
#chat .me .triangle {
    border-color: transparent transparent #6fbced transparent;
    margin-left: 375px;
}

main footer {
    height: 100px;
    padding: 10px 20px;
    background-color: #ffffff;
}
main footer textarea {
    resize: none;
    border: none;
    display: block;
    width: 92%;
    height: 60px;
    border-radius: 3px;
    padding: 10px;
    font-size: 13px;
    margin-bottom: 0;
}
main footer textarea::placeholder {
    color: #101010;
}

main footer .btn-default {
    text-decoration: none;
    text-transform: uppercase;
    font-weight: bold;
    color: #faffe3;
    background-color: #348ac7;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 900px;
    margin-top: -80px;
}

</style>
