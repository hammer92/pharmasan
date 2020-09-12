<template>
  <div>
    <!-- Name -->
    <div class="form-group row">
      <label class="col-md-3 col-form-label text-md-right">{{ $t('name') }}</label>
      <div class="col-md-7">
        <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name">
        <has-error :form="form" field="name" />
      </div>
    </div>

    <!-- Email -->
    <div class="form-group row">
      <label class="col-md-3 col-form-label text-md-right">{{ $t('email') }}</label>
      <div class="col-md-7">
        <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" name="email">
        <has-error :form="form" field="email" />
      </div>
    </div>

    <!-- Email -->
    <div class="form-group row">
      <label class="col-md-3 col-form-label text-md-right">{{ $t('roles_id') }}</label>
      <div class="col-md-7">
        <select v-model="form.roles_id" :class="{ 'is-invalid': form.errors.has('roles_id') }" class="form-control">
          <option selected>
            Open this select menu
          </option>
          <option v-for="item in roles" :key="item.id" :value="item.id" v-text="item.nombre"  />
        </select>
        <has-error :form="form" field="roles_id" />
      </div>
    </div>

    <!-- Password -->
    <div v-if="!edit" class="form-group row">
      <label class="col-md-3 col-form-label text-md-right">{{ $t('password') }}</label>
      <div class="col-md-7">
        <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" type="password" name="password">
        <has-error :form="form" field="password" />
      </div>
    </div>

    <!-- Password Confirmation -->
    <div v-if="!edit" class="form-group row">
      <label class="col-md-3 col-form-label text-md-right">{{ $t('confirm_password') }}</label>
      <div class="col-md-7">
        <input v-model="form.password_confirmation" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" class="form-control" type="password" name="password_confirmation">
        <has-error :form="form" field="password_confirmation" />
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'FormUsuario',
  props: ['form', 'edit'],
  data () {
    return {
      roles: []
    }
  },
  mounted () {
    this.getRoles()
  },
  methods: {
    async getRoles () {
      try {
        const { data } = await axios('/api/roles', { notLoader: true })
        this.roles = data
      } catch (e) {
        console.log(e.message)
      }
    }
  }
}
</script>

<style scoped>

</style>
