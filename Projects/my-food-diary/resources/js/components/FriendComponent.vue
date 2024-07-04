<template>
    <div id="friend-container">
        <div class="head">FRIENDS</div>

        <div class="row filter">
            <div class="col">
                <input v-model="findFriendName" type="text" class="search" id="search-list" placeholder="Enter friend's name" name="find-friend"/>
                <button @click="findFriend" id="submit-button" type="submit" class="btn btn-primary">
                    Search
                </button>
            </div>

            <div class="col">
                <input v-model="findUserName" type="text" class="search" id="search-list" placeholder="Enter user's name" name="find-user"/>
                <button @click="findUser" id="submit-button" type="submit" class="btn btn-primary">
                    Search
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h3>Your friends</h3>
                <ul id="friends-filter" class="friends-list">
                    <li v-for="friend in filteredFriends" :key="friend.friend_id">
                        <a :href="'/main/' + friend.friend_id">{{ friend.username }} </a>
                        <div>
                            <button @click="deleteFriend(friend.friend_id)" class="delete">X</button>
                        </div>
                    </li>
                    <li v-if="!filteredFriends.length">No one was found for your request.</li>
                </ul>
            </div>

            <div class="col">
                <h3>Find user</h3>
                <ul id="friends-filter" class="friends-list">
                    <li v-if="user">
                        <a :href="'/main/' + user.id">{{ user.username }}</a>
                        <div v-if="!userIsFriend(user) && isRequestSent === false && user.id !== currentUserId">
                            <button @click="addFriend(user)" class="add">V</button>
                        </div>
                    </li>
                    <li v-else>No one was found for your request.</li>
                </ul>
                <a href="/friend-requests"><button class="friend-requests">Friend requests</button></a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "FriendComponent",
    props: {
        friends: {
            type: Array,
            required: true
        },
        users: {
            type: Array,
            required: true
        },
        currentUserId: {
            type: Number,
            required: true
        }
    },
    data() {
        return {
            findFriendName: '',
            findUserName: '',
            user: null,
            filteredFriends: this.friends,
            isRequestSent: false,
        };
    },
    methods: {
        findFriend() {
            if (this.findFriendName) {
                this.filteredFriends = this.friends.filter(friend =>
                    friend.username.toLowerCase() === this.findFriendName.toLowerCase()
                );
            } else {
                this.filteredFriends = this.friends;
            }
        },
        findUser() {
            if (this.findUserName) {
                const foundUser = this.users.find(user =>
                    user.username.toLowerCase() === this.findUserName.toLowerCase()
                );
                this.user = foundUser ? foundUser : null;
                if (this.user) {
                    this.checkIfRequestSent(this.user.id);
                }
            } else {
                this.user = null;
            }
        },
        userIsFriend(user) {
            return this.friends.some(friend => friend.friend_id === user.id);
        },
        deleteFriend(friendId) {
            axios.post('/delete-friend/' + friendId)
                .then(response => {
                    if (response.data) {
                        this.filteredFriends = this.friends.filter(friend => friend.friend_id !== friendId);
                    } else {
                        this.filteredFriends = this.friends;
                        console.error('Response error (removing friend)');
                    }
                })
                .catch(error => {
                    this.filteredFriends = this.friends;
                    console.error('Error removing friend', error);
                });
        },
        addFriend(user) {
            axios.post('/add-friend/' + user.id)
                .then(response => {
                    if (response.data) {
                        this.user = null;
                        this.isRequestSent = true;
                    } else {
                        console.error('Error adding friend');
                        this.isRequestSent = false;
                    }
                })
                .catch(error => {
                    console.error('Error adding friend', error);
                });
        },
        checkIfRequestSent(userId) {
            axios.post('/request-sent/' + userId)
                .then(response => {
                    this.isRequestSent = response.data;
                })
                .catch(error => {
                    console.error('Error receiving isRequestSent information', error);
                });
        }
    }
};
</script>

<style>
body {
    background-color: #a0a0a0;
}
#friend-container{
    width: 1400px;
    border-radius:15px;
    background-color:#fff;
    margin-top: 25px;
    margin-left: 250px;
    max-height: 650px;
}
.head{
    color:#fff;
    font-size: 18px;
    padding-left:18px;
    line-height:52px;
    text-shadow:1px 1px 0 rgba(0, 0, 0, 0.1);
    border-radius:14px 14px 0 0;
    background-color: #da5e3d;
    text-align: center;
}

.filter{
    background-color:#f1f1f1;
    height:53px;
}
.row{
    width:100%;
}
.col{
    width:50%;
    float:left;
    padding:15px;
}
.row:before,
.row:after{
    display:block;
    content:"";
    line-height:0;
    height:0;
    width:100%;
    clear:both;
}
h2{
    font-size:12px;
    border-bottom:1px solid #f4f4f4;
    padding-bottom:5px;
    margin-top: -460px;
}
.friends-list{
    height:550px;
    margin:0;
    padding:0;
    overflow:hidden;
    overflow-y:auto;
}
.friends-list li{
    list-style-type:none;
    margin:0;
    border-bottom:1px solid #f4f4f4;
    height:50px;
    width:100%;
    padding:10px 32px 10px 8px;
    position:relative;
}
.friends-list li a {
    text-decoration: none; /* Убираем подчеркивание ссылки */
    color: inherit; /* Наследуем цвет текста */
    background-color: transparent; /* Убираем задний фон ссылки */
}

.delete {
    position: absolute;
    text-decoration: none;
    text-transform: uppercase;
    font-weight: bold;
    color: #faffe3;
    width: 30px;
    background-color: #c21c24;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 620px;
    margin-top: -50px;
    z-index: 10;
}
.add {
    position: absolute;
    text-decoration: none;
    text-transform: uppercase;
    font-weight: bold;
    color: #faffe3;
    width: 30px;
    background-color: #00971c;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 620px;
    margin-top: -50px;
    z-index: 10;
}
.friend-requests {
    position: absolute;
    margin-top: -460px;
    margin-left: -330px;
    width: 200px;
    border:none;
    background-color: #348ac7;
    color: #faffe3;
    line-height:31px;
    padding: 0 10px;
    border-radius:10px;
    display:inline-block;
}

.friends-list li:hover{
    background-color:#f1f1f1;
}
.friends-list li span{
    display:inline-block;
    vertical-align:middle;
}
.photo img{
    width:55px;
    height:55px;
    border-radius:50%;
}
.row.filter {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-left: 0;
}

.row.filter form {
    display: flex;
    align-items: center;
}

.row.filter .col {
    flex: 1;
}

.row.filter .search {
    flex: 1;
    margin-right: 10px;
}
.search{
    width:345px;
    border:none;
    background-color:#fff;
    line-height:31px;
    padding: 0 10px;
    border-radius:15px;
    display:inline-block;

}
.btn-primary {
    background-color: #348ac7;
}
.filter .col{
    padding:10px 15px;
}

.friend-item {
    display: flex;
    align-items: center;
}

.friend-item button {
    margin-left: 10px;
}

</style>
