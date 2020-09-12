<template>
<div>
  <div class="form-group row">
    <label class="col-md-3 col-form-label text-md-right">{{ $t('documento') }}</label>
    <div class="col-md-7">
      <input v-model="form.documento" :class="{ 'is-invalid': form.errors.has('documento') }" class="form-control" name="documento">
      <has-error :form="form" field="documento" />
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-3 col-form-label text-md-right">{{ $t('nombre') }}</label>
    <div class="col-md-7">
      <input v-model="form.nombre" :class="{ 'is-invalid': form.errors.has('nombre') }" class="form-control" name="nombre">
      <has-error :form="form" field="nombre" />
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-3 col-form-label text-md-right">{{ $t('correo') }}</label>
    <div class="col-md-7">
      <input v-model="form.correo" :class="{ 'is-invalid': form.errors.has('correo') }" class="form-control" name="correo">
      <has-error :form="form" field="correo" />
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-3 col-form-label text-md-right">{{ $t('direccion') }}</label>
    <div class="col-md-7">
      <input v-model="form.direccion" :class="{ 'is-invalid': form.errors.has('direccion') }" class="form-control" name="direccion">
      <has-error :form="form" field="direccion" />
    </div>
  </div>
</div>
</template>

<script>
export default {
  name: 'formCliente',
  props: ['form']
}
</script>

<style scoped>

</style>
