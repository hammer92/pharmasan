<template>
  <div>
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div id="editarClienteModal" class="modal fade" tabindex="-1" aria-labelledby="editarClienteModalLabel" aria-hidden="true">
      <form @submit.prevent="submit" @keydown="form.onKeydown($event)">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 id="editarClienteModalLabel" class="modal-title">
                {{ $t('modal_editar_cliente') }}
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form-cliente :form="form" />
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
import FormCliente from './form'
import Form from 'vform'
import $ from 'jquery'

export default {
  name: 'EditarCliente',
  components: { FormCliente },
  data: () => ({
    form: new Form({
      id: null,
      documento: '',
      correo: '',
      direccion: '',
      nombre: ''
    })
  }),
  methods: {
    open (item) {
      this.form = new Form(item)
      $('#editarClienteModal').modal('show')
    },
    async submit () {
      if (this.form.id === null) return
      // Submit the form.
      await this.form.submit('put', `/api/clientes/${this.form.id}`, { notLoader: true })
      $('#editarClienteModal').modal('hide')
      this.$emit('save')
    }
  }
}
</script>

<style scoped>

</style>
