<template>
    <div class="chat">
        <message v-for="(message, index) in messages" :key="index" :message="message"></message>
    </div>
</template>

<script>
    import Message from './Message.vue';

    export default {
        components: { Message },

        data() {
          return {
            messages: [
              {
                text: 'Hello!',
                user: 'Julia'
              },
              {
                text: 'Hello Julia!',
                user: 'Vitalii'
              }
            ]
          }
        }
    }
</script>
