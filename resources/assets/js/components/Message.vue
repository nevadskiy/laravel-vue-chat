<template>
  <div class="message">
    <h5 class="mb-0">{{ message.user.name }}</h5>
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
    }
  }
</script>