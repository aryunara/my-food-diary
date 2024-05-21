<template>
    <div>
        <div v-if="posts.length === 0" class="empty_state">
            <h3>No posts</h3>
            <p>There have been no your friend's posts in this section yet</p>
            <a href="/friends"><button>ADD FRIENDS</button></a>
        </div>
        <div v-else>
            <div v-for="post in posts" :key="post.id" class="instagram-post">
                <div class="instagram-post-top">
                    <div class="instagram-post-avatar">
                        <img :src="getAvatar(post.user_id)" alt="avatar">
                    </div>
                    <a :href="/main/ + post.user_id">
                        <div class="instagram-post-name">{{ getUsername(post.user_id) }}</div>
                    </a>
                    <div class="instagram-post-date">{{ post.created_at }}</div>
                </div>

                <div class="instagram-post-image">
                    <a :href="'/post/' + post.id"><img :src="getPhoto(post.photo_id)"></a>
                </div>

                <div class="instagram-post-bottom">
                    <div class="likes">
                        <a :href="/like-feed/ + post.id" style="position: relative; top: -5px; left: 5px; width: 27px; margin-left: 10px;">
                            <img class="love-icon" src="https://spng.pngfind.com/pngs/s/6-62693_facebook-heart-transparent-facebook-heart-icon-hd-png.png">
                        </a>
                        <span>{{ getLikes(post.id) }}</span>
                        <a :href="/post/ + post.id" style="position: relative; top: -4.5px; left: 5px; width: 27px;">
                            <img class="comment-icon" src="https://www.nicepng.com/png/full/49-499826_png-library-library-comment-transparent-icon-facebook-comment.png">
                        </a>
                        <span>{{ getComments(post.id) }}</span>
                    </div>
                </div>
                <div class="instagram-post-desc">
                    {{ post.description }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {offset} from "@popperjs/core";

export default {
    name: "HomeComponent",

    data() {
        return {
            posts: [],
            avatars: {},
            photos: {},
            usernames: {},
            likes: {},
            comments: {}
        }
    },

    methods: {
        fetch(offset = 0) {
            axios.get('/feed', {
                params: {
                    offset: offset
                }
            })
                .then(response => {
                    this.posts = this.posts.concat(response.data)
                })
        },

        getAvatar(userId) {
            if (!this.avatars[userId]) {
                axios.get("/avatar/" + userId)
                    .then(response => {
                        this.avatars[userId] = response.data;
                    })
                    .catch(error => {
                        console.error('Error fetching avatar', error);
                    });
            }
            return this.avatars[userId] || "https://i0.wp.com/abrakadabra.fun/uploads/posts/2021-12/1640528661_1-abrakadabra-fun-p-serii-chelovek-na-avu-1.png?ssl=1";
        },

        getPhoto(photoId) {
            if (!this.photos[photoId]) {
                axios.get("/photo/" + photoId)
                    .then(response => {
                        this.photos[photoId] = response.data;
                    })
                    .catch(error => {
                        console.error('Error fetching photo', error);
                    });
            }
            return this.photos[photoId] || '';
        },

        getUsername(userId) {
            if (!this.usernames[userId]) {
                axios.get("/username/" + userId)
                    .then(response => {
                        this.usernames[userId] = response.data;
                    })
                    .catch(error => {
                        console.error('Error fetching username', error);
                    });
            }
            return this.usernames[userId] || '';
        },

        getLikes(postId) {
            if (!this.likes[postId]) {
                axios.get("/likes/" + postId)
                    .then(response => {
                        this.likes[postId] = response.data;
                    })
                    .catch(error => {
                        console.error('Error fetching likes', error);
                    });
            }
            return this.likes[postId] || 0;
        },

        getComments(postId) {
            if (!this.comments[postId]) {
                axios.get("/comments/" + postId)
                    .then(response => {
                        this.comments[postId] = response.data;
                    })
                    .catch(error => {
                        console.error('Error fetching comments', error);
                    });
            }
            return this.comments[postId] || 0;
        }
    },

    created() {
        this.fetch()

        const eventHandler = () => {
            const scrollTop = document.documentElement.scrollTop
            const viewPortHeight = window.innerHeight

            const totalHeight = document.documentElement.offsetHeight
            const atTheBottom = scrollTop + viewPortHeight === totalHeight

            if (atTheBottom) {
                this.fetch(this.posts.length)
            }
        }

        document.addEventListener('scroll', eventHandler);
    }
}
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css?family=Just+Another+Hand|Lato:400,400i,700,700i|Montserrat+Alternates:400,400i,700,700i|Montserrat:400,400i,700,700i|Permanent+Marker|Shadows+Into+Light|Rock+Salt");

body {
    background-color: #101010;
}
/* Стили для обычной ссылки */
a {
    color: #000; /* Цвет текста */
    text-decoration: none; /* Убираем подчеркивание */
}

.empty_state {
    position: relative;
    top: -25px;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    margin-left: 310px;
    margin-bottom: -300px;

    h3 {
        margin-right: 580px;
        margin-top: 45px;
        text-align: center;
        font-weight: normal;
        font-size: 25px;
    }
    p {
        font-size: 15px;
        color: #999;
        text-align: center;
        margin-right: 580px;
        margin-top: -10px;
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

.instagram-avatar img {
    max-height: 100px;
    min-height: 100px;
    max-width: 100px;
    min-width: 100px;
    overflow: hidden;
}
.instagram-numbers div {
    position: relative;
    display: inline-block;
    min-width: 120px;
    text-align: center;
    font-family: montserrat alternates;
    font-size: 12px;
    color: #505050;
}
.instagram-numbers div span {
    color: #aeaeae;
}
.instagram-desc div {
    padding: 5px;
    text-align: justify;
    font-family: montserrat;
    font-size: 9px;
    color: #909090;
}
.instagram-desc div b {
    color: #e1cbcf;
    font-size: 10px;
}

.instagram-post {
    position: relative;
    height: 550px;
    width: 540px;
    margin: 10px auto;
    background-color: #ffffff;
    overflow: hidden;
    cursor: default;
    font-family: "Roboto";
    box-shadow: 0 0 0 0 rgba(0, 0, 0, 0), 0 6px 50px 0 rgba(0, 0, 0, 0.1);
}
.instagram-post-top {
    position: relative;
    height: 60px;
    overflow: hidden;
    background-color: #ffffff;
}
.instagram-post-avatar {
    position: absolute;
    top: 10px;
    left: 10px;
    height: 50px;
    width: 50px;
    overflow: hidden;
    border-radius: 100%;
}
.instagram-post-name {
    position: absolute;
    top: 25px;
    left: 70px;
    font-family: montserrat alternates;
    text-transform: lowercase;
    font-weight: bold;
    color: #909090;
    font-size: 16px;
    background-color: #ffffff;
}
.instagram-post-date {
    position: absolute;
    right: 5px;
    top: 30px;
    font-family: montserrat alternates;
    font-size: 12px;
    font-weight: bold;
    color: #bebebe;
}

a .instagram-post-image {
    position: relative;
    border: none;
    text-decoration: none;
}

.instagram-post-image img {
    max-width: 540px;
    min-width: 440px;
    max-height: 370px;
    min-height: 370px;
    overflow: hidden;
    object-fit: cover;
    margin-top: 10px;
    border: none;
    text-decoration: none;
}
.instagram-post-bottom {
    position: relative;
    background-color: #ffffff;
}
.instagram-post-desc {
    position: relative;
    margin-top: -5px;
    margin-left: 20px;
}
.instagram-post-desc div {
    position: relative;
    font-family: montserrat;
    font-size: 14px;
    color: #707070;
}
.instagram-post-desc div i {
    color: #e1cbcf;
}
/*likes and comms*/
.likes {
    cursor: pointer;
    margin-top: -10px;
}

.likes > .love-icon {
    position: relative;
    top: -4px;
    width: 16px;
    margin-left: 10px;
}
.likes > .comment-icon {
    position: relative;
    top: -4px;
    width: 16px;
    margin-left: 10px;
}
.likes > span {
    position: relative;
    top: -3px;
    font-size: 14px;
}
.buttons {
    display: flex;
    margin-top: 4px;
    border-width: 1px;
    border-color: #ddd;
    border-style: solid none;
}

.buttons img {
    width: 20px;
    opacity: 0.5;
    margin-right: 4px;
}

.like,
.comment {
    flex: 1;
    display: flex;
    justify-content: center;
    padding: 8px;
}

.like:hover,
.comment:hover {
    background-color: #ddd;
    cursor: pointer;
}
</style>
