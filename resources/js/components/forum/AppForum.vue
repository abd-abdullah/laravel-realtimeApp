<template>
    <!-- Default form login -->
    <b-container class="bg-white">
        <b-row class="p-5">
            <b-col cols="10">
                <ForumShow
                v-for="question in questions"
                :key="question.id"
                :question=question
                >

                </ForumShow>
            </b-col>
            <b-col cols="2">
                sidebar
            </b-col>
        </b-row>
    </b-container>
    <!-- Default form login -->
</template>

<script>
    import ForumShow from './ForumShow';
    export default {
        data(){
            return {
                questions:{}
            }
        },

        components:{ForumShow},

        created(){
           axios.get ('/api/question')
               .then(resData => {
                   this.questions = resData.data.data;
               }).catch(error => {
                console.log(error.response.data.errors);
           });
        }
    }
</script>