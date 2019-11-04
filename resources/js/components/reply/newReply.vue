<template>
    <div>
        <vue-simplemde required v-model="form.body" preview-class="markdown-body" />
        <b-button style="margin-top:-55px;" class="btn-sm" variant="primary" @click="submit">Reply</b-button>
    </div>
</template>

<script>
    export default {
        name: "newReply",
        props:['question_id'],
        data(){
            return {
                form: {
                    body:null,
                }
            }
        },
        methods:{
            submit(){
                axios.post(`/api/question/${this.question_id}/reply`, this.form)
                    .then(resData => {
                        this.body = null;
                        EventBus.$emit('newReply', resData.data.reply);
                        $(".rreply-toggle").toggleClass('collapsed');
                        $(".rreply-toggle").attr("aria-expanded","true");
                        $("#reply-list").collapse({toggle: true});
                        $("#reply-list").show();

                        window.scrollTo(0,0);
                    });
            },

        }
    }
</script>

<style scoped>

</style>