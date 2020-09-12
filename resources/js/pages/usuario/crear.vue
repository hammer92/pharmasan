<template>
  <div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      {{ $t('crear') }}
    </button>

    <!-- Modal -->
    <div id="exampleModal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form @submit.prevent="submit" @keydown="form.onKeydown($event)">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 id="exampleModalLabel" class="modal-title">
                {{ $t('modal_crear_usuario') }}
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form-usuario :form="form" />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">
                {{ $t('cerrar') }}
              </button>
              <v-button :loading="form.busy">
                {{ $t('guardar') }}
              </v-button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import FormUsuario from './form'
import Form from 'vform'
import $ from 'jquery'

export default {
  name: 'CrearUsuario',
  components: { FormUsuario },
  data: () => ({
    form: new Form({
      name: '',
      email: '',
      roles_id: '',
      password: '',
      password_confirmation: ''
    })
  }),
  methods: {
    async submit () {
      // Submit the form.
      await this.form.submit('post', '/api/usuarios', { notLoader: true })
      $('#exampleModal').modal('hide')
      this.$emit('save')
    }
  }
}
</script>

<style scoped>

</style>
