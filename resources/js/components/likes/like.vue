<template>
    <button :class="color_class" @click="likeIt">({{count}})</button>
</template>

<script>
    export default {
        name: "like",
        props:['reply'],
        data(){
            return{
                liked: this.reply.liked,
                count: this.reply.like_count
            }
        },
        computed:{
            color_class(){
                return this.liked ? 'btn btn-sm btn-danger mb-1' : 'btn btn-sm btn-info mb-1';
            },
        },
        methods:{

            likeIt(){
                if(User.loggedIn()){
                    this.liked ? this.decrement() : this.increment();
                    this.liked = !this.liked;
                }
            },
            increment(){
                axios.post(`/api/like/${this.reply.id}`)
                    .then(resData => {
                        this.count ++;
                    });
            },
            decrement(){
                axios.delete(`/api/like/${this.reply.id}`)
                    .then(resData => {
                        this.count --;
                    });
            }
        }
    }
</script>

<style scoped>

</style>