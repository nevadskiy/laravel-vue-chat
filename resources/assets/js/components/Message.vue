<template>
  <div class="message">
    <h5 class="mb-0">{{ message.user }}</h5>
    <p>{{ message.text }}</p>
  </div>
</template>

<script>
  export default {
    name: 'message',

    props: {
      message: {
        type: Object
      }
    },

//    data() {
//      return {
//        user: this.message.user,
//        text: this.message.text
//      }
//    }
  }
</script>