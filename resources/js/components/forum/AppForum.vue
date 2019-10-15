<template>
    <!-- Default form login -->
    <b-container class="bg-white">
        <b-row class="p-5">
            <b-col cols="10">
                <Question
                v-for="question in questions"
                :key="question.id"
                :question=question
                >

                </Question>
            </b-col>
            <b-col cols="2">
                sidebar
            </b-col>
        </b-row>
    </b-container>
    <!-- Default form login -->
</template>

<script>
    import Question from './AppQuestion';
    export default {
        data(){
            return {
                questions:{}
            }
        },

        components:{Question},

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