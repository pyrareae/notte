<template>
  <div class="note">
    <section class="body">
      {{value.note.truncate(200)}}
    </section>
  </div>
</template>

<script>
export default {
  props: ['value'],
  setup() {
    
  },
}
</script>