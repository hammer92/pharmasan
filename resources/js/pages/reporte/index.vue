<template>
  <div class="card">
    <div class="card-body d-flex justify-content-between">
      <h5 class="card-title">
        {{ $t('titulo_reporte_medicamento') }}
      </h5>
      <button type="button" class="btn btn-primary" @click="exportar">
        {{ $t('exportar') }}
      </button>
    </div>
    <div class="card-body">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">
              #
            </th>
            <th scope="col">
              {{ $t('expediente') }}
            </th>
            <th scope="col">
              {{ $t('producto') }}
            </th>
            <th scope="col">
              {{ $t('titular') }}
            </th>
            <th scope="col">
              {{ $t('registrosanitario') }}
            </th>
            <th scope="col">
              {{ $t('fechavencimiento') }}
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, key) in listado.data" :key="key">
            <th scope="row" v-text="key+1" />
            <td v-text="item.expediente" />
            <td v-text="item.producto" />
            <td v-text="item.titular" />
            <td v-text="item.registrosanitario" />
            <td v-text="item.fechavencimiento" />
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

export default {
  name: 'ClienteIndex',
  metaInfo () {
    return { title: 'Medicamento' }
  },
  data () {
    return {
      listado: {
        current_page: 1,
        data: [],
        first_page_url: 'http://localhost/api/medicamento?page=1',
        from: 1,
        last_page: 0,
        last_page_url: 'http://localhost/api/medicamento?page=11516',
        next_page_url: 'http://localhost/api/medicamento?page=2',
        path: 'http://localhost/api/medicamento',
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
    async exportar () {
      try {
        const { data } = await axios('http://localhost/api/medicamento/export')
        const url = window.URL.createObjectURL(new Blob([data]))
        const link = document.createElement('a')
        link.href = url
        link.setAttribute('download', 'medicamento.xlsx') // or any other extension
        document.body.appendChild(link)
        link.click()
      } catch (e) {
        console.log(e.message)
      }

    }
  }
}
</script>

<style scoped>

</style>
