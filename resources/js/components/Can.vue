<template>
  <span v-if="can">
    <slot/>
  </span>
</template>

<script>
export default {
  name: 'can',
  props: ['permiso'],
  computed: {
    can () {
      return this.$store.getters['auth/acceso'].includes(this.permiso)
    }
  }
}
</script>

<style scoped>

</style>
