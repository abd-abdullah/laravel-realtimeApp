<template>
    <b-card class="mb-2">
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

                <b-button class="float-md-right" pill variant="success">{{question.replay_count}} Replies</b-button>

            </b-card-body>
        </b-card-text>
    </b-card>
</template>

<script>
    export default {
        name: "ForumShow",
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