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
                    <div class="col-6 pull-right">
                        <b-button class="float-md-right" pill variant="success">5 Replies</b-button>
                    </div>
                </div>
            </b-card-body>
        </b-card-text>
    </b-card>
</template>

<script>
    export default {
        name: "AppQuestion",
        props: ['question'],
        data(){
            return {
                own: User.own(this.question.user_id)
            }
        },
        computed:{
            body(){
                return md.parse(this.question.body);
            }
        },
        methods:{
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