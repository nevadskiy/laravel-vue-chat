<template>
  <div class="chat">
    <h3>Users: {{ usersInRoom.length }}</h3>
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
        messages: [],
        usersInRoom: []
      };
    },

    methods: {
      add(message) {
//        this.messages.push(message);
        axios.post('/messages', message);
      }
    },

    created() {
      axios.get('/messages').
        then(response => {
          this.messages = response.data;
      })

      Echo.join('chatroom')
        .here((users) => {
          this.usersInRoom = users
        })
        .joining((user) => {
          this.usersInRoom.push(user);
        })
        .leaving((user) => {
          this.usersInRoom = this.usersInRoom.filter(u => u !== user)
        })
        .listen('MessagePosted', (e) => {
          console.log(e);
          this.messages.push({
            message: e.message.message,
            user: e.user
          });
        })
    }
  };
</script>
