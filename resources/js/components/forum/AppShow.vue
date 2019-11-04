<template>
    <div class="container mb-4">
        <EditQuestion
                v-if="editing"
                :question = question
        ></EditQuestion>
        <div  v-else>
            <Question
                    :question = question
                    v-if="question"
            ></Question>
        </div>
    </div>
</template>

<script>
    import Question from './AppQuestion';
    import EditQuestion from './EditQuestion';
    export default {
        components:{Question, EditQuestion},
        name: "AppShow",
        data(){
            return{
                question:null,
                editing:false
            }
        },
        created(){
            this.listen();
            this.getQuestion();

        },
        methods:{
            listen(){
                EventBus.$on('startEditing', () => {
                    this.editing =true;
                }),

                EventBus.$on('cancelEditing', () => {
                    this.editing = false;
                })
            },
            getQuestion(){
                axios.get(`../api/question/${this.$route.params.id}`)
                .then(resData => {
                    this.question = resData.data.data;
                })
            }

        }
    }
</script>

<style scoped>

</style>