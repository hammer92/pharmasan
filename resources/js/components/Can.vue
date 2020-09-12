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
      const superuser = this._.get(this.$store.getters['auth/user'], 'is_superuser', false)
      const permiso = this.$store.getters['auth/permisos'].includes(this.permiso)
      return superuser || permiso
    }
  }
}
</script>

<style scoped>

</style>
