<template>
    <b-card>
        <div>
            <h4 class="m-0">
                <b-link :href="question.path">{{question.title}}</b-link>
            </h4>
            <h6 class="text-black-50">{{question.user}} said {{question.created}}</h6>
        </div>
        <b-card-text>
            <b-card-body
                v-html="body">
            </b-card-body>
            <b-card-body>
                <div class="row">
                    <div class="col-6" v-if ="own">
                        <b-button variant="primary" @click="edit">Edit</b-button>
                        <b-button variant="danger" @click="destroy">Delete</b-button>
                    </div>
                    <div v-else class="col-6"></div>
                    <div class="col-6 text-right">
                        <div>
                            <b-button v-b-toggle.reply-list class="reply-toggle" variant="primary">{{reply_count}} Replies</b-button>

                        </div>
                    </div>
                    <b-collapse id="reply-list" class="col-12 mt-2">
                        <b-card>
                            <reply
                                    v-for = "(reply,index) in replies"
                                    :reply="reply"
                                    :key="reply.id"
                                    :index="index"
                            >

                            </reply>
                        </b-card>
                    </b-collapse>
                </div>
            </b-card-body>
        </b-card-text>
        <new-reply v-if="loggedIn" :question_id="question.id"></new-reply>
        <div v-else>
            <a href="/login">Login to reply</a>
        </div>
    </b-card>
</template>

<script>

    import Reply from '../reply/reply';
    import newReply from '../reply/newReply';
    export default {
        components:{Reply, newReply},
        name: "AppQuestion",
        props: ['question'],
        created(){
            this.listen();
        },
        data(){
            return {
                reply_count:this.question.reply_count,
                replies:this.question.replies,
                own: User.own(this.question.user_id)
            }
        },
        computed:{
            body(){
                return md.parse(this.question.body);
            },

            loggedIn(){
                return User.loggedIn();
            }
        },
        methods:{
            listen(){
                EventBus.$on('newReply', (reply) => {
                    this.reply_count++;
                    this.replies.unshift(reply);
                });

                EventBus.$on('deleteReply', (index) => {
                    axios.delete(`../api/question/${this.question.id}/reply/${this.question.replies[index].id}`)
                    .then(resData =>{
                        this.reply_count--;
                        this.replies.splice(index,1);
                    });
                });

                Echo.private('App.Model.User.' + User.userId())
                    .notification((notification) => {
                        this.question.replies.unshift(notification.reply);
                        this.reply_count++;
                    });

                Echo.channel('DeleteReplyChannel')
                    .listen('DeleteReplyEvent', (e) => {
                        this.reply_count--;
                        for(let index = 0; index < this.question.replies.length; index++){
                            if(this.question.replies[index].id == e.id){
                                this.question.replies.splice(index,1);
                            }
                        }
                    });
            },
            destroy(){
                axios.delete(`../api/question/${this.question.id}`)
                .then(resData =>{
                    this.$router.push('/forum');
                }).catch(error => {
                    console.log(error.response.data.error);
                });
            },

            edit(){
                EventBus.$emit('startEditing');
            }
        }
    }
</script>

<style scoped>

</style>