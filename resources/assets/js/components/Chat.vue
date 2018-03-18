<template>
  <div class="chat">
    <message v-for="(message, index) in messages" :key="index" :message="message"></message>
    <div v-if="messages.length === 0" class="empty">No messages here</div>
    <reply @sent="add"></reply>
  </div>
</template>

<script>
  import Message from './Message.vue';

  export default {
    components: {Message},

    data() {
      return {
        messages: []
      };
    },

    methods: {
      add(message) {
        this.messages.push(message);
      }
    },

    created() {
      console.log('here');
      axios.get('/messages').
        then(response => {
          this.messages = response.data;
      })
    }
  };
</script>
