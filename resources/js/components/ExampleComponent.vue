<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mensagem</div>

                    <div class="card-body">
                        <div class="alert alert-info" v-if="messages.length <= 0">Nenhuma Mensagem</div>
                        <p v-for="(message, index) in messages" :key="index">
                            <strong>{{message.author_comment_name}}</strong><br>
                            {{message.content}}<br>
                            {{message.created_at}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
          return {
              messages: []
          }
        },
        mounted() {
            Echo.channel('my-channel')
                .listen('CommentEvent', (e) => {
                    console.log(e);
                    this.messages.push(e);
                });
        }
    }
</script>
