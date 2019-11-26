<template>
    <div>
        <vue-simplemde required v-model="reply.reply" preview-class="markdown-body" />
        <b-button class="btn-sm" variant="primary" @click="update">Update</b-button>
        <b-button class="btn-sm" variant="danger" @click="cancel">Cancel</b-button>
    </div>
</template>

<script>
    export default {
        name: "editReply",
        props:['reply'],
        methods:{
            cancel(){
                EventBus.$emit('cancelEditing');
            },
            update(){
                axios.patch(`/api/question/${this.reply.question_id}/reply/${this.reply.id}`, {body:this.reply.reply})
                    .then(resData =>{
                        this.cancel();
                    });
            }
        }
    }
</script>

<style scoped>

</style>