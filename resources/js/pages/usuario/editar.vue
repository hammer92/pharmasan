<template>
  <div>
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div id="editarUsuarioModal" class="modal fade" tabindex="-1" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
      <form @submit.prevent="submit" @keydown="form.onKeydown($event)">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 id="editarUsuarioModalLabel" class="modal-title">
                {{ $t('modal_editar_usuario') }}
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form-usuario :form="form" :edit="true" />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">
                {{ $t('cerrar') }}
              </button>
              <v-button :loading="form.busy">
                {{ $t('actualizar') }}
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
  name: 'EditarUsuario',
  components: { FormUsuario },
  data: () => ({
    form: new Form({
      id: null,
      name: '',
      email: '',
      roles_id: ''
    })
  }),
  methods: {
    open (item) {
      this.form = new Form(item)
      $('#editarUsuarioModal').modal('show')
    },
    async submit () {
      if (this.form.id === null) return
      // Submit the form.
      await this.form.submit('put', `/api/usuarios/${this.form.id}`, { notLoader: true })
      $('#editarUsuarioModal').modal('hide')
      this.$emit('save')
    }
  }
}
</script>

<style scoped>

</style>
