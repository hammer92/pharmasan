<template>
  <div class="card">
    <div class="card-body d-flex justify-content-between">
      <h5 class="card-title">
        {{ $t('titulo_crear_usuario') }}
      </h5>
      <editar-usuario ref="edit" @save="load(listado.path)"/>
      <can permiso="crear_usuario">
        <crear-usuario @save="load(listado.path)"/>
      </can>
    </div>
    <div class="card-body">
      <table class="table">
        <thead class="thead-dark">
        <tr>
          <th scope="col">
            #
          </th>
          <th scope="col">
            {{ $t('nombre') }}
          </th>
          <th scope="col">
            {{ $t('correo') }}
          </th>
          <th scope="col">
            {{ $t('rol') }}
          </th>
          <th scope="col">
            {{ $t('acciones') }}
          </th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(item, key) in listado.data" :key="key">
          <th scope="row" v-text="key+1"/>
          <td v-text="item.name"/>
          <td v-text="item.email"/>
          <td v-text="item.rol"/>
          <td>
            <can permiso="editar_usuario">
              <button class="btn btn-primary" @click="editar(item)">
                {{ $t('editar') }}
              </button>
            </can>
            <can permiso="eliminar_usuario">
              <button class="btn btn-danger" @click="eliminar(item.id)">
                {{ $t('eliminar') }}
              </button>
            </can>
          </td>
        </tr>
        </tbody>
      </table>
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
          <li class="page-item" :class="{disabled:listado.current_page === 1}">
            <a class="page-link" @click="load(listado.prev_page_url)">Anterior</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">{{ listado.current_page }} / {{ listado.last_page }}</a>
          </li>
          <li class="page-item" :class="{disabled:listado.current_page === listado.last_page}">
            <a class="page-link" @click="load(listado.next_page_url)">Próximo</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import Swal from 'sweetalert2'
import CrearUsuario from './crear'
import EditarUsuario from './editar'

export default {
  name: 'UsuarioIndex',
  components: { EditarUsuario, CrearUsuario },
  metaInfo () {
    return { title: 'Usuarios' }
  },
  data () {
    return {
      listado: {
        current_page: 1,
        data: [],
        first_page_url: '/api/usuarios?page=1',
        from: 1,
        last_page: 0,
        last_page_url: '/api/usuarios?page=11516',
        next_page_url: '/api/usuarios?page=2',
        path: '/api/usuarios',
        per_page: 10,
        prev_page_url: null,
        to: 0,
        total: 0
      }
    }
  },
  mounted () {
    this.load(this.listado.path)
  },
  methods: {
    async load (url) {
      try {
        const { data } = await axios(url)
        this.listado = data
      } catch (e) {
        console.log(e.message)
      }
    },
    editar (item) {
      this.$refs.edit.open(item)
    },
    eliminar (id) {
      Swal.fire({
        title: '¿Estás seguro?',
        text: '¡No podrás revertir esto!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, bórralo!'
      }).then(async (result) => {
        if (result.value) {
          try {
            await axios.delete(`/api/usuarios/${id}`)
            await this.load(this.listado.path)
            Swal.fire(
              '¡Eliminado!',
              'Su archivo ha sido eliminado.',
              'success'
            )
          } catch (e) {
            console.log(e.message)
          }
        }
      })
    }
  }
}
</script>

<style scoped>

</style>
