<template>
    <div id="friend-request-container">
        <div class="head">FRIEND REQUESTS</div>

        <div class="row filter">
        </div>

        <div class="row">
            <div class="col">
                <h3>Received requests</h3>
                <ul id="friends-filter" class="friends-list">
                    <li v-if="receivedRequests.length" v-for="request in receivedRequests" :key="request.id">
                        <a :href="'/main/' + request.sender_id">{{ request.sender.username }}</a>
                        <div>
                            <button @click="acceptRequest(request)" class="accept">V</button>
                            <button @click="declineRequest(request.id)" class="decline">X</button>
                        </div>
                    </li>
                    <li v-else>You have not received any requests.</li>
                </ul>
            </div>

            <div class="col">
                <h3>Sent requests</h3>
                <ul id="friends-filter" class="friends-list">
                    <li v-if="sentRequests.length" v-for="request in sentRequests" :key="request.id">
                        <a :href="'/main/' + request.recipient_id">{{ request.receiver.username }}</a>
                        <div>
                            <button @click="cancelRequest(request.id)" class="cancel">X</button>
                        </div>
                    </li>
                    <li v-else>You have not sent any requests.</li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "FriendRequestComponent",
    props: {
        receivedRequests: {
            type: Array,
            required: true
        },
        sentRequests: {
            type: Array,
            required: true
        },
    },
    data() {
        return {
            receivedRequests: this.receivedRequests,
            sentRequests: this.sentRequests,
        }
    },
    methods: {
        acceptRequest(request) {
            axios.post('/accept-request/' + request.sender_id + '/' + request.id)
                .then(response => {
                    console.log(response.data);
                    if (response.data) {
                        this.receivedRequests = this.receivedRequests.filter(req => req.id !== request.id);
                    }
                })
                .catch(error => {
                    console.error('Error accepting request', error);
                });

        },
        declineRequest(requestId) {
            axios.post('/decline-request/' + requestId)
                .then(response => {
                    this.receivedRequests = this.receivedRequests.filter(req => req.id !== requestId);
                })
                .catch(error => {
                    console.error('Error declining request', error);
                });

        },
        cancelRequest(requestId) {
            axios.post('/cancel-request/' + requestId)
                .then(response => {
                    this.sentRequests = this.sentRequests.filter(req => req.id !== requestId);
                })
                .catch(error => {
                    console.error('Error canceling request', error);
                });

        }
    }
};
</script>

<style scoped>
body {
    background-color: #a0a0a0;
}
#friend-request-container {
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

.decline {
    position: absolute;
    text-decoration: none;
    text-transform: uppercase;
    font-weight: bold;
    color: #faffe3;
    width: 30px;
    background-color: #c21c24;
    margin-left: 620px;
    margin-top: -50px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    z-index: 10;
}
.accept {
    position: absolute;
    text-decoration: none;
    text-transform: uppercase;
    font-weight: bold;
    color: #faffe3;
    width: 30px;
    margin-left: 580px;
    margin-top: -50px;
    background-color: #00971c;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    z-index: 10;
}
.cancel {
    position: absolute;
    text-decoration: none;
    text-transform: uppercase;
    font-weight: bold;
    color: #faffe3;
    width: 30px;
    margin-left: 620px;
    margin-top: -50px;
    background-color: #c21c24;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    z-index: 10;
}
.friend-requests {
    position: absolute;
    margin-top: -460px;
    margin-left: -330px;
    width: 300px;
    border:none;
    background-color: #c21c24;
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
