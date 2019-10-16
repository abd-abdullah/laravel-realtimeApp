<template>
    
</template>

<script>
    export default {
        name: "AppShowQuestion",
        props:['question'],
        computed:{
            body(){
                return md.parse(this.question.body);
            }
        }
    }
</script>
<style scoped>

</style>