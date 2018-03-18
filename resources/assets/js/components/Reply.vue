<template>
    <div class="reply">
      <div class="form-inline">
        <input v-model="reply" @keyup.enter="send" type="text" class="form-control" placeholder="Start typing...">
        <button @click="send" class="btn btn-primary">Send</button>
      </div>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        reply: ''
      }
    },

    methods: {
      send() {
        this.$emit('sent', {
          text: this.reply,
          user: 'Vitalii'
        });
        this.clear();
      },

      clear() {
        this.reply = '';
      }
    }
  }
</script>