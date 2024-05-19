<template>
    <div class="likes">
        <a href="api/addLike" @click.prevent="addLike">
            <img class="love-icon" src="https://spng.pngfind.com/pngs/s/6-62693_facebook-heart-transparent-facebook-heart-icon-hd-png.png">
        </a>
        <span>{{ likeCount }}</span>
    </div>
</template>

<script>
export default {
    name: "LikeComponent",
    props: [
        'postId',
        'likeCount'
    ],
    methods: {
        addLike() {
            fetch('api/addLike', {
                method: 'POST'
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    this.likeCount = data.likeCount + 1;
                })
                .catch(error => {
                    console.error('There was a problem with your fetch operation:', error);
                });
        }
    },
    mounted() {
        fetch('api/getLikeCount/')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                this.likeCount = data.likeCount;
            })
            .catch(error => {
                console.error('There was a problem with your fetch operation:', error);
            });
    }
}
</script>

<style scoped>
/*likes and comms*/
.likes {
    cursor: pointer;
    margin-top: -10px;
}
.love-icon {
    position: relative;
    top: -4px;
    width: 16px;
    margin-left: 10px;
}


.likes > .love-icon {
    position: relative;
    top: -4px;
    width: 16px;
    margin-left: 10px;
}
</style>



